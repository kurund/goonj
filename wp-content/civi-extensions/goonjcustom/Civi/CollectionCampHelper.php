<?php

namespace Civi;

use Civi\Core\Service\AutoSubscriber;
use CRM_Pets_ExtensionUtil as E;

class CollectionCampHelper extends AutoSubscriber {

	public static function getSubscribedEvents() {
		return [
			'&hook_civicrm_post' => 'generateCollectionCampCode',
		];
	}

	/**
	 * This hook is called after a db write on entities.
	 *
	 * @param string $op
	 *   The type of operation being performed.
	 * @param string $objectName
	 *   The name of the object.
	 * @param int $objectId
	 *   The unique identifier for the object.
	 * @param object $objectRef
	 *   The reference to the object.
	 */
	public static function generateCollectionCampCode(string $op, string $objectName, int $objectId, &$objectRef) {
		// Check if the object name is 'AfformSubmission'
		if ($objectName !== 'AfformSubmission') {
			return;
		}
	
		// Extract the 'data' field
		$data = $objectRef->data;
		$decodedData = json_decode($data, true);
	
		// Check if the 'Eck_Collection_Camp1' exists
		$collectionCampData = $decodedData['Eck_Collection_Camp1'][0]['fields'] ?? null;
		if ($collectionCampData === null) {
			return;
		}

		// Get subtype information
		$subtypeMap = self::getSubtypeMap();
	
		// Access the subtype
		$subtypeId = $collectionCampData['subtype'] ?? null;
		$subtypeLabel = $subtypeMap[$subtypeId] ?? null;		
	
		// Check if the subtype is 4 or 5 (collection camp and dropping center)
		if (!in_array($subtypeLabel, ['Collection Camp', 'Dropping Center'])) {
			return;
		}
	
		// Access the id within the decoded data
		$campId = $collectionCampData['id'] ?? null;
		if ($campId === null) {
			return;
		}
	
		// Fetch the collection camp details
		$collectionCamps = \Civi\Api4\EckEntity::get('Collection_Camp', FALSE)
			->addWhere('id', '=', $campId)
			->setLimit(1)
			->execute();
	
		if (empty($collectionCamps)) {
			return;
		}
	
		$collectionCampsCreatedDate = $collectionCamps->first()['created_date'] ?? null;
	
		// Get the year
		$year = date('Y', strtotime($collectionCampsCreatedDate));
	
		// Fetch the state ID from the collection camp intent details
		$stateId = $collectionCampData['Collection_Camp_Intent_Details.State'] ?? null;
		if ($subtypeLabel === 'Dropping Center') {
			$stateId = $collectionCampData['Dropping_Centre.State'] ?? null;
		}
	
		if (!$stateId) {
			return;
		}
	
		// Fetch the state abbreviation
		$stateProvinces = \Civi\Api4\StateProvince::get(TRUE)
			->addWhere('id', '=', $stateId)
			->setLimit(1)
			->execute();
	
		if (empty($stateProvinces)) {
			return;
		}
	
		$stateAbbreviation = $stateProvinces->first()['abbreviation'] ?? null;
	
		if (!$stateAbbreviation) {
			return;
		}
	
		// Fetch the Goonj-specific state code
		$config = self::getConfig();

		$stateCode = $config['state_codes'][$stateAbbreviation] ?? 'UNKNOWN';

		// Get the current event title
		$currentTitle = $collectionCampData['title'] ?? 'Collection Camp';
		
	
		// Fetch the event code
		$eventCode = $config['event_codes'][$currentTitle] ?? 'UNKNOWN';
	
		// Count existing camps for the state and year with the same event code
		$existingCamps = \Civi\Api4\EckEntity::get('Collection_Camp', FALSE)
			->addSelect('title')
			->addWhere('title', 'LIKE', "$year/$stateCode/$eventCode/%")
			->execute();
	
		$serialNumber = sprintf('%03d', $existingCamps->count() + 1);
	
		// Modify the title to include the year, state code, event code, and serial number
		$newTitle = $year . '/' . $stateCode . '/' . $eventCode . '/' . $serialNumber;
		$collectionCampData['title'] = $newTitle;
	
		// Save the updated title back to the Collection Camp entity
		\Civi\Api4\EckEntity::update('Collection_Camp')
			->addWhere('id', '=', $campId)
			->addValue('title', $newTitle)
			->execute();
	}
	
	private static function getConfig() {
		// Get the path to the CiviCRM extensions directory
		$extensionsDir = \CRM_Core_Config::singleton()->extensionsDir;
		
		// Relative path to the extension's config directory
		$extensionPath = $extensionsDir . 'goonjcustom/config/';
	
		// Include and return the configuration files
		return [
			'state_codes' => include $extensionPath . 'constants.php',
			'event_codes' => include $extensionPath . 'eventCode.php'
		];
	}

	private static function getSubtypeMap() {
		// Fetch subtype information from CiviCRM
		$eckEntityTypes = \Civi\Api4\EckEntityType::get(TRUE)
			->addSelect('sub_types:label', 'sub_types')
			->addWhere('label', '=', 'Collection Camp')
			->setLimit(1)
			->execute();
	
		$subtypeMap = [];
		if (!empty($eckEntityTypes)) {
			$subtypeInfo = $eckEntityTypes->first();
			$subtypeIds = $subtypeInfo['sub_types'] ?? [];
			$subtypeLabels = $subtypeInfo['sub_types:label'] ?? [];
			
			// Create a map of subtype IDs to labels
			$subtypeMap = array_combine($subtypeIds, $subtypeLabels);
		}
	
		return $subtypeMap;
	}
	
	
}

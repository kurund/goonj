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
		if ($objectName === 'AfformSubmission') {
			// Extract the 'data' field
			$data = $objectRef->data;

			$decodedData = json_decode($data, true);

			// Access the subtype
			$subtype = $decodedData['Eck_Collection_Camp1'][0]['fields']['subtype'] ?? null;

			if ($subtype == 4 || $subtype == 5) {
				// Access the id within the decoded data
				if (isset($decodedData['Eck_Collection_Camp1'][0]['fields']['id'])) {
					$campId = $decodedData['Eck_Collection_Camp1'][0]['fields']['id'];

					// Fetch the collection camp details
					$collectionCamps = \Civi\Api4\EckEntity::get('Collection_Camp', FALSE)
						->addWhere('id', '=', $campId)
						->setLimit(1)
						->execute();

					if (!empty($collectionCamps)) {
						$collectionCampsCreatedDate = $collectionCamps->first()['created_date'] ?? null;

						// Get the year
						$year = date('Y', strtotime($collectionCampsCreatedDate));

						// Fetch the state ID from the collection camp intent details
						$stateId = $decodedData['Eck_Collection_Camp1'][0]['fields']['Collection_Camp_Intent_Details.State'] ?? null;
						if ($subtype == 5) {
							$stateId = $decodedData['Eck_Collection_Camp1'][0]['fields']['Dropping_Centre.State'] ?? null;
						}

						if ($stateId) {
							// Fetch the state abbreviation using the API
							$stateProvinces = \Civi\Api4\StateProvince::get(TRUE)
								->addWhere('id', '=', $stateId)
								->setLimit(1)
								->execute();

							if (!empty($stateProvinces)) {
								$stateAbbreviation = $stateProvinces->first()['abbreviation'] ?? null;

								if ($stateAbbreviation) {
									// Fetch the Goonj-specific state code
									$goonjStateCodePath = ABSPATH . 'wp-content/civi-extensions/goonjcustom/config/constants.php';
									$goonjStateCode = include $goonjStateCodePath;
									// Find the state code
									$stateCode = $goonjStateCode[$stateAbbreviation] ?? 'UNKNOWN';
								}
							}
						}

						// Get the current event title
						$currentTitle = $decodedData['Eck_Collection_Camp1'][0]['fields']['title'] ?? 'Collection Camp';

						// Fetch the event code
						$eventCodePath = ABSPATH . 'wp-content/civi-extensions/goonjcustom/config/eventCode.php';
						$eventCodeConfig = include $eventCodePath;

						// Determine the event code based on the current title
						$eventCode = $eventCodeConfig[$currentTitle] ?? 'UNKNOWN';

						// Count existing camps for the state and year with the same event code
						$existingCamps = \Civi\Api4\EckEntity::get('Collection_Camp', FALSE)
							->addSelect('title')
							->addWhere('title', 'LIKE', "$year/$stateCode/$eventCode/%")
							->execute();

						$serialNumber = sprintf('%03d', $existingCamps->count() + 1);

						// Modify the title to include the year, state code, event code, and serial number
						$newTitle = $year . '/' . $stateCode . '/' . $eventCode . '/' . $serialNumber;

						$decodedData['Eck_Collection_Camp1'][0]['fields']['title'] = $newTitle;

						// Update the objectRef's data to reflect the new title
						$objectRef->data = json_encode($decodedData);

						// Save the updated title back to the Collection Camp entity
						\Civi\Api4\EckEntity::update('Collection_Camp')
							->addWhere('id', '=', $campId)
							->addValue('title', $newTitle)
							->execute();

					}
				}
			}
		}
	}

}

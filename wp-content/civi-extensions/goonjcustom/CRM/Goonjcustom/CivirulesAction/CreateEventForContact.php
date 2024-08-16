<?php
class CRM_Goonjcustom_CivirulesAction_CreateEventForContact extends CRM_Civirules_Action {
	/**
	 * Method processAction to execute the action
	 *
	 * @param CRM_Civirules_TriggerData_TriggerData $triggerData
	 * @access public
	 */
	public function processAction(CRM_Civirules_TriggerData_TriggerData $triggerData) {
		$contactId = $triggerData->getContactId();
		$originalData = $triggerData->getOriginalData();

		// Extract fields
		$startDate = $originalData['custom_73'] ?? null;
		$endDate = $originalData['custom_74'] ?? null;
		$contactId = $originalData['contact_id'] ?? null;
		$activityId = $originalData['activity_id'] ?? null;
		$location = $originalData['custom_69'] ?? null;
		$state = $originalData['custom_71'] ?? null;
		$postalCode = $originalData['custom_89'] ?? null;
		$city = $originalData['custom_85'] ?? null;
		$createdDate = $originalData['created_date'] ?? null;

		// Save an address for the contact
		try {
			$addressResult = \Civi\Api4\Address::create(FALSE)
				->addValue('contact_id', $contactId)
				->addValue('street_address', $location)
				->addValue('city', $city)
				->addValue('state_province_id', $state)
				->addValue('postal_code', $postalCode)
				->setFixAddress(FALSE)
				->execute();

			$addressId = $addressResult->first()['id'] ?? null;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

		// Create a location block with the address ID
		try {
			$locBlockResult = \Civi\Api4\LocBlock::create(FALSE)
				->addValue('address_id', $addressId)
				->execute();

			// Fetch the location block ID from the result
			$locBlockData = $locBlockResult->first();
			$locBlockId = $locBlockData['id'] ?? null;

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

		$eventParams = [
			'title' => $this->getEventCode($createdDate, $addressId),
			'event_type_id' => 7,
			'start_date' => $startDate,
			'end_date' => $endDate,
			'is_active' => 1,
			'is_public' => 1,
			'default_role_id' => 1,
			'created_id' => $contactId,
			'custom_68' => $activityId,
			'loc_block_id' => $locBlockId,
		];

		try {
			// Create the event
			$eventResult = civicrm_api3('Event', 'create', $eventParams);
			$newEventId = $eventResult['id'];
			// Add the participant to the newly created event
			$participantParams = [
				'event_id' => $newEventId,
				'contact_id' => $contactId,
				'status_id' => 1
			];

			civicrm_api3('Participant', 'create', $participantParams);
		} catch (CiviCRM_API3_Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	private function getEventCode($createdDate, $addressId) {
		$date = new DateTime($createdDate);
		$createdYear = $date->format('Y');

		// Fetch the state_province_id from the address
		try {
			$addresses = \Civi\Api4\Address::get(FALSE)
				->addSelect('state_province_id')
				->addWhere('id', '=', $addressId)
				->setLimit(1)
				->execute();
	
			$addressData = $addresses->first();
			$stateProvinceId = $addressData['state_province_id'] ?? null;    
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

		// Fetch the state abbreviation
		try {
			$stateResult = \Civi\Api4\StateProvince::get(FALSE)
				->addSelect('abbreviation')
				->addWhere('id', '=', $stateProvinceId)
				->setLimit(1)
				->execute();

			$stateData = $stateResult->first();
			$stateAbbreviation = $stateData['abbreviation'] ?? null;    
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

		// Fetch the goonj specific state code
		$goonjStateCodePath = ABSPATH . 'wp-content/civi-extensions/goonjcustom/config/constants.php';
		$goonjStateCode = include $goonjStateCodePath;

		// Find the state code from the config
		$stateCode = $goonjStateCode[$stateAbbreviation] ?? 'UNKNOWN';

		return "$createdYear/$stateCode/CC";
	}

	/**
	 * Method to return the url for additional form processing for action
	 * and return false if none is needed
	 *
	 * @param int $ruleActionId
	 * @return bool
	 * @access public
	 */
	public function getExtraDataInputUrl( $ruleActionId ) {
		return false;
	}
}

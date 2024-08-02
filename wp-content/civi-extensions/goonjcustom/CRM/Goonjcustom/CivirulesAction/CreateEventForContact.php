<?php
class CRM_Goonjcustom_CivirulesAction_CreateEventForContact extends CRM_Civirules_Action {
	/**
	 * Method processAction to execute the action
	 *
	 * @param CRM_Civirules_TriggerData_TriggerData $triggerData
	 * @access public
	 */
	public function processAction(CRM_Civirules_TriggerData_TriggerData $triggerData) {
		// Get the contact ID from the trigger data
		$contactId = $triggerData->getContactId();
		
		// Event ID to which contacts will be added.
		$eventId = 39;
		
		$params = [
			'event_id' => $eventId,
			'contact_id' => $contactId,
			'status_id' => 1 //Status ID for 'Attending'
		];

		// Call the CiviCRM API to create the event participant
		try {
			$result = civicrm_api3('Participant', 'create', $params);
			// Log success
			error_log("Participant added to event. Result: " . print_r($result, TRUE));
		} catch (CiviCRM_API3_Exception $e) {
			// Log error
			error_log("Error adding participant: " . $e->getMessage());
		}
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

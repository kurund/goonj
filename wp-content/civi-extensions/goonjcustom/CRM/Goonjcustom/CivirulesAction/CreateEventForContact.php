<?php
Civi::log()->debug('Debug message =');
Civi::log()->error('Error message fsdf');
var_dump("hello");
class CRM_Goonjcustom_CivirulesAction_CreateEventForContact extends CRM_Civirules_Action {
    
    /**
     * Method processAction to execute the action
	 *
     * @param CRM_Civirules_TriggerData_TriggerData $triggerData
     * @access public
	 */
    public function processAction( CRM_Civirules_TriggerData_TriggerData $triggerData ) {
		Civi::log()->debug('Debug message here');
		Civi::log()->error('Error message here');
        ob_start();
        var_dump('fdsaf');
        $op = ob_get_clean();
        error_log("Error" . $op);
		die;
		$contactId = $triggerData->getContactId();

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

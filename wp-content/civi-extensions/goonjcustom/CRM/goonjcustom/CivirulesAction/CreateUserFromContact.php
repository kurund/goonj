<?php
class CRM_Goonjcustom_CivirulesAction_CreateUserFromContact extends CRM_Civirules_Action {

	/**
	 * Method processAction to execute the action
	 *
	 * @param CRM_Civirules_TriggerData_TriggerData $triggerData
	 * @access public
	 */
	public function processAction( CRM_Civirules_TriggerData_TriggerData $triggerData ) {
		$contactId = $triggerData->getContactId();

		try {
			$contact = civicrm_api3( 'Contact', 'getsingle', array( 'id' => $contactId ) );

			if ( ! $contact || empty( $contact['email'] ) ) {
				return false;
			}
		} catch ( \CiviCRM_API3_Exception $e ) {
			return false;
		}

		$defaultPassword = 'goonj@2024'; // to be updated 

		$userParams = array(
			'user_login'   => $contact['email'],
			'user_email'   => $contact['email'],
			'user_pass'    => $defaultPassword,
			'nickname'     => $contact['email'],
			'first_name'   => $contact['first_name'],
			'last_name'    => $contact['last_name'],
			'display_name' => $contact['display_name'],
			'role'         => 'lead_volunteer',
		);

		$existingUserID = username_exists( $contact['email'] );
		if ( $existingUserID != false ) {
			$userParams['ID'] = $existingUserID;
		}

		try {
			$uf_id = wp_insert_user( $userParams );

			if ( empty( $uf_id ) || $uf_id instanceof \WP_Error ) {
				return false;
			}
		} catch ( \Exception $e ) {
			return false;
		}

		return true;
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

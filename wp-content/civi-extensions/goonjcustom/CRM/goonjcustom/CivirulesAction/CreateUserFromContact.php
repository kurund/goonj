<?php
class CRM_Goonjcustom_CivirulesAction_CreateUserFromContact extends CRM_Civirules_Action {

	/**
	 * Method processAction to execute the action
	 *
	 * @param CRM_Civirules_TriggerData_TriggerData $triggerData
	 * @access public
	 */
	public function processAction( CRM_Civirules_TriggerData_TriggerData $triggerData ) {
		// $this->triggerData = $triggerData;
		$contactId = $triggerData->getContactId();
		$actionParams = $this->getActionParameters(); // should contain [wp_role, activity_type_id]
		// $ruleId = $this->ruleAction['rule_id'];

		// Fetch contact data
		try {
			$contact = civicrm_api3( 'Contact', 'getsingle', array( 'id' => $contactId ) );

			if ( ! $contact || empty( $contact['email'] ) ) {
				return false;
			}
		} catch ( \CiviCRM_API3_Exception $e ) {
			return false;
		}

    // ---------------------
		// Create new WP user

		// Set default password for new users: predictable hash that we'll also use in email templates
		$defaultPassword = 'goonj@2024'; // to be updated 

		// Try to create WP user and set name, email, role
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

		// Check if WP user exists, and if true update instead of insert
		$existingUserID = username_exists( $contact['email'] );
		if ( $existingUserID != false ) {
			// $this->logAction( "WPCreateUser: updating existing Wordpress user {$existingUserID} for email {$contact['email']}.", $this->triggerData, LogLevel::WARNING );
			$userParams['ID'] = $existingUserID;
		}

		// Quick hack: empty $_POST, because wp_insert_user() triggers the SynchronizeUFMatch functions, which seem to decide if this an interactive login/registration based on $_POST - TODO Report?
		$_POST = array();

		// Insert/update user (with try/catch because CiviCRM might throw fatal errors)
		// This should also add a correct UFMatch record, so we don't have to do that manually
		try {
			// $this->logAction( "WPCreateUser: Calling wp_insert_user for contact {$contactId} (parameters: " . print_r( $userParams, true ) . ').', $triggerData, LogLevel::INFO );
			$uf_id = wp_insert_user( $userParams );

			if ( empty( $uf_id ) || $uf_id instanceof \WP_Error ) {
				return false;
			}
		} catch ( \Exception $e ) {
			return false;
		}

		// ---------------------
		// That should be all!

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

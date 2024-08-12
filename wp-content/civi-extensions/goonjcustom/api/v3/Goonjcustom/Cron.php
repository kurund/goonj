<?php

/**
 * Civirules.Cron API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @return void
 */
function _civicrm_api3_goonjcustom_cron_spec(&$spec) {
  //there are no parameters for the civirules cron
}

/**
 * Civirules.Cron API
 *
 * @param array $params
 *
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws \CRM_Core_Exception
 */
function civicrm_api3_goonjcustom_cron($params) {
  $returnValues = [];

  try {

    // $currentDate = date('Y-m-d');
    $activity_assignees = \Civi\Api4\Activity::get(TRUE)
        ->addSelect('activity_contact.contact_id')
        ->addJoin('ActivityContact AS activity_contact', 'LEFT', ['activity_contact.record_type_id', '=', 1])
        ->addWhere('activity_type_id', '=', 57)
        ->addWhere('status_id', '=', 1)
        ->addWhere('activity_date_time', '<=', '2024-08-30')
        ->addWhere('activity_date_time', '>=', '2024-08-30')
        ->setLimit(25)
        ->execute();


    foreach ($activity_assignees as $assignee) {
        $contact_id = $assignee['activity_contact.contact_id'];
        $contactEmail = \Civi\Api4\Email::get(TRUE)
            ->addSelect('contact_id', 'email')
            ->addWhere('contact_id', '=', $contact_id)
            ->execute();
        error_log('contactEmail' . print_r($contactEmail, true));

    }
    
    error_log('Goonj Cron Job: Job completed successfully');
} catch (CiviCRM_API3_Exception $e) {
    error_log('Goonj Cron Job: API error - ' . $e->getMessage());
}
    error_log('check');
  return civicrm_api3_create_success($returnValues, $params, 'Goonjcustom', 'cron');

}


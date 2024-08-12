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
        ->addSelect('target_contact_id', 'activity_contact.contact_id', 'activity_date_time')
        ->addJoin('ActivityContact AS activity_contact', 'LEFT', ['activity_contact.record_type_id', '=', 1])
        ->addWhere('activity_type_id', '=', 57)
        ->addWhere('status_id', '=', 1)
        ->addWhere('activity_date_time', '<=', '2024-08-30')
        ->addWhere('activity_date_time', '>=', '2024-08-30')
        ->setLimit(25)
        ->execute();


    foreach ($activity_assignees as $assignee) {
        $assignee_contact_id = $assignee['activity_contact.contact_id'];
        $volunteer_contect_id = $assignee['target_contact_id'][0];
        error_log('$result' . print_r($assignee['target_contact_id'][0], true));
        $assignee_details = \Civi\Api4\Contact::get(TRUE)
            ->addSelect('email.email', 'display_name')
            ->addJoin('Email AS email', 'LEFT')
            ->addWhere('id', '=', $assignee_contact_id)
            ->execute();
        error_log('$result2' . print_r($assignee_details, true));
        $volunteer_details = \Civi\Api4\Contact::get(TRUE)
            ->addSelect('display_name')
            ->addWhere('id', '=', $volunteer_contect_id)
            ->execute();
        error_log('$result3' . print_r($volunteer_details, true));
        list($defaultFromName, $defaultFromEmail) = CRM_Core_BAO_Domain::getNameAndEmail();
        $from = "\"$defaultFromName\" <$defaultFromEmail>";
        $assignee_name = $assignee_details[0]['display_name'];
        $volunteer_name = $volunteer_details[0]['display_name'];
    
        $induction_time = $assignee['activity_date_time'];
        $html = "
        <p>Dear $assignee_name,</p>
        <p>This is a friendly reminder that you have a volunteer induction scheduled for today at $induction_time.</p>
        <p>Here are the details for the volunteer being inducted:</p>
        <ul>
            <li><strong>Name:</strong> $volunteer_name</li>
        </ul>
        <p>Best regards,<br>Goonj</p>";
        $mailParams = [
            'groupName' => 'Mailing Event ',
            'subject' => 'Reminder: Volunteer Induction Scheduled for Today',
            'from' => $from,
            'toEmail' => $assignee_details[0]['email.email'],
            'toName' => $assignee_details[0]['display_name'],
            'replyTo' => $from,
            'html' => $html,
            // 'messageTemplateID' => 76,
          ];
        try{
            $result = CRM_Utils_Mail::send($mailParams);
            error_log('$result' . print_r($result, true));
        }catch (CiviCRM_API3_Exception $e) {
            error_log('Goonj Cron Job: API error - ' . $e->getMessage());
        }
    }
    
    error_log('Goonj Cron Job: Job completed successfully');
} catch (CiviCRM_API3_Exception $e) {
    error_log('Goonj Cron Job: API error - ' . $e->getMessage());
}
    error_log('check');
  return civicrm_api3_create_success($returnValues, $params, 'Goonjcustom', 'cron');

}


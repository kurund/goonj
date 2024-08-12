<?php

/**
 * Civirules.Cron API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @return void
 */
function _civicrm_api3_goonjcustom_cron_spec(&$spec)
{
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
function civicrm_api3_goonjcustom_cron($params)
{
    $returnValues = [];

    try {

        $currentDate = date('Y-m-d');
        $induction_activity_type_id = 57;
        $assignee_record_type_id = 1 ;
        $induction_status_id = 1 ;
        $startOfDay = new DateTime('today midnight');

        $endOfDay = new DateTime('tomorrow midnight -1 second');

        $activity_assignees = \Civi\Api4\Activity::get(true)
            ->addSelect('target_contact_id', 'activity_contact.contact_id', 'activity_date_time')
            ->addJoin('ActivityContact AS activity_contact', 'LEFT', ['activity_contact.record_type_id', '=', $assignee_record_type_id])
            ->addWhere('activity_type_id', '=', $induction_activity_type_id)
            ->addWhere('status_id', '=', $induction_status_id)
            ->addWhere('activity_date_time', '>=', $startOfDay->format('Y-m-d H:i:s'))
            ->addWhere('activity_date_time', '<=', $endOfDay->format('Y-m-d H:i:s'))
            ->setLimit(25)
            ->execute();


        foreach ($activity_assignees as $assignee) {
            $assignee_contact_id = $assignee['activity_contact.contact_id'];
            $volunteer_contact_id = $assignee['target_contact_id'][0];

            $assignee_details = \Civi\Api4\Contact::get(true)
                ->addSelect('email.email', 'display_name')
                ->addJoin('Email AS email', 'LEFT')
                ->addWhere('id', '=', $assignee_contact_id)
                ->execute();

            $volunteer_details = \Civi\Api4\Contact::get(true)
                ->addSelect('display_name')
                ->addWhere('id', '=', $volunteer_contact_id)
                ->execute();


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
            try {
                $result = CRM_Utils_Mail::send($mailParams);
            } catch (CiviCRM_API3_Exception $e) {
                error_log('Goonj Cron Job: API error - ' . $e->getMessage());
            }
        }
    } catch (CiviCRM_API3_Exception $e) {
        error_log('Goonj Cron Job: API error - ' . $e->getMessage());
    }
    return civicrm_api3_create_success($returnValues, $params, 'Goonjcustom', 'cron');
}

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

        $groupedResults = [];

        // Initialize an array to hold the grouped results
        $groupedResults = [];

        foreach ($activity_assignees as $activity) {
            $assignee_contact_id = $activity['activity_contact.contact_id'];
            $targetContactId = $activity['target_contact_id'][0];
            $activityDateTime = $activity['activity_date_time'];


            // Get details for the assignee contact
            $assignee_details = \Civi\Api4\Contact::get(true)
                ->addSelect('email.email', 'display_name')
                ->addJoin('Email AS email', 'LEFT')
                ->addWhere('id', '=', $assignee_contact_id)
                ->execute();

            // Get details for the target contact
            $volunteer_details = \Civi\Api4\Contact::get(true)
                ->addSelect('email.email', 'phone.phone', 'display_name')
                ->addJoin('Email AS email', 'LEFT')
                ->addJoin('Phone AS phone', 'LEFT')
                ->addWhere('id', '=', $targetContactId)
                ->setLimit(25)
                ->execute();

            // If the contact_id is not in the grouped results, initialize it
            if (!isset($groupedResults[$assignee_contact_id])) {
                $groupedResults[$assignee_contact_id] = [
                    'activity_contact.contact_id' => $assignee_contact_id,
                    'assignee_display_name' => $assignee_details[0]['display_name'],
                    'assignee_email' => $assignee_details[0]['email.email'],
                    'target_contact_details' => [],
                ];
            }

            $groupedResults[$assignee_contact_id]['target_contact_details'][] = [
                'id' => $targetContactId,
                'activity_date_time' => $activityDateTime,
                "volunteer_display_name" => $volunteer_details[0]['display_name'],
                'email' => $volunteer_details[0]['email.email'] ?? '',
                'phone' => $volunteer_details[0]['phone.phone'] ?? '',
            ];
        }

        // Convert the grouped results to a list of arrays
        $finalResults = array_values($groupedResults);



        foreach ($finalResults as $assignee) {
            $assignee_contact_id = $assignee['activity_contact.contact_id'];
            $assignee_name = $assignee['assignee_display_name'];

            $assignee_email = $assignee['assignee_email'];

            // Prepare the email body content
            $volunteer_details_html = '';
            foreach ($assignee['target_contact_details'] as $target) {
                $volunteer_id = $target['id'];
                $volunteer_name = \Civi\Api4\Contact::get(true)
                    ->addSelect('display_name')
                    ->addWhere('id', '=', $volunteer_id)
                    ->execute()[0]['display_name'];

                $activity_date_time = $target['activity_date_time'];
                $formatted_date_time = new DateTime($activity_date_time);
                $induction_time = $formatted_date_time->format('F jS, Y g:i A');

                // Append each volunteer's details to the email body
                $volunteer_details_html .= "
                <li><strong>Name:</strong> $volunteer_name<br>
                    <strong>Email:</strong> {$target['email']}<br>
                    <strong>Phone:</strong> {$target['phone']}<br>
                    <strong>Scheduled At:</strong> $induction_time
                </li>";
            }

            $html = "
            <p>Dear $assignee_name,</p>
            <p>This is a friendly reminder that you have volunteer inductions scheduled for today.</p>
            <p>Here are the details for the volunteers being inducted:</p>
            <ul>
                $volunteer_details_html
            </ul>
            <p>Best regards,<br>Goonj</p>";

            list($defaultFromName, $defaultFromEmail) = CRM_Core_BAO_Domain::getNameAndEmail();
            $from = "\"$defaultFromName\" <$defaultFromEmail>";

            $mailParams = [
                'groupName' => 'Mailing Event',
                'subject' => 'Reminder: Volunteer Inductions Scheduled for Today',
                'from' => $from,
                'toEmail' => $assignee_email,
                'toName' => $assignee_name,
                'replyTo' => $from,
                'html' => $html,
                // 'messageTemplateID' => 76, // Uncomment if using a message template
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

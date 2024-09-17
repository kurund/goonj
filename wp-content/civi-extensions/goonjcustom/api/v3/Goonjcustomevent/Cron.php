<?php

/**
 * @file
 */

use Civi\Api4\Contact;
use Civi\Api4\EckEntity;
use Civi\Api4\Email;
use Civi\Api4\OptionValue;

/**
 * Civirules.Cron API specification.
 *
 * @param array $spec
 *   Description of fields supported by this API call.
 *
 * @return void
 */
function _civicrm_api3_goonjcustomevent_cron_spec(&$spec) {
  // No parameters for the civirules cron.
}

/**
 * Civirules.Cron API.
 *
 * @param array $params
 *
 * @return array API result descriptor
 *
 * @throws \CRM_Core_Exception
 */
function civicrm_api3_goonjcustomevent_cron($params) {
  $returnValues = [];

  try {
    goonjcustomevent_check_and_send_emails_for_camp_end_date();
  }
  catch (Exception $e) {
    error_log('Goonj Cron Job: Error - ' . $e->getMessage());
  }

  return civicrm_api3_create_success($returnValues, $params, 'Goonjcustomevent', 'cron');
}

/**
 * Function to check camp end date and send emails.
 */
function goonjcustomevent_check_and_send_emails_for_camp_end_date() {
  $optionValues = OptionValue::get(FALSE)
    ->addWhere('option_group_id:name', '=', 'eck_sub_types')
    ->addWhere('name', '=', 'Collection_Camp')
    ->execute()->single();

  $collectionCampSubtype = $optionValues['value'];

  // Get today's date in the same format as the End_Date field.
  $today = new DateTime();
  // Set time to end of the day.
  $today->setTime(23, 59, 59);
  $endOfDay = $today->format('Y-m-d H:i:s');
  $todayFormatted = $today->format('Y-m-d');

  try {
    $collectionCamps = EckEntity::get('Collection_Camp', TRUE)
      ->addSelect('Logistics_Coordination.Camp_to_be_attended_by', 'Collection_Camp_Intent_Details.End_Date')
      ->addWhere('subtype', '=', $collectionCampSubtype)
      ->addWhere('Collection_Camp_Intent_Details.End_Date', '<=', $endOfDay)
      ->addWhere('Logistics_Coordination.Camp_to_be_attended_by', 'IS NOT EMPTY')
      ->execute();

    foreach ($collectionCamps as $camp) {
      $recipientId = $camp['Logistics_Coordination.Camp_to_be_attended_by'];
      $endDate = new DateTime($camp['Collection_Camp_Intent_Details.End_Date']);
      $collectionCampId = $camp['id'];
      $endDateFormatted = $endDate->format('Y-m-d');

      $collectionCamp = \Civi\Api4\EckEntity::get('Collection_Camp', TRUE)
      ->addSelect('Collection_Camp_Intent_Details.Goonj_Office')
      ->addWhere('id', '=', $collectionCampId)
      ->execute()->single();

      $collectionCampGoonjOffice =  $collectionCamp['Collection_Camp_Intent_Details.Goonj_Office'];

      $emails = Email::get(TRUE)
        ->addWhere('contact_id', '=', $recipientId)
        ->execute()->single();

      $emailId = $emails['email'];

      $contacts = Contact::get(TRUE)
        ->addWhere('id', '=', $recipientId)
        ->execute()->single();

      $contactName = $contacts['display_name'];

      // Only send the email if the end date is exactly today.
      if ($endDateFormatted === $todayFormatted) {
        $mailParams = [
          'subject' => 'Event Completion Notification',
          'from' => 'urban.ops@goonj.org',
          'toEmail' => $emailId,
          'replyTo' => 'urban.ops@goonj.org',
          'html' => goonjcustomevent_collection_camp_email_html($contactName, $collectionCampId, $recipientId, $collectionCampGoonjOffice),
          // 'messageTemplateID' => 76, // Uncomment if using a message template
        ];
        try {
          $result = CRM_Utils_Mail::send($mailParams);
        }
        catch (CiviCRM_API3_Exception $e) {
          error_log('Goonj Cron Job: API error - ' . $e->getMessage());
        }
      }
    }
  }
  catch (Exception $e) {
    error_log('Error in cron job: ' . $e->getMessage());
  }
}

/**
 *
 */
function goonjcustomevent_collection_camp_email_html($contactName, $collectionCampId, $recipientId, $collectionCampGoonjOffice) {
  $homeUrl = get_home_url();

  // Construct the full URLs for the forms.
  $campVehicleDispatchFormUrl = $homeUrl . '/camp-vehicle-dispatch-form/#?Camp_Vehicle_Dispatch.Collection_Camp_Intent_Id=' . $collectionCampId . '&Camp_Vehicle_Dispatch.Filled_by=' . $recipientId . '&Camp_Vehicle_Dispatch.To_which_PU_Center_material_is_being_sent=' . $collectionCampGoonjOffice;
  $campOutcomeFormUrl = $homeUrl . '/camp-outcome-form/';

  $html = "
  <p>Dear $contactName,</p>
  <p>You have been selected as the Goonj user to attend the camp.</p>
  <p>Today the event has ended. Please find below the links for the Camp Vehicle Dispatch Form and the Camp Outcome Form:</p>
  <ul>
    <li><a href=\"$campVehicleDispatchFormUrl\">Camp Vehicle Dispatch Form</a></li>
    <li><a href=\"$campOutcomeFormUrl\">Camp Outcome Form</a></li>
  </ul>
  <p>Warm regards,</p>";

  return $html;
}

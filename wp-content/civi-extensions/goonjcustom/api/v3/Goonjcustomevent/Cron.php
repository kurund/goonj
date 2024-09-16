<?php

/**
 * @file
 */

use Civi\Api4\EckEntity;
use Civi\Api4\MessageTemplate;
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
    ->addWhere('option_group_id:label', '=', 'ECK Subtypes')
    ->addWhere('label', '=', 'Collection Camp')
    ->execute();

  $collectionCampSubtype = $optionValues->first()['value'];
  try {
    $collectionCamps = EckEntity::get('Collection_Camp', TRUE)
      ->addSelect('Logistics_Coordination.Camp_to_be_attended_by', 'Collection_Camp_Intent_Details.End_Date')
      ->addWhere('subtype', '=', $collectionCampSubtype)
      ->execute();

    // Get today's date in the same format as the End_Date field.
    $today = new DateTime();
    $todayFormatted = $today->format('Y-m-d');

    // Iterate through the collection camps.
    foreach ($collectionCamps as $camp) {
      if (empty($camp['Logistics_Coordination.Camp_to_be_attended_by'])) {
        continue;
      }
      $recipientId = $camp['Logistics_Coordination.Camp_to_be_attended_by'];
      $endDate = new DateTime($camp['Collection_Camp_Intent_Details.End_Date']);
      $endDateFormatted = $endDate->format('Y-m-d');

      // Debug logs to verify values.
      error_log("recipientId: " . print_r($recipientId, TRUE));
      error_log("endDate: " . print_r($endDate, TRUE));
      error_log("endDateFormatted: " . print_r($endDateFormatted, TRUE));
      // Log today's date.
      error_log("todayFormatted: " . print_r($todayFormatted, TRUE));

      // Only send the email if the end date is exactly today.
      if ($endDateFormatted === $todayFormatted) {
        emailToCampAttendBy($recipientId, $endDateFormatted);
        error_log("Email sent to participant with ID: " . $recipientId);
      }
    }
  }
  catch (Exception $e) {
    error_log('Error in cron job: ' . $e->getMessage());
  }
}

/**
 * Function to send email to camp attendee.
 */
function emailToCampAttendBy($contactId, $collectionCampEndDate) {
  $messageTemplates = MessageTemplate::get(TRUE)
    ->addSelect('id')
    ->addWhere('msg_title', '=', 'Event Completion Notification')
    ->addWhere('is_active', '=', TRUE)
    ->execute();

  $messageTemplateId = $messageTemplates->first()['id'];
  error_log('messageTemplateId ' . print_r($messageTemplateId, TRUE));

  // Prepare email parameters.
  $emailParams = [
    'contact_id'  => $contactId,
  // Replace with your actual template ID.
    'template_id' => $messageTemplateId,
  ];
  error_log('emailParams ' . print_r($emailParams, TRUE));

  // Send the email using CiviCRM API.
  try {
    $result = civicrm_api3('Email', 'send', $emailParams);
    error_log('result ' . print_r($result, TRUE));

    if (isset($result['is_error']) && $result['is_error']) {
      error_log('Email failed to send: ' . $result['error_message']);
    }
    else {
      error_log("Email sent successfully to contact ID: $contactId");
    }
  }
  catch (Exception $e) {
    error_log('Exception while sending email: ' . $e->getMessage());
  }
}

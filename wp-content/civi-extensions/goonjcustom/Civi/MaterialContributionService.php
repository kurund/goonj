<?php

namespace Civi;

use Civi\Api4\Activity;
use Civi\Core\Service\AutoSubscriber;

/**
 *
 */
class MaterialContributionService extends AutoSubscriber {

  // See: CiviCRM > Administer > Communications > Schedule Reminders.
  const CONTRIBUTION_RECEIPT_REMINDER_ID = 6;

  const ACTIVITY_SOURCE_RECORD_TYPE_ID = 2;

  /**
   *
   */
  public static function getSubscribedEvents() {
    return [
      '&hook_civicrm_alterMailParams' => 'attachContributionReceiptToEmail',
    ];
  }

  /**
   * Attach material contribution receipt to the email.
   */
  public static function attachContributionReceiptToEmail(&$params, $context = NULL) {
    $reminderId = (int) $params['entity_id'];

    if ($context !== 'singleEmail' || $reminderId !== self::CONTRIBUTION_RECEIPT_REMINDER_ID) {
      return;
    }

    // Hack: Retrieve the most recent "Material Contribution" activity for this contact.
    $activities = Activity::get(TRUE)
      ->addSelect('*', 'contact.display_name')
      ->addJoin('ActivityContact AS activity_contact', 'LEFT')
      ->addJoin('Contact AS contact', 'LEFT')
      ->addWhere('source_contact_id', '=', $params['contactId'])
      ->addWhere('activity_type_id:name', '=', 'Material Contribution')
      ->addWhere('activity_contact.record_type_id', '=', self::ACTIVITY_SOURCE_RECORD_TYPE_ID)
      ->addOrderBy('created_date', 'DESC')
      ->setLimit(1)
      ->execute();

    $contribution = $activities->first();

    $contactData = civicrm_api4('Contact', 'get', [
      'select' => [
        'email_primary.email',
        'phone_primary.phone',
        'address_primary.street_address',
      ],
      'where' => [
        ['id', '=', $params['contactId']],
      ],
      'limit' => 1,
      'checkPermissions' => TRUE,
    ]);
    
    
    // Fetch data from the Civi\Api4\Generic\Result object using the toArray() method
    $contactDataArray = $contactData[0];
    
    error_log("contactDataArray: " . print_r($contactDataArray, TRUE));// Access the first result directly.
    
    if (!empty($contactDataArray)) {
      // Directly access the fields in $contactDataArray
      $email = $contactDataArray['email_primary.email'] ?? 'N/A';
      $phone = $contactDataArray['phone_primary.phone'] ?? 'N/A';
      $address = $contactDataArray['address_primary.street_address'] ?? 'N/A';
      
      error_log("Contact Info - Email: $email, Phone: $phone");
  } else {
      // Log error or handle the case when contact data is not found
      error_log("No contact data found for contactId: " . $params['contactId']);
      $email = 'N/A';
      $phone = 'N/A';
  }
    
    

    if (!$contribution) {
      return;
    }

    $html = self::generateContributionReceiptHtml($contribution, $email, $phone, $address);
    $fileName = 'material_contribution_' . $contribution['id'] . '.pdf';
    $params['attachments'][] = \CRM_Utils_Mail::appendPDF($fileName, $html);
  }

  /**
   * Generate the HTML for the PDF from the activity data.
   *
   * @param array $activity
   *   The activity data.
   *
   * @return string
   *   The generated HTML.
   */
  private static function generateContributionReceiptHtml($activity, $email, $phone, $address) {

    // Format the activity date.
    $activityDate = date("F j, Y", strtotime($activity['activity_date_time']));

    $logoPath = plugin_dir_path(__FILE__) . '../../../themes/goonj-crm/images/goonj-logo.png';
    $qrCodePath = plugin_dir_path(__FILE__) . '../../../themes/goonj-crm/images/qr-code.png';

    $logoData = base64_encode(file_get_contents($logoPath));
    $qrCodeData = base64_encode(file_get_contents($qrCodePath));

    // Start building the HTML.
    $html = '<html><body>';
    
    $html .= '<table width="100%" cellpadding="0" cellspacing="0" style="border: none;">';
    $html .= '<tr>';
    $html .= '<td style="text-align: left; vertical-align: top;">Material Receipt#' . $activity['id'] . '</td>';
    $html .= '<td style="text-align: center; vertical-align: top;"><img style="width: 80px; height: 60px;" src="data:image/png;base64,' . $logoData . '" alt="Goonj-logo"></td>';
    $html .= '<td style="text-align: right; vertical-align: top;">Goonj, C-544, Pocket C, Sarita Vihar, Delhi, India</td>';
    $html .= '</tr>';
    $html .= '</table>';
    $html .= '<br><br><br>';
    $html .= '<div style="font-weight: bold; font-style: italic;">';
    $html .= '"We appreciate your contribution of pre used/new material. Goonj makes sure that the material reaches people with dignity and care."';
    $html .= '</div>';
    $html .= '<br><br><br>';
    
    // Main table with improved styling.
    $html .= '<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 14px;">';
    $html .= '<tr>';
    $html .= '<td style="font-weight: bold; padding: 10px; background-color: #D4D5D4;">Description of Material</td>';
    $html .= '<td style="padding: 10px;">' . $activity['subject'] . '</td>';
    $html .= '</tr>';
    
    $html .= '<tr>';
    $html .= '<td style="font-weight: bold; padding: 10px; background-color: #D4D5D4;">Received On</td>';
    $html .= '<td style="padding: 10px;">' . $activityDate . '</td>';
    $html .= '</tr>';
    
    $html .= '<tr>';
    $html .= '<td style="font-weight: bold; padding: 10px; background-color: #D4D5D4;">From</td>';
    $html .= '<td style="padding: 10px;">' . $activity['contact.display_name'] . '</td>';
    $html .= '</tr>';
    
    $html .= '<tr>';
    $html .= '<td style="font-weight: bold; padding: 10px; background-color: #D4D5D4;">Address</td>';
    $html .= '<td style="padding: 10px;">' . $address . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="font-weight: bold; padding: 10px; background-color: #D4D5D4;">Email</td>';
    $html .= '<td style="padding: 10px;">' . $email . '</td>';
    $html .= '</tr>';
    
    $html .= '<tr>';
    $html .= '<td style="font-weight: bold; padding: 10px; background-color: #D4D5D4;">Phone</td>';
    $html .= '<td style="padding: 10px;">' . $phone . '</td>';
    $html .= '</tr>';
    
    $html .= '<tr style="background-color: #D4D5D4;">';
    $html .= '<td style="font-weight: bold; padding: 10px;">Delivered by (Name & contact no.)</td>';
    $html .= '<td style="padding: 10px;">Self (TODO)</td>';
    $html .= '</tr>';
    
    $html .= '</table>';


    // Add the footer from the provided HTML.
    $html .= '<div style="width:100%; font-family:Arial, sans-serif; font-size:12px; margin-top:50px;">';
    $html .= '<div style="float:left; width:60%;">';
    $html .= 'Join us, by encouraging your friends, relatives, colleagues and neighbours to join the journey as all of us have a lot to give.<br>';
    $html .= 'With Material Money Matter! Your monetary contribution is needed too. for sorting, packing, transportation to implementation (Financial contributions are tax exempted u/s 80G of IT Act)<br>';
    $html .= '</div>';
    $html .= '<div style="float:right; width:40%; text-align:right;">';
    $html .= 'To pay, scan the code on your Paytm App.<br>';
    $html .= '<img style="width: 60px; height: 60px;" src="data:image/png;base64,' . $qrCodeData . '" alt="QR Code">';
    $html .= '</div>';
    $html .= '<div style="clear:both;"></div>';
    $html .= '<div style="text-align:center; width:100%; margin-top:20px; background-color:#f2f2f2; padding:20px; border-top:2px solid #666;">';
    $html .= 'Goonj, C-544, 1st Floor, C-Pocket, Sarita Vihar, New Delhi-110076<br>';
    $html .= 'Email: mail@goonj.org | Phone: 011-26972351/41401216 | Website: www.goonj.org<br>';
    $html .= '</div>';
    $html .= '</div>';

    // End the HTML document.
    $html .= '</body></html>';

    return $html;
}}

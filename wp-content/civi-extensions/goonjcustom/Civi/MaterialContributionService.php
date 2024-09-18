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
      ->addSelect('*', 'contact.display_name', 'Material_Contribution.Delivered_By', 'Material_Contribution.Delivered_By_Contact')
      ->addJoin('ActivityContact AS activity_contact', 'LEFT')
      ->addJoin('Contact AS contact', 'LEFT')
      ->addWhere('source_contact_id', '=', $params['contactId'])
      ->addWhere('activity_type_id:name', '=', 'Material Contribution')
      ->addWhere('activity_contact.record_type_id', '=', self::ACTIVITY_SOURCE_RECORD_TYPE_ID)
      ->addOrderBy('created_date', 'DESC')
      ->setLimit(1)
      ->execute();

    $contribution = $activities->first();
    error_log("contributionTarun: " . print_r($contribution, TRUE));// Access the first result directly.


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
    $activityDate = date("F j, Y", strtotime($activity['activity_date_time']));

    // Define the base directory for theme assets
    $baseDir = plugin_dir_path(__FILE__) . '../../../themes/goonj-crm/';

    // Collect file paths
    $paths = [
        'logo' => $baseDir . 'images/goonj-logo.png',
        'qrCode' => $baseDir . 'images/qr-code.png',
        'callIcon' => $baseDir . 'Icon/call.png',
        'domainIcon' => $baseDir . 'Icon/domain.png',
        'emailIcon' => $baseDir . 'Icon/email.png',
        'facebookIcon' => $baseDir . 'Icon/facebook.webp',
        'instagramIcon' => $baseDir . 'Icon/instagram.webp',
        'twitterIcon' => $baseDir . 'Icon/twitter.webp',
        'youtubeIcon' => $baseDir . 'Icon/youtube.webp'
    ];

    $imageData = array_map(fn($path) => base64_encode(file_get_contents($path)), $paths);

    $html = <<<HTML
<html>
<body style="font-family: Arial, sans-serif;">
    <div style="text-align: center; margin-bottom: 10px;">
        <img src="data:image/png;base64,{$imageData['logo']}" alt="Goonj Logo" style="width: 80px; height: 60px;">
    </div>
    
    <!-- Justified content: Material Receipt and Address -->
    <div style="width: 100%; font-size: 14px;">
    <div style="float: left; text-align: left;">
        Material Receipt# {$activity['id']}
    </div>
    <div style="float: right; text-align: right;">
        Goonj, C-544, Pocket C, Sarita Vihar, Delhi, India
    </div>
</div>

    <br><br>
    <div style="font-weight: bold; font-style: italic; margin-bottom: 20px;">
        "We appreciate your contribution of pre-used/new material. Goonj makes sure that the material reaches people with dignity and care."
    </div>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center; border-collapse: collapse;">
    <!-- Table rows for each item -->
    <tr>
        <td style="background-color: #f2f2f2;">Description of Material</td>
        <td>{$activity['subject']}</td>
    </tr>
    <tr>
        <td style="background-color: #f2f2f2;">Received On</td>
        <td>{$activityDate}</td>
    </tr>
    <tr>
        <td style="background-color: #f2f2f2;">From</td>
        <td>{$activity['contact.display_name']}</td>
    </tr>
    <tr>
        <td style="background-color: #f2f2f2;">Address</td>
        <td>{$address}</td>
    </tr>
    <tr>
        <td style="background-color: #f2f2f2;">Email</td>
        <td>{$email}</td>
    </tr>
    <tr>
        <td style="background-color: #f2f2f2;">Phone</td>
        <td>{$phone}</td>
    </tr>
    <tr>
        <td style="background-color: #f2f2f2;">Delivered by (Name & contact no.)</td>
        <td>{$activity['Material_Contribution.Delivered_By']} & {$activity['Material_Contribution.Delivered_By_Contact']}</td>
    </tr>
</table>

    <div style="text-align: right; margin-top: 20px;">
        Team Goonj
    </div>
    <div style="width: 100%; margin-top: 28px;">
        <div style="float: left; width: 60%; font-size: 14px;">
            <ul>
                <li>Join us, by encouraging your friends, relatives, colleagues, and neighbours to join the journey as all of us have a lot to give.</li>
                <li style="margin-top: 8px;">
                <strong>With Material Money Matter!</strong> Your monetary contribution is needed too for sorting, packing, transportation to implementation.<br>(Financial contributions are tax-exempted u/s 80G of IT Act)
              </li>
            </ul>
        </div>
        <div style="float: right; width: 40%; text-align: right; font-size: 14px; font-style: italic;">
            To pay, scan the code on<br> your Paytm App.<br>
            <img src="data:image/png;base64,{$imageData['qrCode']}" alt="QR Code" style="width: 80px; height: 70px;">
        </div>
    </div>
    <div style="clear: both; margin-top: 20px;"></div>

    <div style="width: 100%; margin-top: 15px; background-color: #f2f2f2; padding: 20px;">
    <!-- Address and Phone -->
    <div style="font-size: 14px; margin-bottom: 20px;">
    <div style="font-size: 16px; color: #333; margin-bottom: 8px;">
        Goonj, C-544, 1st Floor, C-Pocket,<br>
        Sarita Vihar, New Delhi-110076
    </div>
    <div style="position: relative;">
        <div style="font-size: 14px; color: #666; float: left; display: flex; align-items: center;">
            <img src="data:image/png;base64,{$imageData['callIcon']}" alt="Phone" style="width:16px; height:16px; margin-right: 5px;">
            011-26972351/41401216
        </div>
        <div style="font-size: 14px; color: #666; position: absolute; right: 0; top: 0;">
            <!-- Optionally include email icon here -->
        </div>
    </div>
</div>


    <!-- Website and Email -->
    <div style="font-size: 14px; margin-bottom: 20px;">
    <div style="position: relative; height: 24px;">
        <div style="font-size: 14px; color: #666; float: left; display: flex; align-items: center;">
            <img src="data:image/png;base64,{$imageData['domainIcon']}" alt="Website" style="width:16px; height:16px; margin-right: 5px;">
            www.goonj.org
        </div>
        <div style="font-size: 14px; color: #666; float: right; display: flex; align-items: center;">
            <!-- <img src="data:image/png;base64,{$imageData['emailIcon']}" alt="Email" style="width:16px; height:16px; margin-right: 5px;"> -->
            mail@goonj.org
        </div>
    </div>
</div>

    <!-- Social Media Icons -->
    <div style="text-align: center; width: 100%; margin-top: 20px;">
        <a href="https://www.facebook.com/goonj.org" target="_blank"><img src="data:image/webp;base64,{$imageData['facebookIcon']}" alt="Facebook" style="width: 24px; height: 24px; margin-right: 10px;"></a>
        <a href="https://www.instagram.com/goonj/" target="_blank"><img src="data:image/webp;base64,{$imageData['instagramIcon']}" alt="Instagram" style="width: 24px; height: 24px; margin-right: 10px;"></a>
        <a href="https://x.com/goonj" target="_blank"><img src="data:image/webp;base64,{$imageData['twitterIcon']}" alt="Twitter" style="width: 24px; height: 24px; margin-right: 10px;"></a>
        <a href="https://www.youtube.com/channel/UCCq8iYlmjT7rrgPI1VHzIHg" target="_blank"><img src="data:image/webp;base64,{$imageData['youtubeIcon']}" alt="YouTube" style="width: 24px; height: 24px; margin-right: 10px;"></a>
    </div>
</div>


</body>
</html>
HTML;

    return $html;
}

}

<?php

/**
 * @file
 */

require_once __DIR__ . '/../../../vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Civi\Api4\Contact;

/**
 * @file
 */

/**
 *
 */
class CRM_Goonjcustom_CivirulesAction_GenerateQrCodeForContact extends CRM_Civirules_Action {

  /**
   * Method processAction to execute the action.
   *
   * @param CRM_Civirules_TriggerData_TriggerData $triggerData
   *
   * @access public
   */
  public function processAction(CRM_Civirules_TriggerData_TriggerData $triggerData) {
    $contactId = $triggerData->getContactId();

    try {
      $baseUrl = CRM_Core_Config::singleton()->userFrameworkBaseURL;
      $url = "{$baseUrl}actions/processing-center/{$contactId}";

      $options = new QROptions(
                    [
                      'version'    => 5,
                      'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                      'eccLevel'   => QRCode::ECC_L,
                    // Adjust the scale as needed.
                      'scale'      => 10,
                    ]
            );
      $qrcode = (new QRCode($options))->render($url);

      // Generate a unique file name for the QR code using CiviCRM utility.
      $fileName = CRM_Utils_File::makeFileName("qr_code_{$contactId}.png");
      // Create a temporary file using CiviCRM's utility function.
      $tempFilePath = CRM_Utils_File::tempnam($fileName);
      // Save the QR code content to the temporary file.
      $numBytes = file_put_contents($tempFilePath, $qrcode);

      \Civi::log()->info($fileName);
      \Civi::log()->info($tempFilePath);
      \Civi::log()->info($numBytes);

      // $customFields = \Civi\Api4\CustomField::get(TRUE)
      // ->addWhere('custom_group_id', '=', 40)
      // ->addWhere('name', '=', 'QR_Code')
      // ->setLimit(25)
      // ->execute();
      $params = [
        'name' => $fileName,
        'mime_type' => 'image/png',
        'entity_id' => $contactId,
        'field_name' => 'custom_211',
        'content' => file_get_contents($tempFilePath),
      ];

      ob_start();
      var_dump($params);
      \Civi::log()->info(ob_get_clean());

      $result = civicrm_api3('Attachment', 'create', $params);

      $results = Contact::update(TRUE)
        ->addValue('Goonj_Processing_Center.QR_Code_Generated', 1)
        ->addWhere('id', '=', 2699)
        ->execute();

      ob_start();
      var_dump($result);
      \Civi::log()->info(ob_get_clean());

      // Clean up the temporary file.
      unlink($tempFilePath);

      $attachment = $result['values'][$result['id']];
    }
    catch (\CiviCRM_API3_Exception $e) {

      ob_start();
      var_dump($e);
      \Civi::log()->info(ob_get_clean());

      $results = Contact::update(TRUE)
        ->addValue('Goonj_Processing_Center.QR_Code_Generated', 1)
        ->addWhere('id', '=', 2699)
        ->execute();

      return FALSE;
    }

    return TRUE;
  }

  /**
   * Method to return the url for additional form processing for action
   * and return false if none is needed
   *
   * @param int $ruleActionId
   *
   * @return bool
   *
   * @access public
   */
  public function getExtraDataInputUrl($ruleActionId) {
    return FALSE;
  }

}

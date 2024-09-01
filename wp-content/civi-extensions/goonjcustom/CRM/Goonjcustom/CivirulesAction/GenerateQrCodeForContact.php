<?php

/**
 * @file
 */

require_once __DIR__ . '/../../../vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

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
                      'scale'      => 10,
                    ]
            );
      $qrcode = (new QRCode($options))->render($url);

      // Remove the base64 header and decode the image data.
      $qrcode = str_replace('data:image/png;base64,', '', $qrcode);
      $qrcode = base64_decode($qrcode);

      $baseFileName = "qr_code_{$contactId}.png";
      $fileName = CRM_Utils_File::makeFileName($baseFileName);
      $tempFilePath = CRM_Utils_File::tempnam($baseFileName);
      $numBytes = file_put_contents($tempFilePath, $qrcode);

      if (!$numBytes) {
        CRM_Core_Error::debug_log_message('Failed to write QR code to temporary file for contact ID ' . $contactId);
        return FALSE;
      }

      $params = [
        'entity_id' => $contactId,
        'name' => $fileName,
        'mime_type' => 'image/png',
        'field_name' => 'custom_211',
        'options' => [
          'move-file' => $tempFilePath,
        ],
      ];

      $result = civicrm_api3('Attachment', 'create', $params);

      if (empty($result['id'])) {
        CRM_Core_Error::debug_log_message('Failed to create attachment for contact ID ' . $contactId);
        return FALSE;
      }

      $attachment = $result['values'][$result['id']];
      $attachmentUrl = $attachment['url'];

    }
    catch (\CiviCRM_API3_Exception $e) {
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

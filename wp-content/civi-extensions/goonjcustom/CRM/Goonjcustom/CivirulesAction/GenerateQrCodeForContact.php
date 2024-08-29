<?php

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
    // Todo - Switch to apiv4
      $contact = civicrm_api3('Contact', 'getsingle', ['id' => $contactId]);
      ob_start();
      var_dump($contact);
      \Civi::log()->info(ob_get_clean());

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
    
        // Remove the base64 header and decode the image data.
      $qrcode = str_replace('data:image/png;base64,', '', $qrcode);
      $qrcode = base64_decode($qrcode);

      //progmatically save the qr code into the qr custom filed of the contact.
      //progmaticaaly change the qr code generated field to yes .

      if (!$contact || empty($contact['email'])) {
        return FALSE;
      }
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
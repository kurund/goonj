<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

/**
 * @file
 */

/**
 *
 */
class CRM_Goonjcustom_CivirulesAction_GenerateQrCodeForContact extends CRM_Civirules_Action
{
		/**
		 * Method processAction to execute the action.
		 *
		 * @param CRM_Civirules_TriggerData_TriggerData $triggerData
		 *
		 * @access public
		 */
		public function processAction(CRM_Civirules_TriggerData_TriggerData $triggerData)
		{
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

						// Remove the base64 header and decode the image data.
						$qrcode = str_replace('data:image/png;base64,', '', $qrcode);
						$qrcode = base64_decode($qrcode);
						$result = civicrm_api3('Attachment', 'create', [
							'field_name' => 'custom_211',
							'entity_id'  => $contactId,
							'name'       => 'QRCode.png',
							'mime_type'  => 'image/png',
							'content'    => $qrcode,
						]);
		
						$attachment = $result['values'][$result['id']];
						echo sprintf("<a href='%s'>View %s</a>", $attachment['url'], $attachment['name']);
				} catch (\CiviCRM_API3_Exception $e) {
						return false;
				}


				return true;
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
		public function getExtraDataInputUrl($ruleActionId)
		{
				return false;
		}
}

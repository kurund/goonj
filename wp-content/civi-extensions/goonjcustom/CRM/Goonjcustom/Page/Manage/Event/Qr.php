<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';

use CRM_Goonjcustom_ExtensionUtil as E;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class CRM_Goonjcustom_Page_Manage_Event_Qr extends CRM_Core_Page {

	public function run() {
		$eventID = CRM_Utils_Request::retrieve( 'id', 'Integer', $this, true );

		$qrDir = CRM_Utils_File::baseFilePath() . 'goonjcustom/qrcodes/';

		if ( ! is_dir( $qrDir ) ) {
			mkdir( $qrDir, 0755, true );
		}

		$qrFilePath = $qrDir . "event_qr_$eventID.png";

		error_log( $qrFilePath );

		if ( ! file_exists( $qrFilePath ) ) {
			$this->generateQrCode( $eventID, $qrFilePath );
		}

		// TODO
		// `content_url` is a WordPress specific function.
		// We should replace it with CiviCRM specific function.
		// Otherwise this will limit this extension to WorPress-only.
		$qrImageUrl = content_url("uploads/civicrm/goonjcustom/qrcodes/event_qr_$eventID.png");

		$this->assign( 'qrImageUrl', $qrImageUrl );

		parent::run();
	}


	/**
	 * @return string
	 */
	public function getTemplateFileName() {
		$templateFile = 'CRM/Goonjcustom/Page/Manage_Event_Qr.tpl';
		$template = CRM_Core_Page::getTemplate();

		if ( $template->template_exists( $templateFile ) ) {
			return $templateFile;
		}

		return parent::getTemplateFileName();
	}

	/**
	 * Generates a QR code for the event.
	 *
	 * @param int    $eventID
	 * @param string $qrFilePath
	 */
	private function generateQrCode( $eventID, $qrFilePath ) {
		// Define the URL or data to encode in the QR code
		$url = "https://goonj-civicrm.test/actions/collection-camp/${eventID}";

		// Define QR code options
		$options = new QROptions(
			array(
				'version'    => 5,
				'outputType' => QRCode::OUTPUT_IMAGE_PNG,
				'eccLevel'   => QRCode::ECC_L,
				'scale'      => 10,  // Adjust the scale as needed
			)
		);

		// Generate the QR code.
		$qrcode = ( new QRCode( $options ) )->render( $url );

		// Remove the base64 header and decode the image data.
		$qrcode = str_replace( 'data:image/png;base64,', '', $qrcode );
		$qrcode = base64_decode( $qrcode );


		// Save the QR code image.
		file_put_contents( $qrFilePath, $qrcode );

		// TODO
		// We should also save the URL or the filesystem path of the
		// QR code image to the database to remember where it is saved.
	}
}

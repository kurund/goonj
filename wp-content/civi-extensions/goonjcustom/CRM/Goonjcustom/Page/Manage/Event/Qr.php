<?php
use CRM_Goonjcustom_ExtensionUtil as E;

class CRM_Goonjcustom_Page_Manage_Event_Qr extends CRM_Core_Page {

	public function run() {
		// Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
		CRM_Utils_System::setTitle( E::ts( 'Manage_Event_Qr' ) );

		// Example: Assign a variable for use in a template
		$this->assign( 'currentTime', date( 'Y-m-d H:i:s' ) );

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
}

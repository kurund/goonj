<?php

require_once 'goonjcustom.civix.php';

use CRM_Goonjcustom_ExtensionUtil as E;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;


/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function goonjcustom_civicrm_config( &$config ): void {
	_goonjcustom_civix_civicrm_config( $config );
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function goonjcustom_civicrm_install(): void {
	_goonjcustom_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function goonjcustom_civicrm_enable(): void {
	_goonjcustom_civix_civicrm_enable();
}

/**
 * Add token services to the container.
 *
 * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
 */
function goonjcustom_civicrm_container( ContainerBuilder $container ) {
	$container->addResource( new FileResource( __FILE__ ) );
	$container->findDefinition( 'dispatcher' )->addMethodCall(
		'addListener',
		array( 'civi.token.list', 'goonjcustom_register_tokens' )
	)->setPublic( true );
	$container->findDefinition( 'dispatcher' )->addMethodCall(
		'addListener',
		array( 'civi.token.eval', 'goonjcustom_evaluate_tokens' )
	)->setPublic( true );
}

function goonjcustom_register_tokens( \Civi\Token\Event\TokenRegisterEvent $e ) {
	$e->entity( 'contact' )
	->register( 'inductionDetails', ts( 'Induction details' ) );
}

function goonjcustom_evaluate_tokens( \Civi\Token\Event\TokenValueEvent $e ) {
	foreach ( $e->getRows() as $row ) {
		/** @var TokenRow $row */
		$row->format( 'text/html' );

		$contactId = $row->context['contactId'];

		if ( empty( $contactId ) ) {
			$row->tokens( 'contact', 'inductionDetails', '' );
			continue;
		}

		$contacts = \Civi\Api4\Contact::get( false )
		->addSelect( 'address_primary.state_province_id' )
		->addWhere( 'id', '=', $contactId )
		->setLimit( 25 )
		->execute();

		$stateId = $contacts[0]['address_primary.state_province_id'];

		$processingCenters = \Civi\Api4\EckEntity::get( 'Processing_Center', false )
		->addSelect( '*', 'custom.*' )
		->addWhere( 'Processing_Center.Associated_States', 'IN', array( $stateId ) )
		->execute();

		$inductionDetailsMarkup = 'The next step in your volunteering journey is to get inducted with Goonj.';

		if ( $processingCenters->rowCount > 0 ) {
			$inductionDetailsMarkup .= ' You can visit any of our following center(s) during the time specified to complete your induction:';
			$inductionDetailsMarkup .= '<ol>';

			foreach ( $processingCenters as $processingCenter ) {
				$inductionDetailsMarkup .= '<li><strong>' . $processingCenter['title'] . '</strong>' . $processingCenter['Processing_Center.Induction_Details'] . '</li>';
			}

			$inductionDetailsMarkup .= '</ol>';
		} else {
			$inductionDetailsMarkup .= ' Unfortunately, we don\'t currently have a processing center near to the location you have provided. Someone from our team will reach out and will share the details of induction.';
		}

		$row->tokens( 'contact', 'inductionDetails', $inductionDetailsMarkup );
	}
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * Set a default value for an event price set field.
 *
 * @param string        $formName
 * @param CRM_Core_Form $form
 */
function goonjcustom_civicrm_buildForm( $formName, $form ) {
	if ( $formName == 'CRM_Activity_Form_Activity' ) {
		$activityTypeId = $form->getVar( '_activityTypeId' );
		if ( $activityTypeId === 57 ) { // todo: find better way than hardcoding
			$fieldsToRemove = array(
				'subject',
				'engagement_level',
				'location',
				'duration',
				'priority_id',
			);

			foreach ( $fieldsToRemove as $field ) {
				if ( isset( $form->_elementIndex[ $field ] ) ) {
					$form->removeElement( $field );
				}
			}

			CRM_Core_Region::instance('page-body')->add(array(
				'script' => "
					CRM.$(function($) {
						function updateCustomGroupVisibility() {
							var selectedText = $('#status_id').find('option:selected').text();
							var customGroup = $('.custom-group-INDUCTION_DETAILS');

							if (selectedText === 'Completed') {
								customGroup.show();
								// TODO - need to add logic to handle required fields
							} else {
								customGroup.hide();
								// TODO - need to add logic to handle required fields
							}
						}
						$('#status_id').change(function() {
							updateCustomGroupVisibility();
						});

						// It takes time to load the form fields so adding a delay to run the js once form is loaded.
						setTimeout(updateCustomGroupVisibility, 500);
					});
				",
			));
		}
	}
}

function goonjcustom_civicrm_pageRun( &$page ) {
	// Check if we are on the activity edit form page
	CRM_Core_Region::instance( 'page-footer' )->add(
		array(
			'script' => '
			  (function($) {
				  $(document).ajaxComplete(function(event, xhr, settings) {
					var isInductionActivity = false;
					var isCollectionCampActivity = false;
					var isActivityViewType61 = false;
					var urlParams = new URLSearchParams(settings.url);
					var activityTypeId57 = "57";
					var activityTypeId61 = "61";

					if ((urlParams.get("atype") === activityTypeId57 && urlParams.get("action") === "view") ||
						(urlParams.get("subType") === activityTypeId57 && urlParams.get("action") === "2")) {
						isInductionActivity = true;
					}

					if ((urlParams.get("atype") === activityTypeId61 && urlParams.get("action") === "view") ||
						(urlParams.get("subType") === activityTypeId61 && urlParams.get("action") === "2")) {
						isCollectionCampActivity = true;
					}

					if (urlParams.get("subType") === activityTypeId61 && urlParams.get("action") === "view") {
						isActivityViewType61 = true;
					}

					if (isInductionActivity || isCollectionCampActivity || isActivityViewType61) {
						var fieldsToHide = [];

						if (isInductionActivity) {
							fieldsToHide = [
								".crm-activity-form-block-subject",
								".crm-activity-form-block-campaign_id",
								".crm-activity-form-block-engagement_level",
								".crm-activity-form-block-duration",
								".crm-activity-form-block-priority_id",
								".crm-activity-form-block-location",
								".crm-activity-form-block-attachment",
								".crm-activity-form-block-recurring_activity",
								".crm-activity-form-block-schedule_followup",
							];
						} else if (isCollectionCampActivity) {
							fieldsToHide = [
								".crm-activity-form-block-subject",
								".crm-activity-form-block-engagement_level",
								".crm-activity-form-block-duration",
								".crm-activity-form-block-priority_id",
								".crm-activity-form-block-location",
								".crm-activity-form-block-attachment",
								".crm-activity-form-block-recurring_activity",
								".crm-activity-form-block-schedule_followup",
								".crm-activity-form-block-target_contact_id",
								".crm-activity-form-block-assignee_contact_id",
								".crm-activity-form-block-activity_date_time",
								".crm-activity-form-block-details",
							];
						} else if (isActivityViewType61) {
							fieldsToHide = [
								".crm-activity-form-block-target_contact_id",
								".crm-activity-form-block-assignee_contact_id",
								".crm-activity-form-block-engagement_level",
								".crm-activity-form-block-duration",
								".crm-activity-form-block-details",
								".crm-activity-form-block-priority_id",
								".crm-activity-form-block-subject",
								".crm-activity-form-block-location",
								".crm-activity-form-block-campaign_id",
							];
						}

						fieldsToHide.forEach(function(field) {
							$(field).css("display", "none");
						});

						if (isInductionActivity) {
							var inductionFields = $(".custom-group-Induction_Fields tr");
							$(".crm-activity-form-block-activity_date_time").after(inductionFields);
							$(".custom-group-Induction_Fields").remove();
						}
					}
					});
				})(CRM.$);
			',
		)
	);
}

function goonjcustom_civicrm_tabset($tabsetName, &$tabs, $context) {
	if ($tabsetName !== 'civicrm/event/manage' || empty($context)) {
		return;
	}

	$eventID = $context['event_id'];

	$url = CRM_Utils_System::url(
		'civicrm/event/manage/qr',
		"reset=1&snippet=5&force=1&id=$eventID&action=update&component=event"
	);

	$intentId = \Civi\Api4\Event::get(FALSE)
		->addSelect('*', 'Event_Volunteers.Collection_Camp_Intent')
		->addWhere('id', '=', $eventID)
		->setLimit(1)
		->execute();

	$collectionCampIntentId = $intentId->first()['Event_Volunteers.Collection_Camp_Intent'] ?? null;
	$collectionCampEventTypeId = $intentId->first()['event_type_id'] ?? null;

	// URL for the Intent tab
	$intentUrl = CRM_Utils_System::url(
		"/wp-admin/admin.php?page=CiviCRM&q=civicrm%2Factivity%2Fadd&reset=1&type=Event&subType=$collectionCampEventTypeId&action=view&id=$collectionCampIntentId"
	);

	$tabsToRemove = [
		'event' => [
			'manage' => [
				'fee',
				'registration',
				'friend',
				'pcp',
			],
		],
	];

	foreach ($tabsToRemove['event']['manage'] as $toRemove) {
		unset($tabs[$toRemove]);
	}

	// Add the Intent tab
	$tabs['intent'] = [
		'title' => ts('Intent'),
		'link' => $intentUrl,
		'valid' => 1,
		'active' => 1,
		'current' => false,
	];

	// Add a new QR tab along with URL.
	$tabs['qr'] = [
		'title' => ts('QR Codes'),
		'link' => $url,
		'valid' => 1,
		'active' => 1,
		'current' => false,
	];
	// Hide the Intent fields by adding JavaScript specifically to the Intent page
	if ((isset($_GET['selectedChild']) && $_GET['selectedChild'] === 'intent') || (isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['component']) && $_GET['component'] === 'event')) {
		CRM_Core_Region::instance('page-footer')->add(
			array(
				'script' => '
				(function($) {
					$(document).ajaxComplete(function(event, xhr, settings) {
						var urlParams = new URLSearchParams(settings.url);
						var currentUrl = window.location.href;
						var isEventSubType = urlParams.get("subType") === "7";

						if (isEventSubType) {
							var fieldsToHide = [
								".crm-activity-form-block-target_contact_id",
								".crm-activity-form-block-assignee_contact_id",
								".crm-activity-form-block-engagement_level",
								".crm-activity-form-block-duration",
								".crm-activity-form-block-details",
								".crm-activity-form-block-priority_id",
								".crm-activity-form-block-subject",
								".crm-activity-form-block-location",
								".crm-activity-form-block-status_id",
								".crm-activity-form-block-activity_date_time",
								".crm-activity-form-block-activity_date_time",
								".crm-accordion-bold summary",
								".crm-activity-form-block-source_contact_id",
								".crm-activity-form-block-campaign_id"
							];

							fieldsToHide.forEach(function(field) {
								$(field).css("display", "none");
							});
						}
					});
				})(CRM.$);
				',
			)
		);
	}
}

/**
 * This hook is called after a db write on entities.
 *
 * @param string $op
 *   The type of operation being performed.
 * @param string $objectName
 *   The name of the object.
 * @param int $objectId
 *   The unique identifier for the object.
 * @param object $objectRef
 *   The reference to the object.
 */
function goonjcustom_civicrm_post(string $op, string $objectName, int $objectId, &$objectRef) {
	// Check if the object name is 'AfformSubmission'
	if ($objectName === 'AfformSubmission') {
		// Extract the 'data' field
		$data = $objectRef->data;

		$decodedData = json_decode($data, true);

		// Access the subtype
		$subtype = $decodedData['Eck_Collection_Camp1'][0]['fields']['subtype'] ?? null;

		if ($subtype == 4 || $subtype == 5) {
			// Access the id within the decoded data
			if (isset($decodedData['Eck_Collection_Camp1'][0]['fields']['id'])) {
				$campId = $decodedData['Eck_Collection_Camp1'][0]['fields']['id'];

				// Fetch the collection camp details
				$collectionCamps = \Civi\Api4\EckEntity::get('Collection_Camp', FALSE)
					->addWhere('id', '=', $campId)
					->setLimit(1)
					->execute();

				if (!empty($collectionCamps)) {
					$collectionCampsCreatedDate = $collectionCamps->first()['created_date'] ?? null;

					// Get the year
					$year = date('Y', strtotime($collectionCampsCreatedDate));

					// Fetch the state ID from the collection camp intent details
					$stateId = $decodedData['Eck_Collection_Camp1'][0]['fields']['Collection_Camp_Intent_Details.State'] ?? null;
					if ($subtype == 5) {
						$stateId = $decodedData['Eck_Collection_Camp1'][0]['fields']['Dropping_Centre.State'] ?? null;
					}

					if ($stateId) {
						// Fetch the state abbreviation using the API
						$stateProvinces = \Civi\Api4\StateProvince::get(TRUE)
							->addWhere('id', '=', $stateId)
							->setLimit(1)
							->execute();

						if (!empty($stateProvinces)) {
							$stateAbbreviation = $stateProvinces->first()['abbreviation'] ?? null;

							if ($stateAbbreviation) {
								// Fetch the Goonj-specific state code
								$goonjStateCodePath = ABSPATH . 'wp-content/civi-extensions/goonjcustom/config/constants.php';
								$goonjStateCode = include $goonjStateCodePath;
								// Find the state code
								$stateCode = $goonjStateCode[$stateAbbreviation] ?? 'UNKNOWN';
							}
						}
					}

					// Get the current event title
					$currentTitle = $decodedData['Eck_Collection_Camp1'][0]['fields']['title'] ?? 'Collection Camp';

					// Fetch the event code
					$eventCodePath = ABSPATH . 'wp-content/civi-extensions/goonjcustom/config/eventCode.php';
					$eventCodeConfig = include $eventCodePath;

					// Determine the event code based on the current title
					$eventCode = $eventCodeConfig[$currentTitle] ?? 'UNKNOWN';

					// Count existing camps for the state and year with the same event code
					$existingCamps = \Civi\Api4\EckEntity::get('Collection_Camp', FALSE)
						->addSelect('title')
						->addWhere('title', 'LIKE', "$year/$stateCode/$eventCode/%")
						->execute();

					$serialNumber = sprintf('%03d', $existingCamps->count() + 1);

					// Modify the title to include the year, state code, event code, and serial number
					$newTitle = $year . '/' . $stateCode . '/' . $eventCode . '/' . $serialNumber;

					$decodedData['Eck_Collection_Camp1'][0]['fields']['title'] = $newTitle;

					// Update the objectRef's data to reflect the new title
					$objectRef->data = json_encode($decodedData);

					// Save the updated title back to the Collection Camp entity
					\Civi\Api4\EckEntity::update('Collection_Camp')
						->addWhere('id', '=', $campId)
						->addValue('title', $newTitle)
						->execute();

				}
			}
		}
	}
}

<?php

namespace Civi;

use Civi\Core\Service\AutoSubscriber;

/**
 *
 */
class CollectionBaseService extends AutoSubscriber {

  // See: CiviCRM > Administer > Communications > Schedule Reminders.
  const CONTRIBUTION_RECEIPT_REMINDER_ID = 6;
  const ACTIVITY_SOURCE_RECORD_TYPE_ID = 2;

  /**
   *
   */
  public static function getSubscribedEvents() {
    return [
      '&hook_civicrm_tabset' => 'collectionBaseTabset',
    ];
  }

  /**
   *
   */
  public static function collectionBaseTabset($tabsetName, &$tabs, $context) {
    if ($tabsetName !== 'civicrm/eck/entity' || empty($context)) {
      return;
    }

    $entityID = $context['entity_id'];

    $url = \CRM_Utils_System::url(
          'civicrm/eck/entity/qr',
          "reset=1&snippet=5&force=1&id=$entityID&action=update"
    );

    // URL for the Contribution tab.
    $contributionUrl = \CRM_Utils_System::url(
          "wp-admin/admin.php?page=CiviCRM&q=civicrm%2Fcollection-camp%2Fmaterial-contributions",
    );

    // Add the Contribution tab.
    $tabs['contribution'] = [
      'title' => ts('Contribution'),
      'link' => $contributionUrl,
      'valid' => 1,
      'active' => 1,
      'current' => FALSE,
    ];

    // Add a new QR tab along with URL.
    $tabs['qr'] = [
      'title' => ts('QR Codes'),
      'link' => $url,
      'valid' => 1,
      'active' => 1,
      'current' => FALSE,
    ];

  }

}

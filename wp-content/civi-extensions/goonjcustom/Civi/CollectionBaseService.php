<?php

namespace Civi;

use Civi\Core\Service\AutoSubscriber;

/**
 *
 */
class CollectionBaseService extends AutoSubscriber {

  const ENTITY_NAME = 'Collection_Camp';

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
      \Civi::log()->debug(self::ENTITY_NAME);

    if ($tabsetName !== 'civicrm/eck/entity' || empty($context) || $context['entity_type']['name'] !== self::ENTITY_NAME) {
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

<?php

namespace Civi;

use Civi\Api4\Activity;
use Civi\Core\Service\AutoSubscriber;

/**
 *
 */
class DroppingCenterService extends AutoSubscriber {

  // See: CiviCRM > Administer > Communications > Schedule Reminders.
  const CONTRIBUTION_RECEIPT_REMINDER_ID = 6;

  const ACTIVITY_SOURCE_RECORD_TYPE_ID = 2;

  /**
   *
   */
  public static function getSubscribedEvents() {
    return [
      '&hook_civicrm_tabset' => 'droppingCenterTabset',
    ];
  }
  
  public static function droppingCenterTabset($tabsetName, &$tabs, $context) {
    if ($tabsetName !== 'civicrm/eck/entity' || empty($context)) {
      return;
    }
    
    $status = \CRM_Utils_System::url(
      "wp-admin/admin.php?page=CiviCRM&q=civicrm%2Fdropping_center-status",
    );
    
    // Add the Status tab.
    $tabs['status'] = [
      'title' => ts('Status'),
      'link' => $status,
      'valid' => 1,
      'active' => 1,
      'current' => FALSE,
    ];
}
}

<?php

require_once 'dashboardrefresh.civix.php';
// phpcs:disable
use CRM_Dashboardrefresh_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function dashboardrefresh_civicrm_config(&$config) {
  _dashboardrefresh_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function dashboardrefresh_civicrm_install() {
  _dashboardrefresh_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function dashboardrefresh_civicrm_enable() {
  _dashboardrefresh_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_buildForm().
 * Adds our js
 */
function dashboardrefresh_civicrm_dashboard($contactID, &$contentPlacement) {
  $contentPlacement = CRM_Utils_Hook::DASHBOARD_ABOVE;

  \Civi::resources()->addScriptFile('dashboardrefresh', 'js/dashboardrefresh.js');
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function dashboardrefresh_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function dashboardrefresh_civicrm_navigationMenu(&$menu) {
//  _dashboardrefresh_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _dashboardrefresh_civix_navigationMenu($menu);
//}

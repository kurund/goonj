<?php

/**
 * Goonjcustom.CollecitonCampCron API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @return void
 */
function _civicrm_api3_goonjcustom_collection_camp_cron_spec(&$spec) {
  //there are no parameters for the Goonjcustom cron
}

/**
 * Goonjcustom.CollectoinCampCront API
 *
 * @param array $params
 *
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws \CRM_Core_Exception
 */
function civicrm_api3_goonjcustom_collection_camp_cron($params) {
    \Civi::log()->debug('civicrm_api3_goonjcustom_collection_camp_cron');
}


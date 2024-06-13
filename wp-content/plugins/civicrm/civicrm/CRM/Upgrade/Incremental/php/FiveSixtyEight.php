<?php
/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */

/**
 * Upgrade logic for the 5.68.x series.
 *
 * Each minor version in the series is handled by either a `5.68.x.mysql.tpl` file,
 * or a function in this class named `upgrade_5_68_x`.
 * If only a .tpl file exists for a version, it will be run automatically.
 * If the function exists, it must explicitly add the 'runSql' task if there is a corresponding .mysql.tpl.
 *
 * This class may also implement `setPreUpgradeMessage()` and `setPostUpgradeMessage()` functions.
 */
class CRM_Upgrade_Incremental_php_FiveSixtyEight extends CRM_Upgrade_Incremental_Base {

  /**
   * Upgrade step; adds tasks including 'runSql'.
   *
   * @param string $rev
   *   The version number matching this function name
   */
  public function upgrade_5_68_alpha1($rev): void {
    // Add column prior to updating it via runSql
    $this->addTask('Add Tag.label field', 'addColumn', 'civicrm_tag', 'label', "varchar(64) NOT NULL COMMENT 'User-facing tag name' AFTER `name`");
    $this->addTask('Update Tag.name field', 'alterColumn', 'civicrm_tag', 'name', "varchar(64) NOT NULL COMMENT 'Unique machine name'");
    $this->addTask('Update Tag.created_date field', 'alterColumn', 'civicrm_tag', 'created_date', "datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Date and time that tag was created.'");
    $this->addTask(ts('Upgrade DB to %1: SQL', [1 => $rev]), 'runSql', $rev);
    $this->addTask('Update civicrm_managed.entity_id', 'alterColumn', 'civicrm_managed', 'entity_id', "int unsigned COMMENT 'Soft foreign key to the referenced item.'");
    $this->addTask('Update civicrm_managed.module', 'alterColumn', 'civicrm_managed', 'module', "varchar(255) NOT NULL COMMENT 'Name of the module which declared this object (soft FK to civicrm_extension.full_name)'");
    $this->addTask('Update civicrm_managed.name', 'alterColumn', 'civicrm_managed', 'name', "varchar(255) NOT NULL COMMENT 'Symbolic name used by the module to identify the object'");
    $this->addTask('Update civicrm_managed.cleanup', 'alterColumn', 'civicrm_managed', 'cleanup', "varchar(16) NOT NULL DEFAULT 'always' COMMENT 'Policy on when to cleanup entity (always, never, unused)'");
    $this->addTask('Update civicrm_acl.is_active', 'alterColumn', 'civicrm_acl', 'is_active', "tinyint NOT NULL DEFAULT 1 COMMENT 'Is this property active?'");
    $this->addTask('Update civicrm_dashboard_contact.is_active', 'alterColumn', 'civicrm_dashboard_contact', 'is_active', "tinyint NOT NULL DEFAULT 0 COMMENT 'Is this widget active?'");
  }

}

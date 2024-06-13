<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Member/MembershipStatus.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:4321ae17aa4f714583d4b73dfb894641)
 */

/**
 * Database access object for the MembershipStatus entity.
 */
class CRM_Member_DAO_MembershipStatus extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '1.5';
  const COMPONENT = 'CiviMember';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_membership_status';

  /**
   * Field to show when displaying a record.
   *
   * @var string
   */
  public static $_labelField = 'label';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Paths for accessing this entity in the UI.
   *
   * @var string[]
   */
  protected static $_paths = [
    'add' => 'civicrm/admin/member/membershipStatus?action=add&reset=1',
    'update' => 'civicrm/admin/member/membershipStatus?action=update&id=[id]&reset=1',
    'delete' => 'civicrm/admin/member/membershipStatus?action=delete&id=[id]&reset=1',
  ];

  /**
   * Membership ID
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $id;

  /**
   * Name for Membership Status
   *
   * @var string
   *   (SQL type: varchar(128))
   *   Note that values will be retrieved from the database as a string.
   */
  public $name;

  /**
   * Label for Membership Status
   *
   * @var string|null
   *   (SQL type: varchar(128))
   *   Note that values will be retrieved from the database as a string.
   */
  public $label;

  /**
   * Event when this status starts.
   *
   * @var string|null
   *   (SQL type: varchar(12))
   *   Note that values will be retrieved from the database as a string.
   */
  public $start_event;

  /**
   * Unit used for adjusting from start_event.
   *
   * @var string|null
   *   (SQL type: varchar(8))
   *   Note that values will be retrieved from the database as a string.
   */
  public $start_event_adjust_unit;

  /**
   * Status range begins this many units from start_event.
   *
   * @var int|string|null
   *   (SQL type: int)
   *   Note that values will be retrieved from the database as a string.
   */
  public $start_event_adjust_interval;

  /**
   * Event after which this status ends.
   *
   * @var string|null
   *   (SQL type: varchar(12))
   *   Note that values will be retrieved from the database as a string.
   */
  public $end_event;

  /**
   * Unit used for adjusting from the ending event.
   *
   * @var string|null
   *   (SQL type: varchar(8))
   *   Note that values will be retrieved from the database as a string.
   */
  public $end_event_adjust_unit;

  /**
   * Status range ends this many units from end_event.
   *
   * @var int|string|null
   *   (SQL type: int)
   *   Note that values will be retrieved from the database as a string.
   */
  public $end_event_adjust_interval;

  /**
   * Does this status aggregate to current members (e.g. New, Renewed, Grace might all be TRUE... while Unrenewed, Lapsed, Inactive would be FALSE).
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_current_member;

  /**
   * Is this status for admin/manual assignment only.
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_admin;

  /**
   * @var int|string|null
   *   (SQL type: int)
   *   Note that values will be retrieved from the database as a string.
   */
  public $weight;

  /**
   * Assign this status to a membership record if no other status match is found.
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_default;

  /**
   * Is this membership_status enabled.
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_active;

  /**
   * Is this membership_status reserved.
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_reserved;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_membership_status';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Membership Statuses') : ts('Membership Status');
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Membership Status ID'),
          'description' => ts('Membership ID'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.id',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'Number',
          ],
          'readonly' => TRUE,
          'add' => '1.5',
        ],
        'membership_status' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Membership Status'),
          'description' => ts('Name for Membership Status'),
          'required' => TRUE,
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => TRUE,
            'export' => TRUE,
            'duplicate_matching' => TRUE,
            'token' => FALSE,
          ],
          'import' => TRUE,
          'where' => 'civicrm_membership_status.name',
          'export' => TRUE,
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'add' => '1.5',
        ],
        'label' => [
          'name' => 'label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Label'),
          'description' => ts('Label for Membership Status'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.label',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '3.2',
        ],
        'start_event' => [
          'name' => 'start_event',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Start Event'),
          'description' => ts('Event when this status starts.'),
          'maxlength' => 12,
          'size' => CRM_Utils_Type::TWELVE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.start_event',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
            'label' => ts("Start Event"),
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::eventDate',
          ],
          'add' => '1.5',
        ],
        'start_event_adjust_unit' => [
          'name' => 'start_event_adjust_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Start Event Adjust Unit'),
          'description' => ts('Unit used for adjusting from start_event.'),
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.start_event_adjust_unit',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
            'label' => ts("Start Event Adjust Unit"),
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::unitList',
          ],
          'add' => '1.5',
        ],
        'start_event_adjust_interval' => [
          'name' => 'start_event_adjust_interval',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Start Event Adjust Interval'),
          'description' => ts('Status range begins this many units from start_event.'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.start_event_adjust_interval',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'label' => ts("Start Event Adjust Interval"),
          ],
          'add' => '1.5',
        ],
        'end_event' => [
          'name' => 'end_event',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('End Event'),
          'description' => ts('Event after which this status ends.'),
          'maxlength' => 12,
          'size' => CRM_Utils_Type::TWELVE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.end_event',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
            'label' => ts("End Event"),
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::eventDate',
          ],
          'add' => '1.5',
        ],
        'end_event_adjust_unit' => [
          'name' => 'end_event_adjust_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('End Event Adjust Unit'),
          'description' => ts('Unit used for adjusting from the ending event.'),
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.end_event_adjust_unit',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
            'label' => ts("End Event Adjust Unit"),
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::unitList',
          ],
          'add' => '1.5',
        ],
        'end_event_adjust_interval' => [
          'name' => 'end_event_adjust_interval',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('End Event Adjust Interval'),
          'description' => ts('Status range ends this many units from end_event.'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.end_event_adjust_interval',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'label' => ts("End Event Adjust Interval"),
          ],
          'add' => '1.5',
        ],
        'is_current_member' => [
          'name' => 'is_current_member',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Current Membership?'),
          'description' => ts('Does this status aggregate to current members (e.g. New, Renewed, Grace might all be TRUE... while Unrenewed, Lapsed, Inactive would be FALSE).'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.is_current_member',
          'default' => '0',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => '1.5',
        ],
        'is_admin' => [
          'name' => 'is_admin',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Administrator Only?'),
          'description' => ts('Is this status for admin/manual assignment only.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.is_admin',
          'default' => '0',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => '1.5',
        ],
        'weight' => [
          'name' => 'weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Order'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.weight',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'add' => '1.5',
        ],
        'is_default' => [
          'name' => 'is_default',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Default Status?'),
          'description' => ts('Assign this status to a membership record if no other status match is found.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.is_default',
          'default' => '0',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
            'label' => ts("Default"),
          ],
          'add' => '1.5',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Active'),
          'description' => ts('Is this membership_status enabled.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.is_active',
          'default' => '1',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
            'label' => ts("Enabled"),
          ],
          'add' => '1.5',
        ],
        'is_reserved' => [
          'name' => 'is_reserved',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Reserved'),
          'description' => ts('Is this membership_status reserved.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_membership_status.is_reserved',
          'default' => '0',
          'table_name' => 'civicrm_membership_status',
          'entity' => 'MembershipStatus',
          'bao' => 'CRM_Member_BAO_MembershipStatus',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => '2.1',
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'membership_status', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'membership_status', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

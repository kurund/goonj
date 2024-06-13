<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Pledge/PledgeBlock.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:91fae667e945aaf73143425e96c0b132)
 */

/**
 * Database access object for the PledgeBlock entity.
 */
class CRM_Pledge_DAO_PledgeBlock extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '2.1';
  const COMPONENT = 'CiviPledge';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_pledge_block';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Pledge ID
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $id;

  /**
   * physical tablename for entity being joined to pledge, e.g. civicrm_contact
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $entity_table;

  /**
   * FK to entity table specified in entity_table column.
   *
   * @var int|string
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $entity_id;

  /**
   * Delimited list of supported frequency units
   *
   * @var string|null
   *   (SQL type: varchar(128))
   *   Note that values will be retrieved from the database as a string.
   */
  public $pledge_frequency_unit;

  /**
   * Is frequency interval exposed on the contribution form.
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_pledge_interval;

  /**
   * The maximum number of payment reminders to send for any given payment.
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $max_reminders;

  /**
   * Send initial reminder this many days prior to the payment due date.
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $initial_reminder_day;

  /**
   * Send additional reminder this many days after last one sent, up to maximum number of reminders.
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $additional_reminder_day;

  /**
   * The date the first scheduled pledge occurs.
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $pledge_start_date;

  /**
   * If true - recurring start date is shown.
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_pledge_start_date_visible;

  /**
   * If true - recurring start date is editable.
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_pledge_start_date_editable;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_pledge_block';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Pledge Blocks') : ts('Pledge Block');
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
          'title' => ts('Pledge Block ID'),
          'description' => ts('Pledge ID'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.id',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'html' => [
            'type' => 'Number',
          ],
          'readonly' => TRUE,
          'add' => '2.1',
        ],
        'entity_table' => [
          'name' => 'entity_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Entity Table'),
          'description' => ts('physical tablename for entity being joined to pledge, e.g. civicrm_contact'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.entity_table',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'add' => '2.1',
        ],
        'entity_id' => [
          'name' => 'entity_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Entity ID'),
          'description' => ts('FK to entity table specified in entity_table column.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.entity_id',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'DFKEntityColumn' => 'entity_table',
          'FKColumnName' => 'id',
          'add' => '2.1',
        ],
        'pledge_frequency_unit' => [
          'name' => 'pledge_frequency_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Pledge Frequency Unit'),
          'description' => ts('Delimited list of supported frequency units'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.pledge_frequency_unit',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_SEPARATOR_TRIMMED,
          'add' => '2.1',
        ],
        'is_pledge_interval' => [
          'name' => 'is_pledge_interval',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Expose Frequency Interval?'),
          'description' => ts('Is frequency interval exposed on the contribution form.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.is_pledge_interval',
          'default' => '0',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'add' => '2.1',
        ],
        'max_reminders' => [
          'name' => 'max_reminders',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Maximum Number of Reminders'),
          'description' => ts('The maximum number of payment reminders to send for any given payment.'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.max_reminders',
          'default' => '1',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'add' => '2.1',
        ],
        'initial_reminder_day' => [
          'name' => 'initial_reminder_day',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Initial Reminder Day'),
          'description' => ts('Send initial reminder this many days prior to the payment due date.'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.initial_reminder_day',
          'default' => '5',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'add' => '2.1',
        ],
        'additional_reminder_day' => [
          'name' => 'additional_reminder_day',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Additional Reminder Days'),
          'description' => ts('Send additional reminder this many days after last one sent, up to maximum number of reminders.'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.additional_reminder_day',
          'default' => '5',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'add' => '2.1',
        ],
        'pledge_start_date' => [
          'name' => 'pledge_start_date',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Pledge Start Date'),
          'description' => ts('The date the first scheduled pledge occurs.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.pledge_start_date',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'add' => '4.7',
        ],
        'is_pledge_start_date_visible' => [
          'name' => 'is_pledge_start_date_visible',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Show Recurring Donation Start Date?'),
          'description' => ts('If true - recurring start date is shown.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.is_pledge_start_date_visible',
          'default' => '0',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'add' => '4.7',
        ],
        'is_pledge_start_date_editable' => [
          'name' => 'is_pledge_start_date_editable',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Allow Edits to Recurring Donation Start Date?'),
          'description' => ts('If true - recurring start date is editable.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_pledge_block.is_pledge_start_date_editable',
          'default' => '0',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'add' => '4.7',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'pledge_block', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'pledge_block', $prefix, []);
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
    $indices = [
      'index_entity' => [
        'name' => 'index_entity',
        'field' => [
          0 => 'entity_table',
          1 => 'entity_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_pledge_block::0::entity_table::entity_id',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

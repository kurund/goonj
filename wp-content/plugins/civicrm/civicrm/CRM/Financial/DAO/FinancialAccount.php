<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Financial/FinancialAccount.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:b395b6212a005ebce453ce9938d77c7b)
 */

/**
 * Database access object for the FinancialAccount entity.
 */
class CRM_Financial_DAO_FinancialAccount extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '3.2';
  const COMPONENT = 'CiviContribute';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_financial_account';

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
    'add' => 'civicrm/admin/financial/financialAccount/edit?action=add&reset=1',
    'update' => 'civicrm/admin/financial/financialAccount/edit?action=update&id=[id]&reset=1',
    'delete' => 'civicrm/admin/financial/financialAccount/edit?action=delete&id=[id]&reset=1',
    'browse' => 'civicrm/admin/financial/financialAccount',
  ];

  /**
   * ID
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $id;

  /**
   * Financial Account Name.
   *
   * @var string
   *   (SQL type: varchar(255))
   *   Note that values will be retrieved from the database as a string.
   */
  public $name;

  /**
   * FK to Contact ID that is responsible for the funds in this account
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $contact_id;

  /**
   * pseudo FK into civicrm_option_value.
   *
   * @var int|string
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $financial_account_type_id;

  /**
   * Optional value for mapping monies owed and received to accounting system codes.
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $accounting_code;

  /**
   * Optional value for mapping account types to accounting system account categories (QuickBooks Account Type Codes for example).
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $account_type_code;

  /**
   * Financial Type Description.
   *
   * @var string|null
   *   (SQL type: varchar(255))
   *   Note that values will be retrieved from the database as a string.
   */
  public $description;

  /**
   * Parent ID in account hierarchy
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $parent_id;

  /**
   * Is this a header account which does not allow transactions to be posted against it directly, but only to its sub-accounts?
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_header_account;

  /**
   * Is this account tax-deductible?
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_deductible;

  /**
   * Is this account for taxes?
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_tax;

  /**
   * The percentage of the total_amount that is due for this tax.
   *
   * @var float|string|null
   *   (SQL type: decimal(10,8))
   *   Note that values will be retrieved from the database as a string.
   */
  public $tax_rate;

  /**
   * Is this a predefined system object?
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_reserved;

  /**
   * Is this property active?
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_active;

  /**
   * Is this account the default one (or default tax one) for its financial_account_type?
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_default;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_financial_account';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Financial Accounts') : ts('Financial Account');
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
          'title' => ts('Financial Account ID'),
          'description' => ts('ID'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.id',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'html' => [
            'type' => 'Number',
          ],
          'readonly' => TRUE,
          'add' => '3.2',
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Financial Account Name'),
          'description' => ts('Financial Account Name.'),
          'required' => TRUE,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.name',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '3.2',
        ],
        'financial_account_contact_id' => [
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID'),
          'description' => ts('FK to Contact ID that is responsible for the funds in this account'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.contact_id',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'FKColumnName' => 'id',
          'html' => [
            'label' => ts("Contact"),
          ],
          'add' => '4.3',
        ],
        'financial_account_type_id' => [
          'name' => 'financial_account_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Account Type'),
          'description' => ts('pseudo FK into civicrm_option_value.'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.financial_account_type_id',
          'default' => '3',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'financial_account_type',
            'optionEditPath' => 'civicrm/admin/options/financial_account_type',
          ],
          'add' => '4.3',
        ],
        'accounting_code' => [
          'name' => 'accounting_code',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Accounting Code'),
          'description' => ts('Optional value for mapping monies owed and received to accounting system codes.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => TRUE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.accounting_code',
          'export' => TRUE,
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'account_type_code' => [
          'name' => 'account_type_code',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Account Type Code'),
          'description' => ts('Optional value for mapping account types to accounting system account categories (QuickBooks Account Type Codes for example).'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => TRUE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.account_type_code',
          'export' => TRUE,
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'description' => [
          'name' => 'description',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Financial Account Description'),
          'description' => ts('Financial Type Description.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.description',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'parent_id' => [
          'name' => 'parent_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Parent ID'),
          'description' => ts('Parent ID in account hierarchy'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.parent_id',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_FinancialAccount',
          'FKColumnName' => 'id',
          'html' => [
            'label' => ts("Parent"),
          ],
          'add' => '4.3',
        ],
        'is_header_account' => [
          'name' => 'is_header_account',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Header Financial Account?'),
          'description' => ts('Is this a header account which does not allow transactions to be posted against it directly, but only to its sub-accounts?'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.is_header_account',
          'default' => '0',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'is_deductible' => [
          'name' => 'is_deductible',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Deductible Financial Account?'),
          'description' => ts('Is this account tax-deductible?'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.is_deductible',
          'default' => '0',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'is_tax' => [
          'name' => 'is_tax',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Tax Financial Account?'),
          'description' => ts('Is this account for taxes?'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.is_tax',
          'default' => '0',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'tax_rate' => [
          'name' => 'tax_rate',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Financial Account Tax Rate'),
          'description' => ts('The percentage of the total_amount that is due for this tax.'),
          'precision' => [
            10,
            8,
          ],
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.tax_rate',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'is_reserved' => [
          'name' => 'is_reserved',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Reserved Financial Account?'),
          'description' => ts('Is this a predefined system object?'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.is_reserved',
          'default' => '0',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Financial Account is Active'),
          'description' => ts('Is this property active?'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.is_active',
          'default' => '1',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
            'label' => ts("Enabled"),
          ],
          'add' => '4.3',
        ],
        'is_default' => [
          'name' => 'is_default',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Default Financial Account'),
          'description' => ts('Is this account the default one (or default tax one) for its financial_account_type?'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_financial_account.is_default',
          'default' => '0',
          'table_name' => 'civicrm_financial_account',
          'entity' => 'FinancialAccount',
          'bao' => 'CRM_Financial_BAO_FinancialAccount',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
            'label' => ts("Default"),
          ],
          'add' => '4.3',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'financial_account', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'financial_account', $prefix, []);
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
      'UI_name' => [
        'name' => 'UI_name',
        'field' => [
          0 => 'name',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_financial_account::1::name',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

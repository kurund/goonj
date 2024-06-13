<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Contact/RelationshipType.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:4eb82c548def98f3a77769be7e391475)
 */

/**
 * Database access object for the RelationshipType entity.
 */
class CRM_Contact_DAO_RelationshipType extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '1.1';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_relationship_type';

  /**
   * Field to show when displaying a record.
   *
   * @var string
   */
  public static $_labelField = 'label_a_b';

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
    'add' => 'civicrm/admin/reltype/edit?action=add&reset=1',
    'view' => 'civicrm/admin/reltype/edit?action=view&id=[id]&reset=1',
    'update' => 'civicrm/admin/reltype/edit?action=update&id=[id]&reset=1',
    'delete' => 'civicrm/admin/reltype/edit?action=delete&id=[id]&reset=1',
    'browse' => 'civicrm/admin/reltype',
  ];

  /**
   * Primary key
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $id;

  /**
   * name for relationship of contact_a to contact_b.
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $name_a_b;

  /**
   * label for relationship of contact_a to contact_b.
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $label_a_b;

  /**
   * Optional name for relationship of contact_b to contact_a.
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $name_b_a;

  /**
   * Optional label for relationship of contact_b to contact_a.
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $label_b_a;

  /**
   * Optional verbose description of the relationship type.
   *
   * @var string|null
   *   (SQL type: varchar(255))
   *   Note that values will be retrieved from the database as a string.
   */
  public $description;

  /**
   * If defined, contact_a in a relationship of this type must be a specific contact_type.
   *
   * @var string|null
   *   (SQL type: varchar(12))
   *   Note that values will be retrieved from the database as a string.
   */
  public $contact_type_a;

  /**
   * If defined, contact_b in a relationship of this type must be a specific contact_type.
   *
   * @var string|null
   *   (SQL type: varchar(12))
   *   Note that values will be retrieved from the database as a string.
   */
  public $contact_type_b;

  /**
   * If defined, contact_sub_type_a in a relationship of this type must be a specific contact_sub_type.
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $contact_sub_type_a;

  /**
   * If defined, contact_sub_type_b in a relationship of this type must be a specific contact_sub_type.
   *
   * @var string|null
   *   (SQL type: varchar(64))
   *   Note that values will be retrieved from the database as a string.
   */
  public $contact_sub_type_b;

  /**
   * Is this relationship type a predefined system type (can not be changed or de-activated)?
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_reserved;

  /**
   * Is this relationship type currently active (i.e. can be used when creating or editing relationships)?
   *
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_active;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_relationship_type';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Relationship Types') : ts('Relationship Type');
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
          'title' => ts('Relationship Type ID'),
          'description' => ts('Primary key'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.id',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'html' => [
            'type' => 'Number',
          ],
          'readonly' => TRUE,
          'add' => '1.1',
        ],
        'name_a_b' => [
          'name' => 'name_a_b',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Relationship Type Name A to B'),
          'description' => ts('name for relationship of contact_a to contact_b.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.name_a_b',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'add' => '1.1',
        ],
        'label_a_b' => [
          'name' => 'label_a_b',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Relationship Type Label A to B'),
          'description' => ts('label for relationship of contact_a to contact_b.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.label_a_b',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '3.0',
        ],
        'name_b_a' => [
          'name' => 'name_b_a',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Relationship Type Name B to A'),
          'description' => ts('Optional name for relationship of contact_b to contact_a.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.name_b_a',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'add' => '1.1',
        ],
        'label_b_a' => [
          'name' => 'label_b_a',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Relationship Type Label B to A'),
          'description' => ts('Optional label for relationship of contact_b to contact_a.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.label_b_a',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '3.0',
        ],
        'description' => [
          'name' => 'description',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Relationship Description'),
          'description' => ts('Optional verbose description of the relationship type.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.description',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.1',
        ],
        'contact_type_a' => [
          'name' => 'contact_type_a',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Type for Contact A'),
          'description' => ts('If defined, contact_a in a relationship of this type must be a specific contact_type.'),
          'maxlength' => 12,
          'size' => CRM_Utils_Type::TWELVE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.contact_type_a',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_contact_type',
            'keyColumn' => 'name',
            'labelColumn' => 'label',
            'condition' => 'parent_id IS NULL',
          ],
          'add' => '1.1',
        ],
        'contact_type_b' => [
          'name' => 'contact_type_b',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Type for Contact B'),
          'description' => ts('If defined, contact_b in a relationship of this type must be a specific contact_type.'),
          'maxlength' => 12,
          'size' => CRM_Utils_Type::TWELVE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.contact_type_b',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_contact_type',
            'keyColumn' => 'name',
            'labelColumn' => 'label',
            'condition' => 'parent_id IS NULL',
          ],
          'add' => '1.1',
        ],
        'contact_sub_type_a' => [
          'name' => 'contact_sub_type_a',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Subtype A'),
          'description' => ts('If defined, contact_sub_type_a in a relationship of this type must be a specific contact_sub_type.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.contact_sub_type_a',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_contact_type',
            'keyColumn' => 'name',
            'labelColumn' => 'label',
            'condition' => 'parent_id IS NOT NULL',
          ],
          'add' => '3.1',
        ],
        'contact_sub_type_b' => [
          'name' => 'contact_sub_type_b',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Subtype B'),
          'description' => ts('If defined, contact_sub_type_b in a relationship of this type must be a specific contact_sub_type.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.contact_sub_type_b',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_contact_type',
            'keyColumn' => 'name',
            'labelColumn' => 'label',
            'condition' => 'parent_id IS NOT NULL',
          ],
          'add' => '3.1',
        ],
        'is_reserved' => [
          'name' => 'is_reserved',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Relationship Type is Reserved'),
          'description' => ts('Is this relationship type a predefined system type (can not be changed or de-activated)?'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.is_reserved',
          'default' => '0',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => '1.1',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Relationship Type is Active'),
          'description' => ts('Is this relationship type currently active (i.e. can be used when creating or editing relationships)?'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civicrm_relationship_type.is_active',
          'default' => '1',
          'table_name' => 'civicrm_relationship_type',
          'entity' => 'RelationshipType',
          'bao' => 'CRM_Contact_BAO_RelationshipType',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
            'label' => ts("Enabled"),
          ],
          'add' => '1.1',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'relationship_type', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'relationship_type', $prefix, []);
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
      'UI_name_a_b' => [
        'name' => 'UI_name_a_b',
        'field' => [
          0 => 'name_a_b',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_relationship_type::1::name_a_b',
      ],
      'UI_name_b_a' => [
        'name' => 'UI_name_b_a',
        'field' => [
          0 => 'name_b_a',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_relationship_type::1::name_b_a',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

<?php

return [
  'name' => 'Navigation',
  'table' => 'civicrm_navigation',
  'class' => 'CRM_Core_DAO_Navigation',
  'getInfo' => fn() => [
    'title' => ts('Menu Item'),
    'title_plural' => ts('Menu Items'),
    'description' => ts('Table to store navigation.'),
    'add' => '3.0',
    'label_field' => 'label',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Navigation ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'add' => '3.0',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'domain_id' => [
      'title' => ts('Domain ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('Which Domain is this navigation item for'),
      'add' => '3.0',
      'input_attrs' => [
        'label' => ts('Domain'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_domain',
        'key_column' => 'id',
        'label_column' => 'name',
      ],
      'entity_reference' => [
        'entity' => 'Domain',
        'key' => 'id',
      ],
    ],
    'label' => [
      'title' => ts('Navigation Item Label'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Navigation Title'),
      'add' => '3.0',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'name' => [
      'title' => ts('Navigation Item Machine Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Internal Name'),
      'add' => '3.0',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'url' => [
      'title' => ts('Url'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('url in case of custom navigation link'),
      'add' => '3.0',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'icon' => [
      'title' => ts('Icon'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('CSS class name for an icon'),
      'add' => '4.7',
      'default' => NULL,
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'permission' => [
      'title' => ts('Required Permission'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Permission(s) needed to access menu item'),
      'add' => '3.0',
      'serialize' => CRM_Core_DAO::SERIALIZE_COMMA,
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'permission_operator' => [
      'title' => ts('Permission Operator'),
      'sql_type' => 'varchar(3)',
      'input_type' => 'Select',
      'description' => ts('Operator to use if item has more than one permission'),
      'add' => '3.0',
      'input_attrs' => [
        'maxlength' => 3,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::andOr',
      ],
    ],
    'parent_id' => [
      'title' => ts('parent ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Parent navigation item, used for grouping'),
      'add' => '3.0',
      'input_attrs' => [
        'label' => ts('parent'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_navigation',
        'key_column' => 'id',
        'name_column' => 'name',
        'label_column' => 'label',
      ],
      'entity_reference' => [
        'entity' => 'Navigation',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'is_active' => [
      'title' => ts('Is Active'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this navigation item active?'),
      'add' => '3.0',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'has_separator' => [
      'title' => ts('Separator'),
      'sql_type' => 'tinyint',
      'input_type' => 'Select',
      'description' => ts('Place a separator either before or after this menu item.'),
      'add' => '3.0',
      'default' => 0,
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::navigationMenuSeparator',
      ],
    ],
    'weight' => [
      'title' => ts('Order'),
      'sql_type' => 'int',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Ordering of the navigation items in various blocks.'),
      'add' => '3.0',
      'default' => 0,
    ],
  ],
];

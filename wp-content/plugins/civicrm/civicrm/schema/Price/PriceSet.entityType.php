<?php

return [
  'name' => 'PriceSet',
  'table' => 'civicrm_price_set',
  'class' => 'CRM_Price_DAO_PriceSet',
  'getInfo' => fn() => [
    'title' => ts('Price Set'),
    'title_plural' => ts('Price Sets'),
    'description' => ts('A set of Price Fields'),
    'log' => TRUE,
    'add' => '1.8',
    'label_field' => 'title',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/price/add?reset=1&action=add',
    'update' => 'civicrm/admin/price/edit?reset=1&action=update&sid=[id]',
    'delete' => 'civicrm/admin/price/edit?reset=1&action=delete&sid=[id]',
    'preview' => 'civicrm/admin/price/edit?reset=1&action=preview&sid=[id]',
    'browse' => 'civicrm/admin/price',
  ],
  'getIndices' => fn() => [
    'UI_name' => [
      'fields' => [
        'name' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '1.8',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Price Set'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Price Set'),
      'add' => '1.8',
      'input_attrs' => [
        'label' => ts('ID'),
      ],
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'domain_id' => [
      'title' => ts('Domain ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Text',
      'description' => ts('Which Domain is this price-set for'),
      'add' => '3.1',
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
    'name' => [
      'title' => ts('Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Variable name/programmatic handle for this set of price fields.'),
      'add' => '1.8',
      'input_attrs' => [
        'label' => ts('Name'),
      ],
    ],
    'title' => [
      'title' => ts('Price Set Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('Displayed title for the Price Set.'),
      'add' => '1.8',
    ],
    'is_active' => [
      'title' => ts('Price Set Is Active?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this price set active'),
      'add' => '1.8',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'help_pre' => [
      'title' => ts('Price Set Pre Help'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Description and/or help text to display before fields in form.'),
      'add' => '1.8',
      'input_attrs' => [
        'rows' => 4,
        'cols' => 80,
      ],
    ],
    'help_post' => [
      'title' => ts('Price Set Post Help'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Description and/or help text to display after fields in form.'),
      'add' => '1.8',
      'input_attrs' => [
        'rows' => 4,
        'cols' => 80,
      ],
    ],
    'javascript' => [
      'title' => ts('Price Set Javascript'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'description' => ts('Optional Javascript script function(s) included on the form with this price_set. Can be used for conditional'),
      'add' => '1.8',
    ],
    'extends' => [
      'title' => ts('Price Set Extends'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('What components are using this price set?'),
      'add' => '3.1',
      'serialize' => CRM_Core_DAO::SERIALIZE_SEPARATOR_BOOKEND,
      'pseudoconstant' => [
        'callback' => 'CRM_Price_BAO_PriceSet::getExtendsOptions',
      ],
    ],
    'financial_type_id' => [
      'title' => ts('Financial Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('FK to Financial Type(for membership price sets only).'),
      'add' => '4.3',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Financial Type'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_financial_type',
        'key_column' => 'id',
        'label_column' => 'name',
      ],
      'entity_reference' => [
        'entity' => 'FinancialType',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'is_quick_config' => [
      'title' => ts('Is Price Set Quick Config?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is set if edited on Contribution or Event Page rather than through Manage Price Sets'),
      'add' => '4.1',
      'default' => FALSE,
    ],
    'is_reserved' => [
      'title' => ts('Price Set Is Reserved'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this a predefined system price set (i.e. it can not be deleted, edited)?'),
      'add' => '4.2',
      'default' => FALSE,
    ],
    'min_amount' => [
      'title' => ts('Minimum Amount'),
      'sql_type' => 'decimal(20,2)',
      'input_type' => 'Text',
      'description' => ts('Minimum Amount required for this set.'),
      'add' => '4.7',
      'default' => '0.0',
    ],
  ],
];

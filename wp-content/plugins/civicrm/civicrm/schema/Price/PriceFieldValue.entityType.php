<?php

return [
  'name' => 'PriceFieldValue',
  'table' => 'civicrm_price_field_value',
  'class' => 'CRM_Price_DAO_PriceFieldValue',
  'getInfo' => fn() => [
    'title' => ts('Price Field Value'),
    'title_plural' => ts('Price Field Values'),
    'description' => ts('Provides multiple options for a PriceField'),
    'add' => '3.3',
    'label_field' => 'label',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/price/field/option/edit?reset=1&action=add&fid=[price_field_id]&sid=[price_field_id.price_set_id]',
    'view' => 'civicrm/admin/price/field/option/edit?reset=1&action=view&oid=[id]&fid=[price_field_id]&sid=[price_field_id.price_set_id]',
    'update' => 'civicrm/admin/price/field/option/edit?reset=1&action=update&oid=[id]&fid=[price_field_id]&sid=[price_field_id.price_set_id]',
    'delete' => 'civicrm/admin/price/field/option/edit?reset=1&action=delete&oid=[id]&fid=[price_field_id]&sid=[price_field_id.price_set_id]',
    'browse' => 'civicrm/admin/price/field/option',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Price Field Value ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Price Field Value'),
      'add' => '3.3',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'price_field_id' => [
      'title' => ts('Price Field ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to civicrm_price_field'),
      'add' => '3.3',
      'input_attrs' => [
        'label' => ts('Price Field'),
      ],
      'entity_reference' => [
        'entity' => 'PriceField',
        'key' => 'id',
      ],
    ],
    'name' => [
      'title' => ts('Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Price field option name'),
      'add' => '3.3',
      'default' => NULL,
    ],
    'label' => [
      'title' => ts('Label'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'localizable' => TRUE,
      'description' => ts('Price field option label'),
      'add' => '3.3',
      'default' => NULL,
    ],
    'description' => [
      'title' => ts('Description'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Price field option description.'),
      'add' => '3.3',
      'default' => NULL,
      'input_attrs' => [
        'rows' => 2,
        'cols' => 60,
        'label' => ts('Description'),
      ],
    ],
    'help_pre' => [
      'title' => ts('Help Pre'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Price field option pre help text.'),
      'add' => '4.7',
      'default' => NULL,
      'input_attrs' => [
        'rows' => 2,
        'cols' => 60,
        'label' => ts('Pre Help'),
      ],
    ],
    'help_post' => [
      'title' => ts('Help Post'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Price field option post field help.'),
      'add' => '4.7',
      'default' => NULL,
      'input_attrs' => [
        'rows' => 2,
        'cols' => 60,
        'label' => ts('Post Help'),
      ],
    ],
    'amount' => [
      'title' => ts('Amount'),
      'sql_type' => 'decimal(18,9)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Price field option amount'),
      'add' => '3.3',
      'input_attrs' => [
        'size' => '8',
      ],
    ],
    'count' => [
      'title' => ts('Count'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Text',
      'description' => ts('Number of participants per field option'),
      'add' => '3.3',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Count'),
      ],
    ],
    'max_value' => [
      'title' => ts('Max Value'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Text',
      'description' => ts('Max number of participants per field options'),
      'add' => '3.3',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Max Value'),
      ],
    ],
    'weight' => [
      'title' => ts('Order'),
      'sql_type' => 'int',
      'input_type' => 'Text',
      'description' => ts('Order in which the field options should appear'),
      'add' => '3.3',
      'default' => 1,
    ],
    'membership_type_id' => [
      'title' => ts('Membership Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to Membership Type'),
      'add' => '3.4',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Membership Type'),
      ],
      'entity_reference' => [
        'entity' => 'MembershipType',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'membership_num_terms' => [
      'title' => ts('Membership Num Terms'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Text',
      'description' => ts('Number of terms for this membership'),
      'add' => '4.3',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Number of terms'),
      ],
    ],
    'is_default' => [
      'title' => ts('Is Default Price Field Option?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this default price field option'),
      'add' => '3.3',
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Default'),
      ],
    ],
    'is_active' => [
      'title' => ts('Price Field Value is Active'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this price field value active'),
      'add' => '3.3',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'financial_type_id' => [
      'title' => ts('Financial Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('FK to Financial Type.'),
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
    'non_deductible_amount' => [
      'title' => ts('Non-deductible Amount'),
      'sql_type' => 'decimal(20,2)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Portion of total amount which is NOT tax deductible.'),
      'add' => '4.7',
      'default' => '0.0',
    ],
    'visibility_id' => [
      'title' => ts('Price Field Option Visibility'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('Implicit FK to civicrm_option_group with name = \'visibility\''),
      'add' => '4.7',
      'default' => 1,
      'pseudoconstant' => [
        'option_group_name' => 'visibility',
      ],
    ],
  ],
];

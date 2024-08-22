<?php

return [
  'name' => 'PriceField',
  'table' => 'civicrm_price_field',
  'class' => 'CRM_Price_DAO_PriceField',
  'getInfo' => fn() => [
    'title' => ts('Price Field'),
    'title_plural' => ts('Price Fields'),
    'description' => ts('Price fields (can be part of a PriceSet and can contain multiple PriceFieldValue)'),
    'log' => TRUE,
    'add' => '1.8',
    'label_field' => 'label',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/price/field/edit?reset=1&action=add&sid=[price_set_id]',
    'update' => 'civicrm/admin/price/field/edit?reset=1&action=update&sid=[price_set_id]&fid=[id]',
    'delete' => 'civicrm/admin/price/field/edit?reset=1&action=delete&sid=[price_set_id]&fid=[id]',
    'preview' => 'civicrm/admin/price/field/edit?reset=1&action=preview&sid=[price_set_id]&fid=[id]',
    'browse' => 'civicrm/admin/price/field',
  ],
  'getIndices' => fn() => [
    'index_name' => [
      'fields' => [
        'name' => TRUE,
      ],
      'add' => '1.8',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Price Field ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Price Field'),
      'add' => '1.8',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'price_set_id' => [
      'title' => ts('Price Set ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to civicrm_price_set'),
      'add' => '1.8',
      'input_attrs' => [
        'label' => ts('Price Set'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_price_set',
        'key_column' => 'id',
        'name_column' => 'name',
        'label_column' => 'title',
      ],
      'entity_reference' => [
        'entity' => 'PriceSet',
        'key' => 'id',
      ],
    ],
    'name' => [
      'title' => ts('Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Variable name/programmatic handle for this field.'),
      'add' => '1.8',
    ],
    'label' => [
      'title' => ts('Label'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('Text for form field label (also friendly name for administering this field).'),
      'add' => '1.8',
    ],
    'html_type' => [
      'title' => ts('Html Type'),
      'sql_type' => 'varchar(12)',
      'input_type' => 'Select',
      'required' => TRUE,
      'add' => '1.8',
      'input_attrs' => [
        'label' => ts('Html Type'),
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Price_BAO_PriceField::htmlTypes',
      ],
    ],
    'is_enter_qty' => [
      'title' => ts('Price Field Quantity Required?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Enter a quantity for this field?'),
      'add' => '1.8',
      'default' => FALSE,
    ],
    'help_pre' => [
      'title' => ts('Price Field Pre Text'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Description and/or help text to display before this field.'),
      'add' => '1.8',
      'input_attrs' => [
        'rows' => 4,
        'cols' => 80,
      ],
    ],
    'help_post' => [
      'title' => ts('Price Field Post Text'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Description and/or help text to display after this field.'),
      'add' => '1.8',
      'input_attrs' => [
        'rows' => 4,
        'cols' => 80,
      ],
    ],
    'weight' => [
      'title' => ts('Order'),
      'sql_type' => 'int',
      'input_type' => 'Select',
      'description' => ts('Order in which the fields should appear'),
      'add' => '1.8',
      'default' => 1,
    ],
    'is_display_amounts' => [
      'title' => ts('Price Field Show Amounts?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Should the price be displayed next to the label for each option?'),
      'default' => TRUE,
    ],
    'options_per_line' => [
      'title' => ts('Price Field Options per Row'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Text',
      'description' => ts('number of options per line for checkbox and radio'),
      'add' => '1.8',
      'default' => 1,
    ],
    'is_active' => [
      'title' => ts('Price Field Is Active?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this price field active'),
      'add' => '1.8',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'is_required' => [
      'title' => ts('Price Field is Required?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this price field required (value must be > 1)'),
      'add' => '1.8',
      'default' => TRUE,
    ],
    'active_on' => [
      'title' => ts('Price Field Start Date'),
      'sql_type' => 'datetime',
      'input_type' => 'Select Date',
      'description' => ts('If non-zero, do not show this field before the date specified'),
      'add' => '1.8',
      'default' => NULL,
      'input_attrs' => [
        'format_type' => 'activityDateTime',
      ],
    ],
    'expire_on' => [
      'title' => ts('Price Field End Date'),
      'sql_type' => 'datetime',
      'input_type' => 'Select Date',
      'description' => ts('If non-zero, do not show this field after the date specified'),
      'add' => '1.8',
      'default' => NULL,
      'input_attrs' => [
        'format_type' => 'activityDateTime',
      ],
    ],
    'javascript' => [
      'title' => ts('Price Field Javascript'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Optional scripting attributes for field'),
      'add' => '1.8',
    ],
    'visibility_id' => [
      'title' => ts('Price Field Visibility'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('Implicit FK to civicrm_option_group with name = \'visibility\''),
      'add' => '3.2',
      'default' => 1,
      'pseudoconstant' => [
        'option_group_name' => 'visibility',
      ],
    ],
  ],
];

<?php

return [
  'name' => 'OptionValue',
  'table' => 'civicrm_option_value',
  'class' => 'CRM_Core_DAO_OptionValue',
  'getInfo' => fn() => [
    'title' => ts('Option Value'),
    'title_plural' => ts('Option Values'),
    'description' => ts('FIXME'),
    'log' => TRUE,
    'add' => '1.5',
  ],
  'getPaths' => fn() => [
    'update' => 'civicrm/admin/options/[option_group_id:name]?reset=1&action=update&id=[id]',
    'delete' => 'civicrm/admin/options/[option_group_id:name]?reset=1&action=delete&id=[id]',
  ],
  'getIndices' => fn() => [
    'index_option_group_id_value' => [
      'fields' => [
        'value' => 128,
        'option_group_id' => TRUE,
      ],
      'add' => '1.5',
    ],
    'index_option_group_id_name' => [
      'fields' => [
        'name' => 128,
        'option_group_id' => TRUE,
      ],
      'add' => '2.2',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Option Value ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Option ID'),
      'add' => '1.5',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'option_group_id' => [
      'title' => ts('Option Group ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('Group which this option belongs to.'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('Option Group'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_option_group',
        'key_column' => 'id',
        'name_column' => 'name',
        'label_column' => 'title',
      ],
      'entity_reference' => [
        'entity' => 'OptionGroup',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'label' => [
      'title' => ts('Option Label'),
      'sql_type' => 'varchar(512)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('Option string as displayed to users - e.g. the label in an HTML OPTION tag.'),
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 512,
      ],
    ],
    'value' => [
      'title' => ts('Option Value'),
      'sql_type' => 'varchar(512)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('The actual value stored (as a foreign key) in the data record. Functions which need lookup option_value.title should use civicrm_option_value.option_group_id plus civicrm_option_value.value as the key.'),
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 512,
      ],
    ],
    'name' => [
      'title' => ts('Option Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Stores a fixed (non-translated) name for this option value. Lookup functions should use the name as the key for the option value row.'),
      'add' => '1.5',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'grouping' => [
      'title' => ts('Option Grouping Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Use to sort and/or set display properties for sub-set(s) of options within an option group. EXAMPLE: Use for college_interest field, to differentiate partners from non-partners.'),
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'filter' => [
      'title' => ts('Filter'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'description' => ts('Bitwise logic can be used to create subsets of options within an option_group for different uses.'),
      'add' => '1.5',
      'default' => 0,
      'input_attrs' => [
        'label' => ts('Filter'),
      ],
    ],
    'is_default' => [
      'title' => ts('Option is Default?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'description' => ts('Is this the default option for the group?'),
      'add' => '1.5',
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Default'),
      ],
    ],
    'weight' => [
      'title' => ts('Order'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Controls display sort order.'),
      'add' => '1.5',
    ],
    'description' => [
      'title' => ts('Option Description'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Optional description.'),
      'add' => '1.5',
      'input_attrs' => [
        'rows' => 8,
        'cols' => 60,
      ],
    ],
    'is_optgroup' => [
      'title' => ts('Option is Header?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'description' => ts('Is this row simply a display header? Expected usage is to render these as OPTGROUP tags within a SELECT field list of options?'),
      'add' => '1.5',
      'default' => FALSE,
    ],
    'is_reserved' => [
      'title' => ts('Option Is Reserved?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'description' => ts('Is this a predefined system object?'),
      'add' => '1.5',
      'default' => FALSE,
    ],
    'is_active' => [
      'title' => ts('Option Is Active'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'description' => ts('Is this option active?'),
      'add' => '1.5',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'component_id' => [
      'title' => ts('Component ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('Component that this option value belongs/caters to.'),
      'add' => '2.0',
      'input_attrs' => [
        'label' => ts('Component'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_component',
        'key_column' => 'id',
        'label_column' => 'name',
      ],
      'entity_reference' => [
        'entity' => 'Component',
        'key' => 'id',
      ],
    ],
    'domain_id' => [
      'title' => ts('Domain ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Which Domain is this option value for'),
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
    'visibility_id' => [
      'title' => ts('Option Visibility'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'add' => '2.2',
      'default' => NULL,
      'pseudoconstant' => [
        'option_group_name' => 'visibility',
      ],
    ],
    'icon' => [
      'title' => ts('Icon'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('crm-i icon class'),
      'add' => '4.7',
      'default' => NULL,
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'color' => [
      'title' => ts('Color'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Hex color value e.g. #ffffff'),
      'add' => '4.7',
      'default' => NULL,
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
  ],
];

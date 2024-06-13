<?php

return [
  'name' => 'Tag',
  'table' => 'civicrm_tag',
  'class' => 'CRM_Core_DAO_Tag',
  'getInfo' => fn() => [
    'title' => ts('Tag'),
    'title_plural' => ts('Tags'),
    'description' => ts('Provides support for flat or hierarchical classification of various types of entities (contacts, groups, actions...).'),
    'log' => TRUE,
    'add' => '1.1',
    'icon' => 'fa-tag',
    'label_field' => 'label',
  ],
  'getIndices' => fn() => [
    'UI_name' => [
      'fields' => [
        'name' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '2.1',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Tag ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Tag ID'),
      'add' => '1.1',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'name' => [
      'title' => ts('Tag Name'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Unique machine name'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'label' => [
      'title' => ts('Tag Label'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('User-facing tag name'),
      'add' => '5.68',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'description' => [
      'title' => ts('Description'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Optional verbose description of the tag.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'parent_id' => [
      'title' => ts('Parent Tag ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Optional parent id for this tag.'),
      'add' => '1.1',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Parent Tag'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_tag',
        'key_column' => 'id',
        'name_column' => 'name',
        'label_column' => 'label',
      ],
      'entity_reference' => [
        'entity' => 'Tag',
        'key' => 'id',
      ],
    ],
    'is_selectable' => [
      'title' => ts('Display Tag?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this tag selectable / displayed'),
      'add' => '2.1',
      'default' => TRUE,
    ],
    'is_reserved' => [
      'title' => ts('Reserved'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'add' => '3.2',
      'default' => FALSE,
    ],
    'is_tagset' => [
      'title' => ts('Tagset'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'add' => '3.2',
      'default' => FALSE,
    ],
    'used_for' => [
      'title' => ts('Used For'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Select',
      'add' => '3.2',
      'default' => NULL,
      'serialize' => CRM_Core_DAO::SERIALIZE_COMMA,
      'input_attrs' => [
        'maxlength' => 64,
      ],
      'pseudoconstant' => [
        'option_group_name' => 'tag_used_for',
      ],
    ],
    'created_id' => [
      'title' => ts('Created By Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to civicrm_contact, who created this tag'),
      'add' => '3.4',
      'input_attrs' => [
        'label' => ts('Created By'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'SET NULL',
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
    'created_date' => [
      'title' => ts('Tag Created Date'),
      'sql_type' => 'datetime',
      'input_type' => 'Select Date',
      'readonly' => TRUE,
      'description' => ts('Date and time that tag was created.'),
      'add' => '3.4',
      'default' => 'CURRENT_TIMESTAMP',
      'input_attrs' => [
        'format_type' => 'activityDateTime',
        'label' => ts('Created Date'),
      ],
    ],
  ],
];

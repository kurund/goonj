<?php

return [
  'name' => 'Group',
  'table' => 'civicrm_group',
  'class' => 'CRM_Contact_DAO_Group',
  'getInfo' => fn() => [
    'title' => ts('Group'),
    'title_plural' => ts('Groups'),
    'description' => ts('Provide grouping of related contacts'),
    'log' => TRUE,
    'add' => '1.1',
    'icon' => 'fa-users',
    'label_field' => 'title',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/group/add?reset=1',
    'view' => 'civicrm/group/search?force=1&context=smog&gid=[id]&component_mode=1',
    'update' => 'civicrm/group/edit?reset=1&action=update&id=[id]',
    'delete' => 'civicrm/group/edit?reset=1&action=delete&id=[id]',
    'browse' => 'civicrm/group',
  ],
  'getIndices' => fn() => [
    'UI_cache_date' => [
      'fields' => [
        'cache_date' => TRUE,
      ],
      'add' => '5.34',
    ],
    'index_group_type' => [
      'fields' => [
        'group_type' => TRUE,
      ],
      'add' => '1.9',
    ],
    'UI_title' => [
      'fields' => [
        'title' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '2.1',
    ],
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
      'title' => ts('Group ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Group ID'),
      'add' => '1.1',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'name' => [
      'title' => ts('Group Name'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Internal name of Group.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'title' => [
      'title' => ts('Group Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('Name of Group.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'description' => [
      'title' => ts('Group Description'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => ts('Optional verbose description of the group.'),
      'add' => '1.1',
      'input_attrs' => [
        'rows' => 2,
        'cols' => 60,
      ],
    ],
    'source' => [
      'title' => ts('Group Source'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'description' => ts('Module or process which created this group.'),
      'add' => '1.1',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'saved_search_id' => [
      'title' => ts('Saved Search ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to saved search table.'),
      'add' => '1.1',
      'input_attrs' => [
        'label' => ts('Saved Search'),
      ],
      'entity_reference' => [
        'entity' => 'SavedSearch',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'is_active' => [
      'title' => ts('Group Enabled'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this group active?'),
      'add' => '1.1',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'visibility' => [
      'title' => ts('Group Visibility Setting'),
      'sql_type' => 'varchar(24)',
      'input_type' => 'Select',
      'description' => ts('In what context(s) is this field visible.'),
      'add' => '1.2',
      'default' => 'User and User Admin Only',
      'input_attrs' => [
        'maxlength' => 24,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::groupVisibility',
      ],
    ],
    'where_clause' => [
      'title' => ts('Group Where Clause'),
      'sql_type' => 'text',
      'input_type' => NULL,
      'deprecated' => TRUE,
      'readonly' => TRUE,
      'description' => ts('the sql where clause if a saved search acl'),
      'add' => '1.6',
    ],
    'select_tables' => [
      'title' => ts('Tables For Select Clause'),
      'sql_type' => 'text',
      'input_type' => NULL,
      'deprecated' => TRUE,
      'readonly' => TRUE,
      'description' => ts('the tables to be included in a select data'),
      'add' => '1.6',
      'serialize' => CRM_Core_DAO::SERIALIZE_PHP,
    ],
    'where_tables' => [
      'title' => ts('Tables For Where Clause'),
      'sql_type' => 'text',
      'input_type' => NULL,
      'deprecated' => TRUE,
      'readonly' => TRUE,
      'description' => ts('the tables to be included in the count statement'),
      'add' => '1.6',
      'serialize' => CRM_Core_DAO::SERIALIZE_PHP,
    ],
    'group_type' => [
      'title' => ts('Group Type'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Select',
      'description' => ts('FK to group type'),
      'add' => '1.9',
      'serialize' => CRM_Core_DAO::SERIALIZE_SEPARATOR_BOOKEND,
      'input_attrs' => [
        'maxlength' => 128,
      ],
      'pseudoconstant' => [
        'option_group_name' => 'group_type',
      ],
    ],
    'cache_date' => [
      'title' => ts('Group Cache Date'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'readonly' => TRUE,
      'description' => ts('Date when we created the cache for a smart group'),
      'add' => '2.1',
    ],
    'cache_fill_took' => [
      'title' => ts('Seconds taken by last cache fill'),
      'sql_type' => 'double',
      'input_type' => NULL,
      'readonly' => TRUE,
      'description' => ts('Seconds taken to fill smart group cache'),
      'add' => '5.67',
    ],
    'refresh_date' => [
      'title' => ts('Next Group Refresh Time'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'deprecated' => TRUE,
      'readonly' => TRUE,
      'description' => ts('Unused deprecated column.'),
      'add' => '4.3',
    ],
    'parents' => [
      'title' => ts('Group Parents'),
      'sql_type' => 'text',
      'input_type' => 'EntityRef',
      'description' => ts('List of parent groups'),
      'add' => '2.1',
      'serialize' => CRM_Core_DAO::SERIALIZE_COMMA,
      'input_attrs' => [
        'label' => ts('Parent Groups'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_group',
        'key_column' => 'id',
        'name_column' => 'name',
        'label_column' => 'title',
        'prefetch' => 'disabled',
      ],
    ],
    'children' => [
      'title' => ts('Group Children'),
      'sql_type' => 'text',
      'input_type' => 'EntityRef',
      'readonly' => TRUE,
      'description' => ts('List of child groups (calculated)'),
      'add' => '2.1',
      'serialize' => CRM_Core_DAO::SERIALIZE_COMMA,
      'input_attrs' => [
        'label' => ts('Child Groups'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_group',
        'key_column' => 'id',
        'name_column' => 'name',
        'label_column' => 'title',
        'prefetch' => 'disabled',
      ],
    ],
    'is_hidden' => [
      'title' => ts('Group is Hidden'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this group hidden?'),
      'add' => '2.2',
      'default' => FALSE,
    ],
    'is_reserved' => [
      'title' => ts('Group is Reserved'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'add' => '4.2',
      'default' => FALSE,
    ],
    'created_id' => [
      'title' => ts('Created By Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to contact table.'),
      'add' => '4.3',
      'input_attrs' => [
        'label' => ts('Created By'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'modified_id' => [
      'title' => ts('Modified By Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => NULL,
      'readonly' => TRUE,
      'description' => ts('FK to contact table.'),
      'add' => '4.5',
      'input_attrs' => [
        'label' => ts('Modified By'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'frontend_title' => [
      'title' => ts('Public Group Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('Alternative public title for this Group.'),
      'add' => '5.31',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'frontend_description' => [
      'title' => ts('Public Group Description'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Alternative public description of the group.'),
      'add' => '5.31',
      'default' => NULL,
      'input_attrs' => [
        'rows' => 2,
        'cols' => 60,
      ],
    ],
  ],
];

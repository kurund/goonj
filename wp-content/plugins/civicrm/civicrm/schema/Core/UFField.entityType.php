<?php

return [
  'name' => 'UFField',
  'table' => 'civicrm_uf_field',
  'class' => 'CRM_Core_DAO_UFField',
  'getInfo' => fn() => [
    'title' => ts('Profile Field'),
    'title_plural' => ts('Profile Fields'),
    'description' => ts('User Framework fields and their properties.'),
    'log' => TRUE,
    'add' => '1.1',
    'label_field' => 'label',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/uf/group/field/add?reset=1&action=add&gid=[uf_group_id]',
    'preview' => 'civicrm/admin/uf/group/preview?reset=1&gid=[uf_group_id]&fieldId=[id]',
    'update' => 'civicrm/admin/uf/group/field/update?reset=1&action=update&id=[id]',
    'delete' => 'civicrm/admin/uf/group/field/update?reset=1&action=delete&id=[id]',
    'browse' => 'civicrm/admin/uf/group/field',
  ],
  'getIndices' => fn() => [
    'IX_website_type_id' => [
      'fields' => [
        'website_type_id' => TRUE,
      ],
      'add' => '4.5',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Profile Field ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Unique table ID'),
      'add' => '1.1',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'uf_group_id' => [
      'title' => ts('Profile ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('Which form does this field belong to.'),
      'add' => '1.1',
      'input_attrs' => [
        'label' => ts('Profile'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_uf_group',
        'key_column' => 'id',
        'label_column' => 'title',
      ],
      'entity_reference' => [
        'entity' => 'UFGroup',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'field_name' => [
      'title' => ts('Profile Field Name'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('Name for CiviCRM field which is being exposed for sharing.'),
      'add' => '1.1',
      'pseudoconstant' => [
        'callback' => 'CRM_Core_BAO_UFField::getAvailableFieldOptions',
      ],
    ],
    'is_active' => [
      'title' => ts('Profile Field Is Active'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this field currently shareable? If FALSE, hide the field for all sharing contexts.'),
      'add' => '1.1',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'is_view' => [
      'title' => ts('Profile Is View Only'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('the field is view only and not editable in user forms.'),
      'add' => '1.1',
      'default' => FALSE,
    ],
    'is_required' => [
      'title' => ts('Profile Field Is Required'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this field required when included in a user or registration form?'),
      'add' => '1.1',
      'default' => FALSE,
    ],
    'weight' => [
      'title' => ts('Order'),
      'sql_type' => 'int',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Controls field display order when user framework fields are displayed in registration and account editing forms.'),
      'add' => '1.1',
      'default' => 1,
    ],
    'help_post' => [
      'title' => ts('Profile Field Post Help'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Description and/or help text to display after this field.'),
      'add' => '1.1',
    ],
    'help_pre' => [
      'title' => ts('Profile Field Pre Help'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Description and/or help text to display before this field.'),
      'add' => '3.2',
    ],
    'visibility' => [
      'title' => ts('Profile Field Visibility'),
      'sql_type' => 'varchar(32)',
      'input_type' => 'Select',
      'description' => ts('In what context(s) is this field visible.'),
      'add' => '1.1',
      'default' => 'User and User Admin Only',
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::ufVisibility',
      ],
    ],
    'in_selector' => [
      'title' => ts('Profile Field Is a Filter'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this field included as a column in the selector table?'),
      'add' => '1.2',
      'default' => FALSE,
    ],
    'is_searchable' => [
      'title' => ts('Profile Field Is Searchable'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this field included search form of profile?'),
      'add' => '1.4',
      'default' => FALSE,
    ],
    'location_type_id' => [
      'title' => ts('Location Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Location type of this mapping, if required'),
      'add' => '1.3',
      'input_attrs' => [
        'label' => ts('Location Type'),
      ],
      'entity_reference' => [
        'entity' => 'LocationType',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'phone_type_id' => [
      'title' => ts('Profile Field Phone Type'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('Phone Type ID, if required'),
      'add' => '2.2',
      'pseudoconstant' => [
        'option_group_name' => 'phone_type',
      ],
    ],
    'website_type_id' => [
      'title' => ts('Profile Field Website Type'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('Website Type ID, if required'),
      'add' => '4.5',
      'pseudoconstant' => [
        'option_group_name' => 'website_type',
      ],
    ],
    'label' => [
      'title' => ts('Profile Field Label'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('To save label for fields.'),
      'add' => '1.4',
    ],
    'field_type' => [
      'title' => ts('Profile Field Type'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('This field saves field type (ie individual,household.. field etc).'),
      'add' => '1.4',
    ],
    'is_reserved' => [
      'title' => ts('Profile Field Is Reserved'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this field reserved for use by some other CiviCRM functionality?'),
      'add' => '3.0',
      'default' => FALSE,
    ],
    'is_multi_summary' => [
      'title' => ts('Profile Field Supports Multiple'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Include in multi-record listing?'),
      'add' => '4.3',
      'default' => FALSE,
    ],
  ],
];

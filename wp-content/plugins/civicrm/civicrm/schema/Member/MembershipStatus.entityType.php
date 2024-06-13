<?php

return [
  'name' => 'MembershipStatus',
  'table' => 'civicrm_membership_status',
  'class' => 'CRM_Member_DAO_MembershipStatus',
  'getInfo' => fn() => [
    'title' => ts('Membership Status'),
    'title_plural' => ts('Membership Statuses'),
    'description' => ts('Membership Status stores admin configurable rules for assigning status to memberships.'),
    'log' => TRUE,
    'add' => '1.5',
    'label_field' => 'label',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/member/membershipStatus?action=add&reset=1',
    'update' => 'civicrm/admin/member/membershipStatus?action=update&id=[id]&reset=1',
    'delete' => 'civicrm/admin/member/membershipStatus?action=delete&id=[id]&reset=1',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Membership Status ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Membership ID'),
      'add' => '1.5',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'name' => [
      'title' => ts('Membership Status'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Name for Membership Status'),
      'add' => '1.5',
      'unique_name' => 'membership_status',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'maxlength' => 128,
      ],
    ],
    'label' => [
      'title' => ts('Label'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'localizable' => TRUE,
      'description' => ts('Label for Membership Status'),
      'add' => '3.2',
      'input_attrs' => [
        'maxlength' => 128,
      ],
    ],
    'start_event' => [
      'title' => ts('Start Event'),
      'sql_type' => 'varchar(12)',
      'input_type' => 'Select',
      'description' => ts('Event when this status starts.'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('Start Event'),
        'maxlength' => 12,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::eventDate',
      ],
    ],
    'start_event_adjust_unit' => [
      'title' => ts('Start Event Adjust Unit'),
      'sql_type' => 'varchar(8)',
      'input_type' => 'Select',
      'description' => ts('Unit used for adjusting from start_event.'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('Start Event Adjust Unit'),
        'maxlength' => 8,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::unitList',
      ],
    ],
    'start_event_adjust_interval' => [
      'title' => ts('Start Event Adjust Interval'),
      'sql_type' => 'int',
      'input_type' => 'Number',
      'description' => ts('Status range begins this many units from start_event.'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('Start Event Adjust Interval'),
      ],
    ],
    'end_event' => [
      'title' => ts('End Event'),
      'sql_type' => 'varchar(12)',
      'input_type' => 'Select',
      'description' => ts('Event after which this status ends.'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('End Event'),
        'maxlength' => 12,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::eventDate',
      ],
    ],
    'end_event_adjust_unit' => [
      'title' => ts('End Event Adjust Unit'),
      'sql_type' => 'varchar(8)',
      'input_type' => 'Select',
      'description' => ts('Unit used for adjusting from the ending event.'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('End Event Adjust Unit'),
        'maxlength' => 8,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::unitList',
      ],
    ],
    'end_event_adjust_interval' => [
      'title' => ts('End Event Adjust Interval'),
      'sql_type' => 'int',
      'input_type' => 'Number',
      'description' => ts('Status range ends this many units from end_event.'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('End Event Adjust Interval'),
      ],
    ],
    'is_current_member' => [
      'title' => ts('Current Membership?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Does this status aggregate to current members (e.g. New, Renewed, Grace might all be TRUE... while Unrenewed, Lapsed, Inactive would be FALSE).'),
      'add' => '1.5',
      'default' => FALSE,
    ],
    'is_admin' => [
      'title' => ts('Administrator Only?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this status for admin/manual assignment only.'),
      'add' => '1.5',
      'default' => FALSE,
    ],
    'weight' => [
      'title' => ts('Order'),
      'sql_type' => 'int',
      'input_type' => 'Number',
      'add' => '1.5',
    ],
    'is_default' => [
      'title' => ts('Default Status?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Assign this status to a membership record if no other status match is found.'),
      'add' => '1.5',
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Default'),
      ],
    ],
    'is_active' => [
      'title' => ts('Is Active'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this membership_status enabled.'),
      'add' => '1.5',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'is_reserved' => [
      'title' => ts('Is Reserved'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this membership_status reserved.'),
      'add' => '2.1',
      'default' => FALSE,
    ],
  ],
];

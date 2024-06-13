<?php

return [
  'name' => 'MembershipBlock',
  'table' => 'civicrm_membership_block',
  'class' => 'CRM_Member_DAO_MembershipBlock',
  'getInfo' => fn() => [
    'title' => ts('Membership Block'),
    'title_plural' => ts('Membership Blocks'),
    'description' => ts('A Membership Block stores admin configurable status options and rules'),
    'log' => TRUE,
    'add' => '1.5',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Membership Block ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Membership ID'),
      'add' => '1.5',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'entity_table' => [
      'title' => ts('Membership Block Entity Table'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'description' => ts('Name for Membership Status'),
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'entity_id' => [
      'title' => ts('Entity ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to civicrm_contribution_page.id'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('Entity'),
      ],
      'entity_reference' => [
        'entity' => 'ContributionPage',
        'key' => 'id',
      ],
    ],
    'membership_types' => [
      'title' => ts('Membership Block Membership Types'),
      'sql_type' => 'varchar(1024)',
      'input_type' => 'Text',
      'description' => ts('Membership types to be exposed by this block'),
      'add' => '1.5',
      'serialize' => CRM_Core_DAO::SERIALIZE_PHP,
      'input_attrs' => [
        'maxlength' => 1024,
      ],
    ],
    'membership_type_default' => [
      'title' => ts('Default Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Optional foreign key to membership_type'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('Default Type'),
      ],
      'entity_reference' => [
        'entity' => 'MembershipType',
        'key' => 'id',
      ],
    ],
    'display_min_fee' => [
      'title' => ts('Membership Block Display Minimum Fee'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Display minimum membership fee'),
      'add' => '1.5',
      'default' => TRUE,
    ],
    'is_separate_payment' => [
      'title' => ts('Membership Block Is Separate Payment'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Should membership transactions be processed separately'),
      'add' => '1.5',
      'default' => TRUE,
    ],
    'new_title' => [
      'title' => ts('Membership Block New Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'localizable' => TRUE,
      'description' => ts('Title to display at top of block'),
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'new_text' => [
      'title' => ts('Membership Block New Text'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Text to display below title'),
      'add' => '1.5',
    ],
    'renewal_title' => [
      'title' => ts('Membership Block Renewal Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'localizable' => TRUE,
      'description' => ts('Title for renewal'),
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'renewal_text' => [
      'title' => ts('Membership Block Renewal Text'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Text to display for member renewal'),
      'add' => '1.5',
    ],
    'is_required' => [
      'title' => ts('Is Required'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is membership sign up optional'),
      'add' => '1.5',
      'default' => FALSE,
    ],
    'is_active' => [
      'title' => ts('Is Active'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this membership_block enabled'),
      'add' => '1.5',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
  ],
];

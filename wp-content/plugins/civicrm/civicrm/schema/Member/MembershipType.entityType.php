<?php

return [
  'name' => 'MembershipType',
  'table' => 'civicrm_membership_type',
  'class' => 'CRM_Member_DAO_MembershipType',
  'getInfo' => fn() => [
    'title' => ts('Membership Type'),
    'title_plural' => ts('Membership Types'),
    'description' => ts('Sites can configure multiple types of memberships. They encode the owner organization, fee, and the rules needed to set start and end (expire) dates when a member signs up for that type.'),
    'log' => TRUE,
    'add' => '1.5',
    'label_field' => 'name',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/member/membershipType/add?action=add&reset=1',
    'update' => 'civicrm/admin/member/membershipType/add?action=update&id=[id]&reset=1',
    'delete' => 'civicrm/admin/member/membershipType/add?action=delete&id=[id]&reset=1',
  ],
  'getIndices' => fn() => [
    'index_relationship_type_id' => [
      'fields' => [
        'relationship_type_id' => TRUE,
      ],
      'add' => '3.3',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Membership Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Membership ID'),
      'add' => '1.5',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'domain_id' => [
      'title' => ts('Domain ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('Which Domain is this match entry for'),
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
    'name' => [
      'title' => ts('Membership Type'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('Name of Membership Type'),
      'add' => '1.5',
      'unique_name' => 'membership_type',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'label' => ts('Name'),
        'maxlength' => 128,
      ],
    ],
    'description' => [
      'title' => ts('Description'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'TextArea',
      'localizable' => TRUE,
      'description' => ts('Description of Membership Type'),
      'add' => '1.5',
      'input_attrs' => [
        'rows' => 6,
        'cols' => 50,
        'label' => ts('Description'),
        'maxlength' => 255,
      ],
    ],
    'member_of_contact_id' => [
      'title' => ts('Organization ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('Owner organization for this membership type. FK to Contact ID'),
      'add' => '1.5',
      'input_attrs' => [
        'label' => ts('Organization'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'RESTRICT',
      ],
    ],
    'financial_type_id' => [
      'title' => ts('Financial Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('If membership is paid by a contribution - what financial type should be used. FK to civicrm_financial_type.id'),
      'add' => '4.3',
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
      ],
    ],
    'minimum_fee' => [
      'title' => ts('Minimum Fee'),
      'sql_type' => 'decimal(18,9)',
      'input_type' => 'Text',
      'description' => ts('Minimum fee for this membership (0 for free/complimentary memberships).'),
      'add' => '1.5',
      'default' => '0',
      'input_attrs' => [
        'label' => ts('Minimum Fee'),
        'maxlength' => 18,
      ],
    ],
    'duration_unit' => [
      'title' => ts('Membership Type Duration Unit'),
      'sql_type' => 'varchar(8)',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('Unit in which membership period is expressed.'),
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 8,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::membershipTypeUnitList',
      ],
    ],
    'duration_interval' => [
      'title' => ts('Membership Type Duration Interval'),
      'sql_type' => 'int',
      'input_type' => 'Text',
      'description' => ts('Number of duration units in membership period (e.g. 1 year, 12 months).'),
      'add' => '1.5',
    ],
    'period_type' => [
      'title' => ts('Membership Type Plan'),
      'sql_type' => 'varchar(8)',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('Rolling membership period starts on signup date. Fixed membership periods start on fixed_period_start_day.'),
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 8,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::periodType',
      ],
    ],
    'fixed_period_start_day' => [
      'title' => ts('Fixed Period Start Day'),
      'sql_type' => 'int',
      'input_type' => 'Number',
      'description' => ts('For fixed period memberships, month and day (mmdd) on which subscription/membership will start. Period start is back-dated unless after rollover day.'),
      'add' => '1.5',
    ],
    'fixed_period_rollover_day' => [
      'title' => ts('Fixed Period Rollover Day'),
      'sql_type' => 'int',
      'input_type' => 'Number',
      'description' => ts('For fixed period memberships, signups after this day (mmdd) rollover to next period.'),
      'add' => '1.5',
    ],
    'relationship_type_id' => [
      'title' => ts('Membership Type Relationship'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'description' => ts('FK to Relationship Type ID'),
      'add' => '1.5',
      'serialize' => CRM_Core_DAO::SERIALIZE_SEPARATOR_TRIMMED,
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'relationship_direction' => [
      'title' => ts('Relationship Direction'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'add' => '1.7',
      'serialize' => CRM_Core_DAO::SERIALIZE_SEPARATOR_TRIMMED,
      'input_attrs' => [
        'label' => ts('Relationship Direction'),
        'maxlength' => 128,
      ],
    ],
    'max_related' => [
      'title' => ts('Max Related Members for Type'),
      'sql_type' => 'int',
      'input_type' => 'Text',
      'description' => ts('Maximum number of related memberships.'),
      'add' => '4.3',
      'input_attrs' => [
        'label' => ts('Max Related'),
      ],
    ],
    'visibility' => [
      'title' => ts('Visible'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Select',
      'add' => '1.5',
      'input_attrs' => [
        'maxlength' => 64,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::memberVisibility',
      ],
    ],
    'weight' => [
      'title' => ts('Order'),
      'sql_type' => 'int',
      'input_type' => 'Text',
      'add' => '1.5',
    ],
    'receipt_text_signup' => [
      'title' => ts('Membership Type Receipt Text'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'TextArea',
      'description' => ts('Receipt Text for membership signup'),
      'add' => '2.0',
      'input_attrs' => [
        'rows' => 6,
        'cols' => 50,
        'maxlength' => 255,
      ],
    ],
    'receipt_text_renewal' => [
      'title' => ts('Membership Type Renewal Text'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'TextArea',
      'description' => ts('Receipt Text for membership renewal'),
      'add' => '2.0',
      'input_attrs' => [
        'rows' => 6,
        'cols' => 50,
        'maxlength' => 255,
      ],
    ],
    'auto_renew' => [
      'title' => ts('Auto Renew'),
      'sql_type' => 'tinyint',
      'input_type' => 'Radio',
      'description' => ts('0 = No auto-renew option; 1 = Give option, but not required; 2 = Auto-renew required;'),
      'add' => '3.3',
      'default' => 0,
      'input_attrs' => [
        'label' => ts('Auto-Renew'),
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::memberAutoRenew',
      ],
    ],
    'is_active' => [
      'title' => ts('Is Active'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'description' => ts('Is this membership_type enabled'),
      'add' => '1.5',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
  ],
];

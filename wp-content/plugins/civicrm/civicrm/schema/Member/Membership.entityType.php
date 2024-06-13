<?php

return [
  'name' => 'Membership',
  'table' => 'civicrm_membership',
  'class' => 'CRM_Member_DAO_Membership',
  'getInfo' => fn() => [
    'title' => ts('Membership'),
    'title_plural' => ts('Memberships'),
    'description' => ts('Records of contacts belonging to an organization\'s membership program.'),
    'log' => TRUE,
    'add' => '1.5',
    'icon' => 'fa-id-badge',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/member/add?reset=1&action=add&context=standalone',
    'view' => 'civicrm/contact/view/membership?reset=1&action=view&id=[id]&cid=[contact_id]',
    'update' => 'civicrm/contact/view/membership?reset=1&action=update&id=[id]&cid=[contact_id]',
    'delete' => 'civicrm/contact/view/membership?reset=1&action=delete&id=[id]&cid=[contact_id]',
  ],
  'getIndices' => fn() => [
    'index_owner_membership_id' => [
      'fields' => [
        'owner_membership_id' => TRUE,
      ],
      'add' => '1.7',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Membership ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Membership ID'),
      'add' => '1.5',
      'unique_name' => 'membership_id',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'contact_id' => [
      'title' => ts('Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to Contact ID'),
      'add' => '1.5',
      'unique_name' => 'membership_contact_id',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'label' => ts('Contact'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'membership_type_id' => [
      'title' => ts('Membership Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('FK to Membership Type'),
      'add' => '1.5',
      'usage' => [
        'import',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'label' => ts('Membership Type'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_membership_type',
        'key_column' => 'id',
        'label_column' => 'name',
      ],
      'entity_reference' => [
        'entity' => 'MembershipType',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'join_date' => [
      'title' => ts('Member Since'),
      'sql_type' => 'date',
      'input_type' => 'Select Date',
      'description' => ts('Beginning of initial membership period (member since...).'),
      'add' => '1.5',
      'unique_name' => 'membership_join_date',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'format_type' => 'activityDate',
      ],
    ],
    'start_date' => [
      'title' => ts('Membership Start Date'),
      'sql_type' => 'date',
      'input_type' => 'Select Date',
      'description' => ts('Beginning of current uninterrupted membership period.'),
      'add' => '1.5',
      'unique_name' => 'membership_start_date',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'format_type' => 'activityDate',
      ],
    ],
    'end_date' => [
      'title' => ts('Membership Expiration Date'),
      'sql_type' => 'date',
      'input_type' => 'Select Date',
      'description' => ts('Current membership period expire date.'),
      'add' => '1.5',
      'unique_name' => 'membership_end_date',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'format_type' => 'activityDate',
      ],
    ],
    'source' => [
      'title' => ts('Membership Source'),
      'sql_type' => 'varchar(128)',
      'input_type' => 'Text',
      'add' => '1.5',
      'unique_name' => 'membership_source',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'maxlength' => 128,
      ],
    ],
    'status_id' => [
      'title' => ts('Status ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('FK to Membership Status'),
      'add' => '1.5',
      'usage' => [
        'import',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'label' => ts('Status'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_membership_status',
        'key_column' => 'id',
        'label_column' => 'label',
      ],
      'entity_reference' => [
        'entity' => 'MembershipStatus',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'is_override' => [
      'title' => ts('Status Override'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Admin users may set a manual status which overrides the calculated status. When this flag is TRUE, automated status update scripts should NOT modify status for the record.'),
      'add' => '1.5',
      'unique_name' => 'member_is_override',
      'default' => FALSE,
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
    ],
    'status_override_end_date' => [
      'title' => ts('Status Override End Date'),
      'sql_type' => 'date',
      'input_type' => 'Select Date',
      'description' => ts('Then end date of membership status override if \'Override until selected date\' override type is selected.'),
      'add' => '4.7',
      'default' => NULL,
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'format_type' => 'activityDate',
      ],
    ],
    'owner_membership_id' => [
      'title' => ts('Primary Member ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Optional FK to Parent Membership.'),
      'add' => '1.7',
      'usage' => [
        'export',
      ],
      'input_attrs' => [
        'label' => ts('Primary Member'),
      ],
      'entity_reference' => [
        'entity' => 'Membership',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'max_related' => [
      'title' => ts('Max Related'),
      'sql_type' => 'int',
      'input_type' => 'Text',
      'description' => ts('Maximum number of related memberships (membership_type override).'),
      'add' => '4.3',
      'usage' => [
        'export',
      ],
      'input_attrs' => [
        'label' => ts('Maximum number of related memberships'),
      ],
    ],
    'is_test' => [
      'title' => ts('Test'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'unique_name' => 'member_is_test',
      'default' => FALSE,
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
    ],
    'is_pay_later' => [
      'title' => ts('Is Pay Later'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'add' => '2.1',
      'unique_name' => 'member_is_pay_later',
      'default' => FALSE,
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
    ],
    'contribution_recur_id' => [
      'title' => ts('Recurring Contribution ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Conditional foreign key to civicrm_contribution_recur id. Each membership in connection with a recurring contribution carries a foreign key to the recurring contribution record. This assumes we can track these processor initiated events.'),
      'add' => '3.3',
      'unique_name' => 'membership_recur_id',
      'usage' => [
        'export',
      ],
      'input_attrs' => [
        'label' => ts('Recurring Contribution'),
      ],
      'entity_reference' => [
        'entity' => 'ContributionRecur',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'campaign_id' => [
      'title' => ts('Campaign ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('The campaign for which this membership is attached.'),
      'add' => '3.4',
      'unique_name' => 'member_campaign_id',
      'component' => 'CiviCampaign',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'input_attrs' => [
        'label' => ts('Campaign'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_campaign',
        'key_column' => 'id',
        'label_column' => 'title',
        'prefetch' => 'disabled',
      ],
      'entity_reference' => [
        'entity' => 'Campaign',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
  ],
];

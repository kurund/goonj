<?php

return [
  'name' => 'ContributionSoft',
  'table' => 'civicrm_contribution_soft',
  'class' => 'CRM_Contribute_DAO_ContributionSoft',
  'getInfo' => fn() => [
    'title' => ts('Contribution Soft Credit'),
    'title_plural' => ts('Contribution Soft Credits'),
    'description' => ts('FIXME'),
    'log' => TRUE,
    'add' => '2.2',
  ],
  'getIndices' => fn() => [
    'index_id' => [
      'fields' => [
        'pcp_id' => TRUE,
      ],
      'add' => '2.2',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Soft Credit ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Soft Credit ID'),
      'add' => '2.2',
      'unique_name' => 'contribution_soft_id',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'contribution_id' => [
      'title' => ts('Contribution ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to contribution table.'),
      'add' => '2.2',
      'input_attrs' => [
        'label' => ts('Contribution'),
      ],
      'entity_reference' => [
        'entity' => 'Contribution',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'contact_id' => [
      'title' => ts('Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to Contact ID'),
      'add' => '2.2',
      'unique_name' => 'contribution_soft_contact_id',
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
    'amount' => [
      'title' => ts('Soft Credit Amount'),
      'sql_type' => 'decimal(20,2)',
      'input_type' => NULL,
      'required' => TRUE,
      'description' => ts('Amount of this soft credit.'),
      'add' => '2.2',
      'usage' => [
        'import',
        'export',
        'duplicate_matching',
      ],
    ],
    'currency' => [
      'title' => ts('Soft Contribution Currency'),
      'sql_type' => 'varchar(3)',
      'input_type' => 'Select',
      'description' => ts('3 character string, value from config setting or input via user.'),
      'add' => '3.2',
      'default' => NULL,
      'input_attrs' => [
        'maxlength' => 3,
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_currency',
        'key_column' => 'name',
        'label_column' => 'full_name',
        'name_column' => 'name',
        'abbr_column' => 'symbol',
      ],
    ],
    'pcp_id' => [
      'title' => ts('PCP ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to civicrm_pcp.id'),
      'add' => '2.2',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('PCP'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_pcp',
        'key_column' => 'id',
        'label_column' => 'title',
      ],
      'entity_reference' => [
        'entity' => 'PCP',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'pcp_display_in_roll' => [
      'title' => ts('Soft Contribution Display on PCP'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'add' => '2.2',
      'default' => FALSE,
    ],
    'pcp_roll_nickname' => [
      'title' => ts('Soft Contribution PCP Nickname'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'add' => '2.2',
      'default' => NULL,
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'pcp_personal_note' => [
      'title' => ts('Soft Contribution PCP Note'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'TextArea',
      'add' => '2.2',
      'default' => NULL,
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'soft_credit_type_id' => [
      'title' => ts('Soft Credit Type'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('Soft Credit Type ID.Implicit FK to civicrm_option_value where option_group = soft_credit_type.'),
      'add' => '2.2',
      'default' => NULL,
      'pseudoconstant' => [
        'option_group_name' => 'soft_credit_type',
      ],
    ],
  ],
];

<?php

return [
  'name' => 'PaymentToken',
  'table' => 'civicrm_payment_token',
  'class' => 'CRM_Financial_DAO_PaymentToken',
  'getInfo' => fn() => [
    'title' => ts('Payment Token'),
    'title_plural' => ts('Payment Tokens'),
    'description' => ts('Payment Token'),
    'add' => '4.6',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Payment Token ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Payment Token ID'),
      'add' => '4.6',
      'unique_name' => 'payment_token_id',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'contact_id' => [
      'title' => ts('Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to Contact ID for the owner of the token'),
      'add' => '4.6',
      'input_attrs' => [
        'label' => ts('Contact'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'payment_processor_id' => [
      'title' => ts('Payment Processor ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'add' => '4.6',
      'input_attrs' => [
        'label' => ts('Payment Processor'),
      ],
      'entity_reference' => [
        'entity' => 'PaymentProcessor',
        'key' => 'id',
        'on_delete' => 'RESTRICT',
      ],
    ],
    'token' => [
      'title' => ts('Token'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Externally provided token string'),
      'add' => '4.6',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'created_date' => [
      'title' => ts('Created Date'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'description' => ts('Date created'),
      'add' => '4.6',
      'default' => 'CURRENT_TIMESTAMP',
    ],
    'created_id' => [
      'title' => ts('Created ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('Contact ID of token creator'),
      'add' => '4.6',
      'input_attrs' => [
        'label' => ts('Created'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'SET NULL',
      ],
    ],
    'expiry_date' => [
      'title' => ts('Expiry Date'),
      'sql_type' => 'datetime',
      'input_type' => 'Select Date',
      'description' => ts('Date this token expires'),
      'add' => '4.6',
    ],
    'email' => [
      'title' => ts('Email'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Email at the time of token creation. Useful for fraud forensics'),
      'add' => '4.6',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'billing_first_name' => [
      'title' => ts('Billing First Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Billing first name at the time of token creation. Useful for fraud forensics'),
      'add' => '4.6',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'billing_middle_name' => [
      'title' => ts('Billing Middle Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Billing middle name at the time of token creation. Useful for fraud forensics'),
      'add' => '4.6',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'billing_last_name' => [
      'title' => ts('Billing Last Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Billing last name at the time of token creation. Useful for fraud forensics'),
      'add' => '4.6',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'masked_account_number' => [
      'title' => ts('Masked Account Number'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Holds the part of the card number or account details that may be retained or displayed'),
      'add' => '4.6',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'ip_address' => [
      'title' => ts('IP Address'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('IP used when creating the token. Useful for fraud forensics'),
      'add' => '4.6',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
  ],
];

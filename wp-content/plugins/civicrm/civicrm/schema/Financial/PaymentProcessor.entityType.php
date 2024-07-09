<?php

return [
  'name' => 'PaymentProcessor',
  'table' => 'civicrm_payment_processor',
  'class' => 'CRM_Financial_DAO_PaymentProcessor',
  'getInfo' => fn() => [
    'title' => ts('Payment Processor'),
    'title_plural' => ts('Payment Processors'),
    'description' => ts('FIXME'),
    'add' => '1.8',
    'label_field' => 'title',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/paymentProcessor/edit?action=add&reset=1',
    'update' => 'civicrm/admin/paymentProcessor/edit?action=update&id=[id]&reset=1',
    'delete' => 'civicrm/admin/paymentProcessor/edit?action=delete&id=[id]&reset=1',
    'browse' => 'civicrm/admin/paymentProcessor',
  ],
  'getIndices' => fn() => [
    'UI_name_test_domain_id' => [
      'fields' => [
        'name' => TRUE,
        'is_test' => TRUE,
        'domain_id' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '1.8',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Payment Processor ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Payment Processor ID'),
      'add' => '1.8',
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
      'title' => ts('Payment Processor Name'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Payment Processor Name.'),
      'add' => '1.8',
      'input_attrs' => [
        'label' => ts('Machine Name'),
      ],
    ],
    'title' => [
      'title' => ts('Payment Processor Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('Name of processor when shown to CiviCRM administrators.'),
      'add' => '5.13',
      'input_attrs' => [
        'label' => ts('Backend Title'),
      ],
    ],
    'frontend_title' => [
      'title' => ts('Payment Processor Frontend Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'required' => TRUE,
      'localizable' => TRUE,
      'description' => ts('Name of processor when shown to users making a payment.'),
      'add' => '5.61',
      'input_attrs' => [
        'label' => ts('Frontend Title'),
      ],
    ],
    'description' => [
      'title' => ts('Processor Description'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Additional processor information shown to administrators.'),
      'add' => '1.8',
      'input_attrs' => [
        'label' => ts('Description'),
      ],
    ],
    'payment_processor_type_id' => [
      'title' => ts('Type ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'add' => '4.3',
      'input_attrs' => [
        'label' => ts('Type'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_payment_processor_type',
        'key_column' => 'id',
        'label_column' => 'title',
      ],
      'entity_reference' => [
        'entity' => 'PaymentProcessorType',
        'key' => 'id',
      ],
    ],
    'is_active' => [
      'title' => ts('Processor is Active?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this processor active?'),
      'add' => '1.8',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'is_default' => [
      'title' => ts('Processor Is Default?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this processor the default?'),
      'add' => '1.8',
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Default'),
      ],
    ],
    'is_test' => [
      'title' => ts('Is Test Processor?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this processor for a test site?'),
      'add' => '1.8',
      'default' => FALSE,
    ],
    'user_name' => [
      'title' => ts('User Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'add' => '1.8',
    ],
    'password' => [
      'title' => ts('Password'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Password',
      'add' => '1.8',
    ],
    'signature' => [
      'title' => ts('Signature'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'add' => '1.8',
      'input_attrs' => [
        'rows' => 4,
        'cols' => 40,
      ],
    ],
    'url_site' => [
      'title' => ts('Site URL'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'add' => '1.8',
    ],
    'url_api' => [
      'title' => ts('API URL'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'add' => '1.8',
    ],
    'url_recur' => [
      'title' => ts('Recurring Payments URL'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'add' => '1.8',
    ],
    'url_button' => [
      'title' => ts('Button URL'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'add' => '1.8',
    ],
    'subject' => [
      'title' => ts('Subject'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'add' => '1.8',
    ],
    'class_name' => [
      'title' => ts('Suffix for PHP class name implementation'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'add' => '1.8',
    ],
    'billing_mode' => [
      'title' => ts('Processor Billing Mode'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Billing Mode (deprecated)'),
      'add' => '1.8',
    ],
    'is_recur' => [
      'title' => ts('Processor Supports Recurring?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Can process recurring contributions'),
      'add' => '1.8',
      'default' => FALSE,
    ],
    'payment_type' => [
      'title' => ts('Payment Type'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'description' => ts('Payment Type: Credit or Debit (deprecated)'),
      'add' => '3.0',
      'default' => 1,
    ],
    'payment_instrument_id' => [
      'title' => ts('Payment Method'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'description' => ts('Payment Instrument ID'),
      'add' => '4.7',
      'default' => 1,
      'pseudoconstant' => [
        'option_group_name' => 'payment_instrument',
      ],
    ],
    'accepted_credit_cards' => [
      'title' => ts('Accepted Credit Cards'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => ts('array of accepted credit card types'),
      'add' => '4.7',
      'default' => NULL,
      'serialize' => CRM_Core_DAO::SERIALIZE_JSON,
    ],
  ],
];

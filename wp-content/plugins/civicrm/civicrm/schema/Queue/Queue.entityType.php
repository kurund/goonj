<?php

return [
  'name' => 'Queue',
  'table' => 'civicrm_queue',
  'class' => 'CRM_Queue_DAO_Queue',
  'getInfo' => fn() => [
    'title' => ts('Queue'),
    'title_plural' => ts('Queues'),
    'description' => ts('Stores a list of persistent queues'),
    'add' => '5.47',
  ],
  'getIndices' => fn() => [
    'UI_name' => [
      'fields' => [
        'name' => TRUE,
      ],
      'unique' => TRUE,
      'add' => '5.47',
    ],
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('System Queue ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'add' => '5.47',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'name' => [
      'title' => ts('Name'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Name of the queue'),
      'add' => '5.47',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'type' => [
      'title' => ts('Type'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Type of the queue'),
      'add' => '5.47',
      'input_attrs' => [
        'maxlength' => 64,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Queue_BAO_Queue::getTypes',
      ],
    ],
    'runner' => [
      'title' => ts('Runner'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'description' => ts('Name of the task runner'),
      'add' => '5.48',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'batch_limit' => [
      'title' => ts('Batch Limit'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Maximum number of items in a batch.'),
      'add' => '5.48',
      'default' => 1,
    ],
    'lease_time' => [
      'title' => ts('Lease Time'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('When claiming an item (or batch of items) for work, how long should the item(s) be reserved. (Seconds)'),
      'add' => '5.48',
      'default' => 3600,
    ],
    'retry_limit' => [
      'title' => ts('Retry Limit'),
      'sql_type' => 'int',
      'input_type' => 'Text',
      'required' => TRUE,
      'description' => ts('Number of permitted retries. Set to zero (0) to disable.'),
      'add' => '5.48',
      'default' => 0,
    ],
    'retry_interval' => [
      'title' => ts('Retry Interval'),
      'sql_type' => 'int',
      'input_type' => 'Text',
      'description' => ts('Number of seconds to wait before retrying a failed execution.'),
      'add' => '5.48',
    ],
    'status' => [
      'title' => ts('Status'),
      'sql_type' => 'varchar(16)',
      'input_type' => 'Text',
      'description' => ts('Execution status'),
      'add' => '5.51',
      'default' => 'active',
      'input_attrs' => [
        'maxlength' => 16,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Queue_BAO_Queue::getStatuses',
      ],
    ],
    'error' => [
      'title' => ts('Error Mode'),
      'sql_type' => 'varchar(16)',
      'input_type' => 'Text',
      'description' => ts('Fallback behavior for unhandled errors'),
      'add' => '5.51',
      'input_attrs' => [
        'maxlength' => 16,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Queue_BAO_Queue::getErrorModes',
      ],
    ],
    'is_template' => [
      'title' => ts('Is Template'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this a template configuration (for use by other/future queues)?'),
      'add' => '5.51',
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Is Template'),
      ],
    ],
  ],
];

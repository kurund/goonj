<?php

return [
  'name' => 'Job',
  'table' => 'civicrm_job',
  'class' => 'CRM_Core_DAO_Job',
  'getInfo' => fn() => [
    'title' => ts('Job'),
    'title_plural' => ts('Jobs'),
    'description' => ts('Scheduled job.'),
    'log' => FALSE,
    'add' => '4.1',
  ],
  'getPaths' => fn() => [
    'add' => 'civicrm/admin/job/add?reset=1&action=add',
    'delete' => 'civicrm/admin/job/edit?reset=1&action=delete&id=[id]',
    'update' => 'civicrm/admin/job/edit?reset=1&action=update&id=[id]',
    'browse' => 'civicrm/admin/job',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Job ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Job ID'),
      'add' => '4.1',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'domain_id' => [
      'title' => ts('Domain ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Select',
      'required' => TRUE,
      'description' => ts('Which Domain is this scheduled job for'),
      'add' => '4.1',
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
    'run_frequency' => [
      'title' => ts('Job Frequency'),
      'sql_type' => 'varchar(8)',
      'input_type' => 'Select',
      'description' => ts('Scheduled job run frequency.'),
      'add' => '4.1',
      'default' => 'Daily',
      'input_attrs' => [
        'maxlength' => 8,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::getJobFrequency',
      ],
    ],
    'last_run' => [
      'title' => ts('Last Run'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'description' => ts('When was this cron entry last run'),
      'add' => '4.1',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Last Run'),
      ],
    ],
    'last_run_end' => [
      'title' => ts('Last Run End'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'description' => ts('When did this cron entry last finish running'),
      'add' => '5.72',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Last Run End'),
      ],
    ],
    'scheduled_run_date' => [
      'title' => ts('Scheduled Run Date'),
      'sql_type' => 'timestamp',
      'input_type' => NULL,
      'description' => ts('When is this cron entry scheduled to run'),
      'add' => '4.7',
      'default' => NULL,
      'input_attrs' => [
        'label' => ts('Scheduled Run Date'),
      ],
    ],
    'name' => [
      'title' => ts('Job Name'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Title of the job'),
      'add' => '4.1',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'description' => [
      'title' => ts('Job Description'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'TextArea',
      'description' => ts('Description of the job'),
      'add' => '4.1',
      'input_attrs' => [
        'rows' => 4,
        'cols' => 60,
        'maxlength' => 255,
      ],
    ],
    'api_entity' => [
      'title' => ts('API Entity'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Entity of the job api call'),
      'add' => '4.1',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'api_action' => [
      'title' => ts('API Action'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Action of the job api call'),
      'add' => '4.1',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'parameters' => [
      'title' => ts('API Parameters'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => ts('List of parameters to the command.'),
      'add' => '4.1',
      'input_attrs' => [
        'rows' => 4,
        'cols' => 60,
      ],
    ],
    'is_active' => [
      'title' => ts('Job Is Active?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this job active?'),
      'add' => '4.1',
      'default' => TRUE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
  ],
];

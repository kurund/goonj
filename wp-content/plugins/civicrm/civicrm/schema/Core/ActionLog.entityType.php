<?php

return [
  'name' => 'ActionLog',
  'table' => 'civicrm_action_log',
  'class' => 'CRM_Core_DAO_ActionLog',
  'getInfo' => fn() => [
    'title' => ts('Action Log'),
    'title_plural' => ts('Action Logs'),
    'description' => ts('Table to store log for the reminder.'),
    'add' => '3.4',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('Action Schedule ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'add' => '3.4',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'contact_id' => [
      'title' => ts('Contact ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => ts('FK to Contact ID'),
      'add' => '3.4',
      'input_attrs' => [
        'label' => ts('Contact'),
      ],
      'entity_reference' => [
        'entity' => 'Contact',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'entity_id' => [
      'title' => ts('Entity ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to id of the entity that the action was performed on. Pseudo - FK.'),
      'add' => '3.4',
      'entity_reference' => [
        'dynamic_entity' => 'entity_table',
        'key' => 'id',
      ],
    ],
    'entity_table' => [
      'title' => ts('Entity Table'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('name of the entity table for the above id, e.g. civicrm_activity, civicrm_participant'),
      'add' => '3.4',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'action_schedule_id' => [
      'title' => ts('Schedule ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('FK to the action schedule that this action originated from.'),
      'add' => '3.4',
      'input_attrs' => [
        'label' => ts('Schedule'),
      ],
      'entity_reference' => [
        'entity' => 'ActionSchedule',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'action_date_time' => [
      'title' => ts('Action Date And Time'),
      'sql_type' => 'datetime',
      'input_type' => 'Select Date',
      'description' => ts('date time that the action was performed on.'),
      'add' => '3.4',
    ],
    'is_error' => [
      'title' => ts('Error?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Was there any error sending the reminder?'),
      'add' => '3.4',
      'default' => FALSE,
    ],
    'message' => [
      'title' => ts('Message'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => ts('Description / text in case there was an error encountered.'),
      'add' => '3.4',
    ],
    'repetition_number' => [
      'title' => ts('Repetition Number'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'description' => ts('Keeps track of the sequence number of this repetition.'),
      'add' => '3.4',
    ],
    'reference_date' => [
      'title' => ts('Reference Date'),
      'sql_type' => 'datetime',
      'input_type' => 'Select Date',
      'description' => ts('Stores the date from the entity which triggered this reminder action (e.g. membership.end_date for most membership renewal reminders)'),
      'add' => '4.6',
      'default' => NULL,
    ],
  ],
];

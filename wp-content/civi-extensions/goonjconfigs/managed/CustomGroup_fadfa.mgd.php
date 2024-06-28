<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_fadfa',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'fadfa',
        'title' => E::ts('Acquisition Details'),
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-06-08 09:14:03',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_fadfa_CustomField_fafa',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'fadfa',
        'name' => 'fafa',
        'label' => E::ts('Source'),
        'html_type' => 'Hidden',
        'default_value' => 'unknown',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'fafa_1',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

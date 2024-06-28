<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Individual_fields',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Individual_fields',
        'title' => E::ts('Individual fields'),
        'extends' => 'Individual',
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 4,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-06-14 13:16:09',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Individual_fields_CustomField_Nationality',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Individual_fields',
        'name' => 'Nationality',
        'label' => E::ts('Nationality'),
        'data_type' => 'Country',
        'html_type' => 'Select',
        'is_required' => TRUE,
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'nationality_6',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'CustomField_Nationality',
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

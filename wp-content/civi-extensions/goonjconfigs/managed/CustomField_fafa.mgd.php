<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'CustomField_fafa',
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

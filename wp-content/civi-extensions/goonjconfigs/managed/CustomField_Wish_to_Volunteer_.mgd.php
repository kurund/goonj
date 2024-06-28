<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'CustomField_Wish_to_Volunteer_',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Volunteer_fields',
        'name' => 'Wish_to_Volunteer_',
        'label' => E::ts('Wish to Volunteer?'),
        'data_type' => 'Boolean',
        'html_type' => 'Radio',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'wish_to_volunteer__2',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Source_Tracking',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Source_Tracking',
        'title' => E::ts('Source Tracking'),
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 11,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-08-14 11:05:36',
        'is_public' => FALSE,
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Source_Tracking_CustomField_Medium',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Source_Tracking',
        'name' => 'Medium',
        'label' => E::ts('Medium'),
        'html_type' => 'Text',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'medium_95',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Source_Tracking_CustomField_Event',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Source_Tracking',
        'name' => 'Event',
        'label' => E::ts('Event'),
        'data_type' => 'EntityReference',
        'html_type' => 'Autocomplete-Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'event_96',
        'fk_entity' => 'Event',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

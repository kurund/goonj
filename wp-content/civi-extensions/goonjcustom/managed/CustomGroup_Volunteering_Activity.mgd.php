<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Volunteering_Activity',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Volunteering_Activity',
        'title' => E::ts('Volunteering Activity'),
        'extends' => 'Activity',
        'extends_entity_column_value' => [
          '64',
        ],
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 18,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-08-23 16:52:29',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Volunteering_Activity_CustomField_Collection_Camp',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Volunteering_Activity',
        'name' => 'Collection_Camp',
        'label' => E::ts('Collection Camp'),
        'data_type' => 'EntityReference',
        'html_type' => 'Autocomplete-Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'collection_camp_189',
        'fk_entity' => 'Eck_Collection_Camp',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Induction_Fields',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Induction_Fields',
        'title' => E::ts('Induction Fields'),
        'extends' => 'Activity',
        'extends_entity_column_value' => [
          '57',
        ],
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 10,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-07-18 00:01:45',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Induction_Fields_CustomField_Location',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Induction_Fields',
        'name' => 'Location',
        'label' => E::ts('Location'),
        'data_type' => 'EntityReference',
        'html_type' => 'Autocomplete-Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'location_60',
        'fk_entity' => 'Eck_Processing_Center',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Induction_Fields_Mode',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Induction_Fields_Mode',
        'title' => E::ts('Induction Fields :: Mode'),
        'data_type' => 'String',
        'is_reserved' => FALSE,
        'option_value_fields' => [
          'name',
          'label',
          'description',
        ],
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Induction_Fields_Mode_OptionValue_Proceesing_Unit',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Induction_Fields_Mode',
        'label' => E::ts('Processing Unit'),
        'value' => '3',
        'name' => 'Proceesing_Unit',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Induction_Fields_Mode_OptionValue_Online_only_selected_by_Urban_P',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Induction_Fields_Mode',
        'label' => E::ts('Online (only selected by Urban POC)'),
        'value' => '4',
        'name' => 'Online_only_selected_by_Urban_P',
        'description' => '',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Induction_Fields_Mode_OptionValue_Over_Call',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Induction_Fields_Mode',
        'label' => E::ts('Over Call'),
        'value' => '5',
        'name' => 'Over_Call',
        'description' => '',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Induction_Fields_CustomField_Mode',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Induction_Fields',
        'name' => 'Mode',
        'label' => E::ts('Induction Type'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'mode_61',
        'option_group_id.name' => 'Induction_Fields_Mode',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Induction_Fields_CustomField_Assign',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Induction_Fields',
        'name' => 'Assign',
        'label' => E::ts('Induction Taken By'),
        'data_type' => 'ContactReference',
        'html_type' => 'Autocomplete-Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'assign_252',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Induction_Fields_CustomField_Goonj_Office',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Induction_Fields',
        'name' => 'Goonj_Office',
        'label' => E::ts('Goonj Office'),
        'data_type' => 'EntityReference',
        'html_type' => 'Autocomplete-Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'goonj_office_249',
        'fk_entity' => 'Contact',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

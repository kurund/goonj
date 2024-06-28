<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Volunteer_fields_Volunteer_Skills',
        'title' => E::ts('Volunteer fields :: Volunteer Skills'),
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
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_Marketing',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('Marketing'),
        'value' => '1',
        'name' => 'Marketing',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_Content_Writing',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('Content Writing'),
        'value' => '2',
        'name' => 'Content_Writing',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_Social_Media_Handling',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('Social Media Handling'),
        'value' => '3',
        'name' => 'Social_Media_Handling',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomField_Volunteer_Skills',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Volunteer_fields',
        'name' => 'Volunteer_Skills',
        'label' => E::ts('Volunteer Skills'),
        'html_type' => 'Select',
        'weight' => 3,
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'volunteer_skills_4',
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'serialize' => 1,
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

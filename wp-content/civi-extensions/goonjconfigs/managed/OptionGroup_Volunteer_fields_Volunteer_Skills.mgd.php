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
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_Coordination',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('Coordination'),
        'value' => '5',
        'name' => 'Coordination',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_Data_Management',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('Data Management'),
        'value' => '6',
        'name' => 'Data Management',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_MS_Excel',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('MS Excel'),
        'value' => '7',
        'name' => 'MS Excel',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_Public_Speaking',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('Public Speaking'),
        'value' => '8',
        'name' => 'Public Speaking',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_Other',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('Other'),
        'value' => '4',
        'name' => 'Other',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Volunteer_Skills_OptionValue_Research',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Volunteer_Skills',
        'label' => E::ts('Research'),
        'value' => '9',
        'name' => 'Research',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
];

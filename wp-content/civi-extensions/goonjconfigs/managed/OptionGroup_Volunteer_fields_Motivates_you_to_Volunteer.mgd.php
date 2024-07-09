<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'OptionGroup_Volunteer_fields_Motivates_you_to_Volunteer',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Volunteer_fields_Motivates_you_to_Volunteer',
        'title' => E::ts('Volunteer fields :: Motivates you to Volunteer'),
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
    'name' => 'OptionGroup_Volunteer_fields_Motivates_you_to_Volunteer_OptionValue_Learn_new_skills',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Motivates_you_to_Volunteer',
        'label' => E::ts('Learn new skills'),
        'value' => '1',
        'name' => 'Learn_new_skills',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Motivates_you_to_Volunteer_OptionValue_Give_back_to_society',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Motivates_you_to_Volunteer',
        'label' => E::ts('Give back to society'),
        'value' => '2',
        'name' => 'Give_back_to_society',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Motivates_you_to_Volunteer_OptionValue_Use_my_skills',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Motivates_you_to_Volunteer',
        'label' => E::ts('Use my skills'),
        'value' => '3',
        'name' => 'Use_my_skills',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Motivates_you_to_Volunteer_OptionValue_Build_a_network',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Motivates_you_to_Volunteer',
        'label' => E::ts('Build a network'),
        'value' => '4',
        'name' => 'Build_a_network',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Motivates_you_to_Volunteer_OptionValue_Support_the_cause',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Motivates_you_to_Volunteer',
        'label' => E::ts('Support the cause'),
        'value' => '5',
        'name' => 'Support the cause',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Motivates_you_to_Volunteer_OptionValue_Effectively_use_Spare_time',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Motivates_you_to_Volunteer',
        'label' => E::ts('Effectively use Spare time'),
        'value' => '6',
        'name' => 'Effectively use Spare time',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
];

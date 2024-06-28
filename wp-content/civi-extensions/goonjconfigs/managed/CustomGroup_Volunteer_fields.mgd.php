<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Volunteer_fields',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Volunteer_fields',
        'title' => E::ts('Volunteer fields'),
        'extends' => 'Individual',
        'extends_entity_column_value' => [
          'Volunteer',
        ],
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 2,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-06-14 05:41:58',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Volunteer_fields_CustomField_Wish_to_Volunteer_',
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
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'title' => E::ts('Volunteer fields :: Which activities are you interested in?'),
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
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Raise_funds',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Raise funds'),
        'value' => '1',
        'name' => 'Raise_funds',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Connect_to_wholesalers',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Connect to wholesalers'),
        'value' => '2',
        'name' => 'Connect_to_wholesalers',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Explore_CSR',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Explore CSR'),
        'value' => '3',
        'name' => 'Explore_CSR',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Connect_us_to_schools',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Connect us to schools'),
        'value' => '4',
        'name' => 'Connect_us_to_schools',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Run_campaign',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Run campaign'),
        'value' => '5',
        'name' => 'Run_campaign',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Volunteer_fields_CustomField_Which_activities_are_you_interested_in_',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Volunteer_fields',
        'name' => 'Which_activities_are_you_interested_in_',
        'label' => E::ts('Which activities are you interested in?'),
        'html_type' => 'Select',
        'is_required' => TRUE,
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'which_activities_are_you_interes_3',
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'serialize' => 1,
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
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
    'name' => 'CustomGroup_Volunteer_fields_CustomField_Volunteer_Skills',
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

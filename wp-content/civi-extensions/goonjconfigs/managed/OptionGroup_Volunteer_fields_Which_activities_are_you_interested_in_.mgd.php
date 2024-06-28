<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
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
    'name' => 'CustomField_Which_activities_are_you_interested_in_',
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
        'weight' => 2,
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
];

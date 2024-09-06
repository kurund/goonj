<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'OptionGroup_activity_type_OptionValue_Induction',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'activity_type',
        'label' => E::ts('Induction'),
        'value' => '57',
        'name' => 'Induction',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],

  [
    'name' => 'OptionGroup_activity_type_OptionValue_Material_Contribution',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'activity_type',
        'label' => E::ts('Material Contribution'),
        'value' => '63',
        'name' => 'Material Contribution',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_activity_type_OptionValue_Volunteering',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'activity_type',
        'label' => E::ts('Volunteering'),
        'value' => '64',
        'name' => 'Volunteering',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_activity_type_OptionValue_Office_visit',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'activity_type',
        'label' => E::ts('Office visit'),
        'value' => '65',
        'name' => 'Office visit',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],

];

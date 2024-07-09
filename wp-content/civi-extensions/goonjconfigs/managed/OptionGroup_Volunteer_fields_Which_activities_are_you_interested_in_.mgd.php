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
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Connect_us_to_wholesalers_manufactures_and_retail_chains_for_bulk_materials_textile',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Connect us to wholesalers, manufactures and retail chains for bulk materials/textile'),
        'value' => '1',
        'name' => 'Connect us to wholesalers, manufactures and retail chains for bulk materials/textile',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Connect_us_to_schools_to_organise_sessions_stalls_exposure_visits_and_collection_drives',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Connect us to schools to organise sessions, stalls, exposure visits and collection drives'),
        'value' => '2',
        'name' => 'Connect us to schools to organise sessions, stalls, exposure visits and collection drives',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Run_a_campaign_in_your_school_to_collect_uniforms',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Run a campaign in your school to collect uniforms'),
        'value' => '3',
        'name' => 'Run a campaign in your school to collect uniforms',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Motivate_people_and_collect_One_Side_Used_Paper_and_Newspapers',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Motivate people and collect One Side Used Paper and Newspapers'),
        'value' => '4',
        'name' => 'Motivate people and collect One Side Used Paper and Newspapers',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Organise_sessions_around_menstruation_in_your_schools_colleges_residential_societies',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Organise sessions around menstruation in your schools, colleges, residential societies'),
        'value' => '5',
        'name' => 'Organise sessions around menstruation in your schools, colleges, residential societies',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Organize_Collection_drives_in_corporates_colleges_colonies_etc_',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Organize Collection drives in corporates, colleges, colonies etc.'),
        'value' => '6',
        'name' => 'Organize Collection drives in corporates, colleges, colonies etc.',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Join_Team_5000_a_group_of_people_who_have_a_strong_faith_in_our_work_and_contribute_regularly',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Join Team 5000, a  group of people who have a strong faith in our work and contribute regularly'),
        'value' => '7',
        'name' => 'Join Team 5000, a  group of people who have a strong faith in our work and contribute regularly',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Place_Goonj_donation_boxes_at_restaurants_malls_stores_retails_outlets',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Place Goonj donation boxes at restaurants, malls, stores, retails outlets'),
        'value' => '8',
        'name' => 'Place Goonj donation boxes at restaurants, malls, stores, retails outlets',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Set_up_Collection_Center',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Set up Collection Center'),
        'value' => '9',
        'name' => 'Set up Collection Center',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Raise_Funds_Promote_Fundraisers_for_Goonj',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Raise Funds /Promote Fundraisers for Goonj'),
        'value' => '10',
        'name' => 'Raise Funds /Promote Fundraisers for Goonj',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Explore_CSR_funds_from_corporates',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Explore CSR funds from corporates'),
        'value' => '11',
        'name' => 'Explore CSR funds from corporates',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Volunteer_fields_Which_activities_are_you_interested_in_OptionValue_Spread_Goonj_ki_Gullak_for_us_every_penny_matters',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Volunteer_fields_Which_activities_are_you_interested_in_',
        'label' => E::ts('Spread Goonj ki Gullak - for us, every penny matters'),
        'value' => '12',
        'name' => 'Spread Goonj ki Gullak - for us, every penny matters',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
];

<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Dropping_Centre',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Dropping_Centre',
        'title' => E::ts('Dropping Centre'),
        'extends' => 'Eck_Collection_Camp',
        'extends_entity_column_value' => [
          '2',
        ],
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 17,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-08-23 14:36:11',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Location',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Location',
        'label' => E::ts('Location'),
        'html_type' => 'Text',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'location_188',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_State',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'State',
        'label' => E::ts('State'),
        'data_type' => 'StateProvince',
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'state_201',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Reason_For_Unauthorize',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Dropping_Centre_Reason_For_Unauthorize',
        'title' => E::ts('Dropping Centre :: Reason For Unauthorize'),
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
    'name' => 'OptionGroup_Dropping_Centre_Reason_For_Unauthorize_OptionValue_Option_1',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Reason_For_Unauthorize',
        'label' => E::ts('Option 1'),
        'value' => '1',
        'name' => 'Option_1',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Reason_For_Unauthorize_OptionValue_Option_2',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Reason_For_Unauthorize',
        'label' => E::ts('Option 2'),
        'value' => '2',
        'name' => 'Option_2',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Reason_For_Unauthorize',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Reason_For_Unauthorize',
        'label' => E::ts('Reason For Unauthorize'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'reason_for_unauthorize_202',
        'option_group_id.name' => 'Dropping_Centre_Reason_For_Unauthorize',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Where_do_you_wish_to_open_dropping_center_Address_',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Where_do_you_wish_to_open_dropping_center_Address_',
        'label' => E::ts('Where do you wish to open dropping center (Address)?'),
        'html_type' => 'Text',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'where_do_you_wish_to_open_droppi_217',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Landmark_or_Near_by_area',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Landmark_or_Near_by_area',
        'label' => E::ts('Landmark or Near by area'),
        'html_type' => 'Text',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'landmark_or_near_by_area_218',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_When_do_you_wish_to_open_center_Date_',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'When_do_you_wish_to_open_center_Date_',
        'label' => E::ts('When do you wish to open center (Date)'),
        'data_type' => 'Date',
        'html_type' => 'Select Date',
        'text_length' => 255,
        'date_format' => 'mm/dd/yy',
        'time_format' => 1,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'when_do_you_wish_to_open_center__219',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_On_which_days_in_a_week_you_will_accept_material_',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'On_which_days_in_a_week_you_will_accept_material_',
        'label' => E::ts('On which days in a week you will accept material?'),
        'data_type' => 'Date',
        'html_type' => 'Select Date',
        'text_length' => 255,
        'date_format' => 'mm/dd/yy',
        'time_format' => 1,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'on_which_days_in_a_week_you_will_220',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone',
        'title' => E::ts('Dropping Centre :: Can we keep donation box in center? (For Monetary Contribution)'),
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
    'name' => 'OptionGroup_Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone_OptionValue_Yes',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone',
        'label' => E::ts('Yes'),
        'value' => '1',
        'name' => 'Yes',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone_OptionValue_No',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone',
        'label' => E::ts('No'),
        'value' => '2',
        'name' => 'No',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone_OptionValue_Not_Sure',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone',
        'label' => E::ts('Not Sure'),
        'value' => '3',
        'name' => 'Not_Sure',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Can_we_keep_donation_box_in_center_For_Monetary_Contribution_',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Can_we_keep_donation_box_in_center_For_Monetary_Contribution_',
        'label' => E::ts('Can we keep donation box in center? (For Monetary Contribution)'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'can_we_keep_donation_box_in_cent_221',
        'option_group_id.name' => 'Dropping_Centre_Can_we_keep_donation_box_in_center_For_Mone',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Will_your_dropping_center_be_open_for_gener',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Dropping_Centre_Will_your_dropping_center_be_open_for_gener',
        'title' => E::ts('Dropping Centre :: Will your dropping center be open for general public as well outside your society or institution?'),
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
    'name' => 'OptionGroup_Dropping_Centre_Will_your_dropping_center_be_open_for_gener_OptionValue_Yes',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Will_your_dropping_center_be_open_for_gener',
        'label' => E::ts('Yes'),
        'value' => '1',
        'name' => 'Yes',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Will_your_dropping_center_be_open_for_gener_OptionValue_No',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Will_your_dropping_center_be_open_for_gener',
        'label' => E::ts('No'),
        'value' => '2',
        'name' => 'No',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Will_your_dropping_center_be_open_for_general_public_as_well_out',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Will_your_dropping_center_be_open_for_general_public_as_well_out',
        'label' => E::ts('Will your dropping center be open for general public as well outside your society or institution?'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'will_your_dropping_center_be_ope_222',
        'option_group_id.name' => 'Dropping_Centre_Will_your_dropping_center_be_open_for_gener',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Some_volunteers_require_permission_letters_',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Dropping_Centre_Some_volunteers_require_permission_letters_',
        'title' => E::ts('Dropping Centre :: Some volunteers require permission letters from Goonj to get permission from authorities for Dropping Center. Do you need one too?'),
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
    'name' => 'OptionGroup_Dropping_Centre_Some_volunteers_require_permission_letters_OptionValue_Yes',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Some_volunteers_require_permission_letters_',
        'label' => E::ts('Yes'),
        'value' => '1',
        'name' => 'Yes',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Some_volunteers_require_permission_letters_OptionValue_No',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Some_volunteers_require_permission_letters_',
        'label' => E::ts('No'),
        'value' => '2',
        'name' => 'No',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Some_volunteers_require_permission_letters_from_Goonj_to_get_per',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Some_volunteers_require_permission_letters_from_Goonj_to_get_per',
        'label' => E::ts('Some volunteers require permission letters from Goonj to get permission from authorities for Dropping Center. Do you need one too?'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'some_volunteers_require_permissi_223',
        'option_group_id.name' => 'Dropping_Centre_Some_volunteers_require_permission_letters_',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_District_City',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'District_City',
        'label' => E::ts('District/ City'),
        'html_type' => 'Text',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'district_city_224',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Postal_Code',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Postal_Code',
        'label' => E::ts('Postal Code'),
        'html_type' => 'Text',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'postal_code_225',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Start_Time',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Start_Time',
        'label' => E::ts('Start Time'),
        'data_type' => 'Date',
        'html_type' => 'Select Date',
        'text_length' => 255,
        'date_format' => 'dd/mm/yy',
        'time_format' => 1,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'start_time_226',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_End_Time',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'End_Time',
        'label' => E::ts('End Time'),
        'data_type' => 'Date',
        'html_type' => 'Select Date',
        'text_length' => 255,
        'date_format' => 'mm/dd/yy',
        'time_format' => 1,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'end_time_227',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_You_wish_to_register_as',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Dropping_Centre_You_wish_to_register_as',
        'title' => E::ts('Dropping Centre :: You wish to register as'),
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
    'name' => 'OptionGroup_Dropping_Centre_You_wish_to_register_as_OptionValue_An_authority_from_the_society_R',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_You_wish_to_register_as',
        'label' => E::ts('An authority from the society / Residents Welfare Association (RWA)'),
        'value' => '1',
        'name' => 'An_authority_from_the_society_R',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_You_wish_to_register_as_OptionValue_A_Resident_of_the_society',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_You_wish_to_register_as',
        'label' => E::ts('A Resident of the society'),
        'value' => '2',
        'name' => 'A_Resident_of_the_society',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_You_wish_to_register_as_OptionValue_A_Corporate_organisation',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_You_wish_to_register_as',
        'label' => E::ts('A Corporate organisation'),
        'value' => '3',
        'name' => 'A_Corporate_organisation',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_You_wish_to_register_as_OptionValue_A_School',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_You_wish_to_register_as',
        'label' => E::ts('A School'),
        'value' => '4',
        'name' => 'A_School',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_You_wish_to_register_as_OptionValue_A_College_University',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_You_wish_to_register_as',
        'label' => E::ts('A College/University'),
        'value' => '5',
        'name' => 'A_College_University',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_You_wish_to_register_as_OptionValue_An_individual',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_You_wish_to_register_as',
        'label' => E::ts('An individual'),
        'value' => '6',
        'name' => 'An_individual',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_You_wish_to_register_as_OptionValue_Other',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_You_wish_to_register_as',
        'label' => E::ts('Other'),
        'value' => '7',
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
    'name' => 'CustomGroup_Dropping_Centre_CustomField_You_wish_to_register_as',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'You_wish_to_register_as',
        'label' => E::ts('You wish to register as'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'you_wish_to_register_as_228',
        'option_group_id.name' => 'Dropping_Centre_You_wish_to_register_as',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Reason_for_Closing_center',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Reason_for_Closing_center',
        'label' => E::ts('Reason for Closing center'),
        'html_type' => 'Text',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'reason_for_closing_center_230',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Closing_Date',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Closing_Date',
        'label' => E::ts('Closing Date'),
        'data_type' => 'Date',
        'html_type' => 'Select Date',
        'text_length' => 255,
        'date_format' => 'mm/dd/yy',
        'time_format' => 1,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'closing_date_231',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_If_temporary_closed_mention_date',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'If_temporary_closed_mention_date',
        'label' => E::ts('If temporary closed mention date'),
        'data_type' => 'Date',
        'html_type' => 'Select Date',
        'text_length' => 255,
        'date_format' => 'mm/dd/yy',
        'time_format' => 1,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'if_temporary_closed_mention_date_232',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Status',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Dropping_Centre_Status',
        'title' => E::ts('Dropping Centre :: Status'),
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
    'name' => 'OptionGroup_Dropping_Centre_Status_OptionValue_Active',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Status',
        'label' => E::ts('Active'),
        'value' => '1',
        'name' => 'Active',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Status_OptionValue_Temporary_Closed',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Status',
        'label' => E::ts('Temporary Closed'),
        'value' => '2',
        'name' => 'Temporary_Closed',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Dropping_Centre_Status_OptionValue_Parmanently_Closed',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Dropping_Centre_Status',
        'label' => E::ts('Parmanently Closed'),
        'value' => '3',
        'name' => 'Parmanently_Closed',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Dropping_Centre_CustomField_Status',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Dropping_Centre',
        'name' => 'Status',
        'label' => E::ts('Status'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'status_236',
        'option_group_id.name' => 'Dropping_Centre_Status',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

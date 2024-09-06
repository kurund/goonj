<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Collection_Camp_Core_Details',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Collection_Camp_Core_Details',
        'title' => E::ts('Collection Camp Core Details'),
        'extends' => 'Eck_Collection_Camp',
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 14,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-08-22 15:47:21',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Collection_Camp_Core_Details_CustomField_Contact_Id',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Collection_Camp_Core_Details',
        'name' => 'Contact_Id',
        'label' => E::ts('Initiator'),
        'data_type' => 'ContactReference',
        'html_type' => 'Autocomplete-Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'contact_id_146',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Status_Status',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Status_Status',
        'title' => E::ts('Status :: Status'),
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
    'name' => 'OptionGroup_Status_Status_OptionValue_Under_Authorization',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Status_Status',
        'label' => E::ts('Under Authorization'),
        'value' => 'unauthorized',
        'name' => 'Under_Authorization',
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
    'name' => 'OptionGroup_Status_Status_OptionValue_Authorized',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Status_Status',
        'label' => E::ts('Authorized'),
        'value' => 'authorized',
        'name' => 'Authorized',
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
    'name' => 'OptionGroup_Status_Status_OptionValue_Unauthorized',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Status_Status',
        'label' => E::ts('Unauthorized'),
        'value' => 'under_authorization',
        'name' => 'Unauthorized',
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
    'name' => 'CustomGroup_Collection_Camp_Core_Details_CustomField_Status',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Collection_Camp_Core_Details',
        'name' => 'Status',
        'label' => E::ts('Status'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'status_147',
        'option_group_id.name' => 'Status_Status',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Collection_Camp_Core_Details_CustomField_Authorizer',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Collection_Camp_Core_Details',
        'name' => 'Authorizer',
        'label' => E::ts('Modifier'),
        'data_type' => 'ContactReference',
        'html_type' => 'Autocomplete-Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'authorizer_150',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Collection_Camp_Core_Details_CustomField_Authorization_date',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Collection_Camp_Core_Details',
        'name' => 'Authorization_date',
        'label' => E::ts('Modified Date'),
        'data_type' => 'Date',
        'html_type' => 'Select Date',
        'text_length' => 255,
        'date_format' => 'dd/mm/yy',
        'time_format' => 1,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'authorization_date_151',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

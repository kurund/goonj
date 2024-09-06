<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Chapter_Contact_Group',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Chapter_Contact_Group',
        'title' => E::ts('Chapter Contact Group'),
        'extends' => 'Group',
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 21,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-09-05 19:59:25',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Chapter_Contact_Group_CustomField_Contact_Catchment',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Chapter_Contact_Group',
        'name' => 'Contact_Catchment',
        'label' => E::ts('Contact Catchment'),
        'data_type' => 'StateProvince',
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'contact_catchment_258',
        'serialize' => 1,
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Chapter_Contact_Group_Use_Case',
    'entity' => 'OptionGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Chapter_Contact_Group_Use_Case',
        'title' => E::ts('Chapter Contact Group :: Use Case'),
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
    'name' => 'OptionGroup_Chapter_Contact_Group_Use_Case_OptionValue_None',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Chapter_Contact_Group_Use_Case',
        'label' => E::ts('None'),
        'value' => 'none',
        'name' => 'None',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Chapter_Contact_Group_Use_Case_OptionValue_Chapter_Contacts',
    'entity' => 'OptionValue',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Chapter_Contact_Group_Use_Case',
        'label' => E::ts('Chapter Contacts'),
        'value' => 'chapter-contacts',
        'name' => 'Chapter_Contacts',
      ],
      'match' => [
        'option_group_id',
        'name',
        'value',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Chapter_Contact_Group_CustomField_Use_Case',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Chapter_Contact_Group',
        'name' => 'Use_Case',
        'label' => E::ts('Use Case'),
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'use_case_259',
        'option_group_id.name' => 'Chapter_Contact_Group_Use_Case',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Chapter_Contact_Group_CustomField_Fallback_Chapter',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Chapter_Contact_Group',
        'name' => 'Fallback_Chapter',
        'label' => E::ts('Fallback Chapter'),
        'data_type' => 'Boolean',
        'html_type' => 'Radio',
        'default_value' => '0',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'fallback_chapter_263',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

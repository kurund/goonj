<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Goonj_Office_Details',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Goonj_Office_Details',
        'title' => E::ts('Goonj Office Details'),
        'extends' => 'Organization',
        'extends_entity_column_value' => [
          'Goonj_Office',
        ],
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 12,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-08-16 16:14:29',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Goonj_Office_Details_CustomField_Collection_Camp_Catchment',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Goonj_Office_Details',
        'name' => 'Collection_Camp_Catchment',
        'label' => E::ts('Collection Camp Catchment'),
        'data_type' => 'StateProvince',
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'collection_camp_catchment_100',
        'serialize' => 1,
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Goonj_Office_Details_CustomField_Induction_Catchment',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Goonj_Office_Details',
        'name' => 'Induction_Catchment',
        'label' => E::ts('Induction Catchment'),
        'data_type' => 'StateProvince',
        'html_type' => 'Select',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'induction_catchment_253',
        'serialize' => 1,
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Goonj_Office_Details_CustomField_Days_for_Induction',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Goonj_Office_Details',
        'name' => 'Days_for_Induction',
        'label' => E::ts('Days for Induction'),
        'data_type' => 'Memo',
        'html_type' => 'RichTextEditor',
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'days_for_induction_254',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

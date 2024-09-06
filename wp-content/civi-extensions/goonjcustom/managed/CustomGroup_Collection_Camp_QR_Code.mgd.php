<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Collection_Camp_QR_Code',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Collection_Camp_QR_Code',
        'title' => E::ts('Collection Camp QR Code'),
        'extends' => 'Eck_Collection_Camp',
        'extends_entity_column_value' => [
          '1',
        ],
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 22,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-09-05 17:51:13',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Collection_Camp_QR_Code_CustomField_QR_Code',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Collection_Camp_QR_Code',
        'name' => 'QR_Code',
        'label' => E::ts('QR Code'),
        'data_type' => 'File',
        'html_type' => 'File',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'qr_code_256',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Contact_QR_Code',
    'entity' => 'CustomGroup',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Contact_QR_Code',
        'title' => E::ts('Contact QR Code'),
        'style' => 'Inline',
        'help_pre' => '',
        'help_post' => '',
        'weight' => 20,
        'collapse_adv_display' => TRUE,
        'created_date' => '2024-09-02 00:49:38',
        'icon' => '',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Contact_QR_Code_CustomField_QR_Code',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Contact_QR_Code',
        'name' => 'QR_Code',
        'label' => E::ts('QR Code'),
        'data_type' => 'File',
        'html_type' => 'File',
        'text_length' => 255,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'qr_code_215',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

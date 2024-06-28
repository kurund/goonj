<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'CustomField_Engagement_Date',
    'entity' => 'CustomField',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Contact_Fields',
        'name' => 'Engagement_Date',
        'label' => E::ts('Engagement Date'),
        'data_type' => 'Date',
        'html_type' => 'Select Date',
        'is_required' => TRUE,
        'text_length' => 255,
        'date_format' => 'dd/mm/yy',
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'engagement_date_5',
      ],
      'match' => [
        'name',
        'custom_group_id',
      ],
    ],
  ],
];

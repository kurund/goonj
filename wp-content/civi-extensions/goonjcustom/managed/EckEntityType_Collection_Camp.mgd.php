<?php
use CRM_Goonjcustom_ExtensionUtil as E;

return [
  [
    'name' => 'EckEntityType_Collection_Camp',
    'entity' => 'EckEntityType',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Collection_Camp',
        'label' => E::ts('Collection Camp'),
        'in_recent' => FALSE,
      ],
      'match' => [
        'name',
      ],
    ],
  ],
];

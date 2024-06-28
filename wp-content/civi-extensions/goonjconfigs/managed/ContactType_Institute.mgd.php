<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'ContactType_Institute',
    'entity' => 'ContactType',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Institute',
        'label' => E::ts('Institute'),
        'parent_id.name' => 'Organization',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
];

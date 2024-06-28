<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'ContactType_Organization',
    'entity' => 'ContactType',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Organization',
        'label' => E::ts('Organization'),
        'icon' => 'fa-building',
        'is_reserved' => TRUE,
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'ContactType_Organization_ContactType_Institute',
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

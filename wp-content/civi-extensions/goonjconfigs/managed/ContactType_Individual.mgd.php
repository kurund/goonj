<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'ContactType_Individual',
    'entity' => 'ContactType',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Individual',
        'label' => E::ts('Individual'),
        'icon' => 'fa-user',
        'is_reserved' => TRUE,
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'ContactType_Individual_ContactType_Volunteer',
    'entity' => 'ContactType',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Volunteer',
        'label' => E::ts('Volunteer'),
        'parent_id.name' => 'Individual',
      ],
      'match' => [
        'name',
      ],
    ],
  ],
];

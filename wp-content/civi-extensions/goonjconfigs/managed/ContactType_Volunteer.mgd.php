<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  [
    'name' => 'ContactType_Volunteer',
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

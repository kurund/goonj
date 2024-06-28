<?php
use CRM_Goonjconfigs_ExtensionUtil as E;

return [
  'type' => 'form',
  'title' => E::ts('Volunteer Registration'),
  'icon' => 'fa-list-alt',
  'server_route' => 'civicrm/contributor',
  'is_public' => TRUE,
  'permission' => [
    '*always allow*',
  ],
  'redirect' => 'https://civicrm.test/success/',
  'create_submission' => TRUE,
];

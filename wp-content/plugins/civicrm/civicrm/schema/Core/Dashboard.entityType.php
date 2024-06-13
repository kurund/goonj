<?php

return [
  'name' => 'Dashboard',
  'table' => 'civicrm_dashboard',
  'class' => 'CRM_Core_DAO_Dashboard',
  'getInfo' => fn() => [
    'title' => ts('Dashboard'),
    'title_plural' => ts('Dashboards'),
    'description' => ts('Table to store dashboard.'),
    'add' => '3.1',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => ts('DashletID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'add' => '3.1',
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'domain_id' => [
      'title' => ts('Domain ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'required' => TRUE,
      'description' => ts('Domain for dashboard'),
      'add' => '3.1',
      'input_attrs' => [
        'label' => ts('Domain'),
      ],
      'pseudoconstant' => [
        'table' => 'civicrm_domain',
        'key_column' => 'id',
        'label_column' => 'name',
      ],
      'entity_reference' => [
        'entity' => 'Domain',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'name' => [
      'title' => ts('Dashlet Name'),
      'sql_type' => 'varchar(64)',
      'input_type' => 'Text',
      'description' => ts('Internal name of dashlet.'),
      'add' => '4.4',
      'input_attrs' => [
        'maxlength' => 64,
      ],
    ],
    'label' => [
      'title' => ts('Dashlet Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'localizable' => TRUE,
      'description' => ts('dashlet title'),
      'add' => '3.1',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'url' => [
      'title' => ts('Dashlet URL'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('url in case of external dashlet'),
      'add' => '3.1',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'permission' => [
      'title' => ts('Dashlet Permission'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Permission for the dashlet'),
      'add' => '3.1',
      'serialize' => CRM_Core_DAO::SERIALIZE_COMMA,
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'permission_operator' => [
      'title' => ts('Dashlet Permission Operator'),
      'sql_type' => 'varchar(3)',
      'input_type' => 'Select',
      'description' => ts('Permission Operator'),
      'add' => '3.1',
      'input_attrs' => [
        'maxlength' => 3,
      ],
      'pseudoconstant' => [
        'callback' => 'CRM_Core_SelectValues::andOr',
      ],
    ],
    'fullscreen_url' => [
      'title' => ts('Fullscreen URL'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('fullscreen url for dashlet'),
      'add' => '3.4',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
    'is_active' => [
      'title' => ts('Is Dashlet Active?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this dashlet active?'),
      'add' => '3.1',
      'default' => FALSE,
      'input_attrs' => [
        'label' => ts('Enabled'),
      ],
    ],
    'is_reserved' => [
      'title' => ts('Is Dashlet Reserved?'),
      'sql_type' => 'boolean',
      'input_type' => 'CheckBox',
      'required' => TRUE,
      'description' => ts('Is this dashlet reserved?'),
      'add' => '3.1',
      'default' => FALSE,
    ],
    'cache_minutes' => [
      'title' => ts('Cache Minutes'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => ts('Number of minutes to cache dashlet content in browser localStorage.'),
      'add' => '4.7',
      'default' => 60,
    ],
    'directive' => [
      'title' => ts('Angular directive'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => ts('Element name of angular directive to invoke (lowercase hyphenated format)'),
      'add' => '5.33',
      'input_attrs' => [
        'maxlength' => 255,
      ],
    ],
  ],
];

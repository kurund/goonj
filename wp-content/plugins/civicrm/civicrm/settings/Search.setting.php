<?php
/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 */
/*
 * Settings metadata file
 */
$optimizationSeeAlso = '<br/>' . ts('See also: <a href="%1">Search Optimization</a>', [1 => 'https://docs.civicrm.org/sysadmin/en/latest/setup/optimizations/" target="_blank"']);
$searchConfigSeeAlso = '<br/>' . ts('See also: <a %1>Search Configuration Options</a>', [1 => 'https://docs.civicrm.org/en/user/latest/initial-set-up/customizing-the-user-interface/#customizing-search-preferences" target="_blank"']);
return [
  'search_autocomplete_count' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'search_autocomplete_count',
    'type' => 'Integer',
    'quick_form_type' => 'Element',
    'html_type' => 'number',
    'default' => 15,
    'add' => '4.3',
    'title' => ts('Autocomplete Results'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('The maximum number of contacts to show at a time when typing in an autocomplete field.'),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 150]],
  ],
  'includeOrderByClause' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'includeOrderByClause',
    'type' => 'Boolean',
    'quick_form_type' => 'YesNo',
    'default' => 1,
    'add' => '4.6',
    'title' => ts('Include Order By Clause'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('If disabled, the search results will not be ordered. This may improve response time on search results on large datasets.'),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 60]],
  ],
  'includeWildCardInName' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'includeWildCardInName',
    'type' => 'Boolean',
    'quick_form_type' => 'YesNo',
    'default' => 1,
    'add' => '4.6',
    'title' => ts('Automatic Wildcard'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts("If enabled, wildcards are automatically added to the beginning AND end of the search term when users search for contacts by Name. EXAMPLE: Searching for 'ada' will return any contact whose name includes those letters - e.g. 'Adams, Janet', 'Nadal, Jorge', etc. If disabled, a wildcard is added to the end of the search term only. EXAMPLE: Searching for 'ada' will return any contact whose last name begins with those letters - e.g. 'Adams, Janet' but NOT 'Nadal, Jorge'. Disabling this feature will speed up search significantly for larger databases, but users must manually enter wildcards ('%' or '_') to the beginning of the search term if they want to find all records which contain those letters. EXAMPLE: '%ada' will return 'Nadal, Jorge'."),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 10]],
  ],
  'includeEmailInName' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'includeEmailInName',
    'type' => 'Boolean',
    'quick_form_type' => 'YesNo',
    'default' => 1,
    'add' => '4.6',
    'title' => ts('Include Email'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('If enabled, email addresses are automatically included when users search by Name. Disabling this feature will speed up search significantly for larger databases, but users will need to use the Email search fields (from Advanced Search, Search Builder, or Profiles) to find contacts by email address.'),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 20]],
  ],
  'includeNickNameInName' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'includeNickNameInName',
    'type' => 'Boolean',
    'quick_form_type' => 'YesNo',
    'default' => 0,
    'add' => '4.6',
    'title' => ts('Include Nickname'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('If enabled, nicknames are automatically included when users search by Name.'),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 40]],
  ],
  'includeAlphabeticalPager' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'includeAlphabeticalPager',
    'type' => 'Boolean',
    'quick_form_type' => 'YesNo',
    'default' => 1,
    'add' => '4.6',
    'title' => ts('Include Alphabetical Pager'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('If disabled, the alphabetical pager will not be displayed on the search screens. This will improve response time on search results on large datasets.'),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 50]],
  ],
  'smartGroupCacheTimeout' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'smartGroupCacheTimeout',
    'type' => 'Integer',
    'quick_form_type' => 'Element',
    'html_type' => 'number',
    'default' => 5,
    'add' => '4.6',
    'title' => ts('Smart group cache timeout'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('The number of minutes to cache smart group contacts. The best value will depend on your site and the complexity of the groups and acls you use. A value of zero means no caching at all. You may need to experiment with this.') . $optimizationSeeAlso,
    'help_text' => '',
    'settings_pages' => ['search' => ['weight' => 80]],
  ],
  'defaultSearchProfileID' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'defaultSearchProfileID',
    'type' => 'Integer',
    'quick_form_type' => 'Select',
    'html_type' => 'Select',
    'html_attributes' => [
      'class' => 'crm-select2',
    ],
    'pseudoconstant' => [
      'callback' => 'CRM_Admin_Form_Setting_Search::getAvailableProfiles',
    ],
    'default' => NULL,
    'add' => '4.6',
    'title' => ts('Default Contact Search Profile'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('If set, this will be the default profile used for contact search.'),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 70]],
  ],
  'prevNextBackend' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'prevNextBackend',
    'type' => 'String',
    'quick_form_type' => 'Select',
    'html_type' => 'Select',
    'html_attributes' => [
      //'class' => 'crm-select2',
    ],
    'default' => 'default',
    'add' => '5.9',
    'title' => ts('PrevNext Cache'),
    'is_domain' => 1,
    'is_contact' => 0,
    'pseudoconstant' => [
      'callback' => 'CRM_Core_BAO_PrevNextCache::getPrevNextBackends',
    ],
    'description' => ts('When performing a search, how should the search-results be cached?'),
    'help_text' => '',
    // Not exposed in UI as breakage possible. As with the SmartGroupCache time out a different page
    // might make more sense.
    'settings_pages' => [],
  ],
  'searchPrimaryDetailsOnly' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'searchPrimaryDetailsOnly',
    'type' => 'Boolean',
    'quick_form_type' => 'YesNo',
    'default' => 1,
    'add' => '4.7',
    'title' => ts('Search Primary Details Only'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('If enabled, only primary details (eg contact\'s primary email, phone, etc) will be included in Basic and Advanced Search results. Disabling this feature will allow users to match contacts using any email, phone etc detail.'),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 30]],
  ],
  'quicksearch_options' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'quicksearch_options',
    'type' => 'Array',
    'html_type' => 'checkboxes',
    'sortable' => TRUE,
    'pseudoconstant' => [
      'callback' => 'CRM_Core_SelectValues::quicksearchOptions',
    ],
    'default' => [
      'sort_name',
      'id',
      'external_identifier',
      'first_name',
      'last_name',
      'email_primary.email',
      'phone_primary.phone_numeric',
      'address_primary.street_address',
      'address_primary.city',
      'address_primary.postal_code',
      'job_title',
    ],
    'add' => '5.8',
    'title' => ts('Quicksearch options'),
    'is_domain' => '1',
    'is_contact' => 0,
    'description' => ts("Which fields can be searched on in the menubar quicksearch box?"),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 90]],
  ],
  'default_pager_size' => [
    'group_name' => 'Search Preferences',
    'group' => 'Search Preferences',
    'name' => 'default_pager_size',
    'type' => 'Integer',
    'quick_form_type' => 'Element',
    'html_type' => 'text',
    'html_attributes' => [
      'size' => 2,
      'maxlength' => 3,
    ],
    'default' => 50,
    'add' => '5.39',
    'title' => ts('Default Search Pager size'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts('What is the default number of records to show on a search'),
    'help_text' => NULL,
    'settings_pages' => ['search' => ['weight' => 120]],
  ],

];

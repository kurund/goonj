<?php
use CRM_CivicrmAdminUi_ExtensionUtil as E;

// Temporary check can be removed when moving this file to the civi_event extension.
if (!CRM_Core_Component::isEnabled('CiviEvent')) {
  return [];
}

return [
  [
    'name' => 'SavedSearch_Contact_Summary_Events',
    'entity' => 'SavedSearch',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Contact_Summary_Events',
        'label' => E::ts('Contact Summary Events'),
        'api_entity' => 'Participant',
        'api_params' => [
          'version' => 4,
          'select' => [
            'event_id.title',
            'fee_level',
            'fee_amount',
            'register_date',
            'Participant_Event_event_id_01.start_date',
            'Participant_Event_event_id_01.end_date',
            'status_id:label',
            'contact_id.sort_name',
            'role_id:label',
          ],
          'orderBy' => [],
          'where' => [],
          'groupBy' => [],
          'join' => [
            [
              'Event AS Participant_Event_event_id_01',
              'LEFT',
              [
                'event_id',
                '=',
                'Participant_Event_event_id_01.id',
              ],
            ],
            [
              'Contact AS Participant_Contact_contact_id_01',
              'LEFT',
              [
                'contact_id',
                '=',
                'Participant_Contact_contact_id_01.id',
              ],
            ],
          ],
          'having' => [],
        ],
      ],
      'match' => [
        'name',
      ],
    ],
  ],
  [
    'name' => 'SavedSearch_Contact_Summary_Events_SearchDisplay_Contact_Summary_Events_Tab',
    'entity' => 'SearchDisplay',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Contact_Summary_Events_Tab',
        'label' => E::ts('Contact Summary Events Tab'),
        'saved_search_id.name' => 'Contact_Summary_Events',
        'type' => 'table',
        'settings' => [
          'description' => NULL,
          'sort' => [
            [
              'register_date',
              'DESC',
            ],
          ],
          'limit' => 50,
          'pager' => [
            'show_count' => TRUE,
            'expose_limit' => TRUE,
            'hide_single' => TRUE,
          ],
          'placeholder' => 5,
          'columns' => [
            [
              'type' => 'html',
              'key' => 'event_id.title',
              'dataType' => 'String',
              'label' => E::ts('Event'),
              'sortable' => TRUE,
              'rewrite' => '[event_id.title]',
            ],
            [
              'type' => 'field',
              'key' => 'fee_level',
              'dataType' => 'Text',
              'label' => E::ts('Fee level'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'fee_amount',
              'dataType' => 'Money',
              'label' => E::ts('Amount'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'register_date',
              'dataType' => 'Timestamp',
              'label' => E::ts('Registered'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'html',
              'key' => 'Participant_Event_event_id_01.start_date',
              'dataType' => 'Timestamp',
              'label' => E::ts('Event Date(s)'),
              'sortable' => TRUE,
              'rewrite' => '[Participant_Event_event_id_01.start_date] -<br> [Participant_Event_event_id_01.end_date]',
            ],
            [
              'type' => 'field',
              'key' => 'status_id:label',
              'dataType' => 'Integer',
              'label' => E::ts('Status'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'role_id:label',
              'dataType' => 'String',
              'label' => E::ts('Participant Role'),
              'sortable' => TRUE,
            ],
            [
              'text' => '',
              'style' => 'default',
              'size' => 'btn-xs',
              'icon' => 'fa-bars',
              'links' => [
                [
                  'entity' => 'Participant',
                  'action' => 'view',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-ticket',
                  'text' => E::ts('View'),
                  'style' => 'default',
                  'path' => '',
                  'task' => '',
                  'condition' => [],
                ],
                [
                  'entity' => 'Participant',
                  'action' => 'update',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-pencil',
                  'text' => E::ts('Edit'),
                  'style' => 'default',
                  'path' => '',
                  'task' => '',
                  'condition' => [],
                ],
                [
                  'entity' => 'Participant',
                  'action' => 'detach',
                  'icon' => 'fa-random',
                  'text' => E::ts('Transfer or Cancel'),
                  'style' => 'default',
                  'condition' => [
                    'status_id:name',
                    'NOT IN',
                    ['Cancelled', 'Transferred'],
                  ],
                  'task' => '',
                  'join' => '',
                  'target' => 'crm-popup',
                ],
                [
                  'entity' => 'Participant',
                  'action' => 'delete',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-trash',
                  'text' => E::ts('Delete'),
                  'style' => 'danger',
                  'path' => '',
                  'task' => '',
                  'condition' => [],
                ],
                [
                  'icon' => 'fa-calendar',
                  'text' => E::ts('View Event Info'),
                  'style' => 'default',
                  'condition' => [],
                  'task' => '',
                  'entity' => 'Event',
                  'action' => 'view',
                  'join' => 'Participant_Event_event_id_01',
                ],
                [
                  'path' => 'civicrm/event/search?reset=1&force=1&event=[event_id]',
                  'icon' => 'fa-search',
                  'text' => E::ts('View Participants'),
                  'style' => 'default',
                  'condition' => [],
                  'task' => '',
                  'entity' => '',
                  'action' => '',
                  'join' => '',
                ],
              ],
              'type' => 'menu',
              'alignment' => 'text-right',
            ],
          ],
          'actions' => FALSE,
          'classes' => [
            'table',
            'table-striped',
          ],
          'toolbar' => [
            [
              'entity' => 'Participant',
              'text' => E::ts('Add Event Registration'),
              'icon' => 'fa-plus',
              'target' => 'crm-popup',
              'action' => 'add',
              'style' => 'default',
              'join' => '',
              'task' => '',
            ],
          ],
        ],
      ],
      'match' => [
        'saved_search_id',
        'name',
      ],
    ],
  ],
];

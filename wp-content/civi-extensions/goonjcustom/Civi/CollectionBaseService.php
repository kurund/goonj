<?php

namespace Civi;

use Civi\Api4\CustomField;
use Civi\Api4\CustomGroup;
use Civi\Api4\Group;
use Civi\Api4\GroupContact;
use Civi\Core\Service\AutoSubscriber;

/**
 *
 */
class CollectionBaseService extends AutoSubscriber {

  const ENTITY_NAME = 'Collection_Camp';
  const INTENT_CUSTOM_GROUP_NAME = 'Collection_Camp_Intent_Details';

  /**
   *
   */
  public static function getSubscribedEvents() {
    return [
      '&hook_civicrm_tabset' => 'collectionBaseTabset',
      '&hook_civicrm_selectWhereClause' => 'aclCollectionCamp',
    ];
  }

  /**
   *
   */
  public static function collectionBaseTabset($tabsetName, &$tabs, $context) {
    if ($tabsetName !== 'civicrm/eck/entity' || empty($context) || $context['entity_type']['name'] !== self::ENTITY_NAME) {
      return;
    }

    // URL for the Contribution tab.
    $contributionUrl = \CRM_Utils_System::url(
          "wp-admin/admin.php?page=CiviCRM&q=civicrm%2Fcollection-camp%2Fmaterial-contributions",
    );

    // Add the Contribution tab.
    $tabs['contribution'] = [
      'title' => ts('Contribution'),
      'link' => $contributionUrl,
      'valid' => 1,
      'active' => 1,
      'current' => FALSE,
    ];
  }

  /**
   *
   */
  public static function aclCollectionCamp($entity, &$clauses, $userId, $conditions) {
    if ($entity !== 'Eck_Collection_Camp') {
      return;
    }

    $teamGroupContacts = GroupContact::get(FALSE)
      ->addSelect('group_id')
      ->addWhere('contact_id', '=', $userId)
      ->addWhere('status', '=', 'Added')
      ->addWhere('group_id.Chapter_Contact_Group.Use_Case', '=', 'chapter-team')
      ->execute();

    $teamGroupContact = $teamGroupContacts->first();

    if (!$teamGroupContact) {
      \Civi::log()->debug('no chapter team group found for user: ' . $userId);

      return;
    }

    $groupId = $teamGroupContact['group_id'];

    $chapterGroups = Group::get(FALSE)
      ->addSelect('Chapter_Contact_Group.States_controlled')
      ->addWhere('id', '=', $groupId)
      ->execute();

    $group = $chapterGroups->first();
    $statesControlled = $group['Chapter_Contact_Group.States_controlled'];

    if (empty($statesControlled)) {
      // Handle the case when the group is not controlling any state.
      return;
    }

    $statesControlled = array_unique($statesControlled);
    $statesList = implode(',', array_map('intval', $statesControlled));

    $stateField = self::getStateFieldDbDetails();

    $clauseString = sprintf(
      'IN (SELECT entity_id FROM `%1$s` WHERE `%2$s` IN (%3$s))',
      $stateField['tableName'],
      $stateField['columnName'],
     $statesList,
    );

    $clauses['id'][] = $clauseString;
  }

  /**
   *
   */
  private static function getStateFieldDbDetails() {
    $customGroups = CustomGroup::get(FALSE)
      ->addSelect('table_name')
      ->addWhere('name', '=', self::INTENT_CUSTOM_GROUP_NAME)
      ->execute();

    $customGroup = $customGroups->first();
    $tableName = $customGroup['table_name'];

    $customFields = CustomField::get(FALSE)
      ->addSelect('column_name')
      ->addWhere('custom_group_id:name', '=', self::INTENT_CUSTOM_GROUP_NAME)
      ->addWhere('name', '=', 'state')
      ->execute();

    $customField = $customFields->first();
    $columnName = $customField['column_name'];

    return [
      'tableName' => $tableName,
      'columnName' => $columnName,
    ];

  }

}

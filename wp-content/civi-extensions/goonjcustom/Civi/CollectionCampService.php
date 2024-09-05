<?php

namespace Civi;

use Civi\Api4\Contact;
use Civi\Api4\CustomField;
use Civi\Api4\EckEntity;
use Civi\Api4\Relationship;
use Civi\Api4\StateProvince;
use Civi\Core\Service\AutoSubscriber;

/**
 *
 */
class CollectionCampService extends AutoSubscriber {

  const AUTHORIZED_TEMPLATE_ID_COLLECTION_CAMP = 78;
  const AUTHORIZED_TEMPLATE_ID_DROPPING_CENTER = 83;
  const UNAUTHORIZED_TEMPLATE_ID_COLLECTION_CAMP = 77;
  const UNAUTHORIZED_TEMPLATE_ID_DROPPING_CENTER = 82;
  const FALLBACK_OFFICE_NAME = 'Delhi';
  const RELATIONSHIP_TYPE_NAME = 'Collection Camp Coordinator is';

  /**
   *
   */
  public static function getSubscribedEvents() {
    return [
      '&hook_civicrm_post' => [
        ['generateCollectionCampCode'],
        ['assignContactToGroup'],
      ],
      '&hook_civicrm_pre' => [
        ['handleAuthorizationEmails'],
        ['generateCollectionCampQr'],
      ],
      '&hook_civicrm_custom' => 'setOfficeDetails',
    ];
  }

  /**
   * This hook is called after a db write on entities.
   *
   * @param string $op
   *   The type of operation being performed.
   * @param string $objectName
   *   The name of the object.
   * @param int $objectId
   *   The unique identifier for the object.
   * @param object $objectRef
   *   The reference to the object.
   */
  public static function generateCollectionCampCode(string $op, string $objectName, int $objectId, &$objectRef) {
    // Check if the object name is 'AfformSubmission'.
    if ($objectName !== 'AfformSubmission') {
      return;
    }

    // Extract the 'data' field.
    $data = $objectRef->data;
    $decodedData = json_decode($data, TRUE);

    // Check if 'Eck_Collection_Camp1' exists.
    $collectionCampEntries = $decodedData['Eck_Collection_Camp1'] ?? [];
    if (empty($collectionCampEntries)) {
      return;
    }

    foreach ($collectionCampEntries as $entry) {
      $collectionCampData = $entry['fields'] ?? NULL;

      // Access the subtype.
      $subtypeId = $collectionCampData['subtype'] ?? NULL;
      if ($subtypeId === NULL) {
        continue;
      }

      // Access the id within the decoded data.
      $campId = $collectionCampData['id'] ?? NULL;
      if ($campId === NULL) {
        continue;
      }

      // Fetch the collection camp details.
      $collectionCamps = EckEntity::get('Collection_Camp', FALSE)
        ->addWhere('id', '=', $campId)
        ->setLimit(1)
        ->execute();

      if (empty($collectionCamps)) {
        continue;
      }

      $collectionCampsCreatedDate = $collectionCamps->first()['created_date'] ?? NULL;

      // Get the year.
      $year = date('Y', strtotime($collectionCampsCreatedDate));

      // Fetch the state ID.
      $stateId = self::getStateIdForSubtype($collectionCampData, $subtypeId);

      if (!$stateId) {
        continue;
      }

      // Fetch the state abbreviation.
      $stateProvinces = StateProvince::get(FALSE)
        ->addWhere('id', '=', $stateId)
        ->setLimit(1)
        ->execute();

      if (empty($stateProvinces)) {
        continue;
      }

      $stateAbbreviation = $stateProvinces->first()['abbreviation'] ?? NULL;

      if (!$stateAbbreviation) {
        continue;
      }

      // Fetch the Goonj-specific state code.
      $config = self::getConfig();
      $stateCode = $config['state_codes'][$stateAbbreviation] ?? 'UNKNOWN';

      // Get the current event title.
      $currentTitle = $collectionCampData['title'] ?? 'Collection Camp';

      // Fetch the event code.
      $eventCode = $config['event_codes'][$currentTitle] ?? 'UNKNOWN';

      // Count existing camps for the state and year with the same event code.
      $existingCamps = EckEntity::get('Collection_Camp', FALSE)
        ->addSelect('title')
        ->addWhere('title', 'LIKE', "$year/$stateCode/$eventCode/%")
        ->execute();

      $serialNumber = sprintf('%03d', $existingCamps->count() + 1);

      // Modify the title to include the year, state code, event code, and serial number.
      $newTitle = $year . '/' . $stateCode . '/' . $eventCode . '/' . $serialNumber;
      $collectionCampData['title'] = $newTitle;

      // Save the updated title back to the Collection Camp entity.
      EckEntity::update('Collection_Camp')
        ->addWhere('id', '=', $campId)
        ->addValue('title', $newTitle)
        ->execute();
    }
  }

  /**
   *
   */
  private static function getConfig() {
    // Get the path to the CiviCRM extensions directory.
    $extensionsDir = \CRM_Core_Config::singleton()->extensionsDir;

    // Relative path to the extension's config directory.
    $extensionPath = $extensionsDir . 'goonjcustom/config/';

    // Include and return the configuration files.
    return [
      'state_codes' => include $extensionPath . 'constants.php',
      'event_codes' => include $extensionPath . 'eventCode.php',
    ];
  }

  /**
   *
   */
  public static function getStateIdForSubtype(array $collectionCampData, int $subtypeId): ?int {
    // Subtype for 'Dropping Centre'.
    if ($subtypeId === 5) {
      return $collectionCampData['Dropping_Centre.State'] ?? NULL;
    }
    return $collectionCampData['Collection_Camp_Intent_Details.State'] ?? NULL;
  }

  /**
   * This hook is called after a db write on entities.
   *
   * @param string $op
   *   The type of operation being performed.
   * @param string $objectName
   *   The name of the object.
   * @param int $objectId
   *   The unique identifier for the object.
   * @param object $objectRef
   *   The reference to the object.
   */
  public static function handleAuthorizationEmails(string $op, string $objectName, $objectId, &$objectRef) {
    if ($objectName != 'Eck_Collection_Camp' || !$objectId) {
      return;
    }

    $newStatus = $objectRef['Collection_Camp_Core_Details.Status'] ?? '';
    $subType = $objectRef['subtype'] ?? '';

    if (!$newStatus) {
      return;
    }

    $collectionCamps = EckEntity::get('Collection_Camp', FALSE)
      ->addSelect('Collection_Camp_Core_Details.Status', 'Collection_Camp_Core_Details.Contact_Id')
      ->addWhere('id', '=', $objectId)
      ->execute();

    $currentCollectionCamp = $collectionCamps->first();
    $currentStatus = $currentCollectionCamp['Collection_Camp_Core_Details.Status'];
    $contactId = $currentCollectionCamp['Collection_Camp_Core_Details.Contact_Id'];

    // Check for status change.
    if ($currentStatus !== $newStatus) {
      if ($newStatus === 'authorized') {
        self::sendAuthorizationEmail($contactId, $subType);
      }
      elseif ($newStatus === 'unauthorized') {
        self::sendUnAuthorizationEmail($contactId, $subType);
      }
    }
  }

  /**
   * Send Authorization Email to contact.
   */
  private static function sendAuthorizationEmail($contactId, $subType) {
    try {
      // Determine the template based on dynamic subtype.
      $templateId = $subType == 4 ? self::AUTHORIZED_TEMPLATE_ID_COLLECTION_CAMP : ($subType == 5 ? self::AUTHORIZED_TEMPLATE_ID_DROPPING_CENTER : NULL);

      if (!$templateId) {
        return;
      }

      $emailParams = [
        'contact_id' => $contactId,
      // Template ID for the authorization email.
        'template_id' => $templateId,
      ];

      $result = civicrm_api3('Email', 'send', $emailParams);

    }
    catch (\CiviCRM_API3_Exception $ex) {
      error_log("Exception caught while sending authorization email: " . $ex->getMessage());
    }
  }

  /**
   * Send UnAuthorization Email to contact.
   */
  private static function sendUnAuthorizationEmail($contactId, $subType) {
    try {
      // Determine the template based on dynamic subtype.
      $templateId = $subType == 4 ? self::UNAUTHORIZED_TEMPLATE_ID_COLLECTION_CAMP : ($subType == 5 ? self::UNAUTHORIZED_TEMPLATE_ID_DROPPING_CENTER : NULL);

      if (!$templateId) {
        return;
      }

      $emailParams = [
        'contact_id' => $contactId,
      // Template ID for the unauthorization email.
        'template_id' => $templateId,
      ];

      $result = civicrm_api3('Email', 'send', $emailParams);

    }
    catch (\CiviCRM_API3_Exception $ex) {
      error_log("Exception caught while sending unauthorization email: " . $ex->getMessage());
    }
  }

  /**
   * This hook is called after a db write on entities.
   *
   * @param string $op
   *   The type of operation being performed.
   * @param string $objectName
   *   The name of the object.
   * @param int $objectId
   *   The unique identifier for the object.
   * @param object $objectRef
   *   The reference to the object.
   */
  public static function generateCollectionCampQr(string $op, string $objectName, $objectId, &$objectRef) {
    if ($objectName != 'Eck_Collection_Camp' || !$objectId) {
      return;
    }

    $newStatus = $objectRef['Collection_Camp_Core_Details.Status'] ?? '';

    if (!$newStatus) {
      return;
    }

  }

  /**
   * This hook is called after the database write on a custom table.
   *
   * @param string $op
   *   The type of operation being performed.
   * @param string $objectName
   *   The custom group ID.
   * @param int $objectId
   *   The entityID of the row in the custom table.
   * @param object $objectRef
   *   The parameters that were sent into the calling function.
   */
  public static function setOfficeDetails($op, $groupID, $entityID, &$params) {
    if ($op !== 'create') {
      return;
    }

    if (!($stateField = self::findStateField($params))) {
      return;
    }

    $stateId = $stateField['value'];
    $collectionCampId = $stateField['entity_id'];

    if (!$stateId) {
      \CRM_Core_Error::debug_log_message('Cannot assign Goonj Office to collection camp: ' . $collectionCamp['id']);
      \CRM_Core_Error::debug_log_message('No state provided on the intent for collection camp: ' . $collectionCamp['id']);
      return FALSE;
    }

    $officesFound = Contact::get(FALSE)
      ->addSelect('id')
      ->addWhere('contact_type', '=', 'Organization')
      ->addWhere('contact_sub_type', 'CONTAINS', 'Goonj_Office')
      ->addWhere('Goonj_Office_Details.Collection_Camp_Catchment', 'CONTAINS', $stateId)
      ->execute();

    $stateOffice = $officesFound->first();

    // If no state office is found, assign the fallback state office.
    if (!$stateOffice) {
      $stateOffice = self::getFallbackOffice();
    }

    $stateOfficeId = $stateOffice['id'];

    EckEntity::update('Collection_Camp', FALSE)
      ->addValue('Collection_Camp_Intent_Details.Goonj_Office', $stateOfficeId)
      ->addWhere('id', '=', $collectionCampId)
      ->execute();

    $coordinators = Relationship::get(FALSE)
      ->addWhere('contact_id_b', '=', $stateOfficeId)
      ->addWhere('relationship_type_id:name', '=', self::RELATIONSHIP_TYPE_NAME)
      ->addWhere('is_current', '=', TRUE)
      ->execute();

    $coordinatorCount = $coordinators->count();

    if ($coordinatorCount === 0) {
      $coordinator = self::getFallbackCoordinator();
    }
    elseif ($coordinatorCount > 1) {
      $randomIndex = rand(0, $coordinatorCount - 1);
      $coordinator = $coordinators->itemAt($randomIndex);
    }
    else {
      $coordinator = $coordinators->first();
    }

    $coordinatorId = $coordinator['contact_id_a'];

    EckEntity::update('Collection_Camp', FALSE)
      ->addValue('Collection_Camp_Intent_Details.Coordinating_Urban_POC', $coordinatorId)
      ->addWhere('id', '=', $collectionCampId)
      ->execute();

    return TRUE;

  }

  /**
   *
   */
  private static function findStateField(array $array) {
    $filteredItems = array_filter($array, fn($item) => $item['entity_table'] === 'civicrm_eck_collection_camp');

    if (empty($filteredItems)) {
      return FALSE;
    }

    $collectionCampStateFields = CustomField::get(FALSE)
      ->addSelect('id')
      ->addWhere('name', '=', 'state')
      ->addWhere('custom_group_id:name', '=', 'Collection_Camp_Intent_Details')
      ->execute()
      ->first();

    if (!$collectionCampStateFields) {
      return FALSE;
    }

    $stateFieldId = $collectionCampStateFields['id'];

    $stateItemIndex = array_search(TRUE, array_map(fn($item) =>
        $item['entity_table'] === 'civicrm_eck_collection_camp' &&
        $item['custom_field_id'] == $stateFieldId,
        $filteredItems
    ));

    return $stateItemIndex !== FALSE ? $filteredItems[$stateItemIndex] : FALSE;
  }

  /**
   *
   */
  private static function getFallbackOffice() {
    $fallbackOffices = Contact::get(FALSE)
      ->addSelect('id')
      ->addWhere('organization_name', 'CONTAINS', self::FALLBACK_OFFICE_NAME)
      ->execute();

    return $fallbackOffices->first();
  }

  /**
   *
   */
  private static function getFallbackCoordinator() {
    $fallbackOffice = self::getFallbackOffice();
    $fallbackCoordinators = Relationship::get(FALSE)
      ->addWhere('contact_id_b', '=', $fallbackOffice['id'])
      ->addWhere('relationship_type_id:name', '=', self::RELATIONSHIP_TYPE_NAME)
      ->addWhere('is_current', '=', FALSE)
      ->execute();

    $coordinatorCount = $coordinators->count();

    $randomIndex = rand(0, $coordinatorCount - 1);
    $coordinator = $coordinators->itemAt($randomIndex);

    return $coordinator;
  }

  /**
   * This hook is called after a db write on entities.
   *
   * @param string $op
   *   The type of operation being performed.
   * @param string $objectName
   *   The name of the object.
   * @param int $objectId
   *   The unique identifier for the object.
   * @param object $objectRef
   *   The reference to the object.
   */
  public static function assignContactToGroup(string $op, string $objectName, int $objectId, &$objectRef) {
    // Check if the object name is 'AfformSubmission'.
    if ($objectName !== 'AfformSubmission') {
      return;
    }

    // Extract the 'data' field.
    $data = $objectRef->data;
    $decodedData = json_decode($data, TRUE);

    $individualEntries = $decodedData['Individual1'] ?? [];
    if (empty($individualEntries)) {
      return;
    }

    foreach ($individualEntries as $entry) {
      $joins = $entry['joins'] ?? NULL;
      $stateProvinceId = $joins['Address'][0]['state_province_id'];
      $email = $joins['Email'][0]['email'];

      if (!$stateProvinceId || !$email) {
        continue;
      }

      // Implement a delay and retry mechanism
      $maxRetries = 5;
      $retryDelay = 1; // seconds

      $contactId = NULL;
      for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
          $emailData = \Civi\Api4\Email::get(FALSE)
              ->addWhere('email', '=', $email)
              ->execute();

          $contactData = $emailData->first();
          $contactId = $contactData['contact_id'] ?? NULL;
          if ($contactId) {
              break;
          }

          // Wait before retrying
          sleep($retryDelay);
      }

      if (empty($contactId)) {
          continue;
      }
      error_log("contactId: " . print_r($contactId, TRUE));

      $groups = \Civi\Api4\Group::get(FALSE)
      ->addSelect('custom.*', 'id')
      ->addWhere('Chapter_Contact_Group.Use_Case', '=', 'contact_catchment')
      ->addWhere('Chapter_Contact_Group.Contact_Catchment', 'CONTAINS', $stateProvinceId)
      ->execute();

      $groupData = $groups->first();
      $groupId = $groupData['id'] ?? NULL;

      if (empty($groupId)) {
          continue;
      }

      $groupContactResult = \Civi\Api4\GroupContact::create(FALSE)
      ->addValue('contact_id', $contactId)
      ->addValue('group_id', $groupId)
      ->addValue('status', 'Added')
      ->execute();

    }
  }

}

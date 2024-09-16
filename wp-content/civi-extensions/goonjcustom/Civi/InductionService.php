<?php

namespace Civi;

use Civi\Api4\Activity;
use Civi\Api4\Contact;
use Civi\Api4\Relationship;
use Civi\Core\Service\AutoSubscriber;

/**
 *
 */
class InductionService extends AutoSubscriber {
  const INDUCTION_ACTIVITY_TYPE_NAME = 'Induction';
  const INDUCTION_DEFAULT_STATUS_NAME = 'To be scheduled';
  const RELATIONSHIP_TYPE_NAME = 'Induction Coordinator of';

  private static $volunteerId = NULL;
  private static $inductionId = NULL;

  /**
   *
   */
  public static function getSubscribedEvents() {
    return [
      '&hook_civicrm_post' => [
            ['volunteerCreated'],
            ['createInductionForVolunteer'],
            ['inductionCreated'],
      ],
      '&hook_civicrm_custom' => [
        ['sendInductionEmailToVolunteer'],
      ],
    ];
  }

  /**
   *
   */
  public static function volunteerCreated(string $op, string $objectName, int $objectId, &$objectRef) {
    if ($op !== 'create' || $objectName !== 'Individual') {
      return FALSE;
    }

    $subTypes = $objectRef->contact_sub_type;

    if (empty($subTypes)) {
      return FALSE;
    }

    // The ASCII control character \x01 represents the "Start of Header".
    // It is used to separate values internally by CiviCRM for multiple subtypes.
    $subtypes = explode("\x01", $subTypes);
    $subtypes = array_filter($subtypes);

    if (!in_array('Volunteer', $subtypes)) {
      return FALSE;
    }

    self::$volunteerId = $objectId;

  }

  /**
   *
   */
  public static function createInductionForVolunteer(string $op, string $objectName, int $objectId, &$objectRef) {
    if ($op !== 'create' || $objectName !== 'Address') {
      return FALSE;
    }

    if (self::$volunteerId !== $objectRef->contact_id || !$objectRef->is_primary) {
      return FALSE;
    }

    $stateId = $objectRef->state_province_id;

    $officesFound = Contact::get(FALSE)
      ->addSelect('id')
      ->addWhere('contact_type', '=', 'Organization')
      ->addWhere('contact_sub_type', 'CONTAINS', 'Goonj_Office')
      ->addWhere('Goonj_Office_Details.Induction_Catchment', 'CONTAINS', $stateId)
      ->execute();

    $office = $officesFound->first();

    // @todo Implement fallback office logic here.
    $officeId = $office['id'];

    $coordinators = Relationship::get(FALSE)
      ->addWhere('contact_id_b', '=', $officeId)
      ->addWhere('relationship_type_id:name', '=', self::RELATIONSHIP_TYPE_NAME)
      ->execute();

    $coordinatorCount = $coordinators->count();

    // @todo Implement fallback coordinator logic here.
    if ($coordinatorCount > 1) {
      $randomIndex = rand(0, $coordinatorCount - 1);
      $coordinator = $coordinators->itemAt($randomIndex);
    }
    else {
      $coordinator = $coordinators->first();
    }

    $coordinatorId = $coordinator['contact_id_a'];

    $session = \CRM_Core_Session::singleton();
    $currentUserId = $session->get('userID') ?: self::$volunteerId;

    $sourceContactId = $currentUserId;
    $targetContactId = ($currentUserId === self::$volunteerId) ? $currentUserId : [self::$volunteerId];

    $placeholderActivityDate = self::getPlaceholderActivityDate();

    Activity::create(FALSE)
      ->addValue('activity_type_id:name', self::INDUCTION_ACTIVITY_TYPE_NAME)
      ->addValue('status_id:name', self::INDUCTION_DEFAULT_STATUS_NAME)
      ->addValue('source_contact_id', $sourceContactId)
      ->addValue('target_contact_id', $targetContactId)
      ->addValue('Induction_Fields.Assign', $coordinatorId)
      ->addValue('activity_date_time', $placeholderActivityDate)
      ->addValue('Induction_Fields.Goonj_Office', $officeId)
      ->execute();
  }

  /**
   * Get placeholder time for induction activity.
   *
   * Calculate the date and time 3 days from today at 11:00 AM.
   * If the resulting date is on a weekend (Saturday or Sunday), adjust to the next Monday at 11:00 AM.
   *
   * @return string The formatted date and time for 3 days later or the next Monday at 11 AM.
   */
  private static function getPlaceholderActivityDate() {
    $date = new \DateTime();
    $date->modify('+3 days');
    $dayOfWeek = $date->format('N');

    // If the resulting day is Saturday (6) or Sunday (7), move to next Monday.
    if ($dayOfWeek >= 6) {
      $date->modify('next monday');
    }

    // Set the time to 11:00 AM.
    $date->setTime(11, 0);

    return $date->format('Y-m-d H:i:s');
  }

  public static function inductionCreated(string $op, string $objectName, int $objectId, &$objectRef) {
    if ($op !== 'create' || $objectName !== 'ActivityContact') {
      return FALSE;
    }

    if ($objectRef->contact_id !== self::$volunteerId){
      return;
    }
    self::$inductionId = $objectRef->activity_id;
    // $induction = \Civi\Api4\Activity::get(FALSE)
    //   ->addSelect('Induction_Fields.Goonj_Office', 'Induction_Fields.Assign')
    //   ->addWhere('id', '=', self::$inductionId)
    //   ->setLimit(1)
    //   ->execute()->single();
  //   \Civi::log()->info('op',['op'=>$op,
  //   'objectName'=>$objectName,
  //   'objectId'=>$objectId,
  //   'objectref'=>$objectRef,
  // 'induction'=>$induction]);
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
  public static function sendInductionEmailToVolunteer($op, $groupID, $entityID, &$params) {
    if ($op !== 'create') {
      return;
    }

    if (!($inductionsFields = self::findInductionOfficeFields($params))) {
      return;
    }
  }

    /**
   *
   */
  private static function findInductionOfficeFields(array $array) {
    \Civi::log()->info('check',['check'=>$array]);

    $filteredItems = array_filter($array, fn($item) => $item['entity_table'] === 'civicrm_activity');

    if (empty($filteredItems)) {
      return FALSE;
    }

    $inductionOfficeFields = CustomField::get(FALSE)
      ->addWhere('custom_group_id:name', '=', 'Induction_Fields')
      ->addWhere('name', 'IN', ['Goonj_Office', 'Assign'])
      ->execute();
    \Civi::log()->info('inductionOfficeFields',['inductionOfficeFields'=>$inductionOfficeFields]);
    if (!$inductionOfficeFields) {
      return FALSE;
    }

    // $stateFieldId = $collectionCampStateFields['id'];

    $stateItemIndex = array_search(TRUE, array_map(fn($item) =>
        $item['entity_table'] === 'civicrm_eck_collection_camp' &&
        $item['custom_field_id'] == $stateFieldId,
        $filteredItems
    ));

    // return $stateItemIndex !== FALSE ? $filteredItems[$stateItemIndex] : FALSE;
  }

}

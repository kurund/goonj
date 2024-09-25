<?php

/**
 *
 */

use Civi\Api4\EckEntity;
use Civi\Token\AbstractTokenSubscriber;
use Civi\Token\TokenProcessor;
use Civi\Token\TokenRow;

/**
 *
 */
class CRM_Goonjcustom_Token_CollectionCamp extends AbstractTokenSubscriber {

  public function __construct() {
    parent::__construct('collection_camp', [
      'venue' => \CRM_Goonjcustom_ExtensionUtil::ts('Venue'),
      'date' => \CRM_Goonjcustom_ExtensionUtil::ts('Date'),
      'time' => \CRM_Goonjcustom_ExtensionUtil::ts('Time'),
      'volunteers' => \CRM_Goonjcustom_ExtensionUtil::ts('Volunteers'),
      'goonj_team' => \CRM_Goonjcustom_ExtensionUtil::ts('Goonj Team'),
    ]);
  }

  /**
   *
   */
  public function checkActive(TokenProcessor $processor) {
    return !empty($processor->context['collectionSourceId']);
  }

  /**
   *
   */
  public function evaluateToken(
    TokenRow $row,
    $entity,
    $field,
    $prefetch = NULL,
  ) {

    if (empty($row->context['collectionSourceId'])) {
      \Civi::log()->debug(__CLASS__ . '::' . __METHOD__ . ' There is no collectionSourceId in the context, you can\'t use collection_camp tokens.');
      $row->format('text/plain')->tokens($entity, $field, '');
      return;
    }

    $collectionSource = EckEntity::get('Collection_Camp', FALSE)
      ->addSelect('title', 'Collection_Camp_Intent_Details.*')
      ->addWhere('id', '=', $row->context['collectionSourceId'])
      ->execute()->single();

    switch ($field) {
      case 'venue':
        $value = 'Venue of the camp';
        break;

      case 'date':
      case 'time':
        $start = new DateTime($collectionSource['Collection_Camp_Intent_Details.Start_Date']);
        $end = new DateTime($collectionSource['Collection_Camp_Intent_Details.End_Date']);
        $value = $field === 'date' ? $this->formatDate($start, $end) : $this->formatTime($start, $end);
        break;

      case 'volunteers':
        $value = 'volunteers of collection camp';
        break;

      case 'goonj_team':
        $value = 'goonj team members of collection camp';
        break;

      default:
        $value = '';

    }

    $row->format('text/html')->tokens($entity, $field, $value);
    $row->format('text/plain')->tokens($entity, $field, $value);
    return;

  }

  /**
   *
   */
  private function formatDate($start, $end) {

    $startFormatted = $start->format('M jS, Y (l)');
    $endFormatted = $end->format('M jS, Y (l)');

    if ($start->format('Y-m-d') === $end->format('Y-m-d')) {
      return $startFormatted;
    }

    return "$startFormatted - $endFormatted";
  }

  /**
   *
   */
  private function formatTime($start, $end) {

    $startTime = $start->format('h:i A');
    $endTime = $end->format('h:i A');

    return "$startTime to $endTime";
  }

}

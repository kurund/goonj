<?php

/**
 *
 */

use Civi\Token\AbstractTokenSubscriber;
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

  // Public function checkActive(\Civi\Token\TokenProcessor $processor) {
  //     return !empty($processor->context['campagnodonTransactionId'])
  //       || !empty($processor->context['campagnodonTransaction'])
  //       || in_array('campagnodonTransactionId', $processor->context['schema'])
  //       || in_array('campagnodonTransaction', $processor->context['schema']);.

  /**
   * }.
   */
  public function evaluateToken(
    TokenRow $row,
    $entity,
    $field,
    $prefetch = NULL,
  ) {

    switch ($field) {
      case 'venue':
        $value = 'Venue of the camp';
        break;

      case 'date':
        $value = 'date of collection camp';
        break;

      case 'time':
        $value = 'time of collection camp';
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

    // If (empty($row->context['campagnodonTransaction'])) {
    //   Civi::log()->debug(__CLASS__.'::'.__METHOD__ . ' There is no campagnodonTransaction in the context, you cant use campagnodonTransaction tokens.');
    //   $row->format('text/plain')->tokens($entity, $field, '');
    //   return;
    // }.
    // If ($field === 'payment_url') {
    //   $url = $row->context['campagnodonTransaction']['payment_url'] ?? '';
    //   // For text mode, we have to replace &amp; by & (see for example CRM_Utils_Token::getActionTokenReplacement)
    //   $row->format('text/plain')->tokens($entity, $field, str_replace('&amp;', '&', $url));
    //   $row->format('text/html')->tokens($entity, $field, $url);
    //   return;
    // }.
    // $value = '';
    // if (in_array($field, ['email', 'first_name', 'last_name'])) {
    //   // For these fields, it can have been cleaned from the CampagnodonTransaction.
    //   // In such cache, we must search on the contact data.
    //   $value = $row->context['campagnodonTransaction'][$field];
    //   if (empty($value) && !empty($row->context['contact'])) {
    //     $value = $row->context['contact'][$field];
    //   }
    //   if (empty($value) && !empty($row->context['contactId'])) {
    //     $contact = \Civi\Api4\Contact::get()
    //       ->setCheckPermissions(false)
    //       ->addSelect('*')
    //       ->addWhere('id', '=', $row->context['contactId'])
    //       ->execute()
    //       ->first();
    //     if ($contact) {
    //       $value = $contact[$field];
    //     }
    //   }
    // }.
    $row->format('text/plain')->tokens($entity, $field, $value ?? '');
    return;
  }

}

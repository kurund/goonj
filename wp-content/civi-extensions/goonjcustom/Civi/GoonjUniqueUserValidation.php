<?php

namespace Civi;

use CRM_Goonjcustom_ExtensionUtil as E;
// use Civi\Afform\AHQ;
use Civi\Afform\Event\AfformValidateEvent;
use Civi\Core\Service\AutoSubscriber;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class GoonjUniqueUserValidation extends AutoSubscriber implements EventSubscriberInterface {

  /**
   * @return array
   */
  public static function getSubscribedEvents() {
    return [
      'civi.afform.validate' => ['onAfformValidate'],
    ];
  }
  public static function onAfformValidate(AfformValidateEvent $event) {

    $entityValues = $event->getEntityValues();

    $phone = $entityValues['Individual1'][0]['joins']['Phone'][0]['phone'] ?? '';
    $email = $entityValues['Individual1'][0]['joins']['Email'][0]['email'] ?? '';


    $contactResult = civicrm_api3('Contact', 'get', [
        'sequential' => 1,
        'return' => ['id', 'email', 'phone'],
        'email' => $email,
        'phone' => $phone,
        'is_deleted' => 0,
        'contact_type' => 'Individual',
    ]);

    $errorMessages = [];

    // Check if any contact exists with the same email or phone number
    if ($contactResult['count'] > 0) {
        foreach ($contactResult['values'] as $contact) {
            if ($contact['email'] === $email && $contact['phone'] === $phone) {
                $errorMessages[] = "Both the email address '$email' and the phone number '$phone' are already in use.";
                break;
            } elseif ($contact['email'] === $email) {
                $errorMessages[] = "The email address '$email' is already in use.";
            } elseif ($contact['phone'] === $phone) {
                $errorMessages[] = "The phone number '$phone' is already in use.";
            }
        }
    }
 if (!empty($errorMessages)) {
  error_log("Error Messages: " . print_r($errorMessages, true));
  $event->setError(implode(' ', $errorMessages));
  $event->setIsValid(false);
} else {
  $event->setIsValid(true);
}
}

}
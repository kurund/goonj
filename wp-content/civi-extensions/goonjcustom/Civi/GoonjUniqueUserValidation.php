<?php

namespace Civi;

use CRM_Goonjcustom_ExtensionUtil as E;
use Civi\Afform\Event\AfformValidateEvent;
use Civi\Core\Service\AutoSubscriber;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class GoonjUniqueUserValidation extends AutoSubscriber implements EventSubscriberInterface
{

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
        'civi.afform.validate' => ['onAfformValidate'],
        ];
    }

    public static function onAfformValidate(AfformValidateEvent $event)
    {
        $formTitle = $event->getAfform()['title'] ?? '';

        if ($formTitle !== 'Volunteer Registration') {
            return;
        }

        $entityValues = $event->getEntityValues();

        $phone = $entityValues['Individual1'][0]['joins']['Phone'][0]['phone'] ?? '';
        $email = $entityValues['Individual1'][0]['joins']['Email'][0]['email'] ?? '';


        $contacts = \Civi\Api4\Contact::get()
            ->addSelect('id', 'email_primary.email', 'phone_primary.phone')
            ->addWhere('email_primary.email', '=', $email)
            ->addWhere('phone_primary.phone', '=', $phone)
            ->addWhere('contact_type', '=', 'Individual')
            ->addWhere('is_deleted', '=', 0)
            ->setLimit(1)
            ->execute();
    
    
        $errorMessages = [];
    
        if (!empty($contacts)) {
          foreach ($contacts as $contact) {
              if ($contact['email_primary.email'] === $email && $contact['phone_primary.phone'] === $phone) {
                  $errorMessages[] = "Both the email address '$email' and the phone number '$phone' are already in use.";
              }
          }
      }
    
        if (!empty($errorMessages)) {
            $errorMessagesString = implode("\n", $errorMessages);
            error_log("Validation Errors: " . $errorMessagesString);
            $event->setError($errorMessagesString);
        }
   
    }

}

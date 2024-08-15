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
      error_log('Goonjcustom: onAfformValidate');
    // our logic goes here
  }

}

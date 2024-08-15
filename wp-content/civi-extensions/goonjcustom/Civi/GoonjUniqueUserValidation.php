<?php

namespace Civi;

// use Civi\Afform\AHQ;
use Civi\Afform\Event\AfformValidateEvent;
use Civi\Core\Service\AutoService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Provides Unique user validation element to Afform
 * @internal
 * @service
 */
class GoonjUniqueUserValidation extends AutoService implements EventSubscriberInterface {

  /**
   * @return array
   */
  public static function getSubscribedEvents() {
    return [
      'civi.afform.validate' => ['onAfformValidate'],
    ];
  }

  public static function onAfformValidate(AfformValidateEvent $event) {
    // our logic goes here
  }

}

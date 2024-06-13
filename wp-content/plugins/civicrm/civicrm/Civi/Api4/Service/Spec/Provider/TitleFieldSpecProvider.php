<?php

/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 */


namespace Civi\Api4\Service\Spec\Provider;

use Civi\Api4\Service\Spec\RequestSpec;
use Civi\Core\Service\AutoService;

/**
 * @service
 * @internal
 */
class TitleFieldSpecProvider extends AutoService implements Generic\SpecProviderInterface {

  /**
   * @param \Civi\Api4\Service\Spec\RequestSpec $spec
   */
  public function modifySpec(RequestSpec $spec): void {
    // Name is autogenerated from title if missing
    $spec->getFieldByName('name')->setRequired(FALSE)->setRequiredIf('empty($values.title)');
    // Title is supplied from name if missing
    $spec->getFieldByName('title')->setRequired(FALSE)->setRequiredIf('empty($values.name)');
    // Frontend_title is copied from title if missing
    $spec->getFieldByName('frontend_title')->setRequired(FALSE);
  }

  /**
   * @inheritDoc
   */
  public function applies($entity, $action): bool {
    return in_array($entity, ['PaymentProcessor', 'ContributionPage', 'Group', 'UFGroup']) && $action === 'create';
  }

}

<?php

require_once 'goonjcustom.civix.php';

use CRM_Goonjcustom_ExtensionUtil as E;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;


/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function goonjcustom_civicrm_config(&$config): void {
  _goonjcustom_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function goonjcustom_civicrm_install(): void {
  _goonjcustom_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function goonjcustom_civicrm_enable(): void {
  _goonjcustom_civix_civicrm_enable();
}

/**
 * Add token services to the container.
 *
 * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
 */
function goonjcustom_civicrm_container(ContainerBuilder $container) {
  $container->addResource(new FileResource(__FILE__));
  $container->findDefinition('dispatcher')->addMethodCall('addListener',
    ['civi.token.list', 'goonjcustom_register_tokens']
  )->setPublic(TRUE);
  $container->findDefinition('dispatcher')->addMethodCall('addListener',
    ['civi.token.eval', 'goonjcustom_evaluate_tokens']
  )->setPublic(TRUE);
}

function goonjcustom_register_tokens(\Civi\Token\Event\TokenRegisterEvent $e) {
  $e->entity('contact')
    ->register('inductionDetails', ts('Induction details'));
}

function goonjcustom_evaluate_tokens(\Civi\Token\Event\TokenValueEvent $e) {
  foreach ($e->getRows() as $row) {
    /** @var TokenRow $row */
    $row->format('text/html');

    $contacts = \Civi\Api4\Contact::get(TRUE)
      ->addSelect('address_primary.state_province_id')
      ->addWhere('id', '=', 230)
      ->setLimit(25)
      ->execute();

    foreach ($contacts as $contact) {
      $stateId = $contact['address_primary.state_province_id'];

      $processingCenters = \Civi\Api4\EckEntity::get('Processing_Center', TRUE)
        ->addSelect('*', 'custom.*')
        ->addWhere('Processing_Center.State', 'IN', [$stateId])
        ->setLimit(25)
        ->execute();

      if ( ! empty( $processingCenters ) ) {
        $inductionDetailsMarkup = '<ol>';

        foreach ($processingCenters as $processingCenter) {
          $inductionDetailsMarkup .= '<li>' . $processingCenter['Processing_Center.Induction_Details'] . '</li>';
        }

        $inductionDetailsMarkup = '</ol>';
      } else {
        $inductionDetailsMarkup = 'Unfortunately, we don\'t currently have a processing center near to the location you have provided. Someone from the Goonj team will reach out and will share the details of induction.';
      }

      $row->tokens('contact', 'inductionDetails', $inductionDetailsMarkup);
    }
  }
}

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
    $row->tokens('contact', 'inductionDetails', 'induction details to come here' . $row->context['contactId']);
  }
}

<?php
/**
 * @file
 * Contains \Drupal\yse_sageboy\Routing\RouteSubscriber.
 */

namespace Drupal\yse_sageboy\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Swap in CAS login controller to use CASE
    // test for CAS
    
    if ($route = $collection->get('user.login')) {
      $route->setDefault('_controller', '\Drupal\cas\Controller\ForceLoginController::forceLogin');
    }

    // wondering if we need this to avoid bots?
    if ($collection->get('user.login.http')) {
      $collection->remove('user.login.http');
    }
    
  }

}
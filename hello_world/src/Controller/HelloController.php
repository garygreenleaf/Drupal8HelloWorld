<?php
/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloController.
 */

namespace Drupal\hello_world\Controller;

class HelloController {

  /**
  * {@inheritdoc}
  */

  public function content() {

    $config = \Drupal::config('hello_world.settings');

    $markup  = '<p>' . $config->get('content') . '</p>';

    return array(
      '#type' => 'markup',
      '#markup' => $markup
    );

  }

}

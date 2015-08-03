<?php
/**
 * @file
 * Contains \Drupal\hello_world\Form\HelloworldSettingsForm
 */

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form to configure maintenance settings for this site.
 */
class HelloworldSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'hello_world_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return array('hello_world.settings');
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('hello_world.settings');

    $form['hello_world_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Hello world message'),
      '#default_value' => $config->get('message'),
      '#description' => t('The status message that will appear at the top of every page'),
    );
    $form['hello_world_show_message'] = array(
      '#type' => 'checkbox',
      '#title' => t('Show Hello world message?'),
      '#default_value' => $config->get('show_message'),
      '#description' => t('Check this box if you want to show the hello world message'),
    );
    $form['hello_world_content'] = array(
      '#type' => 'textarea',
      '#title' => t('Hello world content'),
      '#default_value' => $config->get('content'),
      '#description' => t('The copy to appear on the full page'),
    );


    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

     // Get config factory
    $config = $this->configFactory->getEditable('hello_world.settings');

    $config
      ->set('message', $form_state->getValue('hello_world_message'))
      ->set('show_message', $form_state->getValue('hello_world_show_message'))
      ->set('content', $form_state->getValue('hello_world_content'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}


?>

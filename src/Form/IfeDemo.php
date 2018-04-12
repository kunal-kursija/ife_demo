<?php

namespace Drupal\ife_demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class IfeDemo.
 *
 * @package Drupal\ife_demo\Form
 */
class IfeDemo extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ife_demo_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Uncomment below PHP Statement, If you want Disable Inline Form Errors On
    // This Form.
    // $form['#disable_inline_form_errors'] = TRUE;
    // Element: Textfield.
    $form['addition'] = [
      '#type' => 'textfield',
      '#title' => $this->t('5 + 5'),
      '#required' => TRUE,
    ];

    // Element: Multiplication.
    $form['multiplication'] = [
      '#type' => 'textfield',
      '#title' => $this->t('5 * 5'),
      '#required' => TRUE,
    ];

    // Element: Submit.
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => 'Submit',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue('addition') != 10) {
      $form_state->setErrorByName('addition', $this->t("You are wrong, 5 + 5 = 10."));
    }

    if ($form_state->getValue('multiplication') != 25) {
      $form_state->setErrorByName('multiplication', $this->t("You are wrong, 5 * 5 = 25."));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('You have passed the Demo.'));
  }

}

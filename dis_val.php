<?php

/**
 * @file
 * this should be implemented in a D6 module, replacing dis_val below with your module name
 * be sure to change the calls to the functions as well
 */
 
/**
 * Implements hook_form_alter().
 */
function dis_val_form_alter(&$form, &$form_state, $form_id) {
  if($form_id == 'cco_ifa_form_generalinfo' || $form_id == 'cco_ifa_form_school_generalinfo') {
    $form['#after_build'][] = 'dis_val_after_build';
  }
}

/**
 * After build handler
 */
function dis_val_after_build($form, &$form_state) {
  dis_val_disable_validation($form);
  return $form;
}

/**
 * Recursive function to remove validation
 */
function dis_val_disable_validation(&$element) {
  unset($element['#needs_validation']);
  unset($element['#element_validate']);
  foreach(element_children($element) as $key) {
    dis_val_disable_validation($element[$key]);
  }
}

?>
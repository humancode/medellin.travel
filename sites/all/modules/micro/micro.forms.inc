<?php
function micro_form_micro_form_alter(&$form, &$form_state, $form_id) {
  dpm($form);

  $form['contact'] = array(
	'#type' => 'fieldset', 
	'#title' => t('Contact settings'), 
	'#weight' => 5, 
	'#collapsible' => TRUE, 
	'#collapsed' => FALSE,
  );

  return $form;
  
}
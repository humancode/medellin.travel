<?php

/**
* Implements hook_views_data()
*/
function micro_views_data() {

	$data = array();
 
	$data['micro']['table']['group'] = t('Micro sitio');
	 
	$data['micro']['table']['base'] = array(
		'field' => 'mid',
		'title' => t('Micro sitio'),
		'weight' => -10,
	); 

	$data['micro']['table']['join'] = array(
		'node' => array(
		  'left_field' => 'nid',
		  'field' => 'mid',
		),
	);


	$data['micro']['mid'] = array(
		'title' => t('MID'),
		'help' => t('ID of micro table.'),
		'field' => array(
		  'handler' => 'views_handler_field_numeric',
		  'click sortable' => TRUE,
		),
		'filter' => array(
		  'handler' => 'views_handler_filter_numeric',
		),
		'sort' => array(
		  'handler' => 'views_handler_sort',
		),
	);

	 $data['micro']['name'] = array(
		'title' => t('Micro site Name'),
		'help' => t('Name of a micro site.'),
		'field' => array(
		  'handler' => 'views_handler_field',
		  'click sortable' => TRUE,
		),
		'sort' => array(
		  'handler' => 'views_handler_sort',
		),
		'filter' => array(
		  'handler' => 'views_handler_filter_string',
		),
		'argument' => array(
		  'handler' => 'views_handler_argument_string',
		),
	);

	return $data;
}

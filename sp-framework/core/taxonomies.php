<?php
/*
* Taxonomies
*/

$spTM = new SP_Framework_Taxonomy_Meta_Box('product_cat');
 
$args = array(
	'validate' => 'y',
	'sanitize' => 'y',
 	'fields' => array(
 		'product_cat_front_page' => array(
			'type' 	=> 'checkbox',
			'name' 	=> 'product_cat_front_page',
			'label' => 'Front page',
			'caption' => '',
			'required' => 'n',
			'default' => '', 
 		),
 	),
);
  
$spTM->create($args);
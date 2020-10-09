<?php
/*
* Meta boxes
*/

$spSliderMeta = new SP_Framework_Post_Type_Meta_Box();
$args = array(
	'post_type' => 'sp_slider',
	'name'     	=> 'settings_sp_slider',
	'label'		=> 'Settings',
	'validate' => 'n',
	'sanitize' => 'n',
 	'fields' => array(
 		'slider_btn_link' => array(
			'type' 	=> 'text',
			'name' 	=> 'slider_btn_link',
			'label' => 'Link',
			'caption' => '',
			'required' => 'n',
			'default' => '', 
        ), 
        'slider_btn_text' => array(
			'type' 	=> 'text',
			'name' 	=> 'slider_btn_text',
			'label' => 'Text',
			'caption' => '',
			'required' => 'n',
			'default' => '', 
 		),
 	),
);
$spSliderMeta->create($args);


$spPostMeta = new SP_Framework_Post_Type_Meta_Box();
$args = array(
	'post_type' => 'post',
	'name'     	=> 'settings_post',
	'label'		=> 'Settings',
	'validate' => 'n',
	'sanitize' => 'n',
 	'fields' => array(
		'post_front_page' => array(
			'type' 	=> 'checkbox',
			'name' 	=> 'post_front_page',
			'label' => 'Show on front page',
			'caption' => '',
			'required' => 'n',
			'default' => '', 
 		), 
 		'post_images_title' =>  array(
 			'type' 	=> 'text',
 			'name' 	=> 'post_images_title',
 			'label' => 'Images title',
 			'caption' => '',
 			'required' => 'n',
 			'default' => 'Gallery', 
 		),
 		'post_images' =>  array(
 			'type' 	=> 'images',
 			'name' 	=> 'post_images',
 			'label' => 'Images',
 			'caption' => '',
 			'required' => 'n',
 			'default' => '', 
 		),
 	),
);
$spPostMeta->create($args);
<?php
/*
* Post Types
*/

/*
* Post Type: sp_slider
*/
 
 
$spSlider = new SP_Framework_Post_Type();
 
$args = array(
	'name' 					=> 'sp_slider',
	'slug' 					=> 'sp_slider',
	'label' 				=> 'Slider',
	'all_items' 			=> 'All',
	'add_new' 				=> 'Add',
	'add_new_item' 			=> 'Add',
	'edit_item' 			=> 'Edit',
	'new_item' 				=> 'New',
	'view_item' 			=> 'View',
	'view_items' 			=> 'View',
	'search_items' 			=> 'Search',
	'not_found' 			=> 'Not found',
	'not_found_in_trash' 	=> 'Not found in trash',
	'menu_icon'				=> 'dashicons-format-image',
	'supports' 				=> array('title', 'thumbnail', 'editor'),
	'hidden' 				=> 'y',
);
 
$spSlider->create($args);
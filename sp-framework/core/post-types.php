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


$spForPartnersSlider = new SP_Framework_Post_Type();
$args = array(
	'name' 					=> 'sp_partners_slider',
	'slug' 					=> 'sp_partners_slider',
	'label' 				=> 'For Partners',
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
	'supports' 				=> array('title', 'thumbnail',),
	'hidden' 				=> 'y',
);
$spForPartnersSlider->create($args);


$spProductTags = new SP_Framework_Post_Type();
$args = array(
	'name' 					=> 'sp_product_tags',
	'slug' 					=> 'sp_product_tags',
	'label' 				=> 'Product Tags',
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
	'menu_icon'				=> 'dashicons-art',
	'supports' 				=> array('title'),
	'hidden' 				=> 'y',
);
$spProductTags->create($args);


$spOurValues = new SP_Framework_Post_Type();
$args = array(
	'name' 					=> 'sp_our_values',
	'slug' 					=> 'sp_our_values',
	'label' 				=> 'Our values',
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
	'menu_icon'				=> 'dashicons-art',
	'supports' 				=> array('title', 'editor'),
	'hidden' 				=> 'y',
);
$spOurValues->create($args);
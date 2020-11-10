<?php
/*
* Meta boxes
*/

/*
* Slider meta
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


/*
* Post meta
*/


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


/*
* Product tags meta
*/


$spProductTagsMeta = new SP_Framework_Post_Type_Meta_Box();
$args = array(
	'post_type' => 'sp_product_tags',
	'name'     	=> 'settings_sp_product_tags',
	'label'		=> 'Settings',
	'validate' => 'n',
	'sanitize' => 'n',
 	'fields' => array(
 		'product_tags_color' =>  array(
 			'type' 	=> 'text',
 			'name' 	=> 'product_tags_color',
 			'label' => 'Color',
 			'caption' => '',
 			'required' => 'n',
 			'default' => '#8A6A4C', 
 		),
 	),
);
$spProductTagsMeta->create($args);


/*
* Product meta
*/


$spProductMeta = new SP_Framework_Post_Type_Meta_Box();
$tagsArray = array();
$args = array(
	'post_type' => 'product',
	'name'     	=> 'settings_product_tags',
	'label'		=> 'Product Tags',
	'validate' => 'n',
	'sanitize' => 'n',
 	'fields' => array(),
);

$argsPosts = array(
	'post_type' 	=> 	'sp_product_tags',
	'order'			=>	'desc',
);
 
$spPosts = SP_Framework_Post_Type_Utility::get_list($argsPosts);
 
if(count($spPosts)>0){
	$index = 0;
	foreach ($spPosts as $spPost) {
		$args['fields']['checkbox_'.$spPost['id'].''] = array(
			'type' 	=> 'checkbox',
			'name' 	=> 'checkbox_'.$spPost['id'].'',
			'label' => $spPost['title'],
			'caption' => '',
			'required' => 'n',
			'default' => '', 
		);
		$tagsArray[] = 'checkbox_'.$spPost['id'].'';
	}
}
$spProductMeta->create($args);

$spProductMeta = new SP_Framework_Post_Type_Meta_Box();
$args = array(
	'post_type' => 'product',
	'name'     	=> 'settings_additional_product',
	'label'		=> 'Additional properties',
	'validate' => 'n',
	'sanitize' => 'n',
 	'fields' => array(
 		'product_property_title' =>  array(
 			'type' 	=> 'text',
 			'name' 	=> 'product_property_title',
 			'label' => 'Title',
 			'caption' => '',
 			'required' => 'n',
 			'default' => 'Choose the flavour', 
 		),
 		'product_property_list' =>  array(
 			'type' 	=> 'textarea',
 			'name' 	=> 'product_property_list',
 			'label' => 'Property',
 			'caption' => '',
 			'required' => 'n',
 			'default' => '', 
 		),
 	),
);
$spProductMeta->create($args);


/*
* Product options
*/


$spProductTagsMeta = new SP_Framework_Post_Type_Meta_Box();
$args = array(
	'post_type' => 'product',
	'name'     	=> 'settings_product_options',
	'label'		=> 'Options',
	'validate' => 'n',
	'sanitize' => 'n',
 	'fields' => array(
 		'product_option_title' =>  array(
 			'type' 	=> 'text',
 			'name' 	=> 'product_option_title',
 			'label' => 'Title',
 			'caption' => '',
 			'required' => 'n',
 			'default' => '', 
 		),
 		'product_option_price' =>  array(
 			'type' 	=> 'number',
 			'name' 	=> 'product_option_price',
 			'label' => 'Price',
 			'caption' => '',
 			'required' => 'n',
 			'default' => '', 
 		),
 	),
);
$spProductTagsMeta->create($args);
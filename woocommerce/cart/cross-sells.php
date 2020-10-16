<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;


if($cross_sells){
	$crossSellIDs = array();
	$tagsArray = array();


	$argsPosts = array(
		'post_type' 	=> 	'sp_product_tags',
		'order'			=>	'desc',
	);
	 
	$spPosts = SP_Framework_Post_Type_Utility::get_list($argsPosts);
	 
	if(count($spPosts)>0){
		$index = 0;
		foreach ($spPosts as $spPost) {
			$tagsArray[] = 'checkbox_'.$spPost['id'].'';
		}
	}

	foreach ($cross_sells as $cross_sell){
		$crossSellIDs[] = $cross_sell->get_id();
	}
	
	if(count($crossSellIDs)>4){
		$output = array_slice($crossSellIDs, 0, 4); 
		$crossSellIDs = $output;
	}

	$args = array(
		'numberposts' => 4, 
		'pagination' => false, 
	    'cross_sell' => true,
	);

	echo sp_get_catalog_items($args, $tagsArray);

	wp_reset_postdata();
}	
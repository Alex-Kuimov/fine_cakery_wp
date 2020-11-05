<?php
/*
Template Name: Catalog page
*/

get_header();

$pageID = get_the_ID();
$shopPageID = get_option('woocommerce_shop_page_id');
$taxCurrent = SP_Framework_Taxonomy_Utility::get_current();
$catID = $taxCurrent['id'];
$name = $taxCurrent['name'];
$description = $taxCurrent['description'];

$order = isset($_GET['order']) ? sanitize_text_field($_GET['order']) : 'asc';
$orderby = isset($_GET['field']) ? sanitize_text_field($_GET['field']) : 'id';

if($pageID == $shopPageID){
	echo '<div class="catalog-menu container">';
        echo '<h1 class="catalog-title">'.get_the_title().'</h1>';
        
        echo '<div class="catalog-menu-wrap">';
            $args = array(
                'taxonomy'      => array('product_cat'),
                'orderby'       => 'id', 
                'order'         => 'ASC',
            );
            $categories = SP_Framework_Taxonomy_Utility::get_list($args);
            
            if(count($categories)>0){
            	echo '<span>•</span>';
                foreach ($categories as $category) {
                	echo '<a href="'.$category['url'].'" class="catalog-menu__item">'.$category['title'].'</a>';
            		echo '<span>•</span>';
                }
            }    
        echo '</div>';
        
    echo '</div>';
} else {
	echo '<div class="catalog-description container">';
	    echo '<h1 class="catalog-title">'.$name.'</h1>';
	    echo '<p>'.$description.'</p>';
	echo '</div>';

	echo '<div class="catalog-back container">';
	    echo '<a href="'.get_the_permalink($shopPageID).'">← Back to Shop</a>';
	echo '</div>';
}
		
$args = array(
	'numberposts' 	=> 16, 
	'product_cat' 	=> $catID, 
	'pagination' 	=> true, 
	'order' 		=> $order, 
	'orderby' 		=> $orderby
);

echo sp_get_catalog_items($args, $tagsArray);

get_footer();
<?php
/*
Template Name: Catalog page
*/

get_header();

$taxCurrent = SP_Framework_Taxonomy_Utility::get_current();
$catID = $taxCurrent['id'];
$name = $taxCurrent['name'];
$description = $taxCurrent['description'];

$order = isset($_GET['order']) ? sanitize_text_field($_GET['order']) : 'asc';
$orderby = isset($_GET['field']) ? sanitize_text_field($_GET['field']) : 'id';
?>

<div class="catalog-description container">
    <h1 class="catalog-title"><?php echo $name;?></h1>
    <p><?php echo $description;?></p>
</div>

<div class="catalog-back container">
    <a href="catalog.html">← Back to Shop</a>
</div>

<?php 
		
$args = array(
	'numberposts' 	=> 4, 
	'product_cat' 	=> $catID, 
	'pagination' 	=> true, 
	'order' 		=> $order, 
	'orderby' 		=> $orderby
);

echo sp_get_catalog_items($args);

get_footer();
<?php
/*
Template Name: Single product page
*/

get_header();

$productTitle 	= get_the_title();
$productID      = get_the_ID();
$productImage   = SP_Framework_Post_Type_Utility::get_image($productID, 'full');
$productText    = SP_Framework_Post_Type_Utility::get_content($productID);

$regularPrice = SP_Framework_Woocommerce::get_product_price($productID);
$salePrice = SP_Framework_Woocommerce::get_product_sale_price($productID);

$imageGallery = SP_Framework_Woocommerce::get_product_gallery($productID);

?>


<div class="container product">

    <div class="product-wrap product-slider-wrap">

        <div class="swiper-container product-slider-thumbs">
            <div class="swiper-wrapper">
            	<?php
            	echo '<img class="swiper-slide" src="'.$productImage.'" alt="image: '.$productTitle.'">';

            	if(isset($imageGallery[0])){
                	foreach ($imageGallery as $imageGalleryID) {
                		$imageGallerySrc = wp_get_attachment_url($imageGalleryID);
                		echo '<img class="swiper-slide" src="'.$imageGallerySrc.'" alt="image: '.$productTitle.'">';
                	}                	
                }
            	?>
            </div>
        </div>

        <div class="swiper-container product-slider">
            <div class="swiper-wrapper">
            	<?php
                echo '<img class="swiper-slide" src="'.$productImage.'" alt="image: '.$productTitle.'">';

                if(isset($imageGallery[0])){
                	foreach ($imageGallery as $imageGalleryID) {
                		$imageGallerySrc = wp_get_attachment_url($imageGalleryID);
                		echo '<img class="swiper-slide" src="'.$imageGallerySrc.'" alt="image: '.$productTitle.'">';
                	}                	
                }
                ?>
            </div>

            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-black"></div>
            <div class="swiper-button-prev swiper-button-black"></div>
        </div>
    </div>

    <div class="product-wrap product-text-wrap">
        <h1 class="product__title"><?php echo $productTitle;?></h1>
        <div class="catalog__tags">
            <span class="catalog__tag-item catalog__tag-item_green">Vegan</span>
            <span class="catalog__tag-item catalog__tag-item_main">Refined sugar free</span>
            <span class="catalog__tag-item catalog__tag-item_orange">Gluten free</span>
            <span class="catalog__tag-item catalog__tag-item_gray">Lactose free</span>
            <span class="catalog__tag-item catalog__tag-item_brown">Keto</span>
        </div>

        <p class="product__select-title">Choose the size:</p>
        <select class="product__select">
            <option>16cm - 8 points</option>
            <option>20cm - 12 points</option>
        </select>

        <p class="product__select-title">Choose the flavour:</p>
        <select class="product__select">
            <option>Vanilla</option>
            <option>Somethings</option>
        </select>

        <div class="catalog__wrap">
            <span class="catalog__currency">CHF</span>
            <span class="catalog__price"><?php echo $regularPrice;?></span>
        </div>

        <button class="button product__button">add to cart</button>

        <div class="product__description">
            <?php echo $productText;?>
        </div>    

    </div>

</div>

<section class="reviews">
    <h2>Reviews</h2>
    <div class="reviews-wrap"></div>
</section>

<div class="catalog-description container">
    <h2>You may also like</h2>
</div>

<?php
$args = array(
	'numberposts' 	=> 4, 
	'product_cat' 	=> $catID, 
	'pagination' 	=> false, 
	'order' 		=> $order, 
	'orderby' 		=> $orderby
);

echo sp_get_catalog_items($args);


get_footer();
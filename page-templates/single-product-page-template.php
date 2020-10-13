<?php
/*
Template Name: Single product page
*/

get_header();

$productTitle = get_the_title();
$productID = get_the_ID();
$productImage = SP_Framework_Post_Type_Utility::get_image($productID, 'full');
$productText = SP_Framework_Post_Type_Utility::get_content($productID);
$imageGallery = SP_Framework_Woocommerce::get_product_gallery($productID);
$cartUrl = SP_Framework_Woocommerce::get_cart_url();
$product = wc_get_product($productID);
$childrenIDs = $product->get_children();
$variantID = 0;

if(isset($childrenIDs[0])) $variantID  = $childrenIDs[0];

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

        <?php echo sp_get_product_tags($productID, $tagsArray);?>

        <?php echo sp_get_variant_product($productID);?>

        <?php echo sp_get_additional_product($productID);?>

        <div class="catalog__wrap">
            <div class="catalog-price-group price-ajax-result-<?php echo $productID;?> ">
               <?php echo sp_get_product_price($productID);?>    
            </div>    
            
            <button class="button product__button add-to-cart add-to-cart-<?php echo $productID;?> <?php echo $class;?>" variant-id="<?php echo $variantID;?>" data-product-id="<?php echo $productID;?>">
                Add to Cart
            </button>

            <div class="go-to-cart-wrap">
                <a class="go-to-cart" href="<?php echo $cartUrl;?>">Go to Cart →</a>
            </div>    
        </div>

        <div class="product__description">
            <?php echo $productText;?>
        </div>    
    </div>

    <?php echo do_shortcode('[addtoany]');?>

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

echo sp_get_catalog_items($args, $tagsArray);

get_footer();
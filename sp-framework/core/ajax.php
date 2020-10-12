<?php
/*
* Ajax
*/


class SP_Get_Product_Variable extends SP_Framework_AJAX {
	function ajax_action() {
		$variantID = sanitize_text_field($_POST['variantID']);
		$productID = sanitize_text_field($_POST['productID']);

		$variableP = new WC_Product_Variable($productID);
		$prices = $variableP->get_variation_prices();

		$symbol = get_woocommerce_currency_symbol();

		if(isset($prices['regular_price'][$variantID])){
			$regularPrice = $prices['regular_price'][$variantID];
		}

		if(isset($prices['sale_price'][$variantID])){
			$salePrice = $prices['sale_price'][$variantID];
		}

		echo json_encode(array('regularPrice' => $regularPrice, 'salePrice' => $salePrice, 'symbol' => $symbol));

		wp_die();
	}
}
$spGetProductVariable = new SP_Get_Product_Variable('sp_get_product_variable');


class SP_Add_To_Cart extends SP_Framework_AJAX {
	function ajax_action() {
		global $woocommerce;

		$productID = sanitize_text_field($_POST['productID']);
		$productCount = 1;
		$variationID = sanitize_text_field($_POST['variationID']);
           
		$woocommerce->cart->add_to_cart($productID, $productCount, $variationID);

		$cartCount = SP_Framework_Woocommerce::get_cart_count();

		echo json_encode(array('cartCount' => $cartCount));

		wp_die();
	}
}
$spAddToCart = new SP_Add_To_Cart('sp_add_to_cart');



class Sp_Show_Modal extends SP_Framework_AJAX {
	function ajax_action() {
		$productID = sanitize_text_field($_POST['productID']);
		$title = get_the_title($productID);
		$image = SP_Framework_Post_Type_Utility::get_image($productID, 'full');

		$product = wc_get_product($productID);
		$childrenIDs = $product->get_children();
		$variantID = 0;

		if(isset($childrenIDs[0])){
			$variantID = $childrenIDs[0];
		}

		$result = '';

		$result .= '<div class="modal-product-wrap">';
            $result .= '<div class="modal-product-wrap__item">';
                $result .= '<img src="'.$image.'" alt="image: '.$title.'">';
            $result .= '</div>';    
            $result .= '<div class="modal-product-wrap__item">';
                $result .= '<p>'.$title.'</p>';
                $result .= '<div class="catalog__wrap">';
	            
	            $result .= '<div class="catalog-price-group price-ajax-result">';
	               $result .= sp_get_product_price($productID);
	            $result .= '</div>';

                $result .= '</div>';
            $result .= '</div>';
        $result .= '</div>';

        $result .= sp_get_variant_product($productID);
        $result .= sp_get_additional_product($productID);

        $result .= '<div class="modal-product-btn-wrap">';
            $result .= '<button class="button product__button product__button-cancel">Cancel</button>';
            $result .= '<button class="button product__button add-to-cart" variant-id="'.$variantID.'" data-product-id="'.$productID.'">add to cart</button>';
        $result .= '</div>';    

		echo json_encode(array('result' => $result));

		wp_die();
	}
}
$spShowModal = new Sp_Show_Modal('sp_show_modal');
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
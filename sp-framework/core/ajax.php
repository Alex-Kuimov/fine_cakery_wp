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
		$additional = sanitize_text_field($_POST['additional']);
		$data = array();


		if($additional){
			$data['custom_ID'] = $productID;
			$data['custom_product_name'] = get_the_title($productID).' - '.$additional;
		}
           
		$woocommerce->cart->add_to_cart($productID, $productCount, $variationID, array(), $data);

		$cartCount = SP_Framework_Woocommerce::get_cart_count();

		echo json_encode(array('cartCount' => $cartCount));

		wp_die();
	}
}
$spAddToCart = new SP_Add_To_Cart('sp_add_to_cart');


class Sp_Show_Modal extends SP_Framework_AJAX {
	function ajax_action() {
		$productID = sanitize_text_field($_POST['productID']);
		$dataModal = sanitize_text_field($_POST['dataModal']);

		if($dataModal == 'addToCart'){
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
		            
		            $result .= '<div class="catalog-price-group price-ajax-result-'.$productID.'">';
		               $result .= sp_get_product_price($productID);
		            $result .= '</div>';

	                $result .= '</div>';
	            $result .= '</div>';
	        $result .= '</div>';

	        $result .= sp_get_variant_product($productID);
	        $result .= sp_get_additional_product($productID);

	        $result .= '<div class="modal-product-btn-wrap">';
	            $result .= '<button class="button product__button product__button-cancel">Cancel</button>';
	            $result .= '<button class="button product__button add-to-cart add-to-cart-'.$productID.'" variant-id="'.$variantID.'" data-product-id="'.$productID.'">add to cart</button>';
	        $result .= '</div>';  
	    }      


	    if($dataModal == 'review'){
	    	$result .= '<form class="review-form" id="review-form" product-id="'.$productID.'">';
		    	$result .= '<div class="review-form-wrap">';
		    		
		    		$result .= '<input type="text" class="sp-form-field" data-field="email" placeholder="Your e-mail" required="">';
		    		$result .= '<input type="text" class="sp-form-field" data-field="name" placeholder="Your name" required="">';
		    		$result .= '<textarea class="sp-form-field" data-field="review" placeholder="Your review" required=""></textarea>';

		    	$result .= '</div>';

		    	$result .= '<div class="review-form-btn-wrap">';
		            $result .= '<button class="button reviews__button">Send</button>';
		        $result .= '</div>';

	        $result .= '</form>';
	    }

		echo json_encode(array('result' => $result));

		wp_die();
	}
}
$spShowModal = new Sp_Show_Modal('sp_show_modal');


class SP_Send_Contact_Form extends SP_Framework_AJAX {
	function ajax_action() {
		$postData = sanitize_text_field($_POST['data']);
		$postData = stripslashes($postData);
		$postData = json_decode($postData, true);

		$mailTo = get_theme_mod('notification_email');
		$mailFrom = get_theme_mod('sender_email');

		foreach ($postData as $key => $value) {
	    	$emailText .= '<strong>'.$key.'</strong>: '.$value.'<br>';
	    }

	    add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

		$argsMail = array(
			'email_to' 		=> $mailTo,
			'email_from' 	=> $mailFrom,
			'from'			=> 'The Fine Cakery',
			'subject' 		=> 'Message from contact form',
			'message'		=> $emailText,
		);	

		SP_Framework_Mail::send($argsMail);

		wp_die();
	}
}
$spSendContactForm = new Sp_Send_Contact_Form('sp_send_contact_form');



class Sp_Send_Partners_Form extends SP_Framework_AJAX {
	function ajax_action() {
		$postData = sanitize_text_field($_POST['data']);
		$postData = stripslashes($postData);
		$postData = json_decode($postData, true);

		$mailTo = get_theme_mod('notification_email');
		$mailFrom = get_theme_mod('sender_email');

		foreach ($postData as $key => $value) {
	    	$emailText .= '<strong>'.$key.'</strong>: '.$value.'<br>';
	    }

	    add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

		$argsMail = array(
			'email_to' 		=> $mailTo,
			'email_from' 	=> $mailFrom,
			'from'			=> 'The Fine Cakery',
			'subject' 		=> 'Message from partners form',
			'message'		=> $emailText,
		);	

		SP_Framework_Mail::send($argsMail);

		$mailTo = $postData['E-mail'];
		$emailText = get_theme_mod('notification_text');
		$file = get_theme_mod('notification_file');
		
		$contDir = WP_CONTENT_DIR;
		$homeUrl = get_home_url.'/wp-content';

		$file = str_replace($homeUrl, $contDir , $file);

		$argsMail = array(
			'email_to' 		=> $mailTo,
			'email_from' 	=> $mailFrom,
			'from'			=> 'The Fine Cakery',
			'subject' 		=> 'The Fine Cakery',
			'message'		=> $emailText,
			'attachments'   => $file,
		);	

		SP_Framework_Mail::send($argsMail);

		wp_die();
	}
}
$spSendPartnersForm = new Sp_Send_Partners_Form('sp_send_partners_form');


class SP_Send_Review extends SP_Framework_AJAX {
	function ajax_action() {
		$productID = sanitize_text_field($_POST['productID']);
		$title = get_the_title($productID);
		//$rating 	= sanitize_text_field($_POST['rating']);

		$postData 	= sanitize_text_field($_POST['data']);
		$postData 	= stripslashes($postData);
		$postData 	= json_decode($postData, true);

		$data = array(
			'comment_post_ID'      => $productID,
			'comment_author'       => $postData['name'],
			'comment_author_email' => $postData['email'],
			'comment_content'      => $postData['review'],
			//'user_id'              => 1,
			'comment_approved'     => 0,
			'comment_author_url'   => $title,
			//'comment_karma'        => $rating,	
		);

		$commentID = wp_insert_comment(wp_slash($data));

		if($commentID){
			update_post_meta($commentID, 'comment_title', $title);
			//update_post_meta($commentID, 'comment_rating', $rating);
		}

		wp_die();
	}
}
$spSendReview = new SP_Send_Review('sp_send_review');
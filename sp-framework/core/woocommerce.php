<?php
/*
* WooCommerce
*/


/*
* GDPR
*/


function sp_add_checkout_privacy_policy() {
    woocommerce_form_field( 'privacy_policy', array(
       'type'          => 'checkbox',
       'class'         => array('form-row privacy'),
       'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox'),
       'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
       'required'      => true,
       'default'       => 1,
       'label'         => __( 'By ticking this box you declare that you have read and accepted our <a href="'.get_permalink(PRIVACY_POLICY_PAGE_ID).'">Privacy Policy</a> and <a href="'.get_permalink(TERMS_PAGE_ID).'">Terms of service</a>', 'sp-theme'),
    )); 
}
       
function sp_not_approved_privacy() {
    if ( ! (int) isset( $_POST['privacy_policy'] ) ) {
        wc_add_notice( __( 'Please read our terms and check the box ', 'sp-theme'), 'error' );
    }
}

add_action('woocommerce_review_order_before_submit', 'sp_add_checkout_privacy_policy', 9);
add_action('woocommerce_checkout_process', 'sp_not_approved_privacy');


/*
* DatePicker Checkout
*/


function enabling_date_picker() {
    if( is_admin() || ! is_checkout() ) return;

    wp_enqueue_script( 'jquery-ui-datepicker' );
}
add_action( 'wp_enqueue_scripts', 'enabling_date_picker' );


function sp_datepicker_field( $checkout ) {

    $title1 = get_theme_mod('sp_delivery_date_title1');
    $title2 = get_theme_mod('sp_delivery_date_title2');
    $placeholder = get_theme_mod('sp_delivery_date_placeholder');
    $delay = get_theme_mod('sp_delivery_date_delay');

    if(empty($delay)){
        $delay = 1;
    }

    date_default_timezone_set('America/Los_Angeles');
    $mydateoptions = array('' => __('Select PickupDate', 'woocommerce' ));

    echo '<div id="my_custom_checkout_field">
    <h3>'.$title1.'</h3>';

    echo '
    <script>
        jQuery(function($){
            $("#datepicker").datepicker({ minDate: '.$delay.'});
        });
    </script>';

   woocommerce_form_field( 'delivery_date', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'id'            => 'datepicker',
        'required'      => false,
        'label'         => $title2,
        'placeholder'   => $placeholder,
        'options'       => $mydateoptions
        ),
    $checkout->get_value( 'cylinder_collect_date' ));

    echo '</div>';
}
add_action('woocommerce_after_order_notes', 'sp_datepicker_field', 10, 1);


function sp_checkout_field_update_order_meta($order_id) {

    if (!empty($_POST['delivery_date'])) {
        update_post_meta($order_id, 'Delivery Date', sanitize_text_field($_POST['delivery_date']));
    }
}
add_action('woocommerce_checkout_update_order_meta', 'sp_checkout_field_update_order_meta');


/*
* Cart
*/


function cart_product_title( $title, $values, $cart_item_key ) {

    if(isset($values['custom_product_name']) && !empty($values['custom_product_name'])){
        return $title.' ('.$values['custom_product_name'].')';
    } else {
        return $title;
    }    
}
add_filter( 'woocommerce_cart_item_name', 'cart_product_title', 20, 3);


/*
function cart_item_price( $price, $values, $cart_item_key ) {

    //print_r($values);

    if(isset($values['custom_price']) && !empty($values['custom_price'])){
        return '<span class="woocommerce-Price-currencySymbol">'.get_woocommerce_currency_symbol().'</span> '.$values['custom_price'];
    } else {
        return $price;
    }    

    return $price;
}
add_filter( 'woocommerce_cart_item_price', 'cart_item_price', 10, 3 );
*/


add_action('woocommerce_before_calculate_totals', 'apply_custom_price_to_cart_item', 99);
function apply_custom_price_to_cart_item( $cart_object ) {  
    if( !WC()->session->__isset( "reload_checkout" )) {
        foreach ( $cart_object->cart_contents as $key => $value ) {
            if( isset( $value["custom_price"] ) ) {
                if($value['data']->id == $value["custom_ID"]){
                    $value['data']->set_price($value["custom_price"]);
                }   
            }
        }  
    }  
}
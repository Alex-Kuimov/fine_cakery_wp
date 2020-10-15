<?php
/*
* WooCommerce
*/

//GDPR   
function sp_add_checkout_privacy_policy() {
    woocommerce_form_field( 'privacy_policy', array(
       'type'          => 'checkbox',
       'class'         => array('form-row privacy'),
       'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox sp-checkbox'),
       'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
       'required'      => true,
       'default'       => 1,
       'label'         => 'I have read and agree to the website <a href="'.get_permalink(PRIVACY_POLICY_PAGE_ID).'">terms and conditions</a>',
    )); 
}
       
function sp_not_approved_privacy() {
    if ( ! (int) isset( $_POST['privacy_policy'] ) ) {
        wc_add_notice( __( 'You have not read and agree to the website <a href="'.get_permalink(PRIVACY_POLICY_PAGE_ID).'">terms and conditions' ), 'error' );
    }
}


add_action('woocommerce_review_order_before_submit', 'sp_add_checkout_privacy_policy', 9);
add_action('woocommerce_checkout_process', 'sp_not_approved_privacy');



/*
* DatePicker Checkout
*/

// Register main datepicker jQuery plugin script
add_action( 'wp_enqueue_scripts', 'enabling_date_picker' );
function enabling_date_picker() {

    // Only on front-end and checkout page
    if( is_admin() || ! is_checkout() ) return;

    // Load the datepicker jQuery-ui plugin script
    wp_enqueue_script( 'jquery-ui-datepicker' );
}

// Call datepicker functionality in your custom text field
add_action('woocommerce_after_order_notes', 'sp_datepicker_field', 10, 1);
function sp_datepicker_field( $checkout ) {

    date_default_timezone_set('America/Los_Angeles');
    $mydateoptions = array('' => __('Select PickupDate', 'woocommerce' ));

    echo '<div id="my_custom_checkout_field">
    <h3>'.__('Delivery Date').'</h3>';

    // YOUR SCRIPT HERE BELOW
    echo '
    <script>
        jQuery(function($){
            $("#datepicker").datepicker({ minDate: 0});
        });
    </script>';

   woocommerce_form_field( 'delivery_date', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'id'            => 'datepicker',
        'required'      => false,
        'label'         => __('Delivery Date'),
        'placeholder'       => __('Select Date'),
        'options'     =>   $mydateoptions
        ),
    $checkout->get_value( 'cylinder_collect_date' ));

    echo '</div>';
}

/*
* Process the checkout
*/


/*
add_action('woocommerce_checkout_process', 'sp_checkout_field_process');
function sp_checkout_field_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['delivery_date'])
        wc_add_notice( '<strong>Delivery Date</strong> ' . __( 'is a required field.', 'woocommerce' ), 'error' );
}
*/

/*
* Update the order meta with custom fields values 
*/

add_action('woocommerce_checkout_update_order_meta', 'sp_checkout_field_update_order_meta');
function sp_checkout_field_update_order_meta($order_id) {

    if (!empty($_POST['delivery_date'])) {
        update_post_meta($order_id, 'Delivery Date', sanitize_text_field($_POST['delivery_date']));
    }
}
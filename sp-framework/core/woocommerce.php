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

<?php
/**
 * The template for displaying the footer
 *
 */

echo sp_get_section_instagram();
?>

<div class="footer">

    <div class="container">

        <div class="footer-wrap-row">

            <?php echo sp_get_menu('footer');?>

            <?php echo sp_get_contacts('footer');?>

        </div>

        <div class="footer-wrap-col">
            <?php echo sp_get_footer_info();?>
        </div>

    </div>

</div>

<a href="<?php echo SP_Framework_Woocommerce::get_cart_url();?>" class="floating-cart">
    <span class="floating-cart__count"><?php echo SP_Framework_Woocommerce::get_cart_count();?></span>
    <img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/cart.svg" alt="cart">
</a>

<div class="back-to-top">
    <i class="fas fa-chevron-up"></i>
</div>


<div class="modal-cover">
    <div class="modal">
        <div class="modal__header">
            <p class="modal__title"></p>
            <img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/close-menu.svg" class="modal__close close-modal">
        </div>
        
        <div class="modal__body modal-ajax-result">

        </div>    
    </div>    
</div>    

<?php wp_footer(); ?>

</body>
</html>
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

<div class="floating-cart">
    <span class="floating-cart__count">9</span>
    <img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/cart.svg" alt="image">
</div>

<div class="back-to-top">
    <i class="fas fa-chevron-up"></i>
</div>

<?php wp_footer(); ?>

</body>
</html>
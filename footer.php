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
    <span class="floating-cart__count">0</span>
    <img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/cart.svg" alt="image">
</div>

<div class="back-to-top">
    <i class="fas fa-chevron-up"></i>
</div>


<div class="modal-cover close-modal">
    <div class="modal">
        <div class="modal__header">
            <p class="modal__title">Options</p>
            <img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/close-menu.svg" class="modal__close close-modal">
        </div>
        
        <div class="modal__body">

            <div class="modal-product-wrap">
                <div class="modal-product-wrap__item">
                    <img src="http://127.0.0.1/fine_cakery/wp-content/uploads/2020/10/i01.jpg" alt="image">
                </div>    
                <div class="modal-product-wrap__item">
                    <p>Blueberry Chocolate</p>
                    <div class="catalog__wrap">
                        <span class="catalog__currency">CHF</span>
                        <span class="catalog__price">80</span>
                    </div>
                </div>
            </div>

            <p class="product__select-title">Choose the size:</p>
            <select class="product__select product__variant" data-product-id="69">
                <option value="84">16cm - 8 points</option>
                <option value="85">20cm - 12 points</option>
            </select>

            <p class="product__select-title">Choose the flavour:</p>
            <select class="product__select">
                <option value="Vanilla ">Vanilla </option>
                <option value=" Somethings"> Somethings</option>
            </select>

            <div class="modal-product-btn-wrap">
                <button class="button product__button product__button-cancel">Cancel</button>
                <button class="button product__button add-to-cart" variant-id="" data-product-id="69">add to cart</button>
            </div>    

        </div>    
    </div>    
</div>    

<?php wp_footer(); ?>

</body>
</html>
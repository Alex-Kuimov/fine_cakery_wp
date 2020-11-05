jQuery(document).ready(($) => {

    'use strict';

    const menuTop = $('.top-menu').offset().top;
    const menu = $('.top-menu').clone().appendTo('.header').css('display', 'none').addClass('stiky-menu');

    let frontEnd = {

        actions: function() {
            $('.favorite__item').on('mouseenter', frontEnd.showBtn);
            $('.favorite__item').on('mouseleave', frontEnd.hideBtn);

            $('.catalog__item').on('mouseenter', frontEnd.showImg);
            $('.catalog__item').on('mouseleave', frontEnd.hideImg);

            $('.back-to-top').on('click', frontEnd.backToTopScroll);

            $(window).scroll(frontEnd.stickyMenu);
            $(window).scroll(frontEnd.backToTopShow);

            $('.show-menu').on('click', frontEnd.menuShow);
            $('.close-menu').on('click', frontEnd.menuHide);

            $('.close-modal').on('click', frontEnd.closeModal);
            $('.show-modal').on('click', frontEnd.showModal);

            jQuery( window ).load(function(){frontEnd.stickyFooter()});
            jQuery( window ).resize(function(){frontEnd.stickyFooter()});
        },

        sliders: function() {
            var frontPageSlider = new Swiper('.front-page-slider', {
                loop: false,

                pagination: {
                    el: '.swiper-pagination',
                    dynamicBullets: true,
                },

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });


            var forPartnersSlider= new Swiper('.for-partners-slider', {
                loop: false,

                pagination: {
                    el: '.swiper-pagination',
                },

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });


            var productPageSliderThumbs = new Swiper('.product-slider-thumbs', {
                direction: 'vertical',
                slidesPerView: 4,
            });

            var productPageSlider = new Swiper('.product-slider', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: productPageSliderThumbs
                }
            });
        },

        showBtn: function() {
            let itemID = $(this).attr('id');
            $('#' + itemID + ' .favorite__button').addClass('show');
            $('#' + itemID + ' img').addClass('zoom');
        },

        hideBtn: function() {
            let itemID = $(this).attr('id');
            $('#' + itemID + ' .favorite__button').removeClass('show');
            $('#' + itemID + ' img').removeClass('zoom');
        },

        showImg: function() {
            let itemID = $(this).attr('id');
            if($('#' + itemID + ' .catalog__item-second-image').length > 0){
                $('#' + itemID + ' .catalog__item-first-image').addClass('hide');
                $('#' + itemID + ' .catalog__item-second-image').addClass('show');
            }  

            $('#' + itemID + ' .catalog__button').addClass('catalog__button-hover');  
            $('#' + itemID + ' .catalog__title').addClass('catalog__title-hover');  
        },

        hideImg: function() {
            let itemID = $(this).attr('id');

            if($('#' + itemID + ' .catalog__item-second-image').length > 0){
                $('#' + itemID + ' .catalog__item-first-image').removeClass('hide');
                $('#' + itemID + ' .catalog__item-second-image').removeClass('show');
            }

            $('#' + itemID + ' .catalog__button').removeClass('catalog__button-hover'); 
            $('#' + itemID + ' .catalog__title').removeClass('catalog__title-hover');
        },

        stickyMenu: function() {
            let scrollTop = $(this).scrollTop();

            if (scrollTop >= menuTop) {
                $('.stiky-menu').fadeIn(400);
            } else {
                $('.stiky-menu').fadeOut(400);
            }
        },

        stickyFooter: function(){
            let header  = jQuery( 'header' ),
                footer  = jQuery( 'footer' ),
                content = jQuery( '.content-auto-height' );

            content.css( 'min-height', '1px' );
            
            let headerHeight  = header.outerHeight(),
                footerHeight  = footer.outerHeight(),
                contentHeight = content.outerHeight(),
                windowHeight  = jQuery( window ).height(),
                totalHeight   = headerHeight + footerHeight + contentHeight;
            
            if (totalHeight < windowHeight) {
                content.css( 'min-height', windowHeight - headerHeight - footerHeight );
            } else {
                content.css( 'min-height','1px' );
            }
        },

        backToTopShow: function() {
            let scrollTop = $(this).scrollTop();

            if (scrollTop != 0) {
                $('.back-to-top').fadeIn('500').css('display', 'flex');
            } else {
                $('.back-to-top').fadeOut('500').css('display', 'flex');
            }
        },

        backToTopScroll: function() {
            $('body,html').animate({ scrollTop: 0 }, 800);
        },

        menuShow: function() {
            $('.top-menu').fadeIn('500').css('display', 'flex');
            $('.header-social').fadeIn('500').css('display', 'flex');
            $('.header-lang').fadeIn('500').css('display', 'flex');
            $('.show-menu').css('display', 'none');
            $('.close-menu').fadeIn('500');
        },

        menuHide: function() {
            $('.top-menu').fadeOut('500');
            $('.header-social').fadeOut('500');
            $('.header-lang').fadeOut('500');
            $('.close-menu').css('display', 'none');
            $('.show-menu').fadeIn('500');
        },

        closeModal: function(){
            $('.modal-cover').fadeOut('500');
        },

        showModal: function(){
            $('.modal-cover').fadeIn('500').css('display', 'flex');
            return false;
        },

        select: function(){
            $('.select').each(function() {
                const _this = $(this),
                    selectOption = _this.find('option'),
                    selectID = _this.attr('id'),
                    selectClass = $(this).attr('data-class'),
                    selectOptionLength = selectOption.length,
                    selectedOption = selectOption.filter(':selected'),
                    duration = 450; // длительность анимации 

                _this.hide();
                _this.wrap('<div class="select"></div>');
                $('<div>', {
                    class: 'new-select '+ selectID,
                    text: _this.children('option:first').text()
                }).insertAfter(_this);

                const selectHead = _this.next('.new-select');
                $('<div>', {
                    class: 'new-select__list'
                }).insertAfter(selectHead);

                const selectList = selectHead.next('.new-select__list');
                for (let i = 0; i < selectOptionLength; i++) {
                    $('<div>', {
                        class: 'new-select__item '+selectClass,
                        html: $('<span>', {
                            text: selectOption.eq(i).text()
                        })
                    })
                    .attr('data-value', selectOption.eq(i).val())
                    .attr('data-product-id', $(this).attr('data-product-id'))
                    .appendTo(selectList);
                }

                const selectItem = selectList.find('.new-select__item');
                selectList.slideUp(0);
                selectHead.on('click', function() {
                    if ( !$(this).hasClass('on') ) {
                        $(this).addClass('on');
                        selectList.slideDown(duration);

                        selectItem.on('click', function() {
                            let chooseItem = $(this).data('value');

                            $('select').val(chooseItem).attr('selected', 'selected');
                            selectHead.text( $(this).find('span').text() );

                            selectList.slideUp(duration);
                            selectHead.removeClass('on');

                        });

                    } else {
                        $(this).removeClass('on');
                        selectList.slideUp(duration);
                    }
                });
            });
        }, 

        init: function() {
            frontEnd.actions();
            frontEnd.sliders();
            frontEnd.select();
        },
    }

    let backEnd = {
        actions: function() {
            $('.show-modal').on('click', backEnd.showModal);
            //$('body').on('change', '.product__variant', backEnd.showVariant);
            $('body').on('click', '.add-to-cart', backEnd.addToCart);
            $('body').on('submit', '.contact-us__form', backEnd.sendForm);
            $('body').on('submit', '.review-form', backEnd.sendForm);
            $('body').on('submit', '.partners-contact-form', backEnd.sendForm);
            $('body').on('click', '.product__variant', backEnd.showVariantCustom);
        },

        /*showVariant: function() {
            let variantID = $(this).val(),
                productID = $(this).attr('data-product-id');

            $('.add-to-cart').attr('variant-id', variantID);  

            $('.add-to-cart-'+productID).addClass('disable');

            let formData = new FormData();
                formData.append('action', 'sp_get_product_variable');
                formData.append('variantID', variantID);
                formData.append('productID', productID);

            $.ajax({
                url: spJs.ajaxUrl,
                type: 'POST',
                data: formData,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {  
                    let regularPrice = parseFloat(data.regularPrice),
                        salePrice = parseFloat(data.salePrice),
                        symbol = data.symbol,
                        productPrice = '';

                    regularPrice = regularPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$& ');  
                    salePrice = salePrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$& '); 
                    
                    regularPrice = regularPrice.replace('.00', '');
                    salePrice = salePrice.replace('.00', '');

                    if(salePrice != regularPrice){  
                        
                        productPrice += '<div class="catalog-price-wrap catalog-price-old">';
                            productPrice += '<span class="catalog__currency">'+symbol+'&nbsp;</span>';
                            productPrice += '<span class="catalog__price">'+regularPrice+'</span>';
                        productPrice += '</div>';    

                        productPrice += '<div class="catalog-price-wrap catalog-price-new">';
                            productPrice += '<span class="catalog__currency">'+symbol+'&nbsp;</span>';
                            productPrice += '<span class="catalog__price">'+salePrice+'</span>';
                        productPrice += '</div> ';

                    } else {                       
                        productPrice += '<div class="catalog-price-wrap catalog-price-regular">';
                            productPrice += '<span class="catalog__currency">'+symbol+'&nbsp;</span>';
                            productPrice += '<span class="catalog__price">'+regularPrice+'</span>';
                        productPrice += '</div> ';
                    }

                    $('.price-ajax-result-'+productID).html(productPrice);
                    $('.add-to-cart-'+productID).attr('variant-id', variantID);
                    $('.add-to-cart-'+productID).removeClass('disable');
                }
            });
        },*/

        showVariantCustom: function() {

            let variantID = parseInt($(this).attr('data-value')),
                productID = parseInt($(this).attr('data-product-id'));

            $('.add-to-cart').attr('variant-id', variantID);  
            $('.add-to-cart-'+productID).addClass('disable');

            let formData = new FormData();
                formData.append('action', 'sp_get_product_variable');
                formData.append('variantID', variantID);
                formData.append('productID', productID);

            $.ajax({
                url: spJs.ajaxUrl,
                type: 'POST',
                data: formData,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {  
                    let regularPrice = parseFloat(data.regularPrice),
                        salePrice = parseFloat(data.salePrice),
                        symbol = data.symbol,
                        productPrice = '';

                    regularPrice = regularPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$& ');  
                    salePrice = salePrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$& '); 
                    
                    regularPrice = regularPrice.replace('.00', '');
                    salePrice = salePrice.replace('.00', '');

                    if(salePrice != regularPrice){  
                        
                        productPrice += '<div class="catalog-price-wrap catalog-price-old">';
                            productPrice += '<span class="catalog__currency">'+symbol+'&nbsp;</span>';
                            productPrice += '<span class="catalog__price">'+regularPrice+'</span>';
                        productPrice += '</div>';    

                        productPrice += '<div class="catalog-price-wrap catalog-price-new">';
                            productPrice += '<span class="catalog__currency">'+symbol+'&nbsp;</span>';
                            productPrice += '<span class="catalog__price">'+salePrice+'</span>';
                        productPrice += '</div> ';

                    } else {                       
                        productPrice += '<div class="catalog-price-wrap catalog-price-regular">';
                            productPrice += '<span class="catalog__currency">'+symbol+'&nbsp;</span>';
                            productPrice += '<span class="catalog__price">'+regularPrice+'</span>';
                        productPrice += '</div> ';
                    }

                    $('.price-ajax-result-'+productID).html(productPrice);
                    $('.add-to-cart-'+productID).attr('variant-id', variantID);
                    $('.add-to-cart-'+productID).removeClass('disable');
                }
            });
        },

        addToCart: function(){
            let productID = $(this).attr('data-product-id'),
                variationID = $(this).attr('variant-id'),
                additional = $('.product__additional-'+productID).html();

                console.log(productID);
                console.log(variationID);
                console.log(additional);

            let formData = new FormData();
                formData.append('action', 'sp_add_to_cart');
                formData.append('productID', productID);
                formData.append('variationID', variationID);
                if(typeof(additional) != 'undefined')formData.append('additional', additional);

            $.ajax({
                url: spJs.ajaxUrl,
                type: 'POST',
                data: formData,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('.floating-cart__count').html(data.cartCount);
                    $('.go-to-cart-wrap').fadeIn('500').css('display', 'flex');
                    $('.add-to-cart-'+productID).html('In the cart');

                    setTimeout(function () {
                        $('.modal-cover').fadeOut('700');
                    }, 500);
                }

            });
        },

        showModal: function(){
            let productID = $(this).attr('product-id'),
                dataModal = $(this).attr('data-modal');

            let formData = new FormData();
            formData.append('action', 'sp_show_modal');
            formData.append('dataModal', dataModal);
            
            if(dataModal == 'addToCart'){
                formData.append('productID', productID);
                $('.modal__title').html('Options');
            }  

            if(dataModal == 'review'){
                formData.append('productID', productID);
                $('.modal__title').html('Review');
            }  

            $('.modal-ajax-result').html('');

            $.ajax({
                url: spJs.ajaxUrl,
                type: 'POST',
                data: formData,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('.modal-ajax-result').html(data.result);
                    frontEnd.select();
                }
            });
        },

        getFormData: function(form){
            let formData = {};

            $(form+' .sp-form-field').each(function(i, item) {
                let data  = item.getAttribute('data-field'),
                    value = item.value;

                formData[data] = value;                
            });        

            return formData; 
        },

        sendForm: function(){
            let formData = new FormData(), 
                formID = $(this).attr('id'),
                msg = $(this).attr('msg'),
                data = {};
                
            if(formID == 'contact-form'){
                data = backEnd.getFormData('.contact-us__form');
                formData.append('action', 'sp_send_contact_form');

                $('.modal__title').html('Message');
                $('.modal-ajax-result').html('');

                setTimeout(function () {
                    $('.sp-form-field').val('');
                    $('.modal-ajax-result').html('<p class="success">'+msg+'</p>');
                    frontEnd.showModal();                      
                }, 500);
            } 

            if(formID == 'partners-form'){
                data = backEnd.getFormData('.partners-contact-form');
                formData.append('action', 'sp_send_partners_form');

                $('.modal__title').html('Message');
                $('.modal-ajax-result').html('');

                setTimeout(function () {
                    $('.sp-form-field').val('');
                    $('.modal-ajax-result').html('<p class="success">'+msg+'</p>');
                    frontEnd.showModal();                      
                }, 500);
            }

            if(formID == 'review-form'){
                let productID = $(this).attr('product-id');

                data = backEnd.getFormData('.review-form');
                formData.append('action', 'sp_send_review');
                formData.append('productID', productID);

                $('.modal__title').html('Message');
                $('.modal-ajax-result').html('');

                setTimeout(function () {
                    $('.sp-form-field').val('');
                    $('.modal-ajax-result').html('<p class="success">'+msg+'</p>');                   
                }, 500);
            }   

            formData.append('data', JSON.stringify(data));
            
            $.ajax({
                url: spJs.ajaxUrl,
                type: 'POST',
                data: formData,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('.sp-form-field').val('');
                }
            });

            return false;
        },

        init: function() {
            backEnd.actions();
        },
    }

    frontEnd.init();
    backEnd.init();

});
<?php
/*
* Functions 
*/


/*
* System
*/

function sp_set_page_template($template){
    $currentId = get_the_ID();
    $currentPostType = get_post_type($currentId);

    if(is_single() && $currentPostType == 'product'){
        $template = locate_template('page-templates/single-product-page-template.php'); 
    }

    if(is_product_category() || is_product_tag()){
        $template = locate_template('page-templates/catalog-page-template.php');
    }

    return $template;
}
add_filter('template_include', 'sp_set_page_template', 99);


function sp_decl_of_num($num, $result=null) {
    $result = __('Reviews', 'sp-theme');

    if($num == 0){
        $result = __('Reviews', 'sp-theme');
    }

    if($num == 1){
        $result = __('Review', 'sp-theme');   
    }


    return $result;
}


/*
*  Main
*/


function sp_get_menu($type=null, $result=null){

    if($type=='header'){

        $itemsLv1 = SP_Framework_Menu::get('top-menu'); 

        $result .= '<div class="top-menu">';

            foreach ($itemsLv1 as $itemLv1) {
                $result .= '<a href="'.$itemLv1['url'].'" title="'.$itemLv1['title'].'" class="top-menu__item">'.$itemLv1['title'].'</a>';
            }

        $result .= '</div>';

    }


    if($type=='footer'){

        $itemsLv1 = SP_Framework_Menu::get('bottom-menu'); 

        $result .= '<div class="footer-menu">';

            foreach ($itemsLv1 as $itemLv1) {
                $result .= '<a href="'.$itemLv1['url'].'" title="'.$itemLv1['title'].'" class="footer-menu__item">'.$itemLv1['title'].'</a>';
            }

        $result .= '</div>';

    }

    return $result;
}

function sp_get_contacts($type=null, $result=null){

    $phone = get_theme_mod('sp_contact_phone');
	$email = get_theme_mod('sp_contact_email');
	$address = get_theme_mod('sp_contact_address');
    $facebook = get_theme_mod('sp_contact_facebook');
    $instagram = get_theme_mod('sp_contact_instagram');

    if($type=='header'){
        $result .= '<div class="header__item header-social">';
            if($facebook){
                $result .= '<a href="'.$facebook.'" class="header-social__item"><i class="fab fa-facebook-f"></i></a>';
            }

            if($instagram){
                $result .= '<a href="'.$instagram.'" class="header-social__item"><i class="fab fa-instagram"></i></a>';
            }    
        $result .= '</div>';
    }

    if($type=='front'){
        $result .= '<div class="contact-us__item contact-us__text">';

            if($phone){
                $result .= '<p><i class="fas fa-phone-alt"></i> '.$phone.'</p>';
            }

            if($email){
                $result .= '<p><i class="fas fa-envelope"></i> '.$email.'</p>';
            }

            if($address){
                $result .= '<p><i class="fas fa-map-marker-alt"></i> '.$address.'</p>';
            }

            $result .= '<div class="contact-us__item contact-us-social">';
                if($facebook){
                    $result .= '<a href="'.$facebook.'" class="contact-us-social__item"><i class="fab fa-facebook-f"></i></a>';
                }

                if($instagram){
                    $result .= '<a href="'.$instagram.'" class="contact-us-social__item"><i class="fab fa-instagram"></i></a>';
                }    
            $result .= '</div>';

        $result .= '</div>';
    }

    if($type=='partners'){

        $result .= '<div class="for-partners-contact__text">';
            
            if($phone){
                $result .= '<p><i class="fas fa-phone-alt"></i> '.$phone.'</p>';
            }

            if($email){
                $result .= '<p><i class="fas fa-envelope"></i> '.$email.'</p>';
            }

            if($address){
                $result .= '<p><i class="fas fa-map-marker-alt"></i> '.$address.'</p>';
            }

        $result .= '</div>';

    }

    if($type=='footer'){

        $result .= '<div class="footer-contacts">';

            if($phone){
                $result .= '<p><i class="fas fa-phone-alt"></i> '.$phone.'</p>';
            }

            if($email){
                $result .= '<p><i class="fas fa-envelope"></i> '.$email.'</p>';
            }

            if($address){
                $result .= '<p><i class="fas fa-map-marker-alt"></i> '.$address.'</p>';
            }

            $result .= '<div class="footer-social">';
                if($facebook){
                    $result .= '<a href="'.$facebook.'" class="footer-social__item"><i class="fab fa-facebook-f"></i></a>';
                }
                  
                if($instagram){
                    $result .= '<a href="'.$instagram.'" class="footer-social__item"><i class="fab fa-instagram"></i></a>';
                }    
            $result .= '</div>';
        $result .= '</div>';

    }

    return $result;
}

function sp_get_header_info($result=null){
 
    if(isset($_GET['lang'])){
        if($_GET['lang'] == 'de'){
            $activeDE = ''; 
            $activeEN = 'header-lang__link_active'; 
        } else {
            $activeDE = 'header-lang__link_active'; 
            $activeEN = ''; 
        }        
    } else {
        $activeDE = 'header-lang__link_active'; 
        $activeEN = ''; 
    }

    $logo = get_theme_mod('sp_logo_header');

    $result .= '<div class="header__item header-logo">';
        $result .= '<a href="'.esc_url(get_home_url()).'" title="'.get_bloginfo('name').'">';
            
        if($logo){
            $result .= '<img src="'.esc_url($logo).'" class="header-logo__image" alt="image: '.get_bloginfo('name').'">';
        } else {
            $result .= '<p>'.get_bloginfo('name').'</p>';
        }

        $result .= '</a>';
    $result .= '</div>';

    $result .= '<div class="header__item header-lang">';
        $result .= '<a href="?lang=en" class="header-lang__link '.$activeDE.'" title="EN">EN</a>';
        $result .= '<a href="?lang=de" class="header-lang__link '.$activeEN.'" title="DE">DE</a>';
    $result .= '</div>';

    return $result;
}

function sp_get_footer_info($result=null){

    $logo = get_theme_mod('sp_logo_footer');
    $copyright = get_theme_mod('sp_footer_copyright');

    if($logo){
        $result .= '<img src="'.esc_url($logo).'" class="footer__image" alt="image: '.get_bloginfo('name').'">';
    }

    if($copyright){
        $result .= '<p class="footer__copyright">'.$copyright.' '.date('Y').'</p>';
    }

    return $result;
}

function sp_get_breadcrumbs($result=null){
    if(!is_front_page() && !is_404()){
        
        $postID 	= get_the_ID();
        $postType 	= get_post_type($postID);
        $blogPageID = get_option('page_for_posts');
        $shopPageID = get_option('woocommerce_shop_page_id');

        $result .= '<div class="breadcrumbs container">';

            $result .= '<a href="'.esc_url(get_home_url()).'">Home</a>';

            if($postType == 'post' && is_single()){
                
                $result .= ' • <a href="'.esc_url(get_the_permalink($blogPageID)).'">'.get_the_title($blogPageID).'</a>';

            }

            if(is_archive()){

            }

            if(is_home()){ 
                $result .= ' • <span>'.get_the_title($blogPageID).'</span>';
            }

            if(is_product_category()){

                $result .= ' • <a href="'.esc_url(get_the_permalink($shopPageID)).'">'.get_the_title($shopPageID).'</a>';

                $queriedObject = get_queried_object();

                if($queriedObject->parent != '0'){
                    $termID = $queriedObject->parent;
                    $term = get_term_by( 'id', $termID, 'product_cat');
                    $result .= '• <a href="'.get_term_link($termID).'">'.$term->name.'</a>';
                }

            }

            if($postType == 'product' && is_single()){

                $result .= ' • <a href="'.esc_url(get_the_permalink($shopPageID)).'">'.get_the_title($shopPageID).'</a>';

                $termList = wp_get_post_terms($postID, 'product_cat', array('fields'=>'all'));

                if(!empty($termList)){
                    foreach ($termList as $termItem) {
                        $termID = $termItem->term_id;
                        if($termItem->parent == '0'){
                            $term = get_term_by( 'id', $termID, 'product_cat');
                            $result .= ' • <a href="'.get_term_link($termID).'">'.$term->name.'</a>';
                        }   
                    }
                }

                if(!empty($termList)){
                    foreach ($termList as $termItem) {
                        $termID = $termItem->term_id;
                        if($termItem->parent != '0'){
                            $term = get_term_by( 'id', $termID, 'product_cat');
                            $result .= ' • <a href="'.get_term_link($termID).'">'.$term->name.'</a>';
                        }
                    }
                }

            }

            if(is_single() || is_page()){
                $result .= ' • <span>'.get_the_title().'</span>';
            }

        //$result .= '<a href="index.html">Home</a> • <span>Blog</span>';
        
        $result .= '</div>';
    }    

    return $result;
}

function sp_get_gallery($postID=null, $result=null){

    $title = SP_Framework_Post_Type_Utility::get_meta($postID, 'post_images_title');
    $images = SP_Framework_Post_Type_Utility::get_meta($postID, 'img_post_images');

    if($images[0]!=''){
        $result .= '<div class="gallery container">';

            if($title){
                $result .= '<h2>'.$title.'</h2>';
            }
                
            $result .= '<div class="gallery-wrap">';
                foreach ($images as $imageID) {
                    $imageFull = wp_get_attachment_image_url($imageID, 'full');
                    $imageLarge = wp_get_attachment_image_url($imageID, 'large');

                    $result .= '<a class="gallery__item" href="'.$imageFull.'" data-fancybox="group"><img src="'.$imageLarge.'" alt="image: '.get_the_title($postID).'"></a>';
                }
            $result .= '</div>';

        $result .= '</div>';
    }    

    return $result; 
}


/*
* Front Page
*/


function sp_get_section_slider($result=null){
    $result .= '<section class="slider front-page-slider swiper-container">';

        $result .= '<div class="swiper-wrapper">';

            $args = array(
                'post_type' 	=> 	'sp_slider',
                'order'			=>	'asc',
            );
                            
            $spPosts = SP_Framework_Post_Type_Utility::get_list($args);

            $index = 0;
            if(count($spPosts)>0){
                foreach ($spPosts as $spPost) {
                    $index++;
                    $postID = $spPost['id'];
                    $title = $spPost['title']; 
                    $content = SP_Framework_Post_Type_Utility::get_content($postID); 
                    $image = SP_Framework_Post_Type_Utility::get_image($postID, 'full');
                    $btnLink = SP_Framework_Post_Type_Utility::get_meta($postID, 'slider_btn_link');
                    $btnText = SP_Framework_Post_Type_Utility::get_meta($postID, 'slider_btn_text');

                    $result .= '<div class="swiper-slide slider__item container">';
                        $result .= '<img src="'.$image.'" alt="Image: '.$title.'">';
                        $result .= '<div class="slider-wrap-bg"></div>';
                        
                        $result .= '<div class="slider-wrap">';
                            
                            if($index==1){
                                $result .= '<h1 class="slider__title">'.$title.'</h1>';
                            } else {
                                $result .= '<p class="slider__title">'.$title.'</p>';
                            }

                            if($content){
                                $result .= '<p class="slider__text">'.$content.'</p>';
                            }

                            if($btnText){
                                $result .= '<a href="'.$btnLink.'" class="slider__button" title="'.$title.'">'.$btnText.'</a>';
                            }  

                        $result .= '</div>';
                    $result .= '</div>';
                }
            }        

        $result .= '</div>';

        $result .= '<div class="swiper-pagination"></div>';

        $result .= '<div class="swiper-button-prev swiper-button-black"></div>';
        $result .= '<div class="swiper-button-next swiper-button-black"></div>';

    $result .= '</section>';

    return $result;
}

function sp_get_section_favorite($result=null){

    $title = get_theme_mod('sp_favorite_title');

    $result .= '<section class="favorite">';

        if($title){
            $result .= '<h2>'.$title.'</h2>';
        }

        $result .= '<div class="favorite-wrap">';
            $args = array(
                'taxonomy'      => array('product_cat'),
                'orderby'       => 'id', 
                'order'         => 'DESC',
            );
            $categories = SP_Framework_Taxonomy_Utility::get_list($args);
            
            if(count($categories)>0){
                foreach ($categories as $category) {
                    $catID = $category['id'];
                    $frontPage = SP_Framework_Taxonomy_Utility::get_meta($catID, 'product_cat_front_page');
                    $thumbID = get_woocommerce_term_meta($catID, 'thumbnail_id', true);
                    $imageSrc = wp_get_attachment_url($thumbID); 

                    if($frontPage == 'y'){
                        $result .= '<a href="'.$category['url'].'" class="favorite__item" id="favorite__item_'.$catID.'">';
                            $result .= '<div class="favorite-image-wrap"></div>';

                            if($imageSrc){
                                $result .= '<img src="'.$imageSrc.'" alt="image">';
                            }

                            $result .= '<h3>'.$category['title'].'</h3>';
                            $result .= '<p class="favorite__description">'.$category['description'].'</p>';
                            $result .= '<p class="favorite__button">Shop now</p>';
                        $result .= '</a>'; 
                    }    
                }
            }

        $result .= '</div>';

    $result .= '</section>';

    return $result;
}

function sp_get_section_blog($result=null){

    $title = get_theme_mod('sp_blog_title');

    $args = array(
        'post_type'     => 'post',
        'order'         => 'desc',
        'numberposts'   => 3,
        'post_status'   => 'publish'
    );
    
    $args['meta_query'][] = array(
        array(
            'key'     => 'sp_post_front_page',
            'value'   => 'y',
            'compare' => '=',
            'type'    => 'CHAR',
        )
    );
    
    $spPosts = SP_Framework_Post_Type_Utility::get_list($args);
    
    if(count($spPosts)>0){


        $result .= '<section class="blog-container">';
            
            if($title){
                $result .= '<h2>'.$title.'</h2>';
            }

            $result .= '<div class="blog-wrap">';


            foreach ($spPosts as $spPost) {

                $postID = $spPost['id'];
                $title = $spPost['title'];
                $url = $spPost['url'];
                $date = get_the_date('d.m.Y', $postID);
                $excerpt = get_the_excerpt($postID);
                $imageSrc = SP_Framework_Post_Type_Utility::get_image($postID, 'full');

                $result .= '<a href="'.$url.'" class="blog__item">';
                    $result .= '<img src="'.$imageSrc.'" alt="'.$title.'">';
                    $result .= '<div class="blog__item-wrap">';
                        $result .= '<span>'.$date.'</span>';
                        $result .= '<h3>'.$title.'</h3>';
                        if($excerpt){
                            $result .= '<p>'.$excerpt.'</p>';
                        }    
                    $result .= '</div>';
                $result .= '</a>';

            }

            $result .= '</div>';

            $pagePostsID = get_option('page_for_posts');    

            $result .= '<a href="'.get_permalink($pagePostsID).'" class="blog__view-more">View more →</a>';

        $result .= '</section>';

    }    

    return $result;
}

function sp_get_section_about($result=null){

    $about = get_theme_mod('sp_about_image');
    $title = get_theme_mod('sp_about_title');
    $text = get_theme_mod('sp_about_text');
    $link = get_theme_mod('sp_about_link');

    $result .= '<section class="about container">';
        $result .= '<div class="about__item about-image">';
        
        if($about){
            $result .= '<img src="'.$about.'" alt="About '.get_bloginfo('name').'">';
        }

        $result .= '</div>';

        $result .= '<div class="about__item about-text">';
            
            if($title){
                $result .= '<h3>'.$title.'</h3>';
            }

            //$result .= '<div class="about-text__line"></div>';

            if($text){    
                $result .= '<p>'.$text.'</p>';
            }
            
            if($link){
                $result .= '<a href="'.$link.'" title="About us">About us →</a>';
            }

        $result .= '</div>';

    $result .= '</section>';

    return $result;
}

function sp_get_section_contact($result=null){

    $title = get_theme_mod('sp_contact_title');
    $text = get_theme_mod('sp_contact_text');

    $result .= '<section class="contact-us">';

        if($title){
            $result .= '<h2>'.$title.'</h2>';
        }

        if($text){
            $result .= '<p class="contact-us__subtitle">'.$text.'</p>';
        }

        $result .= '<div class="contact-us-wrap container">';

            $result .= sp_get_contacts('front');

            $result .= '<form class="contact-us__item contact-us__form" id="contact-form" msg="'.__('E-mail sent successfully!', 'sp-theme').'">';
                $result .= '<input type="text" class="sp-form-field" data-field="E-mail" placeholder="'.__('Your e-mail', 'sp-theme').'" required>';
                $result .= '<input type="text" class="sp-form-field" data-field="Name" placeholder="'.__('Your name', 'sp-theme').'" required>';
                $result .= '<textarea class="sp-form-field" data-field="Comment" placeholder="'.__('Your comment', 'sp-theme').'" required></textarea>';
                $result .= '<label for="sp-form-field-chk" class="sp-form-field-chk-label">';
                    $result .= '<input type="checkbox" name="chk" class="sp-form-field-checkbox" id="sp-form-field-chk" required="">  '.__('By ticking this box you declare that you have read and accepted our <a href="'.get_the_permalink(PRIVACY_POLICY_PAGE_ID).'">Privacy Policy</a> and <a href="'.get_the_permalink(TERMS_PAGE_ID).'">Terms of service</a>', 'sp-theme').'';
                $result .= '</label>';
                $result .= '<button class="button">'.__('Send message', 'sp-theme').'</button>';
            $result .= '</form>';

        $result .= '</div>';
    $result .= '</section>';

    return $result;
}

function sp_get_section_instagram($result=null){

    if(!is_404()){

        $title = get_theme_mod('sp_instagram_title');
        $name = get_theme_mod('sp_instagram_name');

        $result .= '<section class="instagram container">';
            
            if($title){
                $result .= '<h2>'.$title.'</h2>';
            }

            if($name){
                $result .= '<p>'.$name.'</p>';
            }    

            $result .= '<div class="instagram-wrap">';

                $result .= do_shortcode('[instagram-feed num=6 cols=1]');

            $result .= '</div>';

        $result .= '</section>';
    }    

    return $result;
}

function sp_get_posts($result=null){
    global $wp_query; 
    
    $pagePostsID = get_option('page_for_posts');  
    $text = get_theme_mod('sp_blog_page_text');
    $postsPerPage = get_option('posts_per_page');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;

    $result .= ' <section class="blog-container blog-list container">';
            
        $result .= '<h2>'.get_the_title($pagePostsID).'</h2>';
        $result .= '<p>'.$text.'</p>';

        $result .= '<div class="blog-wrap">';
        
            //get count of items
            $argsPosts = array(
                'post_type'     => 'post',
                'order'         => 'asc',
                'numberposts'   => -1,
            );
                             
            $spPosts = SP_Framework_Post_Type_Utility::get_list($args);
            $countPosts = count($spPosts);

            //get items
            $argsPosts = array(
                'post_type'         => 'post',
                'order'             => 'desc',
                'orderby'           => 'id',
                'posts_per_page'    => $postsPerPage,
                'paged'             => $paged,
            );
            $spPosts = SP_Framework_Post_Type_Utility::get_list($argsPosts);

            if(count($spPosts)>0){
                foreach ($spPosts as $spPost) {
                    $postID = $spPost['id'];
                    $title = $spPost['title']; 
                    $url = $spPost['url'];  
                    $image = SP_Framework_Post_Type_Utility::get_image($postID, 'full');
                    $excerpt = get_the_excerpt($postID);
                    $date = get_the_date('d.m.Y', $postID);
                    
                    $result .= '<a href="'.$url.'" class="blog__item">';
                        $result .= '<img src="'.$image .'" alt="'.$title.'">';
                        $result .= '<div class="blog__item-wrap">';
                            $result .= '<span>'.$date.'</span>';
                            $result .= '<h3>'.$title.'</h3>';
                            
                            if($excerpt){
                                $result .= '<p>'.$excerpt.'</p>';
                            }
                                
                        $result .= '</div>';
                    $result .= '</a>';
                }    
            }
       
        $result .= '</div>';

    $result .= '</section>';

    //pagination
    $args = array(
        'wrapper_start'     => '<div class="catalog-pagination">',
        'wrapper_end'       => '</div>',
        'posts_per_page'    => $postsPerPage,
        'range'             => 4,
        'count_posts'       => $countPosts,
        'page'              => 'blog',
    );
     
    $spPagination = SP_Framework_Post_Type_Utility::get_pagination($wp_query, $args);
    $result .= $spPagination;
    
    return $result;
}


/*
* For Partners
*/


function sp_get_partners_slider($result=null){
    $args = array(
        'post_type'     =>  'sp_partners_slider',
        'order'         =>  'asc',
    );
                    
    $spPosts = SP_Framework_Post_Type_Utility::get_list($args);

    if(count($spPosts)>0){

        $result .= '<div class="for-partners for-partners-slider-wrap">';

            $result .= '<div class="swiper-container for-partners-slider">';
                $result .= '<div class="swiper-wrapper">';

                foreach ($spPosts as $spPost) {

                    $postID = $spPost['id'];
                    $title = $spPost['title']; 
                    $image = SP_Framework_Post_Type_Utility::get_image($postID, 'full');
                   
                    $result .= '<div class="swiper-slide">';
                        $result .= '<img src="'.$image.'" alt="image: '.$title.'">';
                        $result .= '<p>'.$title.'</p>';
                    $result .= '</div>';

                }

                $result .= '</div>';
                
                $result .= '<div class="swiper-button-next swiper-button-black"></div>';
                $result .= '<div class="swiper-button-prev swiper-button-black"></div>';

                $result .= '<div class="swiper-pagination"></div>';
            $result .= '</div>';

        $result .= '</div>';    

    }    

    return $result;
}

function sp_get_partners_contact($result=null){

    $title = get_theme_mod('sp_partners_contact');  

    $result .= '<div class="for-partners for-partners-contact">';
        
        if($title){
            $result .= '<p>'.$title.'</p>';
        }
            
        $result .= sp_get_contacts('partners');

    $result .= '</div>';

    return $result;
}


/*
* About
*/


function sp_get_our_values($result=null){
    $args = array(
        'post_type'     =>  'sp_our_values',
        'order'         =>  'desc',
    );
                    
    $spPosts = SP_Framework_Post_Type_Utility::get_list($args);

    if(count($spPosts)>0){


        $result .= '<div class="our-values">';
            $result .= '<h2>Our values</h2>';

            $result .= '<div class="our-values-wrap">';

                foreach ($spPosts as $spPost) {

                    $postID = $spPost['id'];
                    $title = $spPost['title']; 
                    $content = SP_Framework_Post_Type_Utility::get_content($postID);

                    $result .= '<div class="our-values__item">';
                        $result .= '<h3>'.$title.'</h3>';

                        if($content){
                            $result .= '<p>'.$content.'</p>';
                        }    

                    $result .= '</div>';
                }    
                
            $result .= '</div>';

        $result .= '</div>  ';

    }    

    return $result;
}


/*
* Catalog
*/


function sp_get_catalog_items($args, $tags, $result=null){
    $argsPosts = array('post_type' => 'product');

    if(isset($args['numberposts'])) $argsPosts['numberposts']   = $args['numberposts'];
    if(isset($args['exclude']))     $argsPosts['exclude']       = $args['exclude'];
    if(isset($args['include']))     $argsPosts['include']       = $args['include'];

    //pagination
    if(isset($args['pagination']) && $args['pagination'] == true){
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
        $argsPosts['posts_per_page'] = $args['numberposts'];
        $argsPosts['paged'] = $paged;
    }

    //sorting
    if(isset($args['order']) && $args['order'] == 'asc')    $argsPosts['order'] = 'asc';
    if(isset($args['order']) && $args['order'] == 'desc')   $argsPosts['order'] = 'desc';


    //sort by price
    if(isset($args['orderby']) && $args['orderby'] == 'price'){
        $argsPosts['orderby'] = 'meta_value_num';
        $argsPosts['meta_key'] = '_price';
    }     

    //tax query
    if(isset($args['product_cat']) && $args['product_cat'] != ''){
        if(isset($args['is_tag']) && $args['is_tag'] == 'y'){
            $argsPosts['tax_query'][] = array(
                'taxonomy' => 'product_tag',
                'field'    => 'id',
                'terms'    => $args['product_cat']
            );
        } else {
            $argsPosts['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $args['product_cat']
            );
        }    
    }

    if(isset($args['upsale']) && $args['upsale'] == true){
        $productID  = get_the_ID();
        $product    = new WC_Product($productID);
        $upsells    = $product->get_upsell_ids();

        if(!empty($upsells)){

            if(count($upsells)>4){
                $output = array_slice($upsells, 0, 4); 
                $upsells = $output;
            }

            $argsPosts['include']   = $upsells;
            $argsPosts['exclude']   = array($productID);

            $result .= '<div class="catalog-description container">';
                $result .= '<h2>'.__('You may also like', 'sp-theme').'</h2>';
            $result .= '</div>';

        } else {
            return $result;
        }

    }

    if(isset($args['cross_sell']) && $args['cross_sell'] == true){
        $result .= '<div class="catalog-description container">';
            $result .= '<h2>'.__('You may also like', 'sp-theme').'</h2>';
        $result .= '</div>';
    }


    $spPosts = SP_Framework_Post_Type_Utility::get_list($argsPosts);

    if(count($spPosts)>0){

        $result .= '<div class="catalog container">';

        foreach ($spPosts as $spPost) {
            $productID = $spPost['id'];
            $url = $spPost['url'];
            $title = $spPost['title']; 

            $imageGallery = SP_Framework_Woocommerce::get_product_gallery($productID);
            $firstImage = SP_Framework_Post_Type_Utility::get_image($productID, 'full');

            if(isset($imageGallery[0])) $secondImage = wp_get_attachment_url($imageGallery[0]);


            $result .= '<a href="'.$url.'" class="catalog__item" id="catalog__item_'.$productID.'">';

                $result .= '<div class="catalog__item-cover">';
                    $result .= '<img class="catalog__item-first-image" src="'.$firstImage.'" alt="image: '.$title.'">';
                    
                    if(isset($imageGallery[0])){
                        $result .= '<img class="catalog__item-second-image" src="'.$secondImage.'" alt="image: '.$title.'">';
                    }

                $result .= '</div>';
                    
                $result .= sp_get_product_tags($productID, $tags);

                $result .= '<p class="catalog__title">'.$title.'</p>';
                $result .= '<span class="catalog__from">From</span>';

                $result .= '<div class="catalog__wrap">';
                    $result .= sp_get_product_price($productID);   
                $result .= '</div>';

                $result .= '<p class="catalog__button button show-modal" data-modal="addToCart" product-id="'.$productID.'">order</p>';

            $result .= '</a>';
        }

        $result .= '</div>';


        if(isset($args['pagination']) && $args['pagination'] == true){

            global $wp_query;

            $shopPageID     = get_option('woocommerce_shop_page_id');
            $shopPageSlug   = 'shop';

            //pagination
            $argsPagination = array(
                'wrapper_start'     => '<div class="catalog-pagination">',
                'wrapper_end'       => '</div>',
                'posts_per_page'    => $args['numberposts'],
                'range'             => 4,
                'page'              => $shopPageSlug,
            );

            if(is_page($shopPageID)){
                $total_products = count(get_posts(array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1')));
                $argsPagination['count_posts'] = $total_products;    
            }
             
            $spPagination = SP_Framework_Post_Type_Utility::get_pagination($wp_query, $argsPagination);
            $result .= $spPagination;

        }    

    }

    return $result;
}

function sp_get_product_tags($productID, $tags, $result=null){
    
    $colors = array();

    foreach ($tags as $tag) {
        $color = SP_Framework_Post_Type_Utility::get_meta($productID, $tag);
        $colors[$tag] = $color;                  
    }

    $argsPosts = array(
        'post_type'     =>  'sp_product_tags',
        'order'         =>  'desc',
    );
     
    $spPosts = SP_Framework_Post_Type_Utility::get_list($argsPosts);
     
    if(count($spPosts)>0){
        
        $result .= '<div class="catalog__tags">';
        foreach ($spPosts as $spPost) {
            $postID = $spPost['id'];

            foreach ($colors as $key => $value) {
                
                $colorName1 = $key;
                $colorName2 = 'checkbox_'.$postID; 

                if($colorName1 == $colorName2){
                    if($value == 'y'){
                        $title = $spPost['title'];
                        $color = SP_Framework_Post_Type_Utility::get_meta($postID, 'product_tags_color');
                        $result .= '<span class="catalog__tag-item" style="background: '.$color.'">'.$title.'</span>';
                    }    
                }    
            }            

        }
        $result .= '</div>';

    }        

    return $result;
}

function sp_get_variant_product($productID, $result=null){
    $product = wc_get_product($productID);
    $childrenIDs = $product->get_children();

    $variableP  = new WC_Product_Variable($productID);
    $variations = $variableP->get_available_variations();

    if($childrenIDs){

        foreach ($product->get_variation_attributes() as $taxonomy => $termNames ) {
            $attributeLabelName = wc_attribute_label($taxonomy);
        }

        $result .= '<p class="product__select-title">'.$attributeLabelName.':</p>';
        $result .= '<select class="product__select product__variant select" data-product-id="'.$productID.'" id="product__variant-'.$productID.'" data-class="product__variant">';

        foreach ($variations as $variation) {
            foreach ($childrenIDs as $childrenID) { 
                if($variation['variation_id'] == $childrenID){
                    $attributes     = $variation['attributes'];
                    $availability   = sanitize_text_field($variation['availability_html']);

                    $attr = '';
                    $index = 0;
                    foreach ($attributes as $attribute) {
                        if($index == 0){
                            $attr .= $attribute;
                        } else{
                            $attr .= ' - '.$attribute;
                        }
                        $index++;
                    }   

                    $result .= '<option value="'.$childrenID.'">'.$attr.'</option>';                                      
                }
            }
        }

        $result .= '</select>';

    }

    return $result;
}    

function sp_get_additional_product($productID, $result=null){

    $title = SP_Framework_Post_Type_Utility::get_meta($productID, 'product_property_title');
    $list = SP_Framework_Post_Type_Utility::get_meta($productID, 'product_property_list');
    $lists = explode('|', $list);

    if($list){
        
        if($title){
            $result .= '<p class="product__select-title">'.$title.'</p>';
        }
        
        $result .= '<select class="product__select select" id="product__additional-'.$productID.'" data-class="product__additional">';

            foreach ($lists as $list) {
                $result .= '<option value="'.$list.'">'.$list.'</option>';
            }

        $result .= '</select>';
    }    

    return $result;
}

function sp_get_option_product($productID, $result=null){

    $optionTitle = SP_Framework_Post_Type_Utility::get_meta($productID, 'product_option_title');
    $optionPrice = SP_Framework_Post_Type_Utility::get_meta($productID, 'product_option_price');

    if(!empty($optionTitle) && !empty($optionPrice)){
        $result .= '<div class="catalog__wrap">';
            $result .= '<label for="option-checkbox-'.$productID.'" class="sp-form-field-chk-label"><input type="checkbox" name="chk" class="sp-form-field-checkbox option-checkbox" id="option-checkbox-'.$productID.'" required="" value="'.$optionPrice.'" data-text="'.$optionTitle.'"> <span>'.$optionTitle.'</span> <span>+ '.get_woocommerce_currency_symbol().' '.$optionPrice.'</span></label>';
        $result .= '</div>';  
    }    

    return $result;
}

function sp_get_product_price($productID, $productPrice=null){
    $regularPrice = SP_Framework_Woocommerce::get_product_price($productID);
    $salePrice = SP_Framework_Woocommerce::get_product_sale_price($productID);

    $regularPriceJS = SP_Framework_Woocommerce::get_product_price($productID);
    $salePriceJS = SP_Framework_Woocommerce::get_product_sale_price($productID);

    $product = wc_get_product($productID);
    $childrenIDs = $product->get_children();
    
    if($regularPrice) $regularPrice = str_replace('.00', '', number_format($regularPrice, 2, '.', ' '));
    if($salePrice) $salePrice = str_replace('.00', '', number_format($salePrice, 2, '.', ' '));

    if(!$childrenIDs){

        if($salePrice){

            $productPrice .= '<div class="catalog-price-wrap catalog-price-old">';
                $productPrice .= '<span class="catalog__currency">'.get_woocommerce_currency_symbol().'&nbsp;</span>';
                $productPrice .= '<span class="catalog__price">'.$regularPrice.'</span>';
            $productPrice .= '</div>';    

            $productPrice .= '<div class="catalog-price-wrap catalog-price-new">';
                $productPrice .= '<span class="catalog__currency">'.get_woocommerce_currency_symbol().'&nbsp;</span>';
                $productPrice .= '<span class="catalog__price">'.$salePrice.'</span>';
            $productPrice .= '</div> ';

        } else {
            
            $productPrice .= '<div class="catalog-price-wrap catalog-price-regular">';
                $productPrice .= '<span class="catalog__currency">'.get_woocommerce_currency_symbol().'&nbsp;</span>';
                $productPrice .= '<span class="catalog__price">'.$regularPrice.'</span>';
            $productPrice .= '</div> ';
        }       

    } else {

        if(isset($childrenIDs[0])) $variantID = $childrenIDs[0];

        $variableP  = new WC_Product_Variable($productID);
        $prices     = $variableP->get_variation_prices();

        if(isset($prices['regular_price'][$variantID])){
            $regularPrice   = $prices['regular_price'][$variantID];
            $regularPriceJS = $prices['regular_price'][$variantID];
        }

        if(isset($prices['sale_price'][$variantID])){
            $salePrice   = $prices['sale_price'][$variantID];
            $salePriceJS = $prices['sale_price'][$variantID];
        }

        if($regularPrice) $regularPrice = str_replace('.00', '', number_format($regularPrice, 2, '.', ' '));
        if($salePrice) $salePrice = str_replace('.00', '', number_format($salePrice, 2, '.', ' '));

        if($regularPrice != $salePrice){

            $productPrice .= '<div class="catalog-price-wrap catalog-price-old">';
                $productPrice .= '<span class="catalog__currency">'.get_woocommerce_currency_symbol().'&nbsp;</span>';
                $productPrice .= '<span class="catalog__price">'.$regularPrice.'</span>';
            $productPrice .= '</div>';    

            $productPrice .= '<div class="catalog-price-wrap catalog-price-new">';
                $productPrice .= '<span class="catalog__currency">'.get_woocommerce_currency_symbol().'&nbsp;</span>';
                $productPrice .= '<span class="catalog__price">'.$salePrice.'</span>';
            $productPrice .= '</div> ';

        } else {
            $productPrice .= '<div class="catalog-price-wrap catalog-price-regular">';
                $productPrice .= '<span class="catalog__currency">'.get_woocommerce_currency_symbol().'&nbsp;</span>';
                $productPrice .= '<span class="catalog__price">'.$regularPrice.'</span>';
            $productPrice .= '</div> ';
        }
    
    }

    return $productPrice;
}

function sp_get_reviews($productID, $result=null){

    if($productID){
        $args = array ('post_type' => 'product', 'post_id' => $productID);
        $comments = get_comments($args);

        $reviewCount = count($comments);

        $result .= '<section class="reviews container">';
            $result .= '<h2>Reviews</h2>';

            $result .= '<p>'.$reviewCount.' '.sp_decl_of_num($reviewCount).'</p>';            
            $result .= '<button class="button reviews__button show-modal" data-modal="review" product-id="'.$productID.'">'.__('Write a review', 'sp-theme').'</button>';

            if($comments){
                $result .= '<div class="reviews-wrap">';
                    foreach ($comments as $comment) {
                        $date = date("d.m.Y", strtotime($comment->comment_date));
                        $author = $comment->comment_author;
                        $content = $comment->comment_content;

                        $result .= '<div class="reviews__item">';
                            $result .= '<span>'.$date.'</span> ';   
                            $result .= '<h3>'.$author.'</h3>';
                            $result .= '<p>'.$content.'</p>';
                        $result .= '</div>';
                    }    
                $result .= '</div>';
            }    


        $result .= '</section>';
    }    


    return $result;
}
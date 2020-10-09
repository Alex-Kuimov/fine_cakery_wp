<?php
/*
* Customizer
*/

$spCC = new SP_Framework_Customizer();

$args = array(
    'name' 	=> 'sp_framework',
    'priority' => 99,
    'title' => 'SP Framework',
    'description' => 'SP Framework',
    'section' => array(
        'logo' => array(
            'name' 	=> 'logo',
            'title' => 'Logo',
            'fields' => array(
                'sp_logo_header' => array(
                    'name' => 'sp_logo_header',
                    'type' => 'image', 
                    'label' => 'Header Logo',
                ), 
                'sp_logo_footer' => array(
                    'name' => 'sp_logo_footer',
                    'type' => 'image', 
                    'label' => 'Footer Logo',
                ), 			
            ),
        ),
        'favorite' => array(
            'name' 	=> 'favorite',
            'title' => 'Favorite',
            'fields' => array(
                'sp_favorite_title' => array(
                    'name' => 'sp_favorite_title',
                    'type' => 'input', 
                    'label' => 'Title',
                ),
            ),
        ),
        'blog' => array(
            'name' 	=> 'blog',
            'title' => 'Blog',
            'fields' => array(
                'sp_blog_title' => array(
                    'name' => 'sp_blog_title',
                    'type' => 'input', 
                    'label' => 'Title',
                ),
                'sp_blog_page_text' => array(
                    'name' => 'sp_blog_page_text',
                    'type' => 'textarea', 
                    'label' => 'Text',
                ),
            ),
        ),
        'about' => array(
            'name' 	=> 'about',
            'title' => 'About',
            'fields' => array(
                'sp_about_image' => array(
                    'name' => 'sp_about_image',
                    'type' => 'image', 
                    'label' => 'Image',
                ), 
                'sp_about_title' => array(
                    'name' => 'sp_about_title',
                    'type' => 'input', 
                    'label' => 'Title',
                ),
                'sp_about_text' => array(
                    'name' => 'sp_about_text',
                    'type' => 'textarea', 
                    'label' => 'Text',
                ), 
                'sp_about_link' => array(
                    'name' => 'sp_about_link',
                    'type' => 'input', 
                    'label' => 'Link',
                ),			
            ),
        ),
        'contacts' => array(
            'name' 	=> 'contacts',
            'title' => 'Contacts',
            'fields' => array(
                'sp_contact_title' => array(
                    'name' => 'sp_contact_title',
                    'type' => 'input', 
                    'label' => 'Title',
                ),
                'sp_contact_text' => array(
                    'name' => 'sp_contact_text',
                    'type' => 'textarea', 
                    'label' => 'text',
                ),
                'sp_contact_phone' => array(
                    'name' => 'sp_contact_phone',
                    'type' => 'input', 
                    'label' => 'Phone',
                ),
                'sp_contact_phone' => array(
                    'name' => 'sp_contact_phone',
                    'type' => 'input', 
                    'label' => 'Phone',
                ),
                'sp_contact_email' => array(
                    'name' => 'sp_contact_email',
                    'type' => 'input', 
                    'label' => 'E-mail',
                ),
                'sp_contact_address' => array(
                    'name' => 'sp_contact_address',
                    'type' => 'input', 
                    'label' => 'Address',
                ),
                'sp_contact_facebook' => array(
                    'name' => 'sp_contact_facebook',
                    'type' => 'input', 
                    'label' => 'Facebook',
                ),
                'sp_contact_instagram' => array(
                    'name' => 'sp_contact_instagram',
                    'type' => 'input', 
                    'label' => 'Instagram',
                ),
            ),
        ),
        'instagram' => array(
            'name' 	=> 'instagram',
            'title' => 'Instagram',
            'fields' => array(
                'sp_instagram_title' => array(
                    'name' => 'sp_instagram_title',
                    'type' => 'input', 
                    'label' => 'Title',
                ),
            ),
        ),	
        'footer' => array(
            'name' 	=> 'footer',
            'title' => 'Footer',
            'fields' => array(
                'sp_footer_copyright' => array(
                    'name' => 'sp_footer_copyright',
                    'type' => 'input', 
                    'label' => 'Copyright',
                ),
            ),
        ),	
    ),
);

$spCC->create($args);
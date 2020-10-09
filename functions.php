<?php
/**
 * sp-theme functions and definitions
 *
 */

if ( ! function_exists( 'sp_theme_setup' ) ) :

	function sp_theme_setup() {

		load_theme_textdomain( 'sp-theme', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'top-menu' => esc_html__('Top menu', 'sp-theme'),
			'bottom-menu' => esc_html__('Bottom menu', 'sp-theme'),
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'sp_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'sp_theme_setup' );

function sp_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sp_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'sp_theme_content_width', 0 );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * SP framework.
 */
require get_template_directory() . '/sp-framework/init.php';
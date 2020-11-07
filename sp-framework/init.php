<?php
require_once(ABSPATH.'wp-admin/includes/plugin.php' );

if (is_plugin_active('sp-framework/sp-framework.php')) {


	define('SHOP_PAGE_ID', 15);
	define('PRIVACY_POLICY_PAGE_ID', 293);
	define('TERMS_PAGE_ID', 295);

	require get_template_directory() . '/sp-framework/core/enqueue.php';
	require get_template_directory() . '/sp-framework/core/post-types.php';
	require get_template_directory() . '/sp-framework/core/taxonomies.php';
	require get_template_directory() . '/sp-framework/core/meta-boxes.php';
	require get_template_directory() . '/sp-framework/core/admin-settings.php';
	require get_template_directory() . '/sp-framework/core/customizer.php';
	require get_template_directory() . '/sp-framework/core/widgets.php';
	require get_template_directory() . '/sp-framework/core/functions.php';
	require get_template_directory() . '/sp-framework/core/ajax.php';
	require get_template_directory() . '/sp-framework/core/woocommerce.php';
}
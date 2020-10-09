<?php
/**
 * The header for our theme
 *
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>

	<div class="mobile-menu">
        <img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/menu.svg" class="show-menu">
        <img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/close-menu.svg" class="close-menu">
    </div>

    <div class="header">
        <div class="container header-wrap">

            <?php echo sp_get_contacts('header');?>

            <?php echo sp_get_header_info();?>

        </div>
    </div>

   <?php echo sp_get_menu('header');?>

   <?php echo sp_get_breadcrumbs();?>
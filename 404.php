<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header();
?>

<div class="page-404 container">
	<div class="page-404__item">
		<h1>404</h1>
		<p>Error - Page you are looking for is not found.</p>
		<p>Back to <a href="<?php echo esc_url(get_home_url())?>">Home Page</a></p>
	</div>
		
	<div class="page-404__item">
		<img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/404.png">
	</div>
</div>	

<?php
get_footer();
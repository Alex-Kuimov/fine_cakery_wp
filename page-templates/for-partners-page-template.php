<?php
/*
Template Name: For Partners
*/

get_header();
?>

<div class="for-partners for-partners-text">
	<h1>For Partners</h1>
	<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
</div>

<?php echo sp_get_partners_slider();?>

<?php echo sp_get_partners_contact();?>

<div class="for-partners for-partners-contact-form">

	<?php

	$title = get_theme_mod('sp_partners_form_title');
	$text = get_theme_mod('sp_partners_form_text');  

	
	if($title){
		echo '<h2>'.$title.'</h2>';
	}
	
	if($text){
		echo '<p>'.$text.'</p>';
	}

	?>

	<form class="partners-contact-form" id="partners-form" msg="<?php echo __('E-mail sent successfully!', 'sp-theme')?>">
		
		<div class="partners-form-wrap">
			<input type="text" class="sp-form-field" data-field="Name" placeholder="<?php echo __('Your name', 'sp-theme')?>" required="">
			<input type="text" class="sp-form-field" data-field="Company" placeholder="<?php echo __('Company name', 'sp-theme')?>" required="">
			<input type="text" class="sp-form-field" data-field="E-mail" placeholder="<?php echo __('E-mail', 'sp-theme')?>" required="">
			<button class="button"><?php echo __('Get catalogue', 'sp-theme')?></button>
		</div>
			
		<label for="sp-form-field-chk" class="sp-form-field-chk-label">
			<input type="checkbox" name="chk" class="sp-form-field-checkbox" id="sp-form-field-chk" required=""> <?php echo __('By ticking this box you declare that you have read and accepted our Privacy Policy and Terms of service', 'sp-theme')?>
		</label>
	</form>

	<?php echo do_shortcode('[addtoany]');?>

</div>	


<?php
get_footer();

?>
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
	<h2>Become a partner</h2>
	<p>To learn more about the ingredients, prices and delivery conditions please fill the form below. We will contact you immediately and share all the details.</p>

	<form class="partners-contact-form" id="partners-form">
		
		<div class="partners-form-wrap">
			<input type="text" class="sp-form-field" data-field="Name" placeholder="Your name" required="">
			<input type="text" class="sp-form-field" data-field="Company" placeholder="Company name" required="">
			<input type="text" class="sp-form-field" data-field="E-mail" placeholder="E-mail" required="">
			<button class="button">Get catalogue</button>
		</div>
			
		<label for="sp-form-field-chk" class="sp-form-field-chk-label">
			<input type="checkbox" name="chk" class="sp-form-field-checkbox" id="sp-form-field-chk" required=""> By ticking this box you declare that you have read and accepted our Privacy Policy and Terms of service
		</label>
	</form>

	<?php echo do_shortcode('[addtoany]');?>

</div>	


<?php
get_footer();

?>
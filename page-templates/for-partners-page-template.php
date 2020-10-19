<?php
/*
Template Name: For Partners
*/

get_header();
?>

<div class="for-partners for-partners-text">
	<h1>For Partners</h1>
	<p>Thank you for your interest in our desserts!</p> 
	<p>It would be our biggest pleasure to collaborate with you and provide our nutritious desserts to your dear customers.</p> 
	<p>Please note that all the sweets on this page are vegan, gluten-free and do not contain any refined ingredients. We use only wholesome products to create delicious treats that nourish both, body and soul.</p>
</div>

<div class="for-partners for-partners-slider-wrap">


	<div class="swiper-container for-partners-slider">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img src="https://thefinecakery.ch/wp-content/uploads/2020/10/f01.jpg">
				<p>Vegan Pecan Brownie</p>
			</div>
			<div class="swiper-slide">
				<img src="https://thefinecakery.ch/wp-content/uploads/2020/10/f02.jpg">
				<p>Vegan Pecan Brownie</p>
			</div>
			<div class="swiper-slide">
				<img src="https://thefinecakery.ch/wp-content/uploads/2020/10/f01.jpg">
				<p>Vegan Pecan Brownie</p>
			</div>
			<div class="swiper-slide">
				<img src="https://thefinecakery.ch/wp-content/uploads/2020/10/f02.jpg">
				<p>Vegan Pecan Brownie</p>
			</div>
		</div>
		<!-- Add Arrows -->
		<div class="swiper-button-next swiper-button-black"></div>
		<div class="swiper-button-prev swiper-button-black"></div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
	</div>

</div>	

<div class="for-partners for-partners-contact">
	<p>You can contact us directly or fill the form below and we will get back to you shortly.</p>

	<div class="for-partners-contact__text">
		<p><i class="fas fa-phone-alt"></i> +41 76 545 21 09</p>
		<p><i class="fas fa-envelope"></i> hello@thefinecakery.ch</p>
		<p><i class="fas fa-map-marker-alt"></i> Albulastrasse 42, 8048 Zürich</p>
	</div>	

</div>	

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

</div>	


<?php
get_footer();

?>
<?php
/*
Template Name: About
*/

get_header();
?>

<div class="page-inner container">
    <h1 class="page-inner__title"><?php echo get_the_title();?></h1>

    <div class="page-inner__content">
    <?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
    
    <div class="our-values">
    	<h2>Our values</h2>

    	<div class="our-values-wrap">
    		<div class="our-values__item">
    			<h3>Honesty</h3>
    			<p>We are constantly sharing the information on how our desserts are made, what ingredients we use, and the packaging we choose. It is extremely important for us to be honest with you and give you full disclosure at all times.</p>
    		</div>
    		<div class="our-values__item">
    			<h3>Quality</h3>
    			<p>We only work with high quality, wholesome ingredients, since we passionately believe in the power of excellent products and the effects they have on our health.</p>
    		</div>	
    		<div class="our-values__item">
    			<h3>Passion</h3>
    			<p>The vision of The Fine Cakery makes our hearts skip a bit. We believe in what we do and work every day passionately to share our dreams with you.</p>
    		</div>	
    		<div class="our-values__item">
    			<h3>Trustworthiness</h3>
    			<p>That is extremely important for our company that our customers can rely on us. From the unique ingredients to the delivery time, we make sure all your wishes are taken into consideration at all times.</p>
    		</div>	
    		<div class="our-values__item">
    			<h3>Customer Experience</h3>
    			<p>We are constantly working on improving your experience with our company. There is nothing more important for us that your full satisfaction.</p>
    		</div>
    	</div>

    </div>	

    <?php echo do_shortcode('[addtoany]');?>


    </div>
</div>

<?php
get_footer();
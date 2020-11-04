<?php
/*
Template Name: About
*/

get_header();
?>

<div class="page-inner container">
    <h1 class="page-inner__title"><?php echo get_the_title();?></h1>

    <div class="page-inner__content about-page">
    <?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
    
    <?php echo sp_get_our_values();?>

    <?php echo do_shortcode('[addtoany]');?>

    </div>
</div>

<?php
get_footer();
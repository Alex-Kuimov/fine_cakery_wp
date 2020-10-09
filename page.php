<?php
/**
 * The template for displaying all pages
 *
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
    </div>
</div>

<?php
get_footer();
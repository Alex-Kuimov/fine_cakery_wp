<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
$postID = get_the_ID();
$imgID = get_post_thumbnail_id($postID);
$image = wp_get_attachment_image_src($imgID, $size);
$postImgUrl = SP_Framework_Post_Type_Utility::get_image($postID, 'full');
$date = get_the_date('d.m.Y');
?>

<div class="blog-inner-wrap container">
    <div class="blog-back">
        <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">← Back to Blog</a>
    </div>

    <div class="blog-inner">
        <div class="blog-inner__date"><?php echo $date;?></div>
        <h1 class="blog-inner__title"><?php echo get_the_title();?></h1>

        <?php
        if($image[0] != ''){
            echo '<img class="blog-inner__image" src="'.$postImgUrl.'" alt="'.get_the_title().'">';
        }    
        ?>

        <div class="blog-inner__content">
        <?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;

        echo do_shortcode('[addtoany]');
        ?>
        </div>

    </div>
</div>

<?php
echo sp_get_gallery($postID);

get_footer();
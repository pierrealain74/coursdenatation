<?php
/**
 * Template Name: Blog
 *
 *
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<script>const themeDirectoryUri = "<?php echo get_stylesheet_directory_uri(); ?>";</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php
    
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
            <h1><?php the_title(); ?></h1>
            <?php
           
        endwhile;
    endif;
    ?>
    

<?php 

/** Création d'un liste des articles de blog */
?>

    <div class="bloggerfilter">

        <div id="blogger"></div>
       <!--  <div id="loadMoreBtn" class="loadmore btn btn-primary">+ d'articles</div> -->

    </div>



    <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/posts.js' ?>"></script>
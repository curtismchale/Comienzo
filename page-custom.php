<?php
/*
Template Name: Custom
*/
?>

<?php get_header(); ?>

    <div id="page-custom">

        <div id="content-wrapper">
            
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <!-- custom page loop goes here -->
            </article><!-- /post_class(); -->
            
        </div><!-- /#content-wrapper -->

        <?php get_sidebar(); ?>

    </div><!-- /#page-custom -->

<?php get_footer(); ?>

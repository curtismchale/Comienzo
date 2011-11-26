<?php
/**
 * The archive page template
 * 
 * By default this deals with any taxonomies (tags, categories) that are requested from WordPress
 * 
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 * 
 * @since 1.0
 */
?>
<?php get_header(); ?>

    <div id="archive">

        <div id="content-wrapper">

            <?php if (have_posts()) : ?>

                <div id="archive-title">
                    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                    <?php /* If this is a category archive */ if (is_category()) { ?>
                    <h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
                    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                    <h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
                    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                    <h1>Archive for <?php the_time( get_option('date_format') ); ?></h1>
                    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                    <h1>Archive for <?php the_time('F, Y'); ?></h1>
                    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                    <h1>Archive for <?php the_time('Y'); ?></h1>
                    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                    <h1>Author Archive</h1>
                    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                    <h1>Blog Archives</h1>
                    <?php } ?>
                </div><!-- /#archive-title -->

            <?php while (have_posts()) : the_post(); ?>

              <?php get_template_part( 'loop', 'blog' ); ?>

            <?php endwhile; ?>

            <!-- includes next previous links or post level nav -->
            <!-- TODO locate_template -->
            <?php get_template_part( 'assets/includes/post-navigation' ); ?>

        <?php else : ?>

            <h2>Not Found</h2>
            <?php get_search_form(); ?>

        <?php endif; ?>

        </div><!-- /#content-wrapper -->

        <?php get_sidebar(); ?>

    </div><!-- /#archive -->

<?php get_footer(); ?>
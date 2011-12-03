<?php
/**
 * Default template file
 *
 * All of WordPress defaults back to index.php. This is the main blog page.
 *
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @since 1.0
 */
?>
<?php get_header(); ?>

<div id="index">

  <div id="content-wrapper">

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'loop', 'blog' ); ?>

      <?php endwhile; ?>

        <!-- includes next previous links or post level nav -->
        <?php locate_template( array( 'assets/includes/post-navigation.php' ), true ); ?>

      <?php else : ?>

        <h2>Not Found</h2>
        <p>Sorry, but you are looking for something that isn't here.</p>
        <?php get_search_form(); ?>

      <?php endif; ?>

  </div><!-- /#content-wrapper -->

  <?php get_sidebar(); ?>

</div><!-- /#index -->

<?php get_footer(); ?>
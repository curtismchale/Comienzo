<?php
/**
 * Sample custom page template
 *
 * This file will create a custom page template for a site. You select them from the new page on the right hand side in the dropfown
 *
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @since 1.0
 */

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
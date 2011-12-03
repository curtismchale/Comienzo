<?php
/**
 * 404 page
 *
 * 404 page template. Any 404 errors on the site will be rendered here.
 *
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @since 1.0
 */
?>
<?php get_header(); ?>

  <div id="four-o-four">

    <div id="content-wrapper">

      <h2>Error 404 - Not Found</h2>
      <h5>Oops!! Looks like something went wrong. Please get in touch with the site <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>">administrator</a> and we'll get this sorted out. You my also try to find what you're looking for with the saerch below.</h5>
      <?php get_search_form(); ?>

    </div><!-- /#content-wrapper -->

    <?php get_sidebar(); ?>

  </div><!-- /#four-o-four -->

<?php get_footer(); ?>
<?php
/**
 * Displays the single blog posts
 *
 * By defaults WordPress will display any request for a single blog post to this tempalte file.
 *
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @since 1.0
 */
?>
<?php get_header(); ?>

<div id="single">

	<div id="content-wrapper">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php get_template_part( 'loop', 'blog' ); ?>

			<!-- includes next previous links or post level nav -->
			<?php locate_template( array( 'assets/includes/post-navigation.php' ), true ); ?>

		<?php endwhile; else: ?>

			<p>Sorry, no posts matched your criteria.</p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- /#content-wrapper -->

	<?php get_sidebar(); ?>

</div><!-- /#single -->

<?php get_footer(); ?>

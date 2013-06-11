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

				<div id="archive-title"><?php com_archive_title(); ?></div>

				<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'loop', get_post_type() ); ?>

				<?php endwhile; ?>

					<!-- includes next previous links or post level nav -->
					<?php locate_template( array( 'assets/includes/post-navigation.php' ), true ); ?>

			<?php else : ?>

				<h2>Not Found</h2>
				<?php get_search_form(); ?>

				<?php
					/**
					* I develop with logging so I just want my logging to be done in the theme if
					* at all possible.
					*/
					if( function_exists( 'wptt_log_error' ) ){

						$current_user = wp_get_current_user();

						wptt_log_error(
							'Archive Page',
							'Someone hit the archive page with no content available',
							array( 'user' => $current_user )
						);

					} // function_exists( 'wptt_log_error' )
				?>

			<?php endif; ?>

		</div><!-- /#content-wrapper -->

	<?php get_sidebar(); ?>

	</div><!-- /#archive -->

<?php get_footer(); ?>
<?php get_header(); ?>

<div id="content">
	
	<div id="search">

		<?php if (have_posts()) : ?>
	
			<h2>Search Results</h2>
	
			<?php while (have_posts()) : the_post(); ?>
	
				<div class="post">
					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_time('l, F jS, Y') ?></p>
					<p><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				</div><!-- /.post -->
	
			<?php endwhile; ?>
	
			<!-- includes next previous links or post level nav -->
			<?php include_once('assets/includes/post-navigation.php'); ?>
	
		<?php else : ?>
	
			<h2>No posts found. Try a different search?</h2>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	
		<?php endif; ?>
	
		<?php get_sidebar(); ?>

	</div><!-- /#search -->

</div><!-- /#content -->

<?php get_footer(); ?>

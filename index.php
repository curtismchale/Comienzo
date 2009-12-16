<?php get_header(); ?>

<div id="content">

	<div id="index">
	
		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
	
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="post-heading">
							<p class="date-published"><?php the_time('M j Y') ?></p>                        
							<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<p class="post-author">by <?php the_author() ?></p>
				                </div><!-- /.post-heading -->
	
						<?php the_content('Read the rest of this entry &raquo;'); ?>
	
						<p class="post-tags"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
					</div><!-- /.post #post-phpstuffy -->
	
				<?php endwhile; ?>
				
				<!-- includes next previous links or post level nav -->
				<?php include('includes/post-navigation.php'); ?>
			
			<?php else : ?>
	
				<h2>Not Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	
			<?php endif; ?>
	
		<?php get_sidebar(); ?>
	
	</div><!-- /#index -->

</div><!-- /#content -->

<?php get_footer(); ?>
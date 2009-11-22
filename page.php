<?php get_header(); ?>

<div id="content">

	<div id="page">
    
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	        <div class="post" id="post-<?php the_ID(); ?>">
            
	            <h2><?php the_title(); ?></h2>
		    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
	        </div><!-- /.post #post-phpstuffy -->
	
	        <?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
		<?php get_sidebar(); ?>

	</div><!-- /#page -->

</div><!-- /#content -->

<?php get_footer(); ?>
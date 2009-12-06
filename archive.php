<?php get_header(); ?>

<div id="content">

    <div id="archive">

		<?php if (have_posts()) : ?>

			<div id="archive-title">
			    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			    <?php /* If this is a category archive */ if (is_category()) { ?>
			    <h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
			    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			    <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
			    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			    <h2>Archive for <?php the_time('F jS, Y'); ?></h2>
			    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			    <h2>Archive for <?php the_time('F, Y'); ?></h2>
			    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			    <h2>Archive for <?php the_time('Y'); ?></h2>
			    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
			    <h2>Author Archive</h2>
			    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			    <h2>Blog Archives</h2>
			    <?php } ?>
			</div><!-- /#archive-title -->


		<?php while (have_posts()) : the_post(); ?>
			
			<div class="post" id="post-<?php the_ID(); ?>">
	                  
			   <div class="post-heading">
	                       <p class="date-published"><?php the_time('M j Y') ?></p>                        
	                       <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	                       <p class="post-author">by <?php the_author() ?></p>
	                   </div><!-- /.post-heading -->

	                   <div class="post-content">
	                       <?php the_content('Read the rest of this entry &raquo;'); ?>
	                   </div><!-- /.post-content -->

	    	               <p class="post-tags"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

	               </div><!-- /.post #post-phpstuffy -->

		<?php endwhile; ?>

		<ul class="next-previous-links">
			<li><?php next_posts_link('&laquo; Older Entries') ?></li>
			<li><?php previous_posts_link('Newer Entries &raquo;') ?></li>
		</ul><!-- /.next-previous-links -->

	<?php else : ?>

		<h2>Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	    <?php get_sidebar(); ?>

    </div><!-- /#archive -->

</div><!-- /#content -->

<?php get_footer(); ?>

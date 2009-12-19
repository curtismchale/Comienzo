<?php get_header(); ?>

<div id="content">

	<div id="single">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<div class="post" id="post-<?php the_ID(); ?>">
				
				<div class="post-heading">
					<p class="date-published"><?php the_time('M j Y') ?></p>                        
					<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<p class="post-author">by <?php the_author() ?></p>
				</div><!-- /.post-heading -->
	
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
	
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p class="post-tags">Tags: ', ', ', '</p>'); ?>
	
				<p>
					This entry was posted
					<?php /* This is commented, because it requires a little adjusting sometimes.
						You'll need to download this plugin, and follow the instructions:
						http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
						/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
					on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
					and is filed under <?php the_category(', ') ?>.
					You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.
	
					<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Both Comments and Pings are open ?>
						You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
	
					<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Only Pings are Open ?>
						Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
	
					<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Comments are open, Pings are not ?>
						You can skip to the end and leave a response. Pinging is currently not allowed.
	
					<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Neither Comments, nor Pings are open ?>
						Both comments and pings are currently closed.
	
					<?php } edit_post_link('Edit this entry','','.'); ?>
				</p>
	
			</div><!-- /.post #post-phpstuffy -->
	
		<?php comments_template(); ?>
			
			<!-- includes next previous links or post level nav -->
			<?php include_once('assets/includes/post-navigation.php'); ?>
	
			<?php endwhile; else: ?>
	
				<p>Sorry, no posts matched your criteria.</p>
	
		<?php endif; ?>
	
		<?php get_sidebar(); ?>

	</div><!-- /#single -->	

</div><!-- /#content -->
<?php get_footer(); ?>

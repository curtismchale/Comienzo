<?php get_header(); ?>

    <div id="single">

        <div id="content-wrapper">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                    <div class="post-heading">
                        <time class="date-published"><?php the_time('M j Y') ?></time>
                        <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        <p class="post-author">by <?php the_author_posts_link() ?></p>
                    </div><!-- /.post-heading -->

                    <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>

                    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    <?php the_tags( '<p class="post-tags">Tags: ', ', ', '</p>'); ?>

                    <p>
                        <?php edit_post_link('Edit this entry','','.'); ?>
                    </p>

                </article><!-- /post_class(); -->

            <?php comments_template(); ?>

                <!-- includes next previous links or post level nav -->
                <?php include_once('assets/includes/post-navigation.php'); ?>

                <?php endwhile; else: ?>

                    <p>Sorry, no posts matched your criteria.</p>

            <?php endif; ?>

        </div><!-- /#content-wrapper -->

        <!-- includes sidebar -->
        <?php include_once('assets/includes/sidebar.php'); ?>

    </div><!-- /#single -->	

<?php get_footer(); ?>
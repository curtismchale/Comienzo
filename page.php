<?php get_header(); ?>

    <div id="page">

        <div id="content-wrapper">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="post" id="post-<?php the_ID(); ?>">
                
                <div class="post-heading">
                    <p class="date-published"><?php the_time('M j Y') ?></p>                        
                    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-author">by <?php the_author_posts_link() ?></p>
                </div><!-- /.post-heading -->

                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

                </div><!-- /.post #post-phpstuffy -->

                <?php endwhile; endif; ?>
            <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

        </div><!-- /#content-wrapper -->

        <?php get_sidebar(); ?>

    </div><!-- /#page -->

<?php get_footer(); ?>
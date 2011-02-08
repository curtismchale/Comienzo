<?php get_header(); ?>

    <div id="index">

        <div id="content-wrapper">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <div class="post-heading">
                            <time class="date-published"><?php the_time('M j Y') ?></time>
                            <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            <p class="post-author">by <?php the_author_posts_link() ?></p>
                                </div><!-- /.post-heading -->

                        <?php the_content('Read the rest of this entry &raquo;'); ?>

                        <p class="post-tags"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
                    </article><!-- /post_class(); -->

                <?php endwhile; ?>

                <!-- includes next previous links or post level nav -->
                <?php include_once(locate_template(array('assets/includes/post-navigation.php') )); ?>

            <?php else : ?>

                <h2>Not Found</h2>
                <p>Sorry, but you are looking for something that isn't here.</p>
                <?php get_search_form(); ?>

            <?php endif; ?>

            </div><!-- /#content-wrapper -->

        <?php get_sidebar(); ?>

    </div><!-- /#index -->

<?php get_footer(); ?>
<?php get_header(); ?>

    <div id="archive">

        <div id="content-wrapper">

            <?php if (have_posts()) : ?>

                <div id="archive-title">
                    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                    <?php /* If this is a category archive */ if (is_category()) { ?>
                    <h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
                    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                    <h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
                    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                    <h1>Archive for <?php the_time( get_option('date_format') ); ?></h1>
                    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                    <h1>Archive for <?php the_time('F, Y'); ?></h1>
                    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                    <h1>Archive for <?php the_time('Y'); ?></h1>
                    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                    <h1>Author Archive</h1>
                    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                    <h1>Blog Archives</h1>
                    <?php } ?>
                </div><!-- /#archive-title -->

            <?php while (have_posts()) : the_post(); ?>

                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                   <div class="post-heading">
                            <time class="date-published"><?php the_time( get_option('date_format') ); ?></time>
                               <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                               <p class="post-author">by <?php the_author_posts_link(); ?></p>
                           </div><!-- /.post-heading -->

                           <div class="post-content">
                               <?php the_content('Read the rest of this entry &raquo;'); ?>
                           </div><!-- /.post-content -->

                               <p class="post-tags"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', '); ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

                       </article><!-- /post_class(); -->

            <?php endwhile; ?>

            <!-- includes next previous links or post level nav -->
            <?php include_once(locate_template(array('assets/includes/post-navigation.php') )); ?>

        <?php else : ?>

            <h2>Not Found</h2>
            <?php get_search_form(); ?>

        <?php endif; ?>

        </div><!-- /#content-wrapper -->

        <?php get_sidebar(); ?>

    </div><!-- /#archive -->

<?php get_footer(); ?>
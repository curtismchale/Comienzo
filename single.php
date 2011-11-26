<?php get_header(); ?>

    <div id="single">

        <div id="content-wrapper">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php get_template_part( 'loop', 'blog' ); ?>

                <!-- includes next previous links or post level nav -->
                <!-- TODO locate_template -->
                <?php get_template_part( 'assets/includes/post-navigation' ); ?>

                <?php endwhile; else: ?>

                    <p>Sorry, no posts matched your criteria.</p>
                    <?php get_search_form(); ?>

            <?php endif; ?>

        </div><!-- /#content-wrapper -->

        <?php get_sidebar(); ?>

    </div><!-- /#single -->

<?php get_footer(); ?>
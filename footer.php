<div class="clear"></div>
            </div><!-- /#content -->

            <footer>
                <p class="copyright">&copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></p>

                <p class="wordpress-info"><?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a> | <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.</p>

            </footer><!-- /footer -->

    </div><!-- /#main-wrapper -->

    <?php wp_footer(); ?>

    <?php
        // Display Analytics, etc. from admin menu
        echo get_option('cmnzth_footer_scripts');
    ?>

    </body>

</html>

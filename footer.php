<div class="clear"></div>
            </div><!-- /#content -->
            
            <div class="footer">
                <p class="copyright">&copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></p>
	
                <p class="wordpress-info"><?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a> | <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.</p>

            </div><!-- /.footer -->

	</div><!-- /#main-wrapper -->

    <?php wp_footer(); ?>
    
    <!-- include jQuery from Google Code -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
    
    <!-- adding jQuery.validate plugin for comment validation client side -->
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/jquery.validate.min.js"></script>
    
    <!-- calling js for site -->
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/scripts.js"></script>
    
    <?php
      //Display Google Analytics, etc. from admin menu
      echo get_option('omr_tracking_code');
    ?>
    
    </body>

</html>

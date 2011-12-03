<?php
/**
 * Footer template file
 *
 * The default footer for the theme. Is called by get_footer in other template files
 *
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @since 1.0
 */
?>
<div class="clear"></div>
  </div><!-- /#content -->

      <footer>
        <p class="copyright">&copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></p>

        <p class="wordpress-info"><?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a> | <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.</p>

      </footer><!-- /footer -->

    </div><!-- /#main-wrapper -->

    <?php wp_footer(); ?>

    </body>

</html>

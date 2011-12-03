<?php
/**
 * Header file
 *
 * Default header file for the theme. Rendered by get_header.php
 *
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @since 2.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>

        <title>
            <?php if (is_home()) { echo bloginfo('name');
            } elseif (is_404()) {
            echo '404 Not Found';
            } elseif (is_category()) {
            echo 'Category:'; wp_title('');
            } elseif (is_search()) {
            echo 'Search Results';
            } elseif ( is_day() || is_month() || is_year() ) {
            echo 'Archives:'; wp_title('');
            } else {
            echo wp_title('');
            }
            ?>
        </title>

        <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
        <meta name="description" content="<?php bloginfo('description') ?>" />

        <link rel="image_src" link="<?php echo get_stylesheet_directory_uri(); ?>/screenshot.png" />

        <link rel="icon" type="image/png" link="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

        <?php if(is_search()) { ?>
            <meta name="robots" content="noindex, nofollow" />
        <?php }?>

        <?php
        	/* We add some JavaScript to pages with the comment form
        	 * to support sites with threaded comments (when in use).
           * TODO enqueue this properly
        	 */
        	if ( is_singular() && get_option( 'thread_comments' ) )
        		wp_enqueue_script( 'comment-reply' );
    	?>

        <?php wp_head(); ?>

        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />

        <!-- adding HTML5 support for IE -->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo get_option('cmnzth_rss_feed'); ?>" />

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    </head>

<body <?php body_class(); ?> >

    <div id="main-wrapper">

        <header>

            <?php if(is_front_page()) : ?>
                <h1 class="blogheader"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
                <h2 class="blogheader"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
            <?php endif;  ?>

            <p class="bloginfo"><?php bloginfo('description'); ?></p>

            <nav>
                <ul>
                    <?php wp_list_pages('title_li='); ?>
                </ul>
            </nav><!-- /nav -->

        </header><!-- /header -->

        <div id="content">

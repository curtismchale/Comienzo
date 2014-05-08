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
<html <?php com_tag_schema(); ?> <?php language_attributes(); ?>>

	<head>

		<title itemprop="name"><?php wp_title(); ?></title>

		<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

		<link rel="image_src" link="<?php echo get_stylesheet_directory_uri(); ?>/screenshot.png" />

		<link rel="icon" type="image/png" link="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

		<?php if(is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" />
		<?php }?>

		<?php wp_head(); ?>

		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />

		<!-- adding HTML5 support for IE -->
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	</head>

<body <?php body_class(); ?> >

	<div id="main-wrapper">

		<header>

			<?php if ( is_front_page() ) { ?>
				<h1 class="blogheader"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php } else { ?>
				<h2 class="blogheader"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h2>
			<?php } // is_front_page  ?>

			<p class="bloginfo"><?php bloginfo('description'); ?></p>

			<nav>
				<ul>
					<?php wp_nav_menu(); ?>
				</ul>
			</nav><!-- /nav -->

		</header><!-- /header -->

		<div id="content">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
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
		<?php if(is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	    <?php }?>
	
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
		
        <!--[if IE 6]>
			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>/styles/css/ie6-styles.css" />
		<![endif]-->
        
        <!--[if IE 7]>
			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>/styles/css/ie7-styles.css" />
		<![endif]-->
		
        <!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>/styles/css/ie8-styles.css" />
		<![endif]-->
		
		<script type="text/javascript" src="styles/js/scripts.js" ></script><!-- includes js for site -->
		
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>

	</head>
	
<?php
   $url = explode('/',$_SERVER['REQUEST_URI']);
   $dir = $url[1] ? $url[1] : 'home';
?>

	<body id="<?php echo $dir ?>">
	
		<div id="main-wrapper">
	
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<p><?php bloginfo('description'); ?></p>
			
			<div class="nav">
				<ul>
		<?php wp_list_pages('title_li='); ?>
				</ul>
			</div><!-- end div class="nav" -->
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
            
	<?php if(is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	<?php }?>
	
	<?php wp_head(); ?>
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
		
	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/ie6-styles.css" />
	<![endif]-->
					
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />		
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
   
    </head>
	
<?php
   $url = explode('/',$_SERVER['REQUEST_URI']);
   $dir = $url[1] ? $url[1] : 'home';
?>

    <body id="<?php echo $dir ?>">
	
	<div id="main-wrapper">
		
		<div id="header">

			<?php if(is_home()) : ?>
				<h1 class="blogheader"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
			<?php else : ?>
				<h2 class="blogheader"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h2>
			<?php endif;  ?>

			<p class="bloginfo"><?php bloginfo('description'); ?></p>
			
			<div class="nav">
				<ul>
				        <?php wp_list_pages('title_li='); ?>
				</ul>
			</div><!-- /.nav -->
	
		</div><!-- /#header -->
		
		<div id="content">
		
	<!-- adds alert area -->
        <ul id="alert"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('alert') ) : ?><?php endif; ?></ul>

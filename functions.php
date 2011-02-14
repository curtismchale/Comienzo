<?php
// setup of admin options
require_once (TEMPLATEPATH . '/assets/includes/admin/admin-options.php');
// includes sidebars
require_once (TEMPLATEPATH . '/assets/includes/functions/sidebars.php');
// includes comment stuff
require_once (TEMPLATEPATH . '/assets/includes/custom-comment-styles.php');
// includes JS
require_once( TEMPLATEPATH . '/assets/includes/add-js.php');
//fixing the_excerpt
function improved_trim_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<p>,<ul>,<li>,<ol>');
		$excerpt_length = 55;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, '[...]');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');
/* === ADD THEME SUPPORT === */
    if( function_exists('add_theme_support')) add_theme_support('post-thumbnails');
    if( function_exists('add_theme_support')) add_theme_support('automatic-feed-links');
    if( function_exists('add_theme_support')) add_theme_support('post-formats');
// expand contact info
function my_new_contactmethods( $contactmethods ) {
    // Add Twitter
        $contactmethods['twitter'] = 'Twitter';
    //add Facebook
        $contactmethods['facebook'] = 'Facebook';
    //add Linkedin
        $contactmethods['linkedin'] = "Linkedin";
    return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);
// kill things not needed in the WordPress head
remove_action('wp_head', 'rsd_link'); // kill the RSD link
remove_action('wp_head', 'wlwmanifest_link'); // kill the WLW link
remove_action('wp_head', 'index_rel_link'); // kill the index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // kill the prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // kill the start link
remove_action('wp_head', 'feed_links', 2); // kill post and comment feeds
remove_action('wp_head', 'feed_links_extra', 3); // kill category, author, and other extra feeds
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // kill adjacent post links
remove_action('wp_head', 'wp_generator'); // kill the wordpress version number
// removing a really bad filter idea by Matt M
remove_filter( 'the_content', 'capital_P_dangit' );
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );
// security tweaks
add_filter('login_errors',create_function('$a', "return null;")); // remove login error notes
?>
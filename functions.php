<?php
// setup of admin options
require_once (TEMPLATEPATH . '/assets/includes/admin/admin-options.php');
// includes sidebars
require_once (TEMPLATEPATH . '/assets/includes/functions/sidebars.php');
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
// Load jQuery from Google Code in footer
function jQueryFooter() {
    if (!is_admin()){
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"), false, '1.4.3',true);
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'jQueryFooter');
function restatement_footer_scripts() {
    if (!is_admin()){
        $js='/assets/js/scripts.js';
        wp_register_script('scripts', get_stylesheet_directory_uri().$js,array('jquery'),filemtime(STYLESHEETPATH.$js),true);
        wp_print_scripts('scripts');
    }
}
add_action('wp_footer', 'restatement_footer_scripts');
// remove version number from jQuery
add_filter('script_loader_src','restatement_scripts_unversion');
function restatement_scripts_unversion($src) {
    if( strpos($src,'ajax.googleapis.com') )
        $src=remove_query_arg('ver', $src);
    return $src;
}
// WP threaded comments
    function theme_queue_js(){
        if (!is_admin()){
            if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action('get_header', 'theme_queue_js');
// 2.9 post thumbnails
    if(function_exists('add_theme_support')) add_theme_support('post-thumbnails');
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
// checks for really long requests, eval and base64 and return 414 to query
if($user_ID) {
  if(!current_user_can('level_10')) {
    if (strlen($_SERVER['REQUEST_URI']) > 255 ||
      strpos($_SERVER['REQUEST_URI'], "eval(") ||
      strpos($_SERVER['REQUEST_URI'], "CONCAT") ||
      strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
      strpos($_SERVER['REQUEST_URI'], "base64")) {
        @header("HTTP/1.1 414 Request-URI Too Long");
	@header("Status: 414 Request-URI Too Long");
	@header("Connection: Close");
	@exit;
    }
  }
}
?>
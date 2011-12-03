<?php
// TODO don't forget to change you're content width to suite your design
if ( ! isset( $content_width ) ) $content_width = 900;
// includes sidebars
locate_template( array('/assets/includes/add-widget-areas.php' ), true);
// includes comment stuff
locate_template( array('/assets/includes/custom-comment-styles.php' ), true);
// includes JS
locate_template( array('/assets/includes/add-js.php'), true);

/**
 * Improves the excerpt IMO
 *
 * Lets more HTML through the excerpt to provide what clients
 * typically expect to see in their site functionality. You can
 * change the lenght of the excerpt by working with the $excerpt_length
 * variable.
 *
 * @since 1.0
 *
 * @param $text   string  required    The text that we make the excerpt from
 *
 * @return $text  string  Our newly formatted text string for the_excerpt
 *
 * @uses get_the_content
 */
function sfn_improved_trim_excerpt( $text ) {
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
add_filter('get_the_excerpt', 'sfn_improved_trim_excerpt');

/* === ADD THEME SUPPORT === */
    if( function_exists('add_theme_support')) add_theme_support('post-thumbnails');
    if( function_exists('add_theme_support')) add_theme_support('automatic-feed-links');
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

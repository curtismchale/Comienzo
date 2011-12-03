<?php
/**
 * Place any TODO notes for your theme here so you don't forget
 *
 * @todo set $content_width to match the theme
 * @todo change the screenshot to match the theme
 */
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
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');

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

/**
 * Adds page slug to body_class
 *
 * Adds the page slug to the output of body_class on the HTML
 * body of our site.
 *
 * @since 2.1
 *
 * @param $classes  array   required  The array of classes that is already being applied to body_class
 *
 * @return $classes array   The modified classes to be applied to body_class
 *
 * @global $wp_query
 *
 * @uses is_404
 * @uses is_page
 * @uses get_page
 * @uses sanitize_title
 */
function sfn_body_classes($classes, $class='') {
    global $wp_query;
    // detecting the 404 page since the $post_id won't be valid
    // if we're on a 404 page and we'll get a debug error
    if( !is_404() ){
        $post_id = $wp_query->post->ID;
        if(is_page($post_id )){
            $page = get_page($post_id);
            //check for parent
            if($page->post_parent>0){
                $parent = get_page($page->post_parent);
                $classes[] = 'page-'.sanitize_title($parent->post_title);
            }
            $classes[] = 'page-'.sanitize_title($page->post_title);
        }
    }// ends check for 404 page
  return $classes;// return the $classes array
}
add_filter('body_class','sfn_body_classes');
?>
<?php
/**
 * Place any TODO notes for your theme here so you don't forget
 *
 * @todo set $content_width to match the theme
 * @todo change the screenshot to match the theme
 */
if ( ! isset( $content_width ) ) $content_width = 900;

// includes comment stuff
locate_template( array('/assets/includes/custom-comment-styles.php' ), true);

/* === ADD THEME SUPPORT === */
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');

/**
 * This is the main CLASS for adding functions to our theme
 *
 * @since 2.2.1 - added the class instead of functional stuff
 */
class Comienzo{

	function __construct(){
		add_filter( 'body_class', array( $this, 'body_classes' ) );

		add_action( 'widgets_init', array( $this, 'widget_areas' ) );

		// javascript
		add_action( 'wp_enqueue_scripts', array( $this, 'add_js' ) );

		// excerpt stuff
		remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
		add_filter( 'get_the_excerpt', array( $this, 'improved_trim_excerpt' ) );

	} // construct

	/**
	 * Enqueues our theme scripts
	 *
	 * @since 1.0
	 * @author SFNdesign, Curtis McHale
	 * @access public
	 *
	 * @uses wp_enqueue_scripts()       Sets up JS the 'WordPress' way
	 */
	public function add_js(){

		  // registering our scripts first
		  wp_enqueue_script( 'jqueryvalidate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array( 'jquery' ), '1.0', true );
		  wp_enqueue_script( 'comthemescripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.0', true );

		  if( is_single() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		  } // single && get_option

	} // add_js

	/**
	 * Registers the 'sidebars' (really they're widget areas people) for the site
	 *
	 * @since 1.0
	 * @access public
	 * @author SFNdesign, Curtis McHale
	 *
	 * @uses register_sidebar()         Registers the sidebare/widget area in WordPress
	 */
	public function widget_areas() {

		register_sidebar( array(
			'id'            => 'sidebar',
			'name'          => 'sidebar',
			'description'   => 'add description of the sidebar into functions file',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		));

	  // repeat register sidebar to add more sidebars

	} // widget_areas

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
	 *
	 * @todo doubt I need the $post global
	 * @todo give this a whole rethink in lite of the balanced tags one we used with 10up
	 */
	function improved_trim_excerpt( $text ) {
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
	} // improved_trim_excerpt

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
	 * @uses is_404()           Conditional returns true if on the 404 page
	 * @uses is_page()          Conditional returns true if on a page
	 * @uses get_page()         Gets the page object
	 * @uses sanitize_title()   Makes sure we're outputing safeness
	 *
	 * @todo get_page it deprecated and should be killed
	 * @todo really this whole thing needs an overhaul
	 */
	function body_classes($classes, $class='') {
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
	} // body_classes

} // Comienzo

$com = new Comienzo();

/* === Template Tags === */

/**
 * Builds out a smarter Archive title
 *
 * @since 1.0
 * @author SFNdesign, Curtis McHale
 *
 * @uses is_category()          Returns true if we are on a category
 * @uses single_cat_title()     Prints out the title for a single category
 * @uses is_tag()               Returns true if on a tag archive page
 * @uses single_tag_title()     Prints out the name of the tage
 * @uses the_time()             Returns the time
 * @uses is_day()               Returns true if on a day archive page
 * @uses is_month()             Returns true if on a month archive page
 * @uses is_year()              Returns true if on a year archive page
 * @uses is_author()            Returns true if you are on an author archive page
 */
function com_archive_title(){ ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1>Archive for <?php the_time( get_option('date_format') ); ?></h1>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1>Archive for <?php the_time('F, Y'); ?></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1>Archive for <?php the_time('Y'); ?></h1>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1>Author Archive</h1>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1>Blog Archives</h1>
	<?php }

} // com_archive_title
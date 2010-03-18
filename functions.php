<?php
if ( function_exists('register_sidebar') ) {
    // add names of widgetized areas as needed
    $allWidgetizedAreas = array("footer", "sidebar");
    
    foreach ($allWidgetizedAreas as $WidgetAreaName) {
    
        register_sidebar(array(
           'name'=> $WidgetAreaName,
           'before_widget' => '<div id="%1$s" class="widget %2$s left half">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
        ));
    
    }

}
// Load jQuery from Google Code in footer
function jQueryFooter() {
    if (!is_admin()){
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"), false, '1.4.2',true);
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
    return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);
//load google analytics options panel
require_once (TEMPLATEPATH . '/assets/includes/analytics-admin-menu.php');
?>
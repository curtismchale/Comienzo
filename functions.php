<?php
// register sidebar one
    if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
            'name'=>'sidebar2',
            'description'=>'add description of the sidebar into functions file',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));
// register sidebar two
        register_sidebar(array(
            'name'=>'sidebar1',
            'description'=>'add description of the sidebar into functions file',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));
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
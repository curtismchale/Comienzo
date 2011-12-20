<?php

/**
 * Adds scripts to the front end of the site
 *
 * Most scripts are only needed on the front end of the site
 * and the function below makes sure jQuery is ready then adds
 * the scripts we need for the site
 *
 * @uses wp_enqueue_script
 * @uses wp_register_script
 * @uses get_template_directory_uri
 *
 * @since 2.2
 */
function com_js_not_admin() {

  // registering our scripts first
  wp_register_script('jqueryvalidate', get_template_directory_uri().'/assets/js/jquery.validate.min.js', array('jquery'), '1.0', true);
  wp_register_script('comthemescripts', get_template_directory_uri().'/assets/js/scripts.js', array('jquery'), '1.0', true);

  // making sure jquery is ready first
  wp_enqueue_script('jquery');

  // loading the scripts we need for our theme
  wp_enqueue_script('jqueryvalidate');
  wp_enqueue_script('comthemescripts');

}

/**
 * Adds the JS for threaded comments
 *
 * Action is added if we're !is_admin and just before the
 * comment form it loaded. Then the function itself checks 
 * to make sure that threaded comments are in fact
 * enabled
 *
 * @uses wp_enqueue_script
 *
 * @since 2.2
 */
function com_threaded_comment_js(){

  if( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

}

/**
 * Now we're adding the actions for the above functions
 * but only if !is_admin since we don't need to load them
 * on the admin side of the site.
 *
 * We also make sure that we use the proper hooks for adding scripts.
 * Using comment_form_before makes sure that if comments are just
 * not included in the theme we don't bother loading the script.
 *
 * wp_enqueue_scripts is the proper spot to load all scripts for
 * the frontend of your site.
 */
if( !is_admin() ){
  add_action( 'wp_enqueue_scripts', 'com_js_not_admin' );
  add_action( 'comment_form_before', 'com_threaded_comment_js' );
}

/**
 * This is where we'd add any scripts we wanted to actually use
 * in the admin area of the site which is almost never.
 */
function com_js_in_admin(){

}// end jsInAdmin

add_action( 'admin_enqueue_scripts', 'com_js_in_admin' );
?>

<?php

     // only need on the frontend of the site (most scripts)
    function jsNotAdmin() {
        if (!is_admin()){
            wp_enqueue_script('jquery');
            wp_enqueue_script('jqueryvalidate', get_template_directory_uri().'/assets/js/jquery.validate.min.js', array('jquery'), '1.0', true);
        }// end if is_admin new scripts go above this
    }
    add_action('init', 'jsNotAdmin');
    // this chunk deals with removing the version number to enhance caching
    function restatement_footer_scripts() {
        if (!is_admin()){
            $js='/assets/js/scripts.js';
            wp_register_script('scripts', get_stylesheet_directory_uri().$js,array('jquery'),filemtime(STYLESHEETPATH.$js),true);
            wp_print_scripts('scripts');
        }// end if is_admin
    }
    add_action('wp_footer', 'restatement_footer_scripts');
    // scripts needed in admin (almost never)
    function jsInAdmin(){

    }// end jsInAdmin

    add_action('init', 'jsInAdmin');
?>

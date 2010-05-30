<?php // this is the collecting point for all sidebars in the theme
// register sidebar one
    if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
            'name'=>'sidebar',
            'description'=>'add description of the sidebar into functions file',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));
        // copy the function above and place here to have multiple sidebars
    } // end function check for register sidebar
?>
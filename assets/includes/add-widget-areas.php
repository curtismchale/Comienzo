<?php // this is the collecting point for all sidebars in the theme

add_action( 'widgets_init', 'com_add_sidebars' );

function com_add_sidebars() {

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

} // end com_add_sidebars

?>

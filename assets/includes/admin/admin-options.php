<?php
    
    $themename = "Comienzo Developers Theme";
    $shortname = "cmnzth";

    // $options holds all of the theme options
    $options = array(
        
        array(
          "name"        => $themename." Options",
          "type"        => "title"
        ),
        
        array("name" => "General", "type" => "section"),
        
        array("type" => "open"),
        

        array(// lets you override the default favicon
            "name"      => "Favicon",  
            "desc"      => "A Favicon is a 16x16 pixel .ico image. If you'd like to override the default favicon paste a link to the new one",  
            "id"        => $shortname."_favicon",  
            "type"      => "text",  
            "std"       => get_bloginfo('stylesheet_directory') ."/assets/images/favicon.ico"
        ),
        
        array(// lets you override the default RSS feed
            "name"      => "RSS Feed",  
            "desc"      => "Override the default WordPress RSS feed here.",  
            "id"        => $shortname."_rss_feed",  
            "type"      => "text",  
            "std"       => get_bloginfo('rss2_url')
        ),
        
        array( // echos scripts into the footer.php file
            "name"      => "Analytics",
            "desc"      => "Add your analytics tracking scripts here.",
            "id"        => $shortname."_footer_scripts",
            "type"      => "textarea"
        ),
                
        array("type" => "close")
    );
    
function cmnztheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=admin-options.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=admin-options.php&reset=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'cmnztheme_admin');
}


function cmnztheme_add_init() { // this adds the stylesheet
    $file_dir=get_bloginfo('template_directory');  
    wp_enqueue_style("functions", $file_dir."/assets/includes/admin/admin-options.css", false, "1.0", "all");  
}  
function cmnztheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap cmnz_wrap">
<h2><?php echo $themename; ?> Settings</h2>
 
<div class="cmnz_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

 
<?php break;
 
case 'text':
?>

<div class="cmnz_input cmnz_text">

	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
    <small><?php echo $value['desc']; ?></small>
 
<div class="clearfix"></div>
 
</div><!-- /.cmnz_input .cmnz_text -->
<?php
break;
 
case 'textarea':
?>

<div class="cmnz_input cmnz_textarea">
	
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
    <small><?php echo $value['desc']; ?></small>
    
<div class="clearfix"></div>
 
</div><!-- /.cmnz_input /.cmnz_textarea -->
<?php
break;
 
case 'select':
?>

<div class="cmnz_input cmnz_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
    <?php foreach ($value['options'] as $option) { ?><!-- loops through select box options -->
    		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
    </select>

	<small><?php echo $value['desc']; ?></small>
	
<div class="clearfix"></div>

</div><!-- /.cmnz_input .cmnz_select -->
<?php
break;
 
case "checkbox":
?>

<div class="cmnz_input cmnz_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small>

<div class="clearfix"></div>

</div><!-- /.cmnz_input .cmnz_checkbox -->
<?php break; 
case "section":

$i++;

?>

<div class="cmnz_section">
    <div class="cmnz_title">
        <h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt=""><?php echo $value['name']; ?></h3>
    
        <!-- this is the options save button -->
        <span class="submit">
            <input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
        </span>

<div class="clearfix"></div>

    </div><!-- /.cmnz_title -->

<div class="cmnz_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>

<!-- reset theme options button -->
<form method="post">
    <p class="submit">
        <input name="reset" type="submit" value="Reset" />
        <input type="hidden" name="action" value="reset" />
    </p>
</form>
 

<?php
}
?>
<?php // this actually adds the theme admin menu
add_action('admin_init', 'cmnztheme_add_init');
add_action('admin_menu', 'cmnztheme_add_admin');
?>
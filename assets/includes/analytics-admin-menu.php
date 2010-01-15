<?php
// create custom plugin settings menu
add_action('admin_menu', 'omr_create_menu');

function omr_create_menu() {

	//create new top-level menu
	add_menu_page('Build Internet Settings', 'Build Internet', 'administrator', __FILE__, 'omr_settings_page', 'favicon.ico');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}
function register_mysettings() {
	//register our settings
	register_setting( 'omr-settings-group', 'omr_tracking_code' );
}
function omr_settings_page() {
?>
<div class="wrap">
<h2>Build Internet Options</h2>

<form method="post" action="options.php">

    <?php settings_fields('omr-settings-group'); ?>
    <table class="form-table">

        <tr valign="top">
        <th scope="row">Tracking Code</th>
        <td><textarea name="omr_tracking_code"><?php echo get_option('omr_tracking_code'); ?></textarea></td>
        </tr>

    </table>

    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php } ?>
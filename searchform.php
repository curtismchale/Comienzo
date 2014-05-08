<?php
/**
 * Default search form template
 *
 * Renders the default search form. Is used in the widget and get_search_form calls
 *
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @since 1.0
 */
?>
<form method="get" id="searchform" action="<?php home_url(); ?>/">
	<label class="hidden" for="s"><?php _e('', 'comienzo'); ?></label>
	<input type="text" class="text" value="search" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="Search" />
</form>

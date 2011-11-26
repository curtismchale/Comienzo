<?php
/**
 * Default for get_sidebar
 * 
 * Any call for get_sidebar with no parameter or if the paremter file can't be found will be routed here.
 * 
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 * 
 * @since 1.0
 */
?>
<ul id="sidebar" class="widget-area">
    <?php dynamic_sidebar('sidebar'); ?>
</ul>
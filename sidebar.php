<ul id="sidebar-one" class="sidebar">

    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
    
        <li class="search">
            <?php include (TEMPLATEPATH . '/searchform.php'); ?>
        </li><?php // end .search ?>
    
        <?php wp_list_pages('title_li=<h2 class="widgettitle">Pages</h2>' ); ?>
    
        <li>
            <h2 class="widgettitle">Archives</h2>
            
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
            
        </li>
    
        <?php wp_list_categories('show_count=1&title_li=<h2 class="widgettitle">Categories</h2>'); ?>
    
        <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
    
        <li>
            <h2 class="widgettitle">Meta</h2>
            
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
                <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
                <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
                <?php wp_meta(); ?>
            </ul>
            
        </li>
        
        <?php } ?>

    <?php endif; ?>
    
</ul><?php //end #sidebar-one .sidebar ?>
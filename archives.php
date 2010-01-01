<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

    <div id="archives">
    
    	<div id="content-wrapper">

			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
    
            <h2>Archives by Month:</h2>
                <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                </ul>
            
			<h2>Archives by Subject:</h2>
                <ul>
                     <?php wp_list_categories(); ?>
                </ul>
    
    	</div><!-- /#content-wrapper -->
    
    	<?php get_sidebar(); ?>
        
    </div><!-- /#archives -->            

<?php get_footer(); ?>

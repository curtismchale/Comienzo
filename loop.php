<?php
/**
 * Generic Loop
 *
 * This is the generic loop file for the site. It serves single.php search.php and index.php. Some conditioanls are included to accommodate the different template files
 *
 * @package Comienzo
 * @copyright Copyright (C) 2011 Curtis McHale
 * @license http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @since 2.0
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <div class="post-heading">

    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <p class="post-author">by <?php the_author_posts_link(); ?></p>
    <time class="date-published"><?php the_time( get_option('date_format') ); ?></time>

  </div><!-- /.post-heading -->

  <?php

  	if( is_search() || is_archive() ){
  		the_excerpt();
  	} else{
    	the_content('Read the rest of this entry &raquo;');
    }

	?>

  <p class="post-taxonomy"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', '); ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

</article><!-- /post_class(); -->

<?php if( is_single() ) comments_template(); ?>
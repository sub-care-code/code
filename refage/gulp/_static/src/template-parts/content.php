<?php
/**
 * page-contentの基本テンプレート
 */
?>

<article class="entry-content__article" id="<?php the_iD(); ?>">
  <?php 
    the_content();

    if( is_single()) {
      $link_pagges_args = array(
        'before'          => '<p class="entry-link__pages">',
        'next_or_number'  => 'next',
      );
      wp_link_pages( $link_pagges_args);
    }
?>

</article><!-- /.entry-content__article -->
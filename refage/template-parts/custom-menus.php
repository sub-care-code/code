<?php
/**
 * top-pageのメニュー一覧表示
 * 
 */

 ?>

<?php
$menusLoop = new WP_Query(array(
  'post_type' => 'menus',
   'posts_per_page' => 10
  ));
  ?>
<div class="slider__wrap">
  <ul class="slider l-menu__list">
    <?php while($menusLoop->have_posts()):
$menusLoop->the_post(); ?>
    <li class="l-menu__item" id='post-<?php the_ID(); ?>'>
      <figure class="l-menu__thumbnail circle">
        <span class="mask">
          <?php
        if( has_post_thumbnail()):
        the_post_thumbnail();
        endif;
       ?>
        </span>
      </figure>
      <div class="l-menu__lead">
        <h3 class="l-menu__title">
          <?php the_title(); ?>
        </h3><!-- /.l-menu__title -->
        <div class="l-menu__text">
          <?php the_excerpt(); ?>
        </div><!-- /.le-menu__text -->
      </div><!-- /.l-menu__lead -->
    </li>
    <?php endwhile;
      wp_reset_postdata();
    ?>
  </ul>
</div>
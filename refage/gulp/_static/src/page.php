<?php
/*
Template Name: 固定ページ
Template Post Type: page.pho
*/
?>
<?php if (!have_posts()) { 
header("HTTP/1.1 404 Not Found");
include (TEMPLATEPATH . '/404.php');
return; } ?>

<?php get_header(); ?>
<div class="p-container">
  <main class="main">
    <div class="page__wrap">

      <!-- タイトルの表示 -->
      <div class="entry-header">
        <div class="entry-header__thumbnail">
          <?php if( has_post_thumbnail()):
          $attr = array(
            'class' => 'entry-header__img',
          );
            the_post_thumbnail('large', $attr);
          endif; ?>
        </div><!-- /.aaa -->

        <?php the_title( ' <h1 class="entry-header__title glowAnime">','</h1>'); ?>
      </div>

      <!-- 本文の表示 -->
      <div class="entry-content page-width">
        <?php
              if( have_posts()): 
            ?>
        <?php while( have_posts()){
              the_post();
              // content.phpの読み込み
              get_template_part( '/template-parts/content');
            }
            ?>
        <?php else: ?>
        <p>コンテンツはありません</p>
        <?php endif; ?>
        <?php breadcrumb(); ?>
      </div><!-- /.entry-content -->

    </div><!-- /.t-page -->

  </main><!-- /.main -->


  <ul class="circles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>

</div><!-- /.p-container -->





<?php get_footer(); ?>
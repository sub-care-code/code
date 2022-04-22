<?php
/*
Template Name: 投稿ページ
Template Post Type: single-page
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
        <?php 
          the_post_navigation(array (
            'prev_text' => '前のページ',
            'next_text' =>  '次のページ',

         ));
        ?>
        <?php else: ?>
        <p>コンテンツはありません</p>
        <?php endif; ?>
        <!-- インスタお問合せの表示 -->
        <div class="single-sns__wrap">
          <?php get_template_part('template-parts/sns'); ?>
        </div><!-- /.single-sns__wrap -->
        <!-- パンくずリストの表示 -->
        <?php breadcrumb(); ?>
      </div><!-- /.entry-content -->

    </div><!-- /.t-page -->

  </main><!-- /.main -->


</div><!-- /.p-container -->





<?php get_footer(); ?>
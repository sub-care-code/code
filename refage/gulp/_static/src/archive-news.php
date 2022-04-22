<?php 
/**
 * archive-news.php
 */

 get_header(); 
 ?>

<?php if (!have_posts()) { 
header("HTTP/1.1 404 Not Found");
include (TEMPLATEPATH . '/404.php');
return; } ?>
<?php get_header();?>

<div class="container page-width">
  <div class="container_wrap page-inner">
    <main class="articles_main" <?php post_class();?>>
      <h2 class="archive-news__title">News一覧</h2><!-- /.archive-news__title -->
      <div class="articles_area">
        <?php if(have_posts()):?>
        <?php while(have_posts()):the_post();?>
        <section class="articles_wrap" id="area">
          <!-- サムネイル表示 -->
          <figure class="articles_thumbnail">
            <?php if(has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png">
            <?php endif; ?>
          </figure>
          <!-- 日付表示 -->
          <div class="articles_meta">
            <time>公開日：<?php the_time('Y/m/d'); ?></time>
            <?php if (get_the_modified_date('Y/m/d') != get_the_time('Y/m/d')) : ?>
            <time>（更新日：<?php the_modified_date('Y/m/d') ?>）</time>
            <?php endif; ?>
          </div>
          <!-- タイトルの表示 -->
          <h2 class="articles_post-title"><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2>
          <!-- カテゴリー表示 -->
        </section>

        <?php endwhile;?>
      </div><!-- /.archicles_area -->

      <section class="pager_navigation">
        <div class="pager_navigation_btn">
          <?php posts_nav_link( '', '前のページ', '次のページ' ); ?>
        </div>
      </section><!-- /.pager_navigation -->
      <?php endif;?>
    </main>


  </div><!-- /.container_wrap -->
  <!-- パンくずリスト -->
  <?php breadcrumb(); ?>

</div><!-- /.container -->
<?php get_footer();?>
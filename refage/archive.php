<?php
/*
Template Name: Archive
*/
?>
<?php if (!have_posts()) { 
header("HTTP/1.1 404 Not Found");
include (TEMPLATEPATH . '/404.php');
return; } ?>
<?php get_header();?>

<div class="container page-width">

  <!-- おすすめ記事の表示 -->
  <?php
			$args = array(
				'post_type' => 'post',
				'post__in' => array(58,53,46),
			);
			$set_query = new WP_Query($args);
			?>
  <section class="cal_contents page-width">

    <?php if ($set_query -> have_posts()): ?>
    <?php while ($set_query -> have_posts()) : $set_query -> the_post(); ?>
    <div class="cal_content">
      <!--サムネイル画像の追加-->
      <?php if( has_post_thumbnail() ): ?>
      <?php the_post_thumbnail( null, array( null, 150 ) ); ?>
      <?php endif; ?>
      <a href="<?php the_permalink(); ?>"><?php the_title('<h2>','</h2>'); ?></a>
    </div><!-- /.cal_content -->
    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </section><!-- /.cal_contents -->
  <?php
			$categories = get_the_category();
			?>
  <div class="container_wrap page-inner">
    <main class="articles_main" <?php post_class();?>>
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
          <div class="entry-cat" id="entry-cat">
            <?php
						$categories = get_the_category();
						//選択したカテゴリ全て表示
						foreach($categories as $category){
							echo '<a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
						}
						?>
          </div>
          <!-- タイトルの表示 -->
          <h2 class="articles_post-title"><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2>
          <!-- カテゴリー表示 -->
          <?php 
						if(has_excerpt()){
              echo '<div class="articles_lead">';
							the_excerpt();
               echo '</div><!-- /.articles_lead -->';
							echo '<a class="readmore-link" href="';
							the_permalink();
							echo '">READ MORE</a>';
						}else{
               echo '<div class="articles_lead">';
							the_excerpt();
               echo '</div><!-- /.articles_lead -->';
						}
						?>
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
    <!-- サイドバウィジェット -->
    <?php get_sidebar(); ?>

    <?php
        //記事のPV数を更新
        if(!is_user_logged_in() &&! is_robots()){
          setPostViews(get_the_ID());
        }
        ?>

  </div><!-- /.container_wrap -->
  <!-- パンくずリスト -->
  <?php breadcrumb(); ?>

</div><!-- /.container -->
<?php get_footer();?>
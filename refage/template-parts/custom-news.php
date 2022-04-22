<?php
/**
 * topページのお知らせ欄
 * 
 */
?>



<?php
$newsLoop =array(
  'posts_per_page' => 4,
  'post_type'     => 'news',
  'paged' => $paged,
);

$news_query = new WP_Query($newsLoop);
if( $news_query->have_posts()): ?>

<dl class="info__wrap">

  <?php while($news_query->have_posts()):
      $news_query->the_post();
  ?>

  <!-- 日付の取得 -->
  <a class="info__link" href="<?php echo the_permalink(); ?>">
    <dt class="info__tit">
      <?php echo get_the_date(); ?>
    </dt>
    <!-- /.info__tit -->

    <!-- 内容の取得 -->
    <dd class="info__date">
      <?php echo the_title(); ?>
    </dd><!-- /.info__date -->
  </a>
  <?php endwhile;
     wp_reset_postdata(); ?>

  <?php else: ?>
  <p>お知らせはありません</p>

  <?php endif; ?>
</dl><!-- /.info__wrap -->
<div class="lead-btn -center"><a href="<?php echo esc_url(home_url('/news/') ); ?>"
    class="btn__anima bordertop"><span>新着情報一覧</span></a>
</div>
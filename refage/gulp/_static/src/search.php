<?php get_header(); ?>

<div class="p-container">

  <main class="main search__wrap">

    <h1 class="search__title">
      <!--検索結果数-->
      <?php
        if (isset($_GET['s']) && empty($_GET['s'])) {
          echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
        } else {
          echo '“'.$_GET['s'] .'”の検索結果：'.$wp_query->found_posts .'件'; // 検索キーワードと該当件数を表示
        }
      ?>
    </h1>
    <?php if (have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>

    <section class="search__index">
      <p class="meta" id="category_meta">
        <time>公開日：<?php the_time('Y/m/d'); ?></time>
        <?php if (get_the_modified_date('Y/m/d') != get_the_time('Y/m/d')) : ?>
        <time>（更新日：<?php the_modified_date('Y/m/d') ?>）</time>
        <?php endif; ?>
      </p>
      <!-- カテゴリー表示 -->
      <p class="entry-cat" id="entry-cat">
        <?php
          $categories = get_the_category();
          //選択したカテゴリ全て表示
            foreach($categories as $category){
            echo '<a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
                }
                ?>
      </p>
      <h2 class="search-post__title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
      </h2>
      <div class="articles_index_thumbnail">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail(); ?>
        </a>
      </div>
      <div class="article-text">
        <?php the_excerpt(); ?>
      </div><!-- /.article-text -->
    </section>
    <?php endwhile; ?>
    <section class="pager_navigation">
      <div class="pager_navigation_btn">
        <?php posts_nav_link( '', '前のページ', '次のページ' ); ?>
      </div>
    </section><!-- /.pager_navigation -->
    </section>

    <?php else: ?>
    <p class="search_result_title">検索されたキーワードにマッチする記事はありませんでした</p><!-- /.search_result_title -->
    <!-- パンくずリスト -->
    <?php breadcrumb(); ?>
    <?php endif; ?>

  </main>
  <aside>
    <?php dynamic_sidebar('side_wedget'); ?>
  </aside>
</div>
<?php breadcrumb(); ?>
</div>

<?php get_footer(); ?>
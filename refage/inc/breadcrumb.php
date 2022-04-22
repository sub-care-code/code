<?php
/**
 * ====================
 * パンくずリスト
 * カスタム投稿のカテゴリー設定
 * ===============
 */

function breadcrumb() {
  $home = '<li><a href="'.get_bloginfo('url').'" >HOME</a> ＞</li>';
  echo '<ul class="pageMap">';
  if ( is_front_page() ) {
      // トップページの場合
  }
  else if ( is_category() ) {
      // カテゴリページの場合
      $cat = get_queried_object();
      $cat_id = $cat->parent;
      $cat_list = array();
      while ($cat_id != 0){
          $cat = get_category( $cat_id );
          $cat_link = get_category_link( $cat_id );
          array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a>＞</li>' );
          $cat_id = $cat->parent;
      }
      echo $home;
      foreach($cat_list as $value){
          echo $value;
      }
      the_archive_title('<li>', '</li>');
  }
  else if ( is_archive() ) {
  // 月別アーカイブ・タグページの場合
  echo $home;
  the_archive_title('<li>', '</li>');
  }
  else if ( is_single() ) {
  // 投稿ページの場合

  $cat = get_the_category();
      if( isset($cat[0]->cat_ID) ) $cat_id = $cat[0]->cat_ID;
      $cat_list = array();
      while ($cat_id != 0){
          $cat = get_category( $cat_id );
          $cat_link = get_category_link( $cat_id );
          array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a>＞</li>' );
          $cat_id = $cat->parent;
      }
      echo $home;
      foreach($cat_list as $value){
          echo $value;
      }
      the_title('<li>', '</li>');
  }
  else if( is_page() ) {
  // 固定ページの場合
  echo $home;
  the_title('<li>', '</li>');
  }
  else if( is_search() ) {
  // 検索ページの場合
  echo $home;
  echo '<li>「'.get_search_query().'」の検索結果</li>';
  }
  else if( is_404() ) {
  // 404ページの場合
  echo $home;
  echo '<li>ページが見つかりません</li>';
  }
  echo "</ul>";
}
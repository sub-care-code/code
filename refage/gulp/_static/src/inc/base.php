<?php
/**
 * functions.phpの基本設定
 */


/**
 * テーマの初期設定
 * 
 * テーマサポートの読み込み
 * カスタムメニューの設定
 */
function theme_setup() {
  // RSSリンクの出力
  add_theme_support( 'automatic-feed-links' );
  // タイトルタグの出力
  add_theme_support( 'title-tag' );
  // アイキャッチの利用
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1568, 9999 );
  // html5形式での出力
  add_theme_support('html5',
      array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
      'navigation-widgets',
      )
    );
  // カスタムロゴの設定
  $logo_width  = 300;
  $logo_height = 100;
    add_theme_support('custom-logo',
      array(
      'height'               => $logo_height,
      'width'                => $logo_width,
      'flex-width'           => true,
      'flex-height'          => true,
      'unlink-homepage-logo' => true,
      )
    );
  // テーマカスタマイザーよりウィジェットを設定した際にリロードする
  add_theme_support( 'customize-selective-refresh-widgets' );
  // ブロックエディター用の基本CSSの読み込み
  add_theme_support( 'wp-block-styles' );
  // 全幅と幅広への利用
  add_theme_support( 'align-wide' );
  // 管理画面ブロックエディター用のCSSの読み込み
  add_theme_support( 'editor-styles' );
  // 管理画面用の独自CSSの読み込み
  $editor_stylesheet_path = './assets/css/style-editor.css';
  add_editor_style( $editor_stylesheet_path );
  // レスポンシブに対応した埋め込みのサポート
  add_theme_support( 'responsive-embeds' );
  // 行間のカスタマイズのサポート
  add_theme_support( 'custom-line-height' );
  // 段落、見出し、グループ、列、メディアおよびテキストブロックのリンクカラー設定のサポート
  add_theme_support( 'experimental-link-color' );
  // カバーブロックの余白設定のサポート
  add_theme_support( 'custom-spacing' );
  // カバーブロックの高さの単位の設定をサポート
  add_theme_support( 'custom-units' );
    
  // ナビゲーションメニューの作成
  register_nav_menus( 
      array( //複数の場ビゲーションメニューを登録する関数
  // 'メニューの位置' => 'メニューの説明文字'
      'main-menu' => 'Main Menu',
      'footer-menu' => 'Footer Menu',
          )
        );
}
  add_action( 'after_setup_theme','theme_setup');

  /**
 * 環境設定
 */
//サイトアドレスURLを取得
//テスト環境と本番環境が異なる場合など画像URLをこちらで設定しておくと後で書き換え不要で便利
  function shortcode_url() {
      return get_home_url();
    }
  add_shortcode('url', 'shortcode_url');

//テーマのURLを取得
//テーマ内にある画像の出力等したい場合、都度フルパスを書く必要がなくなるため便利
  function shortcode_templateurl() {
      return get_stylesheet_directory_uri();
    }
  add_shortcode('thema_url', 'shortcode_templateurl');

  
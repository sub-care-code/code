<?php // functions.php

/**
 * CSSとJSの読み込み
 */
function carecode_scripts(){
  //googlefontsの読み込み
  wp_enqueue_style( 'googleFonts','https://fonts.googleapis.com/css?family=Noto+Serif+JP%7CParisienne&display=swap');
  wp_enqueue_style('fontawesome_style','https://use.fontawesome.com/releases/v5.6.1/css/all.css');
  wp_enqueue_style( 'slick', get_template_directory_uri() . '/slick/slick.css' );
  wp_enqueue_style('main-style',get_stylesheet_uri(), array(), '1.0.0', 'all');

  //ヘッダーで出力されるjQueryとjQuery Migrateをキューから一旦除去する
  wp_deregister_script('jquery');
  wp_deregister_script('jquery-migrate');
  //jQueryとjQuery Migrateをあらためてキューに入れる（第5引数をtrueにすることでwp_footer関数によりbody閉じタグ直前で出力される）
  wp_enqueue_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
  wp_enqueue_script('jquery-migrate', includes_url('/js/jquery/jquery-migrate.min.js'), array('jquery'), NULL, true);
  wp_enqueue_script( 'slck.min', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.8.1', true);
  wp_enqueue_script( 'particles-min', get_template_directory_uri() . '/js/particles.min.js', array('jquery'), '', true);
  wp_enqueue_script('jquery-min','https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js',array('jquery'),'3.3.1',true);
  wp_enqueue_script( 'wpro-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script( 'anima-script', get_template_directory_uri() . '/js/anima.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script( 'slider-script', get_template_directory_uri() . '/js/slider.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts','carecode_scripts');
/**
 * ====================
 * ファイル分けしたfunctionsの読み込み
 * ===============
 */
require_once get_theme_file_path('/inc/base.php');
require_once get_theme_file_path('/inc/widget-custom.php');
require_once get_theme_file_path('/inc/breadcrumb.php');

add_shortcode('add_part', function($attr){
	ob_start();
	get_template_part($attr['temp']);
	return ob_get_clean();
});
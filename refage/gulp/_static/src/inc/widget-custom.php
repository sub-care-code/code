<?php
/**
 * functions.phpのウィジェット設定
 */


 /**
  * ウィジェットのカスタマイズ
  */
function wp_widget() {
 $footer_numbers = array( 1, 2);
 foreach( $footer_numbers as $number ) {
   register_sidebar (
     array(
       'name'          => 'footer ' . $number,
       'id'            => 'footer ' . $number,
       'before_widget' => '<div id="%1$s class="%2$s">',
       'afeter_widget' => '</div>',
       'before_title'  => '<h3 class="footer__title">',
       'after_title'   => '</h3>',
     ));
 }
}
add_action('widgets_init','wp_widget');
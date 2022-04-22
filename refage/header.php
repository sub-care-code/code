<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="header">
    <div class="header__wrap page-width">
      <!-- サイトロゴの表示 -->
      <?php if( has_custom_logo() ) : ?>
      <div class="site-logo"><?php the_custom_logo(); ?></div><!-- /.site-logo -->
      <?php else : ?>
      <div class="site-logo"><a href="<?php echo esc_attr( home_url('/') ); ?>"><?php bloginfo('name'); ?></a></div>
      <!-- /.site-logo -->
      <?php endif; ?>

      <!-- ナビゲーションメニューの作成 -->
      <div class="g-nav__wrap">
        <?php 
       wp_nav_menu( array(
         'theme_location' => 'main-menu',
         'container' => 'nav',
         'container_id' => 'g-nav',
         'container_class' => 'g-nav',
         'menu_class' => 'g-nav__list',
       ));
       ?>
      </div><!-- /.nav_wrap -->
    </div><!-- /.header__wrap -->

    <!-- ハンバーガーボタンの設定 -->
    <button class="h-nav">
      <div class="h-nav__btn">
        <span class="h-nav__bar -top"></span>
        <span class="h-nav-midle">Menu</span>
        <span class="h-nav__bar -bottom"></span>
      </div>
      <!-- /.nav_open_btn ハンバーガーメニューアイコン-->
    </button><!-- /.g-nav -->
    <div class="circle-bg"></div><!-- /.circle-bg -->

  </header>
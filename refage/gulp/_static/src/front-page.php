<?php get_header(); ?>
<main class="container">

  <div class="fv">
    <div class="fv__wrap">
      <p class="site-lead glowAnime">京都府八幡市にある</p>
      <p class="site-lead glowAnime">癒しのエステサロン</p>
      <h2 class="site-tiltle glowAnime ">Refage-aroma</h2>
      <!--.fv__wrap-->
    </div>
    <div class="scrolldown"><span>Scroll</span></div>
  </div><!-- /.fv-->
  <p class="fv__bottom">京都府八幡市・枚方市の癒やしのサロン</p>

  <article class="about-lead page-width inner fadeInTrigger">
    <div class="section-title__wrap">

      <h2 class="section-title">
        <span class="slide-in leftAnime">
          <span class="slide-in_inner leftAnimeInner">
            About
          </span>
        </span>
      </h2>

      <p class="section-title__bg"><span class="slide-in leftAnime">
          <span class="slide-in_inner leftAnimeInner">
            Refageについて
          </span>
        </span></p><!-- /.section-title__bg -->

    </div><!-- /.section-title__wrap -->

    <div class="about-lead__wrap flex page-inner">
      <div class="about-lead__area fadeInTrigger">
        <h2 class="sub-title">Refageはお客様の『こころと身体』の<br>
          健康を癒やすお手伝いをさせて頂きます
        </h2>

        <p class="about-lead__text">アロマサロンRefage-aromaは<br>
          お身体の状態を観察し、その後はしっかりと施術させて頂きます。<br>
          女性のセラピストによる施術で安心<br>
          デスクワークや家事やストレスからくる身体の疲れを癒やす最高の空間を提供します
        </p>

        <div class="lead-btn">
          <a class="btn__anima bordertop" href="<?php echo esc_url(home_url('/access/') ); ?>">
            <span>
              アクセス
            </span>
          </a>
        </div>
      </div>

      <div class="about-lead__img fadeInTrigger"></div>
    </div><!-- /.about-lead__wrap -->

  </article>
  <!--.about-lead-->

  <!-- 花びらのアニメーション -->
  <div id="particles-js"></div>
  <div id="wrapper">
    <section class="info inner fadeInTrigger">
      <div class="section-title__wrap">
        <h2 class="section-title">
          <span class="slide-in leftAnime">
            <span class="slide-in_inner leftAnimeInner">
              News
            </span>
          </span>
        </h2>

        <p class="section-title__bg">
          <span class="slide-in leftAnime">
            <span class="slide-in_inner leftAnimeInner">
              お知らせ
            </span>
          </span>
        </p><!-- /.section-title__bg -->
      </div>

      <div class="info__area fadeInTrigger">
        <?php get_template_part('template-parts/custom-news'); ?>
      </div>

    </section>
    <!--/container-->
  </div><!-- /#wrapper -->

  <section class="menu page-width fadeInTrigger">
    <div class="section-title__wrap">
      <h2 class="section-title">
        <span class="slide-in leftAnime">
          <span class="slide-in_inner leftAnimeInner">
            Menu
          </span>
        </span>
      </h2>

      <p class="section-title__bg">
        <span class="slide-in leftAnime">
          <span class="slide-in_inner leftAnimeInner">
            メニュー
          </span>
        </span>
      </p><!-- /.section-title__bg -->

    </div><!-- /.section-title__wrap -->
    <!-- メニュー一覧の表示-->
    <?php get_template_part( 'template-parts/custom-menus' ); ?>

    <div class="lead-btn">
      <a class="btn__anima bordertop" href="<?php echo esc_url(home_url('/menu/') ); ?>">
        <span>
          Menu一覧をみる
        </span>
      </a>
    </div>
    <!--/menu-->

  </section>

  <section class="contact  inner fadeInTrigger">
    <div class="section-title__wrap page-width">
      <div class="section-title__wrap">
        <h2 class="section-title">
          <span class="slide-in leftAnime">
            <span class="slide-in_inner leftAnimeInner">
              Contact
            </span>
          </span>
        </h2>

        <p class="section-title__bg">
          <span class="slide-in leftAnime">
            <span class="slide-in_inner leftAnimeInner">
              お問合せ
            </span>
          </span>
        </p><!-- /.section-title__bg -->

      </div><!-- /.section-title__wrap -->

      <div class="contact__wrap flex -reverce page-width">

        <!-- 営業日の表示 -->
        <?php get_template_part( 'template-parts/sales-days'); ?>

        <div class="contact__area fadeInTrigger">

          <h3 class="sub-title">ご予約方法</h3>
          <dl class="contact__ask">
            <dt>お気軽にお問合せください</dt>
            <dd>営業時間</dd>
            <dd>時間 10:00-18:00</dd>
            <dd>[ 月・水・土 ]</dd>
            <dd>日曜日は完全予約制</dd>
          </dl>

          <div class="lead-btn -center">
            <a class="btn__anima bordertop" href="<?php echo esc_url(home_url('/contact/') ); ?>">
              <span>
                お問い合わせ
              </span>
            </a>
          </div>
          <!--/contact-area-->

        </div>

      </div><!-- /.contact__wrap -->
      <?php get_template_part('template-parts/sns'); ?>
    </div>

  </section>

</main>

<?php get_footer(); ?>
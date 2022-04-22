jQuery(function ($) {
  // ハンバーガーメニューのアニメーション
  $(".h-nav ").click(function () {
    $(".h-nav").toggleClass("active");
    $(".h-nav__bar").toggleClass("active");
    $(".h-nav-midle").toggleClass("active");
    $(".g-nav").toggleClass("panelactive"); //ナビゲーションにpanelactiveクラスを付与
    $(".g-nav__list").toggleClass("panelactive"); //ナビゲーションにpanelactiveクラスを付与
    $(".circle-bg").toggleClass("active"); //ナビゲーションにpanelactiveクラスを付与
  });
  $(".g-nav a").click(function () {
    //ナビゲーションのリンクがクリックされたら
    $(".h-nav__btn").removeClass("active"); //ボタンの activeクラスを除去し
    $(".h-nav__bar").removeClass("active");
    $(".h-nav-midle").removeClass("active");
    $(".g-nav").removeClass("panelactive"); //ナビゲーションのpanelactiveクラスを除去し
    $(".g-nav__list").removeClass("panelactive"); //ナビゲーションにpanelactiveクラスを付
    $(".circle-bg").removeClass("active"); //ナビゲーションにpanelactiveクラスを付与
  });

  /*===========================================================*/
  /**トップページの文字を光りながら左に流す
  /*===========================================================*/

  // glowAnimeにglowというクラス名を付ける定義
  function GlowAnimeControl() {
    $(".glowAnime").each(function () {
      var elemPos = $(this).offset().top - 50;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight) {
        $(this).addClass("glow");
      }
    });
  }
  /*テキストがほのかに光りながら出現*/
  //spanタグを追加する
  var element = $(".glowAnime");
  element.each(function () {
    var text = $(this).text();
    var textbox = "";
    text.split("").forEach(function (t, i) {
      if (t !== " ") {
        if (i < 10) {
          textbox +=
            '<span style="animation-delay:.' + i + 's;">' + t + "</span>";
        } else {
          var n = i / 10;
          textbox +=
            '<span style="animation-delay:' + n + 's;">' + t + "</span>";
        }
      } else {
        textbox += t;
      }
    });
    $(this).html(textbox);
  });

  //ヘッダーの文字アニメーション終了

  /*===========================================================*/
  /*テキストが流れるように出現（左から右）/
/*===========================================================*/

  function slideAnime() {
    //====左右に動くアニメーションここから===
    $(".leftAnime").each(function () {
      var elemPos = $(this).offset().top - 50;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight) {
        //左から右へ表示するクラスを付与
        //テキスト要素を挟む親要素（左側）とテキスト要素を元位置でアニメーションをおこなう
        $(this).addClass("slideAnimeLeftRight"); //要素を左枠外にへ移動しCSSアニメーションで左から元の位置に移動
        $(this).children(".leftAnimeInner").addClass("slideAnimeRightLeft"); //子要素は親要素のアニメーションに影響されないように逆の指定をし元の位置をキープするアニメーションをおこなう
      } else {
        //左から右へ表示するクラスを取り除く
        $(this).removeClass("slideAnimeLeftRight");
        $(this).children(".leftAnimeInner").removeClass("slideAnimeRightLeft");
      }
    });

    $(".rightAnime").each(function () {
      var elemPos = $(this).offset().top - 50;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight) {
        //右から左へ表示するクラスを付与
        //テキスト要素を挟む親要素（右側）とテキスト要素を元位置でアニメーションをおこなう
        $(this).addClass("slideAnimeRightLeft"); //要素を右枠外にへ移動しCSSアニメーションで右から元の位置に移動
        $(this).children(".rightAnimeInner").addClass("slideAnimeLeftRight"); //子要素は親要素のアニメーションに影響されないように逆の指定をし元の位置をキープするアニメーションをおこなう
      } else {
        //右から左へ表示するクラスを取り除く
        $(this).removeClass("slideAnimeRightLeft");
        $(this).children(".rightAnimeInner").removeClass("slideAnimeLeftRight");
      }
    });
    //====左右に動くアニメーションここまで===
  }

  // 動きのきっかけの起点となるアニメーションの名前を定義
  function fadeAnime() {
    // 4-1 ふわっ（その場で）
    $(".fadeInTrigger").each(function () {
      //fadeInTriggerというクラス名が
      var elemPos = $(this).offset().top - 50; //要素より、50px上の
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight) {
        $(this).addClass("fadeIn"); // 画面内に入ったらfadeInというクラス名を追記
      }
    });
  }

  /*===========================================================*/
  /*スクロールでpage-topを出現させる/
/*===========================================================*/

  function pageTopAnime() {
    var scroll = $(window).scrollTop(); //スクロールの値を取得する
    if (scroll >= 250) {
      //250pxスクロールすると
      $("#page-top").removeClass("downMove");
      $("#page-top").addClass("upMove");
    } else {
      if ($("#page-top").hasClass("upMove")) {
        $("#page-top").removeClass("upMove");
        $("#page-top").addClass("downMove");
      }
    }
  }

  /*===========================================================*/
  /*  /page-topをクリックした時の動き /
/*===========================================================*/
  $("#page-top").click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      777
    );
  });

  // 画面をロードをしたら動かしたい場合の記述

  $(window).on("load", function () {
    GlowAnimeControl();
    slideAnime();
    fadeAnime();
    pageTopAnime();
  });
  $(window).scroll(function () {
    GlowAnimeControl();
    slideAnime();
    fadeAnime();
    pageTopAnime();
  });
});

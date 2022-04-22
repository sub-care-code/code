const gulp = require("gulp");
// sass圧縮プラグイン
const sass = require("gulp-sass")(require("sass"));
// ベンダープレフィックスプラグイン
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
// 画像圧縮プラグイン
const imagemin = require("gulp-imagemin");
const imageminGifsicle = require("imagemin-gifsicle");
const imageminMozjpeg = require("imagemin-mozjpeg");
const imageminPngquant = require("imagemin-pngquant");
const imageminSvgo = require("imagemin-svgo");
//ファイルの更新の監視
const browserSync = require("browser-sync").create();
// 表示をわかりやすくする
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
//jsのコンパイル
const babel = require("gulp-babel");

// Localのテーマフォルダを取得
const userDir = require("os").homedir();
const themeDir = `${userDir}/Local Sites/miyoshi/app/public/wp-content/themes/refage`;

// ファイルの出力場所の設定

const srcBase = "../_static/src"; //phpのコピー先
const distBase = themeDir;

//ファイルの出力先 distディレクトリ
const distPath = {
  css: distBase + "/",
  php: distBase + "/",
  img: distBase + "/img/",
  js: distBase + "/js/",
};

//ファイル元 srcディレクトリ
const srcPath = {
  css: srcBase + "/css/**/*.scss",
  php: srcBase + "/**/*.php",
  img: srcBase + "/img/**/*",
  js: srcBase + "/js/*.js",
};

// phpコピー
function phpCopy() {
  return gulp
    .src(srcPath.php)
    .pipe(gulp.dest(distPath.php))
    .pipe(
      notify({
        message: "Copied PHP！",
        onLast: true,
      })
    );
}
//jsコピー
function jsCopy() {
  return gulp.src(srcPath.js).pipe(gulp.dest(distPath.js));
}

function jsBabel() {
  return gulp.src(srcPath.js).pipe(gulp.dest(distPath.js));
}
// sassコンパイル
function cssTranspile() {
  return gulp
    .src(srcPath.css)
    .pipe(
      plumber({
        errorHandler: notify.onError("Error: <%= error.message %>"),
      })
    )
    .pipe(sass())
    .pipe(postcss([autoprefixer()]))
    .pipe(gulp.dest(distPath.css))
    .pipe(
      notify({
        message: "Compiled Sass",
        onLast: true,
      })
    );
}

// 画像の圧縮
function imageCompress() {
  return gulp
    .src(srcPath.img)
    .pipe(
      imagemin(
        [
          imageminGifsicle({ optimizationLevel: 3 }),
          imageminMozjpeg({ quality: 80 }),
          imageminPngquant(),
          imageminSvgo({
            plugins: [
              {
                name: "removeViewBox",
                active: false,
              },
            ],
          }),
        ],
        { verbose: true }
      )
    )
    .pipe(gulp.dest(distPath.img))
    .pipe(
      notify({
        message: "Compressed Images",
        onLast: true,
      })
    );
}

// ブラウザのオートリロードを初期化する関数
function browserSyncInit() {
  browserSync.init({
    proxy: "http://miyoshi.local",
  });
}

// ブラウザのオートリロードを行う関数
function browserSyncReload(callback) {
  browserSync.reload();
  callback();
}

// ファイルの変更を監視、変更されたらブラウザのリロードする関数
function watchFiles() {
  gulp.watch(srcPath.php, gulp.series(phpCopy, browserSyncReload));
  gulp.watch(srcPath.css, gulp.series(cssTranspile, browserSyncReload));
  gulp.watch(srcPath.img, gulp.series(imageCompress, browserSyncReload));
  gulp.watch(srcPath.js, gulp.series(jsCopy, browserSyncReload));
}

// defaltタスクでは一連の変換・圧縮を行った後に、変更監視タスクに入るようにする
exports.default = gulp.series(
  phpCopy,
  jsCopy,
  cssTranspile,
  imageCompress,
  gulp.parallel(browserSyncInit, watchFiles)
);

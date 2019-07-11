  /**
   *  gulpfile.js
   *  Author                      : Victor Tihai
   *
   *  Available tasks:
   *   `gulp`
   *   `gulp watch`
   *   `gulp clean`
   *   `gulp styles`
   *   `gulp styles:v`
   *   `gulp copyjs`
   *   `gulp copyfonts`
   *   `gulp scripts`
   *
   *  Modules:
   *   gulp                       : The streaming build system.
   *   del                        : Delete files and folders.
   *   gulp-jshint                : JSHint plugin for Gulp.
   *   gulp-sass                  : Gulp plugin for sass.
   *   gulp-sourcemaps            : Source map support for Gulp.js.
   *   gulp-uglify                : Minify files with UglifyJS.
   *   gulp-autoprefixer          : Prefix CSS.
   *   gulp-cache                 : A temp file based caching proxy task for gulp.
   *   gulp-concat                : This will concat files by your operating systems newLine.
   *   gulp-clean-css             : Minify CSS, using clean-css
   *   gulp-notify                : Send messages to Mac Notification Center,
   *   gulp-rename                : Provides simple file renaming methods
   *   gulp-rigger                : Include any type of text file (css, js, hmtl)
   *   gulp-combine-mq            : Combine matching media queries into one media query definition
   *   gulp-plumber               : Briefly it replaces pipe method and removes standard onerror
                                    handler on error event, which unpipes streams on error by default.
   */

// include gulp and gulp plug-ins
var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    cache = require('gulp-cache'),
    //cmq = require('gulp-combine-mq'),
    concat = require('gulp-concat'),
    del = require('del'),
    jshint = require('gulp-jshint'),
    cleancss = require('gulp-clean-css'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename'),
    rigger = require('gulp-rigger'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    wpPot = require('gulp-wp-pot'),
    uglify = require('gulp-uglify');

var autoprefixerOptions = {
  browsers: ['last 2 version']
};


var paths = {
     home: './',
     assets_css: './assets/styles/',
     assets_js: './assets/javascripts/',
     assets_font: './assets/fonts/',
     src_css_fe: './src/sass/',
     src_js: './src/javascripts/',
     node_libs: ['./node_modules/foundation-sites/scss/', './node_modules/motion-ui/src'],
    };

var onError = function(err) {
         console.log(err);
    }

 // Vendors
gulp.task('styles:v', function() {
  return gulp.src([ paths.src_css_fe + 'vendors.scss'])
    .pipe(plumber({errorHandler: onError}))
    .pipe(sourcemaps.init())
    .pipe(sass({ includePaths : paths.node_libs, style: 'expanded', errLogToConsole: true }))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(gulp.dest(paths.assets_css))
    .pipe(rename({ suffix: '.min' }))
    .pipe(cleancss())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.assets_css))
    .pipe(notify({ message: 'Styles task complete: <%= file.relative %>!' }));
});

 // Main CSS
gulp.task('styles', function() {
  return gulp.src([paths.src_css_fe + 'style.scss'])
    .pipe(plumber({errorHandler: onError}))
    .pipe(sourcemaps.init())
    .pipe(sass({ includePaths : paths.node_libs, style: 'expanded', errLogToConsole: true }))
    .pipe(autoprefixer(autoprefixerOptions))
    //.pipe(cleancss())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.home))
    .pipe(notify({ message: 'Styles task complete: <%= file.relative %>!' }));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src( paths.src_js + '*.js')
    .pipe(rigger())
    .pipe(gulp.dest(paths.assets_js))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest(paths.assets_js))
    .pipe(notify({ message: 'Scripts task complete: <%= file.relative %>!' }));
});


gulp.task('copyfonts', function () {
    return gulp.src('./node_modules/font-awesome/fonts/*')
      .pipe(gulp.dest(paths.assets_font))
      .pipe(notify({ message: 'Copy Fonts: <%= file.relative %>!' }));
});

gulp.task('copyjs', function () {
    return gulp.src([
		'./node_modules/owl.carousel/dist/owl.carousel.min.js',
        './node_modules/owl.carousel/dist/owl.carousel.js',
		//'./node_modules/masonry-layout/dist/masonry.pkgd.min.js',
        //'./node_modules/masonry-layout/dist/masonry.pkgd.js',
      ])
      .pipe(gulp.dest(paths.assets_js))
      .pipe(notify({ message: 'Copy JavaScripts: <%= file.relative %>!' }));
});

// Pot
gulp.task('genpot', function () {
    return gulp.src('**/*.php')
        .pipe(wpPot( {
            domain: 'magazine-lites',
            package: 'Magazine Lites WordPress Theme'
        } ))
        .pipe(gulp.dest('languages/magazine-lites.pot'))
        .pipe(notify({ message: 'Generated -> Pot File!' }));
});

// Clean
gulp.task('clean', function(cb) {
    del([ paths.assets_font + '*', paths.assets_css + '*', paths.assets_js + '*', paths.home + 'style.+(css|css.map)'], {force: true}, cb)
});

// Default task
gulp.task('default', [ 'clean', 'styles:v', 'styles', 'scripts', 'copyfonts', 'copyjs', 'genpot'], function() {
    gulp.start('styles', 'scripts');
});


// Watch
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch([ paths.src_css_fe + '**/*.scss'], ['styles:v', 'styles']);
  // gulp.watch([ paths.src_css_fe + 'style.scss'], ['styles']);

  // Watch gulpfile files
  gulp.watch('gulpfile.js', ['styles', 'styles:v', 'scripts', 'copyfonts', 'copyjs', 'genpot']);

  // Watch .js files
  gulp.watch( paths.src_js + '*.js', ['scripts']);

});

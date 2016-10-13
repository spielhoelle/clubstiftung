var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var autoPrefixer = require('gulp-autoprefixer');
//if node version is lower than v.0.1.2
require('es6-promise').polyfill();
var cssComb = require('gulp-csscomb');
var cmq = require('gulp-merge-media-queries');
var cleanCss = require('gulp-clean-css');
var coffee = require('gulp-coffee');
var jshint = require('gulp-jshint');
var browserify = require('gulp-browserify');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var gutil = require('gulp-util');


var sassFiles = ['wp-content/themes/illdy/**/*.sass'];
var coffeeFiles = ['wp-content/themes/illdy/**/*.coffee'];
var htmlFiles = ['wp-content/themes/illdy/**/*.html'];
var imageFiles = ['images/src/**/*'];

var sassTarget = 'wp-content/themes/illdy/layout/css';
var coffeeTarget = 'wp-content/themes/illdy/layout/js';
var htmlTarget = './';

var domain = "dev.clubcommission.de";

gulp.task('sass',function(){
  gulp.src(sassFiles, {base: sassTarget})
    .pipe(plumber({
      handleError: function (err) {
        console.log(err);
        this.emit('end');
      }
    }))
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(cleanCss({processImport: false}))
    
    .pipe(autoPrefixer())
    // .pipe(cssComb())
    // .pipe(cmq({log:true}))
    // .pipe(concat('style.css'))
    // .pipe(gulp.dest(sassTarget))
    // .pipe(rename({
    //     suffix: '.min'
    // }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(sassTarget))
    // .pipe(reload({stream:true}))
    .pipe(notify('css task finished'))
});
gulp.task('coffee',function(){
  gulp.src(coffeeFiles)
   .pipe(plumber({
       handleError: function (err) {
           console.log(err);
           this.emit('end');
       }
   }))
   .pipe(sourcemaps.init())
   .pipe(coffee())
   .pipe(concat('scripts.js'))
   .pipe(jshint())
     .pipe(jshint.reporter('default'))
     .pipe(browserify())
   .pipe(gulp.dest(coffeeTarget))
   .pipe(rename({
       suffix: '.min'
   }))
   .pipe(uglify())
   .pipe(sourcemaps.write())
   .pipe(gulp.dest(coffeeTarget))
     .pipe(notify('js task finished'))
});
gulp.task('html',function(){
  gulp.src([htmlFiles])
    .pipe(plumber({
      handleError: function (err) {
        console.log(err);
        this.emit('end');
      }
    }))
    .pipe(gulp.dest(htmlTarget))
    // .pipe(reload())
    .pipe(notify('html task finished'))
});
gulp.task('default',function(){
  // browserSync.init({
  //     proxy: domain,
  //     browser: "google chrome",
  //     open: false, 
  //     snippetOptions: {
  //       rule: {
  //         match: /<\/head>/i,
  //         fn: function (snippet, match) {
  //           return snippet + match;
  //         }
  //       }
  //     }
  //     // notify: false
  // });
  gulp.watch(coffeeFiles,['coffee']);
  gulp.watch(sassFiles,['sass']);
  gulp.watch(htmlFiles,['html']);
  gulp.watch(imageFiles,['image']);
});

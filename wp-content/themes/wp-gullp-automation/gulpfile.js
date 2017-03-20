/**
 * Created by mike on 05.09.2016.
 */
var gulp = require('gulp'),
  concat = require('gulp-concat'), // Подключаем gulp-concat (для конкатенации файлов)
  compass = require('gulp-sass'), //Подключаем Sass пакет,
  autoprefixer = require('gulp-autoprefixer'),
  plumber = require('gulp-plumber'),
  concatCss = require('gulp-concat-css'),
  cleanCSS = require('gulp-clean-css'),
  rename = require('gulp-rename'),
  sourcemaps = require('gulp-sourcemaps'),
  uglify = require('gulp-uglifyjs'); // Подключаем gulp-uglifyjs (для сжатия JS);

//error notification settings for plumber
var errorHandler = function (err) {
  console.log(err);
  this.emit('end');
};

gulp.task('scripts', function () {
  return gulp.src('../ics/js/libs/*.js')
             .pipe(concat('libs.min.js')) // Собираем их в кучу в новом файле libs.min.js
             .pipe(uglify()) // Сжимаем JS файл
             .pipe(gulp.dest('../ics/js')); // Выгружаем в папку app/js
});

gulp.task('compass', function () {
  gulp.src('../ics/sass/*.scss')
      .pipe(sourcemaps.init())
      .pipe(plumber(errorHandler))
      .pipe(compass({
        outputStyle: 'compressed'
      }))
      .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      }))
      .pipe(sourcemaps.write('../css'))
      .pipe(gulp.dest('../ics/css'))
});

gulp.task('concat-styles', function () {
  gulp.src('../ics/css/libs/*.css')
      .pipe(concatCss('libs.min.css'))
      //.pipe(rename('libs.min.css'))
      //.pipe(autoprefixer('last 2 versions'))
      //.pipe(sourcemaps.write('../css'))
      .pipe(gulp.dest('../ics/css'))
});

// Compile js in the background.
gulp.task('scripts-watch', function () {
  gulp.watch('../ics/js/libs/*.js', ['scripts']);
});

// Compile scss in the background.
gulp.task('compass-watch', function () {
  gulp.watch('../ics/sass/*.scss', ['compass']);
});
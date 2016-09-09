'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var importer = require('node-sass-globbing');

/** Sass config **/
var sass_config = {
 importer: importer,
 includePaths: [
   'node_modules/compass-mixins/lib/',
   'node_modules/breakpoint-sass/stylesheets/',
   'node_modules/susy/sass/'
 ]
};

gulp.task('sass:prod', function () {
  gulp.src('./sass/*.scss')
    .pipe(sass(sass_config).on('error', sass.logError))
    .pipe(autoprefixer({
       browsers: ['last 2 version']
    }))
    .pipe(gulp.dest('./css'));
});

gulp.task('sass:dev', function () {
  gulp.src('./sass/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass(sass_config).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 version']
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./'));
});

gulp.task('sass:watch', function () {
  gulp.watch('./sass/**/*.scss', ['sass:dev']);
});

gulp.task('default', ['sass:dev', 'sass:watch']);

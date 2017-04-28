// GULP

var gulp = require('gulp');

// Gulp tasks

var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var imagemin = require('gulp-imagemin');

// COMPRESS IMAGES
gulp.task('compress-images', function(){
	return gulp.src('app/pre-images/**/*')
		.pipe(imagemin())
		.pipe(gulp.dest('html/images/'));
});

// STYLES
gulp.task('styles', function(){
  return gulp.src('app/sass/**/*.scss')
  	.pipe(plumber())
    .pipe(sass()) // Using gulp-sass
    .pipe(gulp.dest('app/pre-css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('html/css'));
});

// WATCH
gulp.task('watch', function(){
  gulp.watch('app/sass/**/*.scss', ['styles']); 
});

//UGLIFY MAIN.JS
gulp.task('uglify', function(){
	gulp.src('app/js/*')
		.pipe(uglify())
		.pipe(gulp.dest('html/js/'));
});




gulp.task('default',[ 'styles', 'uglify', 'watch' ]);
var gulp        = require('gulp'),
	sass        = require('gulp-sass'),
	browserSync = require('browser-sync'),
	concat		= require('gulp-concat'),
	minifyCSS   = require('gulp-minify-css'),
	concatCss	= require('gulp-concat-css'),
	uglify		= require('gulp-uglifyjs'),
	cssnano		= require('gulp-cssnano'),
	clean 		= require('gulp-clean'),
	rename		= require('gulp-rename'),
	del			= require('del'),
	imagemin	= require('gulp-imagemin'),
	pngquant	= require('imagemin-pngquant'),
	cache		= require('gulp-cache'),
	autoprefixer= require('gulp-autoprefixer');

gulp.task('clean', ['sass'], function() {
  return gulp.src(['app/production/css', 'app/production/js', 
  	'app/production/images'], {read: false})
    .pipe(clean());
});

gulp.task('styles', ['clean'], function() {
    return gulp.src([ 
    	'app/css/foundation.css',
    	'app/css/normalize.css',
    	'app/css/front.css'])
    	.pipe(concat('todo.min.css'))
        .pipe(minifyCSS({
            keepBreaks: true
        }))
        .pipe(gulp.dest('app/production/css'));
});

gulp.task('sass', function(){
	return	gulp.src('app/sass/**/*.scss')
		.pipe(sass())
		.pipe(autoprefixer(['last 15 versions', '>1%', 'ie 8', 'ie 7'], { cascade: true }))
		.pipe(gulp.dest('app/css'))
		.pipe(browserSync.reload({stream: true}));
});

gulp.task('browser-sync', ['styles'], function() {

	return browserSync({
		server: {
					baseDir: 'app'
				},
		notify: false
	});
});

gulp.task('sass:watch', ['browser-sync'], function(){

	gulp.watch('app/sass/**/*.scss', ['styles', browserSync.reload]);
	gulp.watch('app/*.html', browserSync.reload);
	gulp.watch('app/js/**/*.js', browserSync.reload);
});

gulp.task('default', function(){
	gulp.start('sass','sass:watch');
});




var gulp 			= require('gulp'),
    plumber 		= require('gulp-plumber'),
    sass 			= require('gulp-ruby-sass'),
    autoprefixer 	= require('gulp-autoprefixer'),
    minifycss 		= require('gulp-minify-css'),
    newer 			= require('gulp-newer'),
    imagemin 		= require('gulp-imagemin'),
    concat 			= require('gulp-concat'),
    git 			= require('gulp-git'),
    livereload 		= require('gulp-livereload');

var imgSrc = 'images/originals/*',
	imgDest = 'images';

gulp.task('public-styles', function(){
  	return sass('scss/style.scss')
	    .on('error', function (err) {
	      	console.error('Error!', err.message);
	    })
	   	.pipe(minifycss())
	   	.pipe(gulp.dest('css'))
	   	.pipe(livereload())
});

gulp.task('default', ['public-styles', 'authorized-styles', 'images']);

gulp.task('watch', function() {

	livereload.listen({start:true});
    gulp.watch('scss/**/*', ['public-styles']);

});

gulp.task('init', function(){
  	git.init();
});

gulp.task('commit', function(){
  	return gulp.src('./*')
  	.pipe(git.add())
  	.pipe(git.commit('initial commit'));
});
gulp.task('setup',['public-styles','init','commit']);
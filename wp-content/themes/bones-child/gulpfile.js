var gulp = require('gulp');
var sass = require('gulp-sass');
// var jshint = require('gulp-jshint');
// var concat = require('gulp-concat');
// var uglify = require('gulp-uglify');
// var rename = require('gulp-rename');
// var minifyCSS = require('gulp-minify-css');

gulp.task('sass', function () {
    gulp.src('./library/sass/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('./library/css'));
});

// gulp.task('minify-css', function(){
// 	return gulp.src('src/css/*.css')
// 	.pipe(minifyCSS({keepBreaks:false}))
// 	.pipe(rename('styles.min.css'))
// 	.pipe(gulp.dest('dist/css'));
// });
// 
// gulp.task('lint', function() {
// 	return gulp.src('./src/js/*.js')
// 		.pipe(jshint())
// 		.pipe(jshint.reporter('default'));
// });
// 
// gulp.task('scripts', function() {
// 	return gulp.src('./src/js/*.js')
// 	.pipe(concat('all.js'))
// 	.pipe(uglify())
// 	.pipe(gulp.dest('./dist/js'));
// });


// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('./library/sass/style.scss', ['sass']);
});

// Default Task
gulp.task('default', ['sass','watch']);
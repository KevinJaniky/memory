var gulp = require('gulp');
var $ = require('gulp-load-plugins')();

var path = {
    css : 'assets/css',
};

/*
 * Compile Sass files
 */
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');

gulp.task('sass', function(){
    return gulp.src(path.css+'/**/*.scss')
        .pipe($.sass({
            style: 'compressed',
        }).on('error', $.notify.onError(function (error) {
            return "Problem file : " + error.message;
        })))
        .pipe($.autoprefixer())
        .pipe(gulp.dest(path.css))
        .pipe($.notify("Sass Task finished !"));
});


gulp.task('minified', function(done) {
    gulp.src([path.css + "/*.css", "!" + path.css + "/*.min.css"])
        .pipe(minifyCss({
            keepSpecialComments: 0
        }))
        .pipe(rename({ extname: '.min.css' }))
        .pipe(gulp.dest(path.css))
        .on('end', done);
});

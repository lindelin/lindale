var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('sass', function(){
    gulp.src('./resources/assets/sass/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write('./maps/'))
        .pipe(gulp.dest('./public/css/'));
});

gulp.task('sass-watch', ['sass'], function(){
    var watcher = gulp.watch('./resources/assets/sass/**/*.scss', ['sass']);
    watcher.on('change', function(event) {
    });
});

gulp.task('default', ['sass-watch']);
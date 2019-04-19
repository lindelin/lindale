var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

// SassとCssの保存先を指定
gulp.task('sass', function(){
    gulp.src('./resources/assets/sass/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write('./maps/'))
        .pipe(gulp.dest('./public/css/'));
});

//自動監視のタスクを作成(sass-watchと名付ける)
gulp.task('sass-watch', ['sass'], function(){
    var watcher = gulp.watch('./resources/assets/sass/**/*.scss', ['sass']);
    watcher.on('change', function(event) {
    });
});

// タスク"task-watch"がgulpと入力しただけでdefaultで実行されるようになる
gulp.task('default', ['sass-watch']);
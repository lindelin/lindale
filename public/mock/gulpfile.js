'use strict'

var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var del = require('del');
var runSequence = require('run-sequence');
var replace = require('gulp-replace');
var injectPartials = require('gulp-inject-partials');
var inject = require('gulp-inject');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var merge = require('merge-stream');

gulp.paths = {
    dist: 'dist',
};

var paths = gulp.paths;



/*sequence for building vendor scripts and styles*/
gulp.task('bundleVendors', function () {
    runSequence('copyRecursiveVendorFiles', 'buildBaseVendorStyles', 'buildBaseVendorScripts', 'buildOptionalVendorScripts');
});

/* Copy whole folder of some specific node modules that are calling other files internally */
gulp.task('copyRecursiveVendorFiles', function () {
    var mdi = gulp.src(['./node_modules/mdi/**/*'])
        .pipe(gulp.dest('./vendors/iconfonts/mdi'));
    var fontawesome = gulp.src(['./node_modules/font-awesome/**/*'])
        .pipe(gulp.dest('./vendors/iconfonts/font-awesome'));
    return merge(
        mdi,
        fontawesome
    );
});

/*Building vendor scripts needed for basic template rendering*/
gulp.task('buildBaseVendorScripts', function () {
    return gulp.src([
            './node_modules/jquery/dist/jquery.min.js',
            './node_modules/popper.js/dist/umd/popper.min.js',
            './node_modules/bootstrap/dist/js/bootstrap.min.js'
        ])
        .pipe(concat('vendor.bundle.base.js'))
        .pipe(gulp.dest('./vendors/js'));
});

/*Building vendor styles needed for basic template rendering*/
gulp.task('buildBaseVendorStyles', function () {
    return gulp.src(['./node_modules/perfect-scrollbar/css/perfect-scrollbar.css'])
        .pipe(concat('vendor.bundle.base.css'))
        .pipe(gulp.dest('./vendors/css'));
});

/*Building optional vendor scripts for addons*/
gulp.task('buildOptionalVendorScripts', function () {
    return gulp.src([
            'node_modules/chart.js/dist/Chart.min.js'
        ])
        .pipe(concat('vendor.bundle.addons.js'))
        .pipe(gulp.dest('./vendors/js'));
});
gulp.task('default', ['serve']);
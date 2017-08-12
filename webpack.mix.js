let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// アイコン
mix.copy(
    'node_modules/font-awesome/fonts',
    'public/fonts'
).copy(
    'node_modules/font-awesome/css/font-awesome.min.css',
    'resources/assets/css/font-awesome.css'
);

//　bootstrap：selectプラグイン
mix.copy(
    'node_modules/bootstrap-select/dist/css/bootstrap-select.min.css',
    'resources/assets/css/bootstrap-select.css'
).copy(
    'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
    'resources/assets/js/bootstrap-select.js'
);

// bootstrap：Markdownプラグイン
mix.copy(
    'node_modules/bootstrap-markdown/css/bootstrap-markdown.min.css',
    'resources/assets/css/bootstrap-markdown.css'
).copy(
    'node_modules/bootstrap-markdown/js/bootstrap-markdown.js',
    'resources/assets/js/bootstrap-markdown.js'
);

// Markdownプラグイン
mix.copy(
    'node_modules/marked/lib/marked.js',
    'resources/assets/js/marked.js'
);

// bootstrap：カレンダープラグイン
mix.copy(
    'node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
    'resources/assets/css/bootstrap-datetimepicker.css'
).copy(
    'node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
    'resources/assets/js/bootstrap-datetimepicker.js'
);

// カレンダープラグイン
mix.copy(
    'node_modules/moment/min/moment.min.js',
    'resources/assets/js/moment.js'
).copy(
    'node_modules/moment/min/locales.min.js',
    'resources/assets/js/locales.js'
);

// jquery
mix.copy(
    'node_modules/jquery/dist/jquery.min.js',
    'resources/assets/js/jquery.js'
);

// App.js
mix.js('resources/assets/js/app.js', 'public/js');

// Scss
mix.sass('resources/assets/sass/app.scss', '../resources/assets/css/lib.css');

// Main CSS
mix.styles([
    'resources/assets/css/lib.css',
    'resources/assets/css/main.css',
    'resources/assets/css/callouts.css',
    'resources/assets/css/pageloader.css',
    'resources/assets/css/font-awesome.css',
    'resources/assets/css/bootstrap-select.css',
    'resources/assets/css/bootstrap-off-canvas-nav.css',
    'resources/assets/css/bootstrap-datetimepicker.css',
    'resources/assets/css/bootstrap-markdown.css',
    'resources/assets/css/colors.css'
], 'public/css/main.css');

// lib.js
mix.scripts([
    'resources/assets/js/marked.js',
    'resources/assets/js/moment.js',
    'resources/assets/js/locales.js',
    'resources/assets/js/jquery.js'
], 'public/js/lib.js');


// Welcome CSS
mix.styles([
    'resources/assets/css/welcome.css',
    'resources/assets/css/normalize.css',
], 'public/css/welcome.css');
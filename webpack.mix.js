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
    'resources/assets/css/bootstrap-off-canvas-nav.css',
    'resources/assets/css/clock.css'
], 'public/css/main.css');
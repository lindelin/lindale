const mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js');
mix.sass('resources/assets/sass/style.scss', 'public/css', { implementation: require('node-sass') }).options({
    processCssUrls: false
}).version();

// Welcome CSS
mix.styles([
    'resources/assets/css/welcome.css',
    'resources/assets/css/normalize.css',
], 'public/css/welcome.css');

mix.browserSync({
    host: 'lindale.test',
    proxy: {
        target: "http://lindale.test",
        ws: true
    },
    browser: "google chrome",
    reloadOnRestart: true
});
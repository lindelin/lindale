const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    // scss
    mix.sass(
        'app.scss',
        'resources/assets/css/lib.css'
    );

    // App.js
    mix.webpack('app.js');

    // Main CSS
    mix.styles([
        'lib.css',
        'main.css',
        'callouts.css',
        'bootstrap-off-canvas-nav.css'
    ], 'public/css/main.css');

    // Page Loader
    mix.styles([
        'pageloader.css'
    ], 'public/css/pageloader.css')
        .scripts([
            'pageloader.js'
        ], 'public/js/pageloader.js');


});


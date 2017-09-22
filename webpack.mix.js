const { mix } = require('laravel-mix');

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

mix.js([
        'resources/assets/js/app.js',
    ], 'public/js')
    .js([
        'node_modules/sweetalert2/dist/sweetalert2.js',
    ], 'public/js/sweetalert2.min.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/css/sweetalert2.css');

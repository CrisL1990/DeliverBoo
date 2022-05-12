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

mix.js('resources/js/app.js', 'public/js')
.js('resources/js/front.js', 'public/js')
.js('resources/js/register.js', 'public/js')
.js('resources/js/admin/edit.js', 'public/js/admin')
.js('resources/js/admin/create.js', 'public/js/admin')
.sass('resources/sass/app.scss', 'public/css');

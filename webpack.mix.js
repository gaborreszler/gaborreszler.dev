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

mix.less('resources/less/introduction.less', 'public/assets/css');
mix.copyDirectory('resources/img', 'public/assets/img');
mix.version(['public/assets/img/gabor-reszler.png']);

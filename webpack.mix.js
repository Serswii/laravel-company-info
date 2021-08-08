const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.styles([
    'resources/css/bootstrap.min.css',
], 'public/css/bootstrap.min.css');
mix.styles([
    'resources/css/style.css',
], 'public/css/style.css');

mix.js([
    'resources/js/bootstrap.min.js',
], 'public/js/bootstrap.min.js')

mix.js([
    'resources/js/jquery-3.0.0.min.js',
], 'public/js/jquery-3.0.0.min.js')


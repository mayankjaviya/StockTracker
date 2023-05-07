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

mix.js(['resources/js/app.js',
], 'public/js');

mix.js(
    'node_modules/select2/dist/js/select2.min.js','public/js/third-party.js'
);
mix.styles('node_modules/select2/dist/css/select2.min.css', 'public/css/third-party.css')

mix.js('resources/assets/js/custom.js', 'public/assets/js/custom.js')
    .js('resources/assets/js/share_update/share_update.js', 'public/assets/js/share_update.js')
    .js('resources/assets/js/shares/shares.js', 'public/assets/js/shares.js');

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/assets/css/share_update.scss', 'public/assets/css/share_update.css');

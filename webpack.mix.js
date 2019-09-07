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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.styles(
    [
        'public/css/app.css',
        'public/css/style.css',
        'public/css/responsive.css'
    ],
    'public/css/styles.css'
)

mix.scripts(
    [
        'public/js/app.js',
        'public/js/carousel.js',
        'public/js/chatajax.js',
        'public/js/main.js',
        'public/js/util.js'
    ],
    'public/js/main-build.js'
)

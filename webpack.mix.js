const mix = require('laravel-mix');
require('mix-tailwindcss');

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

mix.js('assets/src/app.js', 'assets/build');
mix.css('assets/src/app.css', 'assets/build', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .tailwind('./tailwind.config.js');

if (mix.inProduction()) {
    mix.version();
}


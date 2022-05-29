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

mix.js('resources/assets/src/app.js', 'resources/assets/build');
mix.css('resources/assets/src/app.css', 'resources/assets/build', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .tailwind('./tailwind.config.js');

if (mix.inProduction()) {
    mix.version();
}


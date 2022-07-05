const mix = require('laravel-mix');

mix.browserSync('http://127.0.0.1:8000');

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

mix
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css',
    [
        require('autoprefixer'),
        require('tailwindcss'),
        require('postcss-import'),
        require('postcss-nested')

    ])
    .webpackConfig({
        stats: {
            children: true,
        },
    });

if (mix.inProduction()) {
    
      mix.version();
  }

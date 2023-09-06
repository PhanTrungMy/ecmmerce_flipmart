const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .postCss('resources/css/style.css', 'public/css')
    .postCss('resources/css/color_theme.css', 'public/css')
    .postCss('resources/css/skin_color.css', 'public/css')
    .postCss('resources/css/style_rtl.css', 'public/css')

if (mix.inProduction()) {
    mix.version();
}
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .postCss('resources/css/style.css', 'public/backend/css')   
    .postCss('resources/css/style.css', 'public/backend/css')    
    .postCss('resources/css/style.css', 'public/backend/css')

if (mix.inProduction()) {
    mix.version();
}

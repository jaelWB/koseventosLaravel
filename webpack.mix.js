const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .js("node_modules/popper.js/dist/popper.js", "public/js")
    .sourceMaps();

//npm install para crear todas las dependencias

//Usar npm run dev para compilar los CSS y JS

//npm run watch para poder usar broserSync
mix.browserSync("http://127.0.0.1:8000");

//Limpie la caché cada vez que se pone en producción
if (mix.inProduction()) {
    mix.version();
}

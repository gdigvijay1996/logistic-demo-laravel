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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/new_user_datatable.js', 'public/js/all.js');
mix.sass('resources/sass/new_user_datatable.scss', 'public/css/all.css');

// using this combine all js in one public/js folder
// EXAMPLE
// mix.combine(
//     [
//         "resources/assets/vendor/dataTables/datatables.min.js",
//         "resources/assets/vendor/jqueryui/jquery-ui.min.js",
//     ],
//     "public/js/vendor.js"
// );

// using this combine all css in one public/css folder
// EXAMPLE
// mix.combine(
//     [
//         "resources/assets/vendor/animate/animate.css",
//         "resources/assets/vendor/dataTables/datatables.min.css",
//     ],
//     "public/css/vendor.css"
// ).options({
//     processCssUrls: false
// });

// copy resources font folder into pblic font folder
// EXAMPLE
// mix.copy("resources/assets/fonts/", "public/fonts");

// copy resources images folder into pblic images folder
// EXAMPLE
// mix.copy("resources/assets/images", "public/images");

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
    // .js('resources/bower_components', 'public/js')
    // Required Jquery
    // .js('resources/js/bower_components/jquery/js/jquery.min.js', 'public/js/app.js')
    // .js('resources/js/bower_components/jquery-ui/js/jquery-ui.min.js', 'public/js/app.js')
    // .js('resources/js/bower_components/popper.js/js/popper.min.js', 'public/js/app.js')
    // .js('resources/js/bower_components/bootstrap/js/bootstrap.min.js', 'public/js/app.js')
    // jquery slimscroll js
    // .js('resources/js/bower_components/jquery-slimscroll/js/jquery.slimscroll.js', 'public/js/app.js')
    // modernizr js
    // .js('resources/js/bower_components/modernizr/js/modernizr.js', 'public/js/app.js')
    // .js('resources/js/bower_components/modernizr/js/css-scrollbars.js', 'public/js/app.js')
    // i18next.min.js
    // .js('resources/js/bower_components/i18next/js/i18next.min.js', 'public/js/app.js')
    // .js('resources/js/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js', 'public/js/app.js')
    // .js('resources/js/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js', 'public/js/app.js')
    // .js('resources/js/bower_components/jquery-i18next/js/jquery-i18next.min.js', 'public/js/app.js')
    // .js('files/assets\js\common-pages.js"></script>

    // .js('resources/js/js/jquery.mCustomScrollbar.concat.min.js', 'public/js')
    // .js('resources/js/js/jquery.mousewheel.min.js', 'public/js')
    // .js('resources/js/js/jquery.quicksearch.js', 'public/js')
    .vue()
    // .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css')
    
    // .postCss('resources/css/assets/css/font-awesome.min.css', 'public/css')
    // .postCss('resources/css/assets/css/jquery.mCustomScrollbar.csss', 'public/css')
    // .postCss('resources/css/assets/css/linearicons.css')
    // .postCss('resources/css/assets/css/pcoded-horizontal.min.css', 'public/css')
    // .postCss('resources/css/assets/css/style.css', 'public/css')
    ;


    /* @import url(/resources/css/assets/css/font-awesome.min.css); */
/* @import url(/resources/css/assets/css/jquery.mCustomScrollbar.css); */
/* @import url(/resources/css/assets/css/linearicons.css); */
/* @import url(/resources/css/assets/css/pcoded-horizontal.min.css); */
/* @import url(/resources/css/assets/css/style.css); */

let mix = require('laravel-mix');

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

const aBackendScript = [
    'resources/assets/vendor/js/bootstrap/popper.min.js',
    'resources/assets/vendor/js/bootstrap/moment.js',
    'resources/assets/vendor/js/bootstrap/js/bootstrap.min.js',
    'resources/assets/vendor/js/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js',
    'resources/assets/vendor/js/MDL/material.min.js',
    'resources/assets/vendor/js/getmdl-select-master/getmdl-select.min.js',
    'resources/assets/vendor/js/semantic/semantic.min.js',
    'resources/assets/vendor/js/CreativeGooeyEffects/js/TweenMax.min.js',
    'resources/assets/vendor/js/CreativeGooeyEffects/js/select.js',
    'resources/assets/vendor/js/GoogleNexusWebsiteMenu/js/gnmenu.js',
    'resources/assets/vendor/js/GoogleNexusWebsiteMenu/js/classie.js',
];

const aFrontendScript = [
    'resources/assets/vendor/js/bootstrap/popper.min.js',
    'resources/assets/vendor/js/bootstrap/js/bootstrap.min.js',
    'resources/assets/vendor/js/MDL/material.min.js',
    'resources/assets/vendor/js/getmdl-select-master/getmdl-select.min.js',
    'resources/assets/vendor/js/semantic/semantic.min.js',
    'resources/assets/vendor/js/GoogleNexusWebsiteMenu/js/gnmenu.js',
    'resources/assets/vendor/js/GoogleNexusWebsiteMenu/js/classie.js',
    'resources/assets/vendor/js/CreativeGooeyEffects/js/TweenMax.min.js',
    'resources/assets/vendor/js/CreativeGooeyEffects/js/pagination.js',
    'resources/assets/vendor/js/CreativeGooeyEffects/js/select.js',
    'resources/assets/vendor/js/custom/js/demo.js',
    'resources/assets/vendor/js/custom/js/anime.min.js',
    'resources/assets/vendor/js/custom/js/imagesloaded.pkgd.min.js',
    'resources/assets/vendor/js/custom/js/easings.js',
    'resources/assets/vendor/js/custom/js/shape_overlay.js',
    'resources/assets/vendor/js/jquery/jquery-ui.js',
    'resources/assets/vendor/js/rateYo-master/min/jquery.rateyo.min.js'
];

mix
    .js(aBackendScript, 'public/js/backend.js')
    .js(aFrontendScript, 'public/js/frontend.js')
    .version();

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

    mix.styles([
        'resources/uom/students/css/custom.css',
        'resources/uom/students/css/main.css',
        'resources/uom/students/css/util.css',

        'resources/uom/students/vendor/animate/animate.css',
        'resources/uom/students/vendor/animsition/css/animsition.min.css',
        'resources/uom/students/vendor/css-hamburgers/hamburgers.css',
        'resources/uom/students/vendor/css-hamburgers/hamburgers.min.css',
        'resources/uom/students/vendor/select2/select2.min.css',
        'resources/uom/students/vendor/select2/select2.min.css',
        'resources/uom/students/vendor/daterangepicker/daterangepicker.css',


    ], 'public/uom/css/std-login.css');

    mix.scripts([
        'resources/uom/students/vendor/animsition/js/animsition.js',
        'resources/uom/students/vendor/animsition/js/animsition.min.js',

        'resources/uom/students/vendor/jquery/jquery-3.2.1.min.js',
        'resources/uom/students/vendor/animsition/js/animsition.min.js',
        'resources/uom/students/vendor/bootstrap/js/popper.js',
        'resources/uom/students/vendor/bootstrap/js/bootstrap.min.js',
        'resources/uom/students/vendor/select2/select2.min.js',
        'resources/uom/students/vendor/daterangepicker/moment.min.js',
        'resources/uom/students/vendor/daterangepicker/daterangepicker.js',
        'resources/uom/students/vendor/countdowntime/countdowntime.js',
        'resources/uom/students/js/main.js',

    ], 'public/uom/js/std-login.js');

    mix.copyDirectory('resources/assets/fonts', 'public/fonts');


    mix.styles([
        'resources/uom/teachers/css/bootstrap.min.css',
        'resources/uom/teachers/css/sb-admin.css',
        'resources/uom/teachers/font-awesome/css/font-awesome.min.css',
    ], 'public/uom/css/teach-home.css');

    mix.scripts([
        'resources/uom/teachers/js/jquery.js',
        'resources/uom/teachers/js/bootstrap.min.css',
    ], 'public/uom/js/teach-home.js');

    mix.copyDirectory('resources/assets/fonts', 'public/fonts');


    mix.styles([
        'resources/uom/students/css/home/main_styles.css',
        'resources/uom/students/css/home/responsive.css',
    ], 'public/uom/css/std-home.css');

    mix.scripts([
        'resources/uom/students/js/home/custom.js',

    ], 'public/uom/js/std-home.js');

    mix.styles([
        'resources/uom/teachers/css/profile/style.css',
        'resources/uom/teachers/css/profile/opensans-font.css',
        'resources/uom/teachers/css/profile/material-design-iconic-font.min.css',



    ], 'public/uom/css/teach-profile.css');

    mix.scripts([
        'resources/uom/teachers/js/profile/jquery-3.3.1.min.js',
        'resources/uom/teachers/js/profile/jquery.steps.js',
        'resources/uom/teachers/js/profile/main.js',


    ], 'public/uom/js/teach-profile.js');

    mix.styles([
        'resources/uom/admin/css/OverlayScrollbars.min.css',
        'resources/uom/admin/css/adminlte.min.css',
    ], 'public/uom/css/admin-home.css');

    mix.scripts([
        'resources/uom/admin/js/jquery.min.js',
        'resources/uom/admin/js/bootstrap.bundle.min.js',
        'resources/uom/admin/js/adminlte.js',

    ], 'public/uom/js/admin-home.js');


const {mix} = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | files for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix
    .styles([
            'resources/assets/css/modern-business.css',
            'node_modules/date-picker-th/css/bootstrap-datepicker.min.css',

        ]
        , 'public/css/all.css');

mix
    .scripts([
            'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
            'node_modules/sweetalert2/dist/sweetalert2.min.js'
        ]
        , 'public/js/all.js');

mix
    .scripts([
            'node_modules/date-picker-th/js/bootstrap-datepicker-custom.js',
            'node_modules/date-picker-th/locales/bootstrap-datepicker.th.min.js',

        ]
        , 'public/js/date-picker-th.js');


// .copy('node_modules/semantic-ui/dist/semantic.js', 'public/js/semantic.js')
// .copy('node_modules/semantic-ui/dist/semantic.css', 'public/css/semantic.css');

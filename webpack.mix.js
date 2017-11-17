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

mix

	.scripts([
            'resources/assets/js/main.js',
            'resources/assets/js/jquery-ui.min.js',
            'resources/assets/js/select2.min.js',
            'resources/assets/js/transaccion.js',
            /* datatables */


        ], 'public/js/appClient.js', './')

	 .styles([

            'resources/assets/css/select2.min.css',
            'resources/assets/css/jquery-ui.css',
            'resources/assets/css/datatables/buttons.dataTables.min.css',
        ], 'public/styles/appClient.css', './')

   .sass('resources/assets/sass/app.scss', 'public/css');

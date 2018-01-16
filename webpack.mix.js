const { mix } = require('laravel-mix');
var webpack = require('webpack');
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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
   //.sass('node_modules/bootstrap-sass/assets/stylesheets/_bootstrap.scss','public/css/bootstrap.css');

mix.styles([
    'resources/assets/css/metisMenu.min.css',
    'resources/assets/css/sb-admin-2.min.css',
    'resources/assets/css/morris.css',
    'resources/assets/css/font-awesome.min.css',
    'node_modules/sweetalert/dist/sweetalert.css'
],'public/css/panel.css');

mix.scripts([
    'resources/assets/js/angular.min.js',
    'resources/assets/js/angular-animate.min.js',
    'resources/assets/js/angular-messages.min.js',
    'resources/assets/js/metisMenu.min.js',
    'resources/assets/js/sb-admin-2.min.js',
    'node_modules/sweetalert/dist/sweetalert.min.js'
],'public/js/panel-layout.js');


module.exports = {
    plugins:[
        new webpack.ProvidePlugin({
            'window.$': 'jquery',
            'window.jQuery': 'jquery'
        })
    ]
}


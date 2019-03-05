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
mix.copy('resources/vendor/DataTables/images','public/img');
mix.copy('resources/vendor/DataTables/css/DT_bootstrap.css','public/css/DT_bootstrap.css');
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"],
    moment: 'moment',
    DataTable : 'datatables.net-bs'

});


mix.options({
    // extractVueStyles: false,
    processCssUrls: false
    // postCss: [require('autoprefixer')],
});
mix.webpackConfig({
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.min.js',
            'jquery-ui': 'jquery-ui-dist/jquery-ui.js',
        }
    }
});
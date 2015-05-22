var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('custom.less')
        .copy('resources/assets/plugins/bootstrap', 'public/plugins/bootstrap')
        .copy('resources/assets/css/style.css', 'public/css/style.css')
        .copy('resources/assets/css/ie8.css', 'public/css/ie8.css')
        .copy('resources/assets/css/blocks.css', 'public/css/blocks.css')
        .copy('resources/assets/css/plugins.css', 'public/css/plugins.css')
        .copy('resources/assets/css/app.css', 'public/css/app.css')
        .copy('resources/assets/css/headers/header-default.css', 'public/css/headers/header-default.css')
        .copy('resources/assets/css/footers/footer-v1.css', 'public/css/footers/footer-v1.css')
        .copy('resources/assets/css/pages/page_404_error.css', 'public/css/pages/page_404_error.css')
        .copy('resources/assets/css/pages/page_search_inner.css', 'public/css/pages/page_search_inner.css')
        .copy('resources/assets/plugins/animate.css', 'public/plugins/animate.css')
        .copy('resources/assets/plugins/line-icons', 'public/plugins/line-icons')
        .copy('resources/assets/plugins/font-awesome', 'public/plugins/font-awesome')
              
        .copy('resources/assets/plugins/jquery', 'public/plugins/jquery')
        .copy('resources/assets/plugins/back-to-top.js', 'public/plugins/back-to-top.js')
        .copy('resources/assets/plugins/smoothScroll.js', 'public/plugins/smoothScroll.js')
        .copy('resources/assets/js/custom.js', 'public/js/custom.js')
        .copy('resources/assets/js/app.js', 'public/js/app.js')
        .copy('resources/assets/plugins/respond.js', 'public/js/plugins/respond.js')
        .copy('resources/assets/plugins/html5shiv.js', 'public/js/plugins/html5shiv.js')
        .copy('resources/assets/plugins/placeholder-IE-fixes.js', 'public/js/plugins/placeholder-IE-fixes.js')
        .copy('resources/assets/plugins/backstretch', 'public/plugins/backstretch')
        .copy('resources/assets/plugins/revolution-slider', 'public/plugins/revolution-slider')
        .copy('resources/assets/js/plugins/revolution-slider.js', 'public/js/plugins/revolution-slider.js')
        .copy('resources/assets/js/plugins/owl-carousel.js', 'public/js/plugins/owl-carousel.js')
        .copy('resources/assets/plugins/owl-carousel', 'public/plugins/owl-carousel')
        .copy('resources/assets/plugins/sky-forms-pro', 'public/plugins/sky-forms-pro')
        .copy('resources/assets/js/plugins/owl-news-products.js', 'public/js/plugins/owl-news-products.js')
        .copy('resources/assets/plugins/fancybox/source', 'public/plugins/fancybox/source')
        .copy('resources/assets/js/plugins/fancy-box.js', 'public/js/plugins/fancy-box.js')
        .copy('resources/assets/plugins/master-slider/quick-start/masterslider', 'public/plugins/masterslider')
        .copy('resources/assets/js/plugins/master-slider.js', 'public/js/plugins/master-slider.js')

        // AdminLTE
        .copy('resources/assets/bower/adminlte/dist', 'public/adminlte/')
        .copy('resources/assets/bower/adminlte/plugins/jQuery', 'public/adminlte/plugins/jQuery')
        .copy('resources/assets/bower/adminlte/plugins/slimScroll', 'public/adminlte/plugins/slimScroll')
        .copy('resources/assets/bower/adminlte/plugins/fastclick', 'public/adminlte/plugins/fastclick')
        .copy('resources/assets/bower/adminlte/plugins/datatables', 'public/adminlte/plugins/datatables')
        .copy('resources/assets/bower/adminlte/plugins/iCheck', 'public/adminlte/plugins/iCheck')

        // CKEDITOR
        .copy('resources/assets/bower/ckeditor/config.js', 'public/plugins/ckeditor/config.js')
        .copy('resources/assets/bower/ckeditor/ckeditor.js', 'public/plugins/ckeditor/ckeditor.js')
        .copy('resources/assets/bower/ckeditor/styles.js', 'public/plugins/ckeditor/styles.js')
        .copy('resources/assets/bower/ckeditor/contents.css', 'public/plugins/ckeditor/contents.css')
        .copy('resources/assets/bower/ckeditor/adapters', 'public/plugins/ckeditor/adapters')
        .copy('resources/assets/bower/ckeditor/lang', 'public/plugins/ckeditor/lang')
        .copy('resources/assets/bower/ckeditor/plugins', 'public/plugins/ckeditor/plugins')
        .copy('resources/assets/bower/ckeditor/skins', 'public/plugins/ckeditor/skins');
});


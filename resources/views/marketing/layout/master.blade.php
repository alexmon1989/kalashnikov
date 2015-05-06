<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="ru"> <!--<![endif]-->
<head>
    <base href="{{ url() . '/' }}">
    <title>@yield('page_title', 'Главная') - ИП Калашников</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="{{ asset('css/headers/header-default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footers/footer-v1.css') }}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{ asset('css/pages/page_404_error.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/line-icons/line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sky-forms-pro/skyforms/css/sky-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution-slider/rs-plugin/css/settings.css') }}" type="text/css" media="screen">
    <!--[if lt IE 9]><link rel="stylesheet" href="{{ asset('plugins/revolution-slider/rs-plugin/css/settings-ie8.css') }}" type="text/css" media="screen"><![endif]-->

    @yield('styles')

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>

<div class="wrapper">
    @include('marketing.layout.header')

    @yield('top_content')
</div>

<!--=== Content ===-->
<div class="wrapper container content height-500">

    @yield('content', 'Информация отсутствует.')

</div>
<!--=== End Content ===-->

<div class="wrapper">
    @include('marketing.layout.footer')
</div>

<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-migrate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{ asset('plugins/back-to-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/smoothScroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/owl-carousel/owl-carousel/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- JS Customization -->
<!-- JS Page Level -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/backstretch/jquery.backstretch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/revolution-slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/owl-news-products.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/owl-carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        RevolutionSlider.initRSfullWidth();
        OwlNewsProducts.initOwlNews();
        OwlNewsProducts.initOwlProductCategories();
        OwlCarousel.initOwlCarousel();
    });
</script>
<!--[if lt IE 9]>
<script src="{{ asset('plugins/respond.js') }}"></script>
<script src="{{ asset('plugins/html5shiv.js') }}"></script>
<script src="{{ asset('plugins/placeholder-IE-fixes.js') }}"></script>
<![endif]-->

@yield('scripts')

</body>
</html>
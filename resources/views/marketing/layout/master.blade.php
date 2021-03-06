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

    @yield('meta')

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
    <link rel="stylesheet" href="{{ asset('css/pages/page_search_inner.css') }}">

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

    <div class="text-center margin-bottom-20">
        <script type="text/javascript">(function() {
          if (window.pluso)if (typeof window.pluso.start == "function") return;
          if (window.ifpluso==undefined) { window.ifpluso = 1;
            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
            s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
            s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
            var h=d[g]('body')[0];
            h.appendChild(s);
          }})();</script>
        <div class="pluso" data-background="none;" data-options="medium,square,line,horizontal,counter,sepcounter=1,theme=14" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
    </div>

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

@if(preg_match('/vladikavkaz.kalashnikovcom.ru/i', url()))
<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter34738380 = new Ya.Metrika({ id:34738380, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/34738380" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
@elseif(preg_match('/krasnodar.kalashnikovcom.ru/i', url()))
<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter34738440 = new Ya.Metrika({ id:34738440, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/34738440" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
@endif

</body>
</html>
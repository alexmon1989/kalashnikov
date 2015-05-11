<!--=== Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{ action('Marketing\MainController@index') }}">
            <img src="{{ asset('img/logo1-default.png') }}" alt="Логотип">
        </a>
        <!-- End Logo -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="{{ Request::segment(1) == 'main' || Request::segment(1) == '' ? 'active' : '' }}"><a href="{{ action('Marketing\MainController@index') }}">Главная</a></li>
                <li class="{{ Request::segment(1) == 'about' ? 'active' : '' }}"><a href="{{ action('Marketing\AboutController@getIndex') }}">О компании</a></li>
                <li class="{{ Request::segment(1) == 'news' ? 'active' : '' }}"><a href="{{ action('Marketing\NewsController@getIndex') }}">Новости</a></li>
                <li><a href="index.html">Продукция</a></li>
                <li><a href="index.html">Галерея</a></li>
                <li class="{{ Request::segment(1) == 'contacts' ? 'active' : '' }}"><a href="{{ action('Marketing\ContactsController@getIndex') }}">Контакты</a></li>

                <!-- Search Block -->
                <li>
                    <i class="search fa fa-search search-btn"></i>
                    <div class="search-open">
                        <div class="input-group animated fadeInDown">
                            <input type="text" class="form-control" placeholder="Поиск">
                                <span class="input-group-btn">
                                    <button class="btn-u" type="button">Искать</button>
                                </span>
                        </div>
                    </div>
                </li>
                <!-- End Search Block -->
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>
<!--=== End Header ===-->
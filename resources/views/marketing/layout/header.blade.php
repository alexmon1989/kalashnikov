<!--=== Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{ url() }}">
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
                <li class="{{ Request::segment(1) == 'about' ? 'active' : '' }}"><a href="{{ action('Marketing\AboutController@getIndex') }}">О компании</a></li>
                <li class="{{ Request::segment(1) == 'news' ? 'active' : '' }}"><a href="{{ action('Marketing\NewsController@getIndex') }}">Новости</a></li>
                <li class="{{ Request::segment(1) == 'promotions' ? 'active' : '' }}"><a href="{{ action('Marketing\PromotionsController@getIndex') }}">Промо-акции</a></li>
                <li class="{{ Request::segment(1) == 'products' ? 'active' : '' }}"><a href="{{ action('Marketing\ProductsController@getIndex') }}">Продукция</a></li>
                <li class="{{ Request::segment(1) == 'vacancies' ? 'active' : '' }}"><a href="{{ action('Marketing\VacanciesController@getIndex') }}">Вакансии</a></li>
                <li class="{{ Request::segment(1) == 'contacts' ? 'active' : '' }}"><a href="{{ action('Marketing\ContactsController@getIndex') }}">Контакты</a></li>

                <!-- Филиалы -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        Филиал
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li class="{{ preg_match('/vladikavkaz.kalashnikovcom.ru/i', url()) ? 'active' : '' }}">
                            <a target="_blank" href="http://vladikavkaz.kalashnikovcom.ru/{{ Request::path() != '/' ? Request::path() : '' }}?from_second=1">Владикавказ {!! preg_match('/vladikavkaz.kalashnikovcom.ru/i', url()) ? '<i class="fa fa-check"></i>' : '' !!}</a>
                        </li>
                        <li class="{{ preg_match('/krasnodar.kalashnikovcom.ru/i', url()) ? 'active' : '' }}">
                            <a target="_blank" href="http://krasnodar.kalashnikovcom.ru/{{ Request::path() != '/' ? Request::path() : '' }}?from_second=1">Краснодар {!! preg_match('/krasnodar.kalashnikovcom.ru/i', url()) ? '<i class="fa fa-check"></i>' : '' !!}</a>
                        </li>
                    </ul>
                </li>
                <!-- End Misc Pages -->

                <!-- Филиалы -->
                <li>
                    <i class="search fa fa-search search-btn"></i>
                    <div class="search-open">
                        <form action="{{ action('Marketing\SearchController@getIndex') }}" method="get">
                            <div class="input-group animated fadeInDown">
                                <input type="text" name="q" class="form-control" placeholder="Поиск">
                                <span class="input-group-btn">
                                    <button class="btn-u" type="submit">Искать</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- End Search Block -->
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>
<!--=== End Header ===-->
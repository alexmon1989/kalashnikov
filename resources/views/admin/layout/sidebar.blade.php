<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminlte/img/admin-avatar.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ $auser->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Меню</li>
            <li class="{{ Request::segment(2) == 'dashboard' || Request::segment(2) == '' ? 'active' : '' }}">
                <a href="{{ action('Admin\DashboardController@getIndex') }}">
                    <i class="fa fa-dashboard"></i> <span>Начало работы</span>
                </a>
            </li>

            <li class="treeview {{ Request::segment(2) == 'main' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>Главная страница</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::segment(3) == 'info-blocks' ? 'active' : '' }}">
                        <a href="{{ action('Admin\InfoBlocksController@getIndex') }}"><i class="fa fa-circle-o"></i> Информационные блоки</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'article' ? 'active' : '' }}">
                        <a href="{{ action('Admin\MainArticleController@getIndex') }}"><i class="fa fa-circle-o"></i> Главная статья</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::segment(2) == 'news' ? 'active' : '' }}">
                <a href="{{ action('Admin\NewsController@getIndex') }}">
                    <i class="fa fa-newspaper-o"></i> <span>Новости</span>
                </a>
            </li>

            <li class="{{ Request::segment(2) == 'promotions' ? 'active' : '' }}">
                <a href="{{ action('Admin\PromotionsController@getIndex') }}">
                    <i class="fa fa-thumbs-up"></i> <span>Промо-акции</span>
                </a>
            </li>

            <li class="{{ Request::segment(2) == 'about' ? 'active' : '' }}">
                <a href="{{ action('Admin\AboutController@getIndex') }}"><i class="fa fa-building"></i> О Компании</a>
            </li>

            <li class="treeview {{ Request::segment(2) == 'products' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Продукты</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::segment(3) == 'categories' ? 'active' : '' }}">
                        <a href="{{ action('Admin\ProductCategoriesController@getIndex') }}"><i class="fa fa-circle-o"></i> Категории</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'providers' ? 'active' : '' }}">
                        <a href="{{ action('Admin\ProductProvidersController@getIndex') }}"><i class="fa fa-circle-o"></i> Поставщики</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'manufacturers' ? 'active' : '' }}">
                        <a href="{{ action('Admin\ProductManufacturersController@getIndex') }}"><i class="fa fa-circle-o"></i> Производители</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'list' ? 'active' : '' }}">
                        <a href="{{ action('Admin\ProductsController@getIndex') }}"><i class="fa fa-circle-o"></i> Список продуктов</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::segment(2) == 'contacts' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-phone"></i>
                    <span>Контакты</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::segment(3) == 'info' ? 'active' : '' }}">
                        <a href="{{ action('Admin\ContactsInfoController@getIndex') }}"><i class="fa fa-circle-o"></i> Статья и контактные данные</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'messages' ? 'active' : '' }}">
                        <a href="{{ action('Admin\ContactsMessagesController@getIndex') }}"><i class="fa fa-circle-o"></i> Сообщения (настройки)</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::segment(2) == 'gallery' ? 'active' : '' }}">
                <a href="{{ action('Admin\GalleryCategoriesController@getIndex') }}"><i class="fa fa-image"></i> Фотогалерея</a>
            </li>

            <li class="{{ Request::segment(2) == 'slider' ? 'active' : '' }}">
                <a href="{{ action('Admin\SliderController@getIndex') }}"><i class="fa fa-image"></i> Слайдер</a>
            </li>

            <li class="{{ Request::segment(2) == 'partners' ? 'active' : '' }}">
                <a href="{{ action('Admin\PartnersController@getIndex') }}"><i class="fa fa-rub"></i> Наши партнёры</a>
            </li>

            <li class="{{ Request::segment(2) == 'votes' ? 'active' : '' }}">
                <a href="{{ action('Admin\VotesController@getIndex') }}"><i class="fa fa-question "></i> Опросы</a>
            </li>

            <li class="{{ Request::segment(2) == 'auth' ? 'active' : '' }}">
                <a href="{{ action('Admin\Auth\AuthController@getList') }}"><i class="fa fa-users "></i> Пользователи</a>
            </li>

            <li class="{{ Request::segment(2) == 'settings' ? 'active' : '' }}">
                <a href="{{ action('Admin\SettingsController@getIndex') }}"><i class="fa fa-cogs "></i> Настройки</a>
            </li>
        </ul>

        <ul class="sidebar-menu">
            <li class="header">Ссылки</li>
            <li>
                <a href="{{ action('Marketing\MainController@index') }}" title="Открыть в новой вкладке" target="_blank">
                    <i class="fa fa-external-link"></i> <span>Перейти на сайт</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
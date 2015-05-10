<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminlte/img/admin-avatar.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>admin</p>
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
                    <li><a href="#"><i class="fa fa-circle-o"></i> Настройки</a></li>
                </ul>
            </li>

            <li class="{{ Request::segment(2) == 'news' ? 'active' : '' }}">
                <a href="{{ action('Admin\NewsController@getIndex') }}">
                    <i class="fa fa-newspaper-o"></i> <span>Новости</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
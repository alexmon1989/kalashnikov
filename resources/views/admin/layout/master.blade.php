<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Панель управления | ИП Калашников</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('plugins/respond.js') }}"></script>
    <script src="{{ asset('plugins/html5shiv.js') }}"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">

      @include('admin.layout.header')
      @include('admin.layout.sidebar')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        @yield('top_content')

        <!-- Main content -->
        <section class="content">
            @if (Session::get('errors'))
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4>Ошибка!</h4>
                @foreach (Session::get('errors')->getMessages() as $msg)
                    @foreach ($msg as $value)
                        {{ $value }}<br>
                    @endforeach
                @endforeach
            </div>
            @endif

            @if (Session::get('success'))
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4>Успех!</h4>
                {{ Session::get('success') }}
            </div>
            @endif

            @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Версия</b> 1.0.0
        </div>
        <strong>2015 &copy; ИП Калашников.</strong> Все права защищены.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('adminlte/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('adminlte/plugins/slimScroll/jquery.slimScroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminlte/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/js/app.min.js') }}" type="text/javascript"></script>
    <!-- Custom JS -->
    <script src="{{ asset('adminlte/js/custom.js') }}" type="text/javascript"></script>

    @yield('script')
  </body>
</html>
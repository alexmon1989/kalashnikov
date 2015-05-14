@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Настройки',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Настройки', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование настроек</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#footer">Футер</a></li>
            <li><a data-toggle="tab" href="#price-list">Запрос прайс-листа</a></li>
        </ul>
        <div class="tab-content">
            <div id="footer" class="tab-pane fade in active">
                <h3>Футер</h3>
                @include('admin.settings._form_footer')
            </div>
            <div id="price-list" class="tab-pane fade">
                <h3>Запрос прайс-листа</h3>
                @include('admin.settings._form_price_list')
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- /.box-footer-->
</div><!-- /.box -->
@stop

@section('script')
<!-- CKEDITOR -->
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
@stop
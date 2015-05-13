@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Создание клиента',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Клиенты', 'action' => 'Admin\ClientsController@getIndex', 'active' => FALSE),
                    array('title' => 'Создание клиента', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Создание клиента</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        @include('admin.clients._form')
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ action('Admin\ClientsController@getIndex') }}">Назад ко всем клиентам</a>
    </div><!-- /.box-footer-->
</div><!-- /.box -->
@stop
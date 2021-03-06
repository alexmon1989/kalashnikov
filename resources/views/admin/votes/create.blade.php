@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Создание опроса',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Опросы', 'action' => 'Admin\VotesController@getIndex', 'active' => FALSE),
                    array('title' => 'Создание опроса', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Создание опроса</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        @include('admin.votes._form')
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ action('Admin\VotesController@getIndex') }}">Назад ко всем опросам</a>
    </div><!-- /.box-footer-->
</div><!-- /.box -->
@stop
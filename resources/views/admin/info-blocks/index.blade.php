@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Главная статья',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Главная страница', 'action' => '', 'active' => FALSE),
                    array('title' => 'Информационные блоки', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование информационных блоков</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
         <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#left-block">Левый блок</a></li>
                <li><a data-toggle="tab" href="#middle-block">Центральный блок</a></li>
                <li><a data-toggle="tab" href="#right-block">Правый блок</a></li>
            </ul>
            <div class="tab-content">
                <div id="left-block" class="tab-pane fade in active">
                    <h3>Левый блок</h3>
                    @include('admin.info-blocks._form', ['article' => $left_block])
                </div>
                <div id="middle-block" class="tab-pane fade">
                    <h3>Центральный блок</h3>
                    @include('admin.info-blocks._form', ['article' => $middle_block])
                </div>
                <div id="right-block" class="tab-pane fade">
                    <h3>Правый блок</h3>
                    @include('admin.info-blocks._form', ['article' => $right_block])
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
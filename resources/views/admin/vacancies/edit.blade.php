@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Редактирование вакансии',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Вакансии', 'action' => 'Admin\VacanciesController@getIndex', 'active' => FALSE),
                    array('title' => $vacancy->title, 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $vacancy->title }}</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        @include('admin.vacancies._form')
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ action('Admin\VacanciesController@getIndex') }}">Назад ко всем вакансиям</a>
    </div><!-- /.box-footer-->
</div><!-- /.box -->

@stop

@section('script')
<!-- CKEDITOR -->
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
@stop
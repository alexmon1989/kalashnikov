@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Главная статья',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Контакты', 'action' => '', 'active' => FALSE),
                    array('title' => 'Статья и контактные данные', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование главной статьи</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#articles">Статья</a></li>
            <li><a data-toggle="tab" href="#contacts">Контактные данные</a></li>
            <li><a data-toggle="tab" href="#coords">Карта (координаты)</a></li>
        </ul>
        <div class="tab-content">
            <div id="articles" class="tab-pane fade in active">
                <h3>Статья</h3>
                @include('admin.contacts.info._form', ['article' => $contacts_article])
            </div>
            <div id="contacts" class="tab-pane fade">
                <h3>Контактные данные</h3>
                @include('admin.contacts.info._form', ['article' => $contacts_widget])
            </div>
            <div id="coords" class="tab-pane fade">
                <h3>Координаты карты</h3>
                <div class="callout callout-info">
                    <h4>Информация!</h4>
                    <p>Координаты можно определять с помощью <a href="http://dimik.github.io/ymaps/examples/location-tool/" target="_blank">этого инструмента</a>.</p>
                </div>
                @include('admin.contacts.info._form_coords')
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
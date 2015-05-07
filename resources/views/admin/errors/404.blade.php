@extends('admin.layout.master')

@section('top_content')
@include('marketing.layout.breadcrumbs', [
            'title' => '404 Ошибка',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => '404 Ошибка', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<!--Error Block-->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="error-v1">
            <span class="error-v1-title">404</span>
            <span>Ошибка!</span>
            <p>Запрашиваемая страница не найдена на этом сервере. Это всё, что мы знаем.</p>
            <a class="btn-u btn-bordered" href="{{ action('Marketing\MainController@index') }}">На главную</a>
        </div>
    </div>
</div>
<!--End Error Block-->
@stop
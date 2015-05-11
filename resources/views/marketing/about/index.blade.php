@extends('marketing.layout.master')

@section('page_title')
О Компании
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'О Компании',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'О Компании', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<div class="row margin-bottom-40">
    <div class="col-md-12 md-margin-bottom-40">
        {!! $article->full_text !!}
    </div>
</div><!--/row-->

@clients()

@stop
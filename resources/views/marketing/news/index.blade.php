@extends('marketing.layout.master')

@section('page_title')
Новости
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Новости',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Новости', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

@if (!empty($news))
    @foreach($news as $item)
    <!-- News v3 -->
    <div class="row margin-bottom-20">
        <div class="col-sm-5 sm-margin-bottom-20">
            <img class="img-responsive" src="{{ asset('img/thumb/'.$item->thumbnail) }}" alt="">
        </div>
        <div class="col-sm-7">
            <div class="news-v3">
                <ul class="list-inline posted-info">
                    <li>Создано {{ date('d.m.Y', strtotime($item->created_at)) }}</li>
                </ul>
                <h2><a href="{{ action('Marketing\NewsController@getShow', array('id' => $item->id)) }}">{{ $item->title }}</a></h2>
                <p>{!! $item->preview_text_mid !!}</p>
            </div>
        </div>
    </div><!--/end row-->
    <!-- End News v3 -->

    <div class="clearfix margin-bottom-20"><hr></div>

    @endforeach

    <!-- Pager -->
    <div class="text-center">
        {!! str_replace('/?', '?', $news->render()) !!}
    </div>
    <!-- End Pager -->
@else
    <h2>Новости отсутствуют</h2>
@endif

@clients()

@stop
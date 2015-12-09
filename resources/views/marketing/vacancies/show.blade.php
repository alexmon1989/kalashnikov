@extends('marketing.layout.master')

@section('page_title')
{{ $news->title }}
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => $news->title,
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Новости', 'action' => 'Marketing\NewsController@getIndex', 'active' => FALSE),
                    array('title' => $news->title, 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<!-- News v3 -->
<div class="news-v3 margin-bottom-30">
    <img class="img-responsive full-width" src="{{ asset('img/thumb/'.$news->thumbnail) }}" alt="">
    <div class="news-v3-in">
        <ul class="list-inline posted-info">
            <li>Создано {{ date('d.m.Y', strtotime($news->created_at)) }}</li>
        </ul>
        <h2><a href="{{ action('Marketing\NewsController@getShow', array('id' => $news->id)) }}">{{ $news->title }}</a></h2>
        {!! $news->full_text !!}
    </div>
</div>
<!-- End News v3 -->

<h2>Еще новости</h2>
<!-- Authored Blog -->
<div class="row news-v2 margin-bottom-50">
    @foreach($latest_news as $item)
    <div class="col-sm-4 sm-margin-bottom-30">
        <div class="news-v2-badge">
            <img class="img-responsive" src="{{ asset('img/thumb/'.$item->thumbnail) }}" alt="">
        </div>
        <div class="news-v2-desc">
            <h3><a href="{{ action('Marketing\NewsController@getShow', array('id' => $item->id)) }}">{{ $item->title }}</a></h3>
            <small>Создано {{ date('d.m.Y', strtotime($item->created_at)) }}</small>
            <p>{{ $item->preview_text_small }}</p>
        </div>
    </div>
    @endforeach
</div>
<!-- End Authored Blog -->

@clients()

@stop
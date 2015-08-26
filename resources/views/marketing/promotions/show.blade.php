@extends('marketing.layout.master')

@section('page_title')
{{ $promotion->title }}
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => $promotion->title,
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Промо-акции', 'action' => 'Marketing\PromotionsController@getIndex', 'active' => FALSE),
                    array('title' => $promotion->title, 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<!-- News v3 -->
<div class="news-v3 margin-bottom-30">
    <img class="img-responsive full-width" src="{{ asset('img/promotions/'.$promotion->thumbnail) }}" alt="">
    <div class="news-v3-in">
        <ul class="list-inline posted-info">
            <li>Создано {{ date('d.m.Y', strtotime($promotion->created_at)) }}</li>
        </ul>
        <h2><a href="{{ action('Marketing\PromotionsController@getShow', array('id' => $promotion->id)) }}">{{ $promotion->title }}</a></h2>
        {!! $promotion->full_text !!}
    </div>
</div>
<!-- End News v3 -->

@if (count($latest_promotions) > 0)
<h2>Еще промо-акции</h2>
<!-- Authored Blog -->
<div class="row news-v2 margin-bottom-50">
    @foreach($latest_promotions as $item)
    <div class="col-sm-4 sm-margin-bottom-30">
        <div class="news-v2-badge">
            <img class="img-responsive" src="{{ asset('img/promotions/'.$item->thumbnail) }}" alt="">
        </div>
        <div class="news-v2-desc">
            <h3><a href="{{ action('Marketing\PromotionsController@getShow', array('id' => $item->id)) }}">{{ $item->title }}</a></h3>
            <small>Создано {{ date('d.m.Y', strtotime($item->created_at)) }}</small>
            <p>{!! $item->preview_text !!}</p>
        </div>
    </div>
    @endforeach
</div>
<!-- End Authored Blog -->
@endif

@clients()

@stop
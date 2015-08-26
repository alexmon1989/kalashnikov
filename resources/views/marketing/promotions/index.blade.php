@extends('marketing.layout.master')

@section('page_title')
Промо-акции
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Промо-акции',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Промо-акции', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

@if (!empty($promotions))
    @foreach($promotions as $item)
    <!-- News v3 -->
    <div class="row margin-bottom-20">
        <div class="col-sm-5 sm-margin-bottom-20">
            <img class="img-responsive" src="{{ asset('img/promotions/'.$item->thumbnail) }}" alt="">
        </div>
        <div class="col-sm-7">
            <div class="news-v3">
                <ul class="list-inline posted-info">
                    <li>Создано {{ date('d.m.Y', strtotime($item->created_at)) }}</li>
                </ul>
                <h2><a href="{{ action('Marketing\PromotionsController@getShow', array('id' => $item->id)) }}">{{ $item->title }}</a></h2>
                <p>{!! $item->preview_text !!}</p>
            </div>
        </div>
    </div><!--/end row-->
    <!-- End News v3 -->

    <div class="clearfix margin-bottom-20"><hr></div>

    @endforeach

    <!-- Pager -->
    <div class="text-center">
        {!! str_replace('/?', '?', $promotions->render()) !!}
    </div>
    <!-- End Pager -->
@else
<div class="row margin-bottom-20">
    <div class="col-sm-12">
        <h2>Промо-акции отсутствуют</h2>
    </div>
</div>
@endif

@clients()

@stop
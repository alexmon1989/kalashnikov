@extends('marketing.layout.master')

@section('page_title')
Результаты поиска
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Результаты поиска',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Результаты поиска', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<!--=== Search Block Version 2 ===-->
<div class="search-block-v2">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 search">
            <h2>Поиск еще раз</h2>
            <div class="input-group">
                <form action="{{ action('Marketing\SearchController@getIndex') }}" method="get">
                    <input type="text" class="form-control" name="q" value="{{ Input::get('q') }}" placeholder="Введите строку поиска...">
                    <span class="input-group-btn">
                        <button class="btn-u" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div><!--/container-->
<!--=== End Search Block Version 2 ===-->


<!--=== Search Results ===-->
<div class="container s-results margin-bottom-50">
    <span class="results-number">Всего 10 результатов</span>

    @if (!empty($news))
    <h2>Новости</h2>


    @foreach($news as $item)
    <!-- Begin Inner Results -->
    <div class="inner-results">
        <h3><a href="{{ action('Marketing\NewsController@getShow', ['id' => $item->id]) }}">{{ $item->title }}</a></h3>
        <ul class="list-inline up-ul">
            <li>Создано: {{ date('d.m.Y', strtotime($item->created_at)) }}</li>
        </ul>
        {!! str_limit(strip_tags($item->full_text), 400) !!}
    </div>
    <!-- Begin Inner Results -->
    <hr>
    @endforeach

    @foreach($articles as $item)
    <!-- Begin Inner Results -->
    <div class="inner-results">
        <h3><a href="{{ action('Marketing\NewsController@getShow', ['id' => $item->id]) }}">{{ $item->title }}</a></h3>
        {!! str_limit(strip_tags($item->full_text), 400) !!}
    </div>
    <!-- Begin Inner Results -->
    <hr>
    @endforeach

    @endif

</div><!--/container-->
<!--=== End Search Results ===-->


@clients()

@stop
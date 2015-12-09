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
        <form action="{{ action('Marketing\SearchController@getIndex') }}" method="get">
            <div class="col-md-6 col-md-offset-3 search">
                <h2>Поиск еще раз</h2>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ Input::get('q') }}" placeholder="Введите строку поиска...">
                    <span class="input-group-btn">
                        <button class="btn-u" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div><!--/container-->
<!--=== End Search Block Version 2 ===-->

<!--=== Search Results ===-->
<div class="container s-results margin-bottom-50">
    @if (Session::get('errors'))
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4>Ошибка!</h4>
        @foreach (Session::get('errors')->getMessages() as $msg)
            @foreach ($msg as $value)
                {{ $value }}<br>
            @endforeach
        @endforeach
    </div>
    @endif

    <span class="results-number">Всего результатов: {{ isset($res_count) ? $res_count : '0' }} </span>

    @if (isset($news) and count($news) > 0)
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
    @endif

    @if (isset($articles) and count($articles) > 0)
        <h2>Страницы</h2>
        @foreach($articles as $item)
        <!-- Begin Inner Results -->
        <div class="inner-results">
            @if ($item->type == 'about')
            <h3><a href="{{ action('Marketing\AboutController@getIndex') }}">{{ $item->title }}</a></h3>
            @else
            <h3><a href="{{ action('Marketing\ContactsController@getIndex') }}">{{ $item->title }}</a></h3>
            @endif
            {!! str_limit(strip_tags($item->full_text), 400) !!}
        </div>
        <!-- Begin Inner Results -->
        <hr>
        @endforeach
    @endif

    @if (isset($products) and count($products) > 0)
        <h2>Продукты</h2>
        @foreach($products as $item)
        <!-- Begin Inner Results -->
        <div class="inner-results">
            <div class="row margin-bottom-10">
                <div class="col-md-12">
                    <h3><a href="{{ action('Marketing\ProductsController@getShow', ['id' => $item->id]) }}">{{ $item->title }}</a></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <span class="overlay-zoom">
                        <img alt="{{ $item->title }}" src="{{ count($item->images) > 0 ? asset('img/products/'.$item->id.'/'.$item->images()->first()->file_name) : asset('img/products/no.jpg') }}" class="img-responsive">
                        <span class="zoom-icon"></span>
                    </span>
                </div>
                <div class="col-md-10">
                    <strong>Категория: </strong> <a href="{{ action('Marketing\ProductsController@getCategory', ['id' => $item->category->id]) }}">{{ $item->category->title }}</a><br>
                    <strong>Производитель: </strong> {{ $item->manufacturer->title }}<br>
                    <strong>Поставщик: </strong> {{ $item->provider->title }}<br>
                    <strong>Описание: </strong> {!! str_limit(strip_tags($item->description), 400) !!}<br>
                </div>
            </div>
        </div>
        <!-- Begin Inner Results -->
        <hr>
        @endforeach
    @endif

    @if (isset($product_categories) and count($product_categories) > 0)
        <h2>Категории продуктов</h2>
        @foreach($product_categories as $item)
        <!-- Begin Inner Results -->
        <div class="inner-results">
            <div class="row margin-bottom-10">
                <div class="col-md-12">
                    <h3><a href="{{ action('Marketing\ProductsController@getCategory', ['id' => is_null($item->parent_id) ? $item->childCategories()->first()->id : $item->id]) }}">{{ $item->title }}</a></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <span class="overlay-zoom">
                        <img alt="{{ $item->title }}" src="{{ asset('img/product_categories/'.$item->file_name) }}" class="img-responsive">
                        <span class="zoom-icon"></span>
                    </span>
                </div>
                <div class="col-md-10">
                    <strong>Описание: </strong> {!! str_limit(strip_tags($item->description), 400) !!}<br>
                </div>
            </div>
        </div>
        <!-- Begin Inner Results -->
        <hr>
        @endforeach
    @endif

</div><!--/container-->
<!--=== End Search Results ===-->


@clients()

@stop
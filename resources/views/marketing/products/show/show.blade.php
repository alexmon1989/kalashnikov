@extends('marketing.layout.master')

@section('meta')
<meta name="csrf_token" content="{!! $encrypted_csrf_token !!}"/>
@stop

@section('page_title')
{{ $product->title }}
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Продукты',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Продукция', 'action' => 'Marketing\ProductsController@getIndex', 'active' => FALSE),
                    array('title' => $product->category->parentCategory->title, 'action' => '', 'active' => FALSE),
                    array('title' => $product->category->title, 'action' => 'Marketing\ProductsController@getCategory', 'action_params' => ['id' => $product->category->id], 'active' => FALSE),
                    array('title' => $product->title, 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<div class="row">

    <div class="col-md-6">
        <div class="ms-showcase2-template">
            <!-- Master Slider -->
            <div class="master-slider ms-skin-default" id="masterslider">
                @if (count($product->images) > 0)
                @foreach($product->images as $item)
                <div class="ms-slide">
                    <img class="ms-brd" src="{{ asset('img/products/'.$product->id.'/'.$item->file_name) }}" data-src="{{ asset('img/products/'.$product->id.'/'.$item->file_name) }}" alt="">
                    <img class="ms-thumb" src="{{ asset('img/products/'.$product->id.'/'.$item->file_name) }}" alt="thumb">
                </div>
                @endforeach

                @else
                    <div class="ms-slide">
                        <img class="ms-brd" src="{{ asset('img/products/no.jpg') }}" data-src="{{ asset('img/products/no.jpg') }}" alt="">
                        <img class="ms-thumb" src="{{ asset('img/products/no.jpg') }}" alt="thumb">
                    </div>
                @endif
            </div>
            <!-- End Master Slider -->
        </div>
    </div>

    <div class="col-md-6">
        <h2>{{ $product->title }}</h2>
        <hr/>

        <div class="row">
            <div class="col-md-12 margin-bottom-20">
                <h4>Категория:</h4>
                {{ $product->category->parentCategory->title }} - <a href="{{ action('Marketing\ProductsController@getCategory', ['id' => $product->category->id]) }}">{{ $product->category->title }}</a>
                <h4>Производитель:</h4>
                {{ $product->manufacturer->title }}
                <h4>Поставщик:</h4>
                {{ $product->provider->title }}
                <h4>Тип упаковки:</h4>
                {{ $product->packing }}
                <h4>Вес:</h4>
                {{ $product->weight }}
                <h4>Описание:</h4>
                {!! $product->description !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="#" class="btn-u btn-u-blue btn-u-lg rounded" data-toggle="modal" data-target="#responsive"><i class="fa fa-envelope-square"></i> Узнать цену</a>
            </div>
        </div>
    </div>

</div>


@clients()

@stop

@section('scripts')
<script type="text/javascript" src="{{ asset('plugins/masterslider/masterslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/masterslider/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/master-slider.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        MasterSliderShowcase2.initMasterSliderShowcase2();
    });
</script>

@stop

@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/masterslider/style/masterslider.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/masterslider/skins/default/style.css') }}">
@stop

@include('marketing.layout.price_list_request_modal')
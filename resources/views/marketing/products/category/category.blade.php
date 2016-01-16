@extends('marketing.layout.master')

@section('meta')
<meta name="csrf_token" content="{!! $encrypted_csrf_token !!}"/>
@stop

@section('page_title')
{{ $category->title }}
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Продукты',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Продукция', 'action' => 'Marketing\ProductsController@getIndex', 'active' => FALSE),
                    array('title' => $category->parentCategory->title, 'action' => '', 'active' => TRUE),
                    array('title' => $category->title, 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<div class="row">
    <div class="col-md-3 margin-bottom-60">
        @include('marketing.products.category.sidebar')
    </div>

    <div class="col-md-9">
        <h2>{{ $category->title }} (результатов: {{ $products_count }})</h2>
        <p>{!! $category->description !!}</p>
        <hr/>

        <!-- Pager -->
        <div class="text-center">
            {!! str_replace('/?', '?', $products->appends($pagination_params)->render()) !!}
        </div>
        <!-- End Pager -->

        @if ($products->count() > 0)
            @for($i = 0; $i < count($products); $i = $i + 3)
                @if (isset($products[$i]))
                    <!-- Thumbnails v1 -->
                    <div class="row">
                        @for($j = 0; $j < 3; $j++)
                        @if (isset($products[$i+$j]))
                        <div class="col-md-4">
                            <div class="thumbnails thumbnail-style thumbnail-kenburn">
                                <div class="thumbnail-img">
                                    <div class="overflow-hidden">
                                        <a href="{{ action('Marketing\ProductsController@getShow', ['id'=>$products[$i+$j]->id]) }}">
                                            <img class="img-responsive" src="{{ count($products[$i+$j]->images) > 0 ? asset('img/products/'.$products[$i+$j]->id.'/'.$products[$i+$j]->images->first()->file_name) : asset('img/products/no.jpg') }}" alt="{{ $products[$i+$j]->title }}" />
                                        </a>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3><a class="hover-effect" href="{{ action('Marketing\ProductsController@getShow', ['id'=>$products[$i+$j]->id]) }}">{{ $products[$i+$j]->title }}</a></h3>
                                    <p>{!! $products[$i+$j]->vendor_code ? '<strong>Артикул:</strong> ' . $products[$i+$j]->vendor_code . '<br/>' : '' !!}
                                    <strong>Производитель:</strong> {{ $products[$i+$j]->manufacturer->title }}<br/>
                                    <strong>Поставщик:</strong> {{ $products[$i+$j]->provider->title }}<br/>
                                    <strong>Тип упаковки:</strong> {{ $products[$i+$j]->packing }}<br/>
                                    <strong>Вес:</strong> {{ $products[$i+$j]->weight }}</p>
                                    <a href="#" class="btn-u btn-u-blue rounded" data-toggle="modal" data-target="#responsive"><i class="fa fa-envelope-square"></i> Узнать стоимость</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endfor
                    </div><!--/row-->
                    <!-- End Thumbnails v1 -->
                @endif
            @endfor
        @else
            <h4>Продукты в этой категории пока что отсутствуют.</h4>
        @endif

        <!-- Pager -->
        <div class="text-center">
            {!! str_replace('/?', '?', $products->appends($pagination_params)->render()) !!}
        </div>
        <!-- End Pager -->
    </div>
</div>


@clients()

@stop

@include('marketing.layout.price_list_request_modal')
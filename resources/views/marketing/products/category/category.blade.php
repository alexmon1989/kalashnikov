@extends('marketing.layout.master')

@section('page_title')
Продукты
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
        <h2>{{ $category->title }} (результатов: {{ $products->count() }})</h2>
        <p>{!! $category->description !!}</p>
        <hr/>
        @if ($products->count() > 0)
            @for($i = 0; $i < count($products); $i = $i +4)
                @if (isset($products[$i]))
                    <!-- Thumbnails v1 -->
                    <div class="row">
                        @for($j = 0; $j < 4; $j++)
                        @if (isset($products[$i+$j]))
                        <div class="col-md-3">
                            <div class="thumbnails thumbnail-style thumbnail-kenburn">
                                <div class="thumbnail-img">
                                    <div class="overflow-hidden">
                                        <img class="img-responsive" src="{{ count($products[$i+$j]->images) > 0 ? asset('img/products/'.$products[$i+$j]->id.'/'.$products[$i+$j]->images()->first()->file_name) : asset('img/products/no.jpg') }}" alt="{{ $products[$i+$j]->title }}" />
                                    </div>
                                    <a class="btn-more hover-effect" href="#">Смотреть +</a>
                                </div>
                                <div class="caption">
                                    <h3><a class="hover-effect" href="#">{{ $products[$i+$j]->title }}</a></h3>
                                    <p>{!! str_limit($products[$i+$j]->description) !!}</p>
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
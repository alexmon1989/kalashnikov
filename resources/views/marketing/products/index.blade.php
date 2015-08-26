@extends('marketing.layout.master')

@section('page_title')
Категории продукции
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Продукция',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Продукция', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

@for($i = 0; $i < count($categories); $i = $i +4)
    @if (isset($categories[$i]))
        <!-- Thumbnails v1 -->
        <div class="row">
            @for($j = 0; $j < 4; $j++)
            @if (isset($categories[$i+$j]))
            <div class="col-md-3">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <a href="{{ count($categories[$i+$j]->childCategories) > 0 ? action('Marketing\ProductsController@getCategory', ['id' => $categories[$i+$j]->childCategories[0]->id]) : '#' }}">
                                <img class="img-responsive" src="{{ asset('img/product_categories/'.$categories[$i+$j]->file_name) }}" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="{{ count($categories[$i+$j]->childCategories) > 0 ? action('Marketing\ProductsController@getCategory', ['id' => $categories[$i+$j]->childCategories[0]->id]) : '#' }}">{{ $categories[$i+$j]->title }}</a></h3>
                        <p>{!! str_limit($categories[$i+$j]->description) !!}</p>
                    </div>
                </div>
            </div>
            @endif
            @endfor
        </div><!--/row-->
        <!-- End Thumbnails v1 -->
    @endif
@endfor


@clients()

@stop
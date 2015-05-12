@extends('marketing.layout.master')

@section('page_title')
Галерея
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Галерея',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Галерея', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

@if (!empty($categories))
    @for($i = 0; $i <= count($categories) - 1; $i = $i + 3)

        @if (isset($categories[$i]))
        <div class="row">
            @for($j = 0; $j < 3; $j = $j + 1)

            @if (isset($categories[$i+$j]))
            <div class="col-md-4 col-xs-12">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            @if (isset($categories[$i+$j]->images[0]))
                            <img alt="{{ $categories[$i+$j]->title }}" src="{{ asset('img/gallery/'.$categories[$i+$j]->images[0]->file_name) }}" class="img-responsive">
                            @else
                            <img alt="{{ $categories[$i+$j]->title }}" src="{{ asset('img/gallery/no.jpg') }}" class="img-responsive">
                            @endif
                        </div>
                        <a href="{{ action('Marketing\GalleryController@getCategory', array('id' => $categories[$i+$j]->id)) }}" class="btn-more hover-effect">смотреть +</a>
                    </div>
                    <div class="caption">
                        <h3><a href="{{ action('Marketing\GalleryController@getCategory', array('id' => $categories[$i+$j]->id)) }}" class="hover-effect">{{ $categories[$i+$j]->title }}</a></h3>
                        <p>{!! str_limit($categories[$i+$j]->description) !!}</p>
                    </div>
                </div>
            </div>
            @endif

            @endfor
        </div>
        @endif

    @endfor

    <!-- Pager -->
    <div class="text-center">
        {!! str_replace('/?', '?', $categories->render()) !!}
    </div>
    <!-- End Pager -->
@else
    <h2>Категории галереи отсутствуют</h2>
@endif

@clients()

@stop
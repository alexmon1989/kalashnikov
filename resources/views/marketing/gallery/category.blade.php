@extends('marketing.layout.master')

@section('page_title')
{{ $category->title }}
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Галерея - '.$category->title,
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Галерея', 'action' => 'Marketing\GalleryController@getIndex', 'active' => FALSE),
                    array('title' => $category->title, 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<div class="text-center margin-bottom-50">
    <h2 class="title-v2 title-center">{{ $category->title }}</h2>
    <div class="space-lg-hor">{!! $category->description !!}</div>
</div>

@if (count($images) > 0)
    @for($i = 0; $i <= count($images) - 1; $i = $i + 4)

        @if (isset($images[$i]))
        <div class="row  margin-bottom-30">
            @for($j = 0; $j < 4; $j = $j + 1)

            @if(isset($images[$i+$j]))
            <div class="col-sm-3 sm-margin-bottom-30">
                <a title="{{ $images[$i+$j]->description }}" class="fancybox img-hover-v1" rel="gallery" href="{{ asset('img/gallery/'.$images[$i+$j]->file_name) }}">
                    <span><img alt="{{ $images[$i+$j]->description }}" src="{{ asset('img/gallery/'.$images[$i+$j]->file_name) }}" class="img-responsive"></span>
                </a>
            </div>
            @endif

            @endfor
        </div>
        @endif

    @endfor

    <!-- Pager -->
    <div class="text-center">
        {!! str_replace('/?', '?', $images->render()) !!}
    </div>
    <!-- End Pager -->
@else
    <h2>Фотографии отсутствуют</h2>
    <br>
@endif

@clients()

@stop

@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/fancybox/source/jquery.fancybox.css') }}">
@stop

@section('scripts')
<script type="text/javascript" src="{{ asset('plugins/fancybox/source/jquery.fancybox.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/fancy-box.js') }}"></script>
<script>
    jQuery(document).ready(function() {
            FancyBox.initFancybox();
    });
</script>

@stop
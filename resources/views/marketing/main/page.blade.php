@extends('marketing.layout.master')

@section('meta')
<meta name="csrf_token" content="{!! $encrypted_csrf_token !!}"/>
@stop

@section('top_content')
    @slider()
    @include('marketing.layout.purchase')
@stop

@section('content')

@service()
@news()
@product_categories()

<!-- Info Blokcs -->
<div class="row">
    <!-- Welcome Block -->
    <div class="col-md-8 md-margin-bottom-40">
        <div class="headline"><h2>{{ $article->title }}</h2></div>
        <div class="row">
            <div class="col-sm-12">
                {!! $article->full_text !!}
            </div>
        </div>
    </div><!--/col-md-8-->

    <!-- Галерея и опрос -->
    <div class="col-md-4">
        @polls()
    </div><!--/col-md-4-->
</div>
<!-- End Info Blokcs -->

@clients()

@stop
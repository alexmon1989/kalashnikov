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
                    array('title' => 'Продукты', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<div class="row">
    <div class="col-md-3 md-margin-bottom-60">
        @include('marketing.products.category.sidebar')
    </div>

    <div class="col-md-9 md-margin-bottom-60">
        <?php var_dump($products) ?>
    </div>
</div>


@clients()

@stop
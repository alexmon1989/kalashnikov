@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Редактирование продукта',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Список продуктов', 'action' => 'Admin\ProductsController@getIndex', 'active' => FALSE),
                    array('title' => 'Редактирование продукта', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование продукта "{{ $product->title }}"</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="box-body">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#product-data">Данные</a></li>
                <li><a data-toggle="tab" href="#images">Изображения</a></li>
            </ul>
            <div class="tab-content">
                <div id="product-data" class="tab-pane fade in active">
                    <h3>Данные</h3>
                    @include('admin.products.list._form')
                </div>

                <div id="images" class="tab-pane fade">
                    <h3>Изображения</h3>

                    @include('admin.products.list._form_image')

                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Изображение</th>
                                <th width="5%">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->images as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img width="200" src="{{ asset('img/products/'.$item->product->id.'/'.$item->file_name) }}" alt=""/></td>
                                <td><a class="btn btn-danger btn-sm item-delete" href="{{ action('Admin\ProductsController@getDeleteImage', array('id' => $item->id)) }}" title="Удалить"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ action('Admin\ProductsController@getIndex') }}">Назад ко всем продуктам</a>
    </div><!-- /.box-footer-->
</div><!-- /.box -->
@stop

@section('script')
<!-- CKEDITOR -->
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
@stop
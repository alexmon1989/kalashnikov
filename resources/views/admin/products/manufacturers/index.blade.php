@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Список поставщиков продуктов',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Список производителей продуктов', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Выбирайте производителя для редактирования или создайте нового</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>
            <a class="btn btn-primary" href="{{ action('Admin\ProductManufacturersController@getCreate') }}"><i class="fa fa-plus"></i> Создать</a>
        </p>
        <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Создано</th>
                    <th>Последнее редактирование</th>
                    <th>Действия</th>
                </tr>
            </thead>

            <tbody>
                @foreach($manufacturers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ date('d.m.Y H:i:s', strtotime($item->created_at)) }}</td>
                    <td>{{ date('d.m.Y H:i:s', strtotime($item->updated_at)) }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary btn-sm" href="{{ action('Admin\ProductManufacturersController@getEdit', array('id' => $item->id)) }}" title="Редактировать"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm item-delete" href="{{ action('Admin\ProductManufacturersController@getDelete', array('id' => $item->id)) }}" title="Удалить"><i class="fa fa-remove"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- /.box-footer-->
</div><!-- /.box -->
@stop
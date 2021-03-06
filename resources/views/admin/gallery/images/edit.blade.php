@extends('admin.layout.master')

@section('top_content')
@include('admin.layout.breadcrumbs', [
            'title' => 'Редактирование изображения в категории "'.$category->title.'"',
            'items' => array(
                    array('title' => 'Начало работы', 'action' => 'Admin\DashboardController@getIndex', 'active' => FALSE),
                    array('title' => 'Список категорий фотогалереи', 'action' => 'Admin\GalleryCategoriesController@getIndex', 'active' => FALSE),
                    array('title' => $category->title, 'action' => 'Admin\GalleryImagesController@getIndex', 'action_params' => array('categoryId' => $category->id), 'active' => FALSE),
                    array('title' => 'Редактирование изображения', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование изображения в категории "{{ $category->title }}"</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
          <div class="col-xs-10 col-md-5">
              <img src="{{ action('Admin\GalleryImagesController@getImageFull', array('id' => $image->id)) }}" alt="" />
          </div>
        </div>

        @include('admin.gallery.images._form')
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ action('Admin\GalleryImagesController@getIndex', array('categoryId' => $category->id)) }}">Назад к списку фотографий категории</a>
    </div><!-- /.box-footer-->
</div><!-- /.box -->
@stop
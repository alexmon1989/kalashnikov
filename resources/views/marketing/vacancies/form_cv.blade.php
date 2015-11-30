@extends('marketing.layout.master')

@section('page_title')
Заполнение резюме
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Заполнение резюме',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Вакансии', 'action' => 'Marketing\VacanciesController@getIndex', 'active' => FALSE),
                    array('title' => 'Заполнение резюме', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h4>Пожалуйста, выберите вакансию и заполните поля формы ниже</h4>

            @if (Session::get('errors'))
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>Ошибка!</h4>
                    @foreach (Session::get('errors')->getMessages() as $msg)
                        @foreach ($msg as $value)
                            {{ $value }}<br>
                        @endforeach
                    @endforeach
                </div>
            @endif

            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>Успех!</h4>
                    {{ Session::get('success') }}
                </div>
            @endif

            @include('marketing.vacancies._form')
        </div>
    </div>


@clients()

@stop
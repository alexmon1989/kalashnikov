@extends('marketing.layout.master')

@section('page_title')
Вакансии
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Вакансии',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Вакансии', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<div class="row">
    <div class="col-md-8">
        <h4>Сейчас в компании открыты следующие вакансии:</h4>
        <!-- Accordion v1 -->
        <div class="panel-group acc-v1" id="accordion-1">
            @foreach($vacancies as $vacancy)
            @if ($vacancy->title != 'Резерв')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-{{ $vacancy->id }}">
                            {{ $vacancy->title }}
                        </a>
                    </h4>
                </div>
                <div id="collapse-{{ $vacancy->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        {!! $vacancy->full_text !!}
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <!-- End Accordion v1 -->

        <p>Присылайте нам своё резюме с помощью формы справа.
            Если в списке вы не нашли интересующей - просим выбрать "Резерв" и случае
            появления подходящей вакансии мы обязательно свяжемся с Вами.
            Также Вы можете заполнить нашу нашу специальную форму,
            перейдя по этой <strong><a href="{{ action('Marketing\VacanciesController@getFormCV') }}">ссылке</a></strong>.</p>
    </div>

    <div class="col-md-4">
        <h4>Отправьте нам своё резюме:</h4>

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

        <form class="sky-form" action="{{ action('Marketing\VacanciesController@postSendCV') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <section>
                    <label class="label">Вакансия</label>
                    <label class="select">
                        <select name="vacancy_id">
                            <option value="0">Выбирайте вакансию</option>
                            @foreach($vacancies as $vacancy)
                            <option value="{{ $vacancy->id }}" {{ old('vacancy_id') == $vacancy->id ? 'selected="selected" ' : '' }}>{{ $vacancy->title }}</option>
                            @endforeach
                        </select>
                        <i></i>
                    </label>
                </section>

                <section>
                    <label class="label">ФИО</label>
                    <label class="input">
                        <input type="text" name="username" value="{{ old('username') }}">
                    </label>
                </section>

                <section>
                    <label class="label">E-Mail</label>
                    <label class="input">
                        <input type="text" name="email" value="{{ old('email') }}">
                    </label>
                </section>

                <section>
                    <label class="label">Файл с резюме</label>
                    <label class="input input-file" for="file">
                        <div class="button"><input type="file" name="file_cv" onchange="this.parentNode.nextSibling.value = this.value" id="file">Выбрать</div><input type="text" readonly="">
                    </label>
                    <div class="note"><strong>Информация:</strong> выберите документ MS Word или PDF.</div>
                </section>
            </fieldset>

            <footer>
                <button class="btn-u" type="submit">Отправить</button>
                <button class="btn-u btn-u-default" type="reset">Сброс</button>
            </footer>
        </form>
    </div>
</div>



@clients()

@stop
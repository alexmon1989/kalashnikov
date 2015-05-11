@extends('marketing.layout.master')

@section('page_title')
Контакты
@stop

@section('top_content')
@slider()
@include('marketing.layout.breadcrumbs', [
            'title' => 'Контакты',
            'items' => array(
                    array('title' => 'Главная', 'action' => 'Marketing\MainController@index', 'active' => FALSE),
                    array('title' => 'Контакты', 'action' => '', 'active' => TRUE),
            )
        ])
@stop

@section('content')

<div class="row margin-bottom-30">
    <div class="col-md-9 mb-margin-bottom-30">

        {!! $contacts_article->full_text !!}

        <br/>

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

        <form method="post" class="sky-form contact-style">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset class="no-padding">
                <label>Имя <span class="color-red">*</span></label>
                <div class="row sky-space-20">
                    <div class="col-md-7 col-md-offset-0">
                        <div>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                </div>

                <label>Email <span class="color-red">*</span></label>
                <div class="row sky-space-20">
                    <div class="col-md-7 col-md-offset-0">
                        <div>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                </div>

                <label>Сообщение <span class="color-red">*</span></label>
                <div class="row sky-space-20">
                    <div class="col-md-11 col-md-offset-0">
                        <div>
                            <textarea rows="8" name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                        </div>
                    </div>
                </div>

                <p><button type="submit" class="btn-u">Отправить</button></p>
            </fieldset>

            <div class="message">
                <i class="rounded-x fa fa-check"></i>
                <p>Your message was successfully sent!</p>
            </div>
        </form>
    </div><!--/col-md-9-->

    <div class="col-md-3">
        <!-- Google Map -->
        <div id="map" class="map map-box map-box-space1 margin-bottom-40">
        </div><!---/map-->
        <!-- End Google Map -->

        <!-- Contacts -->
        <div class="headline"><h2>Контакты</h2></div>
        {!! $contacts_widget->full_text !!}
        <!-- End Contacts -->
    </div><!--/col-md-3-->
</div><!--/row-->


@clients()

@stop

@section('scripts')
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
var myMap;
ymaps.ready(init);
function init () {
    myMap = new ymaps.Map('map', {
        center: [ {{ Memory::get('contacts.latitude') }}, {{ Memory::get('contacts.longitude') }}],
        controls: ['zoomControl'],
        zoom: 11
    });
    myMap.geoObjects.add(
        new ymaps.Placemark(
            [{{ Memory::get('contacts.latitude') }}, {{ Memory::get('contacts.longitude') }}],
            { balloonContent: 'ИП <strong>Калашников</strong>' }
        )
    );
}
</script>
@stop
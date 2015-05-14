<form role="form" method="post" action="{{ action('Admin\SettingsController@postSavePriceList') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="email">E-Mail, на который будет происходить отправка запроса</label>
            <input type="title" placeholder="E-Mail, на который будет происходить отправка запроса" id="email" name="email" class="form-control" value="{{ old('email', Memory::get('price_request.email_to', 'kalashnikov@kalashnikovcom.ru')) }}">
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
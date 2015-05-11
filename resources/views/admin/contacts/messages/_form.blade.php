<form role="form" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="email_to">Адрес, на который будут отправляться письма с сайта</label>
            <input type="text" placeholder="Адрес, на который будут отправляться письма с сайта" id="email_to" name="email_to" class="form-control" value="{{ old('email_to', Memory::get('contacts.email_to')) }}">
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
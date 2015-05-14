<form role="form" method="post" action="{{ action('Admin\SettingsController@postSaveFooter') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="about">О Компании</label>
            <textarea id="about" name="about" class="form-control ckeditor">{{ old('about', Memory::get('footer.about')) }}</textarea>
        </div>
        <div class="form-group">
            <label for="contacts">Контакты</label>
            <textarea id="contacts" name="contacts" class="form-control ckeditor">{{ old('contacts', Memory::get('footer.contacts')) }}</textarea>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
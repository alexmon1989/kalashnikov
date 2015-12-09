<form role="form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" placeholder="Название" id="title" name="title" class="form-control" value="{{ old('title', isset($partner) ? $partner->title : '') }}">
        </div>
        <div class="form-group">
            <label for="url">Ссылка</label>
            <input type="text" placeholder="Ссылка" id="url" name="url" class="form-control" value="{{ old('url', isset($partner) ? $partner->url : '') }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="enabled" value="1" {{ old('enabled', isset($partner) ? $partner->enabled : 0) == 1 ? 'checked=""' : ''  }}> Включён
            </label>
        </div>
        <div class="form-group">
            <label for="thumbnail">Изображение</label>
            <input type="file" id="file_name" name="file_name">
            <p class="help-block">Форматы: <b>jpg, png, gif</b>. Размер: <b>200px * 150px</b>. Программа приведёт изображение к этому разрешению автоматически без сохранения пропорций сторон <strong>{{ Config::get('image.driver') == 'imagick' ? ', а также сделает' : ', но не сделает' }} изображение чёрно-белым</strong>.</p>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit" name="send"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
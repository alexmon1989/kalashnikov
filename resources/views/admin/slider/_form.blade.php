<form role="form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" placeholder="Название" id="title" name="title" class="form-control" value="{{ old('title', isset($slider) ? $slider->title : '') }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="enabled" value="1" {{ old('enabled', isset($slider) ? $slider->enabled : 0) == 1 ? 'checked=""' : ''  }}> Включён
            </label>
        </div>
        <div class="form-group">
            <label for="thumbnail">Изображение</label>
            <input type="file" id="file_name" name="file_name">
            <p class="help-block">Форматы: <b>jpg, png, gif</b>. Размер: <b>1920px * 350px</b>. Программа приведёт изображение к этому разрешению автоматически без сохранения пропорций сторон.</p>
        </div>
        <div class="form-group">
            <label for="description_1">Описание (строка 1)</label>
            <input type="text" placeholder="Описание (строка 1)" id="description_1" name="description_1" class="form-control" value="{{ old('description_1', isset($slider) ? $slider->description_1 : '') }}">
        </div>
        <div class="form-group">
            <label for="description_2">Описание (строка 2)</label>
            <input type="text" placeholder="Описание (строка 2)" id="description_2" name="description_2" class="form-control" value="{{ old('description_2', isset($slider) ? $slider->description_2 : '') }}">
        </div>
        <div class="form-group">
            <label for="url">Ссылка (полная)</label>
            <input type="text" placeholder="Ссылка (полная)" id="url" name="url" class="form-control" value="{{ old('url', isset($slider) ? $slider->url : '') }}">
        </div>
        <div class="form-group">
            <label for="url">Текст кнопки</label>
            <input type="text" placeholder="Текст кнопки" id="btn_text" name="btn_text" class="form-control" value="{{ old('btn_text', isset($slider) ? $slider->btn_text : 'Узнать подробнее') }}">
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
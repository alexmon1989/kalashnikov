<form role="form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Описание</label>
            <input type="title" placeholder="Описание" id="description" name="description" class="form-control" value="{{ old('description', isset($image) ? $image->description : $category->title) }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_on_main" value="1" {{ old('is_on_main', isset($image) ? $image->is_on_main : 0) == 1 ? 'checked=""' : ''  }}> Показывать в виджете на главной странице
            </label>
        </div>
        <div class="form-group">
            <label for="file_name">Изображение</label>
            <input type="file" id="file_name" name="file_name">
            <p class="help-block">Форматы: <b>jpg, png, gif</b>. Размер: <b>973px * 615px</b>. Программа приведёт изображение к этому разрешению автоматически без сохранения пропорций сторон.</p>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
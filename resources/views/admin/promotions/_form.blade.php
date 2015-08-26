<form role="form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="title" placeholder="Название" id="title" name="title" class="form-control" value="{{ old('title', isset($promotion) ? $promotion->title : '') }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="enabled" value="1" {{ old('enabled', isset($promotion) ? $promotion->enabled : 0) == 1 ? 'checked=""' : ''  }}> Включено
            </label>
        </div>
        <div class="form-group">
            <label for="thumbnail">Изображение</label>
            <input type="file" id="thumbnail" name="thumbnail">
            <p class="help-block">Форматы: <b>jpg, png, gif</b>. Размер: <b>973px * 615px</b>. Программа приведёт изображение к этому разрешению автоматически без сохранения пропорций сторон.</p>
        </div>
        <div class="form-group">
            <label for="preview_text_small">Текст превью</label>
            <textarea id="preview_text" name="preview_text" class="form-control ckeditor">{{ old('preview_text', isset($promotion) ? $promotion->preview_text : '') }}</textarea>
        </div>
        <div class="form-group">
            <label for="full_text">Текст полный</label>
            <textarea id="full_text" name="full_text" rows="10" cols="80" class="form-control ckeditor">{{ old('full_text', isset($promotion) ? $promotion->full_text : '') }}</textarea>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
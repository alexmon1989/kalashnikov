<form role="form" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="title" placeholder="Название" id="title" name="title" class="form-control" value="{{ old('title', isset($vacancy) ? $vacancy->title : '') }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_on_main" value="1" {{ old('enabled', isset($vacancy) ? $vacancy->enabled : 0) == 1 ? 'checked=""' : ''  }}> Включено
            </label>
        </div>
        <div class="form-group">
            <label for="full_text">Описание</label>
            <textarea id="full_text" name="full_text" rows="10" cols="80" class="form-control ckeditor">{{ old('full_text', isset($vacancy) ? $vacancy->full_text : '') }}</textarea>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
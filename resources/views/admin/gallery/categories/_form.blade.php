<form role="form" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="title" placeholder="Название" id="title" name="title" class="form-control" value="{{ old('title', isset($category) ? $category->title : '') }}">
        </div>
    </div><!-- /.box-body -->

    <div class="form-group">
        <label for="full_text">Описание</label>
        <textarea id="description" name="description" rows="10" cols="80" class="form-control ckeditor">{{ old('full_text', isset($category) ? $category->description : '') }}</textarea>
    </div>

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
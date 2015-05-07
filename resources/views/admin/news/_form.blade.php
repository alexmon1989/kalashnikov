<form role="form">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="title" placeholder="Название" id="title" class="form-control" value="{{ old('title', isset($news) ? $news->title : '') }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_on_main"> Показывать в виджете на главной странице
            </label>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
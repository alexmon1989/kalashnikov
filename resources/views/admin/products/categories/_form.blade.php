<form role="form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="title" placeholder="Название" id="title" name="title" class="form-control" value="{{ old('title', isset($category) ? $category->title : '') }}">
        </div>
        <div class="form-group">
            <label for="parent_id">Родительская категория</label>
            <select class="form-control" name="parent_id" id="parent_id">
                <option></option>
                @foreach($parent_categories as $item)
                <option value="{{ $item->id }}" {{ old('parent_id', isset($category) ? $category->parent_id : NULL) == $item->id ? 'selected=""' : ''  }}>{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="enabled" value="1" {{ old('enabled', isset($category) ? $category->enabled : 0) == 1 ? 'checked=""' : ''  }}> Включено
            </label>
        </div>
        <div class="form-group">
            <label for="file_name">Изображение</label>
            <input type="file" id="file_name" name="file_name">
            <p class="help-block">Форматы: <b>jpg, png, gif</b>. Размер: <b>487px * 308px</b>. Программа приведёт изображение к этому разрешению автоматически без сохранения пропорций сторон.</p>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', isset($category) ? $category->description : '') }}</textarea>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
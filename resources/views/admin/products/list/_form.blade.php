<form role="form" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" placeholder="Название" id="title" name="title" class="form-control" value="{{ old('title', isset($product) ? $product->title : '') }}">
        </div>

        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" placeholder="Артикул" id="vendor_code" name="vendor_code" class="form-control" value="{{ old('vendor_code', isset($product) ? $product->vendor_code : '') }}">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" rows="10" cols="80" class="form-control ckeditor">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id" id="category_id">
                <option></option>
                @foreach($categories as $item)
                <optgroup label="{{ $item->title }}">
                    @foreach($item->childCategories as $childItem)
                    <option value="{{ $childItem->id }}" {{ old('category_id', isset($product) ? $product->category->id : NULL) == $childItem->id ? 'selected=""' : ''  }}>{{ $childItem->title }}</option>
                    @endforeach
                </optgroup>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="manufacturer_id">Производитель</label>
            <select class="form-control" name="manufacturer_id" id="manufacturer_id">
                <option></option>
                @foreach($manufacturers as $item)
                    <option value="{{ $item->id }}" {{ old('manufacturer_id', isset($product) ? $product->manufacturer->id : NULL) == $item->id ? 'selected=""' : ''  }}>{{ $item->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="provider_id">Поставщик</label>
            <select class="form-control" name="provider_id" id="provider_id">
                <option></option>
                @foreach($providers as $item)
                    <option value="{{ $item->id }}" {{ old('provider_id', isset($product) ? $product->provider->id : NULL) == $item->id ? 'selected=""' : ''  }}>{{ $item->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="packing">Тип упаковки</label>
            <input type="title" placeholder="Тип упаковки" id="packing" name="packing" class="form-control" value="{{ old('packing', isset($product) ? $product->packing : '') }}">
        </div>

        <div class="form-group">
            <label for="weight">Вес</label>
            <input type="title" placeholder="Вес" id="weight" name="weight" class="form-control" value="{{ old('weight', isset($product) ? $product->weight : '') }}">
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="enabled" value="1" {{ old('enabled', isset($product) ? $product->enabled : 0) == 1 ? 'checked=""' : ''  }}> Включено
            </label>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
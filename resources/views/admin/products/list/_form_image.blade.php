<form role="form" method="post" action="{{ action('Admin\ProductsController@postCreateImage', ['id' => $product->id]) }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="file_name">Выбор файла</label>
        <input type="file" id="file_name" name="file_name">
        <p class="help-block">Выбирайте файл со своего компьютера и нажимайте кнопку "Сохранить изображение". Изображение будет трансформировано к размеру 550px * 550px.</p>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить изображение</button>
    </div>
</form>
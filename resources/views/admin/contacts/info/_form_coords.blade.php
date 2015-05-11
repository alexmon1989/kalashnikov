<form role="form" method="post" action="{{ action('Admin\ContactsInfoController@postSaveCoords') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Широта</label>
            <input type="title" placeholder="Широта" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', Memory::get('contacts.latitude')) }}">
        </div>
        <div class="form-group">
            <label for="title">Долгота</label>
            <input type="title" placeholder="Долгота" id="longitude" name="longitude" class="form-control" value="{{ old('longitude', Memory::get('contacts.longitude')) }}">
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
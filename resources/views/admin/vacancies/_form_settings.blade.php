<form role="form" method="post" action="{{ action('Admin\VacanciesController@postSaveSettings') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="input-group">
        <div class="input-group-btn">
            <button class="btn btn-danger" type="submit">Сохранить</button>
        </div>
        <!-- /btn-group -->
        <input type="text" name="email" class="form-control" placeholder="Введите E-Mail, на который отправлять резюме" value="{{ old('email', Memory::get('vacancies.email', 'hr@kalashnikovcom.ru')) }}">
    </div>
</form>
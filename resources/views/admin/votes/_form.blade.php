<form role="form" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
        <div class="form-group">
            <label for="question">Вопрос</label>
            <input type="text" placeholder="Вопрос" id="question" name="question" class="form-control" value="{{ old('question', isset($vote) ? $vote->question : '') }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_on_main" value="1" {{ old('is_on_main', isset($vote) ? $vote->is_on_main : 0) == 1 ? 'checked=""' : ''  }}> Отображать на главной
            </label>
        </div>
        @for($i = 1; $i < 11; $i++)
        <div class="form-group">
            <label for="answer_{{ $i }}">Ответ {{ $i }}</label>
            <input type="text" placeholder="Ответ {{ $i }}" id="answer_{{ $i }}" name="answer_{{ $i }}" class="form-control" value="{{ old('answer_'.$i, (isset($vote) and isset($answers[$i-1])) ? $answers[$i-1]->answer : '') }}">
            @if (isset($answers[$i-1]))
            <p class="help-block">Количество проголосовавших за этот вариант: <strong>{{ $answers[$i-1]->count }}</strong></p>
            @endif
        </div>
        @endfor

        @if (Request::segment(3) == 'edit')
        <div class="checkbox">
            <label>
                <input type="checkbox" name="reset" value="1" {{ old('reset', 0) == 1 ? 'checked=""' : ''  }}> Сбросить результаты и разрешить снова голосовать посетителям
            </label>
        </div>
        @endif

    </div><!-- /.box-body -->

    <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Сохранить</button>
    </div>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="headline">
            <h2>Опрос</h2>
            <a name="votes"></a>
        </div>

        @if (Session::get('errors'))
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>Ошибка!</strong>
            @foreach (Session::get('errors')->getMessages() as $msg)
                @foreach ($msg as $value)
                    {{ $value }}<br>
                @endforeach
            @endforeach
        </div>
        @endif

        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>Спасибо!</strong>. {{ Session::get('success') }}
        </div>
        @endif

        <form method="post" class="sky-form" action="{{ action('Marketing\MainController@vote') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <header>{{ $vote->question }}</header>

            <fieldset>
                <section>
                    <div class="row">
                        @foreach($answers as $key => $answer)
                        <label class="radio">
                            <input type="radio" name="answer" value="{{ $answer->answer }}" {{ $key==0 ? 'checked=""' : '' }}><i class="rounded-x"></i>{{ $answer->answer }}
                        </label>
                        @endforeach
                    </div>
                </section>
            </fieldset>
            <footer>
                <button class="btn-u" type="submit">Голосовать</button>
            </footer>
        </form>
    </div>
</div>
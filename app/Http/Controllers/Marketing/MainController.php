<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vote;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

/**
 * Контроллер для главной страницы
 */
class MainController extends Controller {

	/**
	 * Отображение главной страницы
	 */
	public function index()
	{
        // Главная статья
        $data['article'] = Article::where('type', '=', 'main_article')->first();

        return view('marketing.main.page', $data);
	}

    /**
     * Обработчик POST-запроса на голосование
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function vote(Request $request)
    {
        // Получаем опрос и его ответы
        $vote = Vote::where('is_on_main', '=', TRUE)->first();

        // Проверяем может ли юзер голосовать
        $cookie = $request->cookie('vote_'.$vote->id);
        if ($cookie == $vote->hash)
        {
            return redirect()->to('main#votes')->withErrors('Вы уже проголосовали.');
        }

        $answers = json_decode($vote->answers_json);

        // Правило валидации для проверки, что такой вариант существует
        Validator::extend('answer_exist', function($attribute, $value, $parameters) use ($answers)
        {
            // Перебираем ответы в поисках нашего
            foreach ($answers as $answer)
            {
                if ($answer->answer == $value)
                {
                    return TRUE;
                }
            }
            return FALSE;
        });

        // Правила и сообщения валидации
        $rules = array(
            'answer' => 'required|answer_exist',
        );
        $messages = array(
            'answer.required' => 'Вы не выбрали вариант для голоса.',
            'answer.answer_exist' => 'Такого варианта не существует.',
        );

        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails())
        {
            return redirect()->to('main#votes')->withErrors($v->errors());
        }

        // Добавляем голос варианту
        foreach ($answers as &$answer)
        {
            if ($answer->answer == $request->get('answer'))
            {
                $answer->count += 1;
            }
        }
        unset($answer);

        // Сохраняем опрос
        $vote->answers_json = json_encode($answers);
        $vote->save();

        // Ставим "метку" на комп. юзера, чтоб он больше не мог голосовать в этом опросе
        // Возвращаем назад на главную к опросу
        return redirect()->to('main#votes')->with('success', 'Голос учтён.')->withCookie(cookie()->forever('vote_'.$vote->id, $vote->hash));
    }

}

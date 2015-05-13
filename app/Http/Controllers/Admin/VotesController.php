<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vote;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVotesRequest;
use Intervention\Image\Facades\Image;

class VotesController extends Controller {

	/**
	 * Отображение списка опросов.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data['votes'] = Vote::all();

        return view('admin.votes.index', $data);
	}

    /**
     * Страница создания опроса.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('admin.votes.create');
    }

    /**
     * Обработчик запроса на создание опроса
     *
     * @param StoreVotesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StoreVotesRequest $request)
    {
        // Создаём голосование
        $vote = new Vote;
        $vote->question = $request->get('question');
        $vote->is_on_main = $request->get('is_on_main', FALSE);
        $vote->hash = bcrypt(str_random(30));

        // Получаем ответы и преобразовываем их в json
        $answers = [];
        for($i = 1; $i < 11; $i++)
        {
            if (trim($request->get('answer_'.$i)) != '')
            {
                $answers[] = ['answer' => $request->get('answer_'.$i), 'count' => 0];
            }
        }
        $vote->answers_json = json_encode($answers);

        // Если опрос должен быть на главной, то остальные - нет
        if ($vote->is_on_main == TRUE)
        {
            $votes = Vote::all();
            foreach ($votes as $item) {
                $item->is_on_main = FALSE;
                $item->save();
            }
        }

        // Сохраняем
        $vote->save();

        return redirect()->action('Admin\VotesController@getEdit', array('id' => $vote->id))
            ->with('success', 'Опрос успешно создан.');
    }

    /**
     * Страница редактирования голосования.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['vote'] = $this->findVote($id);

        // Ответы
        $data['answers'] = json_decode($data['vote']->answers_json);

        return view('admin.votes.edit', $data);
    }

    /**
     * Обработчик запроса на изменение данных опроса
     *
     * @param StoreVotesRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StoreVotesRequest $request, $id)
    {
        $vote = $this->findVote($id);
        $vote->question = $request->get('question');
        $vote->is_on_main = $request->get('is_on_main', FALSE);

        // Проверяем был ли сброс голосования
        if ($request->get('reset') == TRUE)
        {
            $vote->hash = bcrypt(str_random(30));
            for($i = 1; $i < 11; $i++)
            {
                if (trim($request->get('answer_'.$i)) != '')
                {
                    $answers[] = ['answer' => $request->get('answer_'.$i), 'count' => 0];
                }
            }
        }
        else
        {
            $answers_old = json_decode($vote->answers_json);
            for($i = 1; $i < 11; $i++)
            {
                if (trim($request->get('answer_'.$i)) != '')
                {
                    $answers[] = ['answer' => $request->get('answer_'.$i), 'count' => $answers_old[$i-1]->count];
                }
            }
        }
        $vote->answers_json = json_encode($answers);

        // Если опрос должен быть на главной, то остальные - нет
        if ($vote->is_on_main == TRUE)
        {
            $votes = Vote::where('id', '<>', $id)->get();
            foreach ($votes as $item) {
                $item->is_on_main = FALSE;
                $item->save();
            }
        }

        // Сохраняем
        $vote->save();

        return redirect()->action('Admin\VotesController@getEdit', array('id' => $vote->id))
            ->with('success', 'Опрос успешно изменён.');
    }

    /**
     * Удаление опроса
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
        $vote = $this->findVote($id);
        if ($vote->is_on_main == TRUE)
        {
            return redirect()->back()->withErrors('Опрос не может быть удалён пока он отображется на главной странице. Сначала назначьте другой опрос для этого.');
        }

        $vote->delete();

        return redirect()->back()->with('success', 'Опрос успешно изменён.');
    }

    /**
     * Ищет голосование или переадресовывает на 404.
     *
     * @param $id
     * @return mixed
     */
    private function findVote($id)
    {
        // Ищем голосования
        $vote = Vote::find($id);
        if (empty($vote))
        {
            abort(404);
        }

        return $vote;
    }

}

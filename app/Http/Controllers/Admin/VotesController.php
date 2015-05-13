<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vote;
use Illuminate\Http\Request;

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

    public function getDelete($id)
    {
        $this->findVote($id);
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

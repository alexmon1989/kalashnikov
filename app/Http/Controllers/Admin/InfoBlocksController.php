<?php namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreArticlesRequest;

class InfoBlocksController extends AdminController {

	/**
	 * Отображение страницы редактирования инфоблоков
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // Получение данных блоков
        $data['left_block'] = Article::where('type', '=', 'service_left')->first();
        $data['middle_block'] = Article::where('type', '=', 'service_middle')->first();
        $data['right_block'] = Article::where('type', '=', 'service_right')->first();

        return view('admin.info-blocks.index', $data);
	}

    /**
     * Обработчик запроса на сохранение данных
     */
    public function postIndex(StoreArticlesRequest $request)
    {
        $article = Article::firstOrNew(['type' => Input::get('type')]);
        $article->title = trim(Input::get('title'));
        $article->full_text = trim(Input::get('full_text'));
        $article->save();

        return redirect()->action('Admin\InfoBlocksController@getIndex')
            ->with('success', 'Блок успешно сохранен.');
    }

}

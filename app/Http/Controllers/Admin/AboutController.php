<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Article;
use App\Http\Requests\StoreArticlesRequest;
use Illuminate\Support\Facades\Input;

class AboutController extends AdminController {

    protected $articleType = 'about';

	/**
	 * Отображает страницу редактирования статьи "О компании"
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // Получение данных блоков
        $data['article'] = Article::where('type', '=', $this->articleType)
                                  ->first();

        return view('admin.about.index', $data);
	}

    /**
     * Обработчик запроса на редактирования данных
     */
    public function postIndex(StoreArticlesRequest $request)
    {
        $article = Article::firstOrNew(['type' => $this->articleType]);
        $article->full_text = Input::get('full_text');
        $article->save();

        return redirect()->action('Admin\AboutController@getIndex')
                         ->with('success', 'Статья успешно сохранена.');
    }

}

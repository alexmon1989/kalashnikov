<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Article;
use App\Http\Requests\StoreArticlesRequest;

class MainArticleController extends Controller {

    protected $articleType = 'main_article';

	/**
	 * Отображает форму для редактирования главной статьи
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $data['article'] = Article::where('type', '=', $this->articleType)->first();

		return view('admin.main-article.index', $data);
	}

    /**
     * Обработчик запроса на сохранение статьи
     *
     * @param StoreArticlesRequest $request
     * @return Response
     */
    public function postIndex(StoreArticlesRequest $request)
    {
        $article = Article::firstOrNew(['type' => $this->articleType]);
        $article->title = trim(Input::get('title'));
        $article->full_text = trim(Input::get('full_text'));
        $article->save();

        return redirect()->action('Admin\MainArticleController@getIndex')
                         ->with('success', 'Статья успешно сохранена.');
    }
}

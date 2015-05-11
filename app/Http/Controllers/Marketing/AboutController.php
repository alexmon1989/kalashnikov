<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;

class AboutController extends Controller {

    protected $articleType = 'about';

	/**
	 * Отображает страницу "О Компании"
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // Получение данных блоков
        $data['article'] = Article::where('type', '=', $this->articleType)
                                  ->first();

        return view('marketing.about.index', $data);
	}

}

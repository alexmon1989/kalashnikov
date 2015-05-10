<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;

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
}

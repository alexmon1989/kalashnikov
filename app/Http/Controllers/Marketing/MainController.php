<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * Контроллер для главной страницы
 */
class MainController extends Controller {

	/**
	 * Отображение главной страницы
	 */
	public function index()
	{
        return view('marketing.main.page');
	}
}

<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\News;

class NewsController extends Controller {

	/**
	 * Отображает список новостей
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $data['news'] = News::all();

		return view('admin.news.index', $data);
	}

	/**
	 * Отображает страницу редактирования новсоти
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
        $data['news'] = News::find($id);

        if (empty($data['news'])) {
            abort(404);
        }

        return view('admin.news.edit', $data);
	}

	/**
	 * Обработчик запроса на редактирование новости
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{
		//
	}

	/**
	 * Отображает страницу создания новости
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		//
	}

	/**
	 * Обработчик запроса на создание новости
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		//
	}

	/**
	 * Удаляет новость
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
		//
	}

}

<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller {

	/**
	 * Отображение индексной страницы новостей
	 */
	public function getIndex()
	{
        $data['news'] = News::orderBy('created_at', 'DESC')->paginate(4);
        return view('marketing.news.index', $data);
	}

	/**
	 * Отображение одной новости
	 *
	 * @param  int  $id  id новости в таблице БД
	 * @return Response
	 */
	public function getShow($id)
	{
        // Получаем новость из БД
        $data['news'] = News::find($id);

        if (!empty($data['news'])){
            // Последние 3 новости
            $data['latest_news'] = News::where('id', '<>', $id)
                                        ->orderBy('created_at', 'DESC')
                                        ->take(3)
                                        ->get();

            // Отображаем представление
            return view('marketing.news.show', $data);
        } else {
            abort(404);
        }
	}

}

<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\StoreArticlesRequest;
use App\Http\Requests\StoreCoordsRequest;
use Illuminate\Support\Facades\Input;
use Orchestra\Support\Facades\Memory;

class ContactsInfoController extends Controller {

	/**
	 * Отображение страницы редактирования контактной информации.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // Контактные данные
        $data['contacts_article'] = Article::where('type', '=', 'contacts_article')
            ->first();
        $data['contacts_widget'] = Article::where('type', '=', 'contacts_widget')
            ->first();

		return view('admin.contacts.info.index', $data);
	}

    /**
     * Действие для обработки запроса на редактирование статьи.
     *
     * @param StoreArticlesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postIndex(StoreArticlesRequest $request)
    {
        $article = Article::firstOrNew(['type' => Input::get('type')]);
        $article->full_text = Input::get('full_text');
        $article->save();

        return redirect()->action('Admin\ContactsInfoController@getIndex')
            ->with('success', 'Данные успешно сохранены.');
    }

    /**
     * Обработчик запроса на редактирование координат
     */
    public function postSaveCoords(StoreCoordsRequest $request)
    {
        // Сохраняем координаты в таблице настроек
        Memory::put('contacts.latitude', Input::get('latitude'));
        Memory::put('contacts.longitude', Input::get('longitude'));

        return redirect()->action('Admin\ContactsInfoController@getIndex')
            ->with('success', 'Данные успешно сохранены.');
    }

}

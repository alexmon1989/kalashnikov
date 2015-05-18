<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductProvider;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductProvidersRequest;

class ProductProvidersController extends AdminController {

	/**
	 * Отображение списка поставщиков.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data['providers'] = ProductProvider::all();

        return view('admin.products.providers.index', $data);
	}

    /**
     * Отображение страницы создания поставщика.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('admin.products.providers.create');
    }

    /**
     * Обработчик запроса на создание поставщика.
     *
     * @param StoreProductProvidersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StoreProductProvidersRequest $request)
    {
        $provider = new ProductProvider;
        $provider->title = trim($request->get('title'));
        $provider->save();

        return redirect()->action('Admin\ProductProvidersController@getEdit', array('id' => $provider->id))
            ->with('success', 'Поставщик успешно создан.');
    }

    /**
     * Отображение страницы редактирования поставщика.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['provider'] = $this->findProvider($id);

        return view('admin.products.providers.edit', $data);
    }

    /**
     * Запрос на редактирование данных поставщика.
     *
     * @param StoreProductProvidersRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StoreProductProvidersRequest $request, $id)
    {
        $provider = $this->findProvider($id);
        $provider->title = trim($request->get('title'));
        $provider->save();

        return redirect()->action('Admin\ProductProvidersController@getEdit', array('id' => $provider->id))
            ->with('success', 'Поставщик успешно отредактирован.');
    }

    /**
     * Удаляение поставщика
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
        $provider = $this->findProvider($id);

        $provider->delete();

        return redirect()->back()->with('success', 'Поставщик успешно удалён.');
    }

    /**
     * Поиск постащика в БД по ид или переадресация на 404
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    private function findProvider($id)
    {
        // Ищем постащика
        $provider = ProductProvider::find($id);
        if (empty($provider))
        {
            abort(404);
        }

        return $provider;
    }

}

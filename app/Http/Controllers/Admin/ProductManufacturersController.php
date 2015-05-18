<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductManufacturer;
use App\ProductProvider;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductManufacturersRequest;

class ProductManufacturersController extends AdminController {

    /**
     * Отображение списка производителей.
     *
     * @return Response
     */
    public function getIndex()
    {
        $data['manufacturers'] = ProductManufacturer::all();

        return view('admin.products.manufacturers.index', $data);
    }

    /**
     * Отображение страницы создания производителя.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('admin.products.manufacturers.create');
    }

    /**
     * Обработчик запроса на создание производителя.
     *
     * @param StoreProductManufacturersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StoreProductManufacturersRequest $request)
    {
        $manufacturer = new ProductManufacturer;
        $manufacturer->title = trim($request->get('title'));
        $manufacturer->save();

        return redirect()->action('Admin\ProductManufacturersController@getEdit', array('id' => $manufacturer->id))
            ->with('success', 'Производитель успешно создан.');
    }

    /**
     * Отображение страницы редактирования производителя.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['manufacturer'] = $this->findManufacturer($id);

        return view('admin.products.manufacturers.edit', $data);
    }

    /**
     * Запрос на редактирование данных производителя.
     *
     * @param StoreProductManufacturersRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StoreProductManufacturersRequest $request, $id)
    {
        $manufacturer = $this->findManufacturer($id);
        $manufacturer->title = trim($request->get('title'));
        $manufacturer->save();

        return redirect()->action('Admin\ProductManufacturersController@getEdit', array('id' => $manufacturer->id))
            ->with('success', 'Производитель успешно отредактирован.');
    }

    /**
     * Удаляение производителя
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
        $manufacturer = $this->findManufacturer($id);

        $manufacturer->delete();

        return redirect()->back()->with('success', 'Производитель успешно удалён.');
    }

    /**
     * Поиск производителя в БД по ид или переадресация на 404
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    private function findManufacturer($id)
    {
        // Ищем производителя
        $manufacturer = ProductManufacturer::find($id);
        if (empty($manufacturer))
        {
            abort(404);
        }

        return $manufacturer;
    }

}

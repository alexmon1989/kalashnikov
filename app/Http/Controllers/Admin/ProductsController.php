<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use App\Product;
use App\ProductCategory;
use App\ProductManufacturer;
use App\ProductProvider;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductsRequest;

class ProductsController extends AdminController {

	/**
	 * Отображает список продуктов.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data['products'] = Product::with(['category', 'manufacturer', 'provider', 'images'])->get();

        return view('admin.products.list.index', $data);
	}

    /**
     * Отображение страницы добавления продукта.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        $this->shareDataToView();

        return view('admin.products.list.create');
    }

    /**
     * Обработчик запроса на создание продукта.
     *
     * @param StoreProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StoreProductsRequest $request)
    {
        // Создаём продукт, заполняем данными, сохраняем
        $product = new Product;
        $product->title = trim($request->get('title'));
        $product->description = trim($request->get('description'));
        $product->category_id = $request->get('category_id');
        $product->manufacturer_id = $request->get('manufacturer_id');
        $product->provider_id = $request->get('provider_id');
        $product->packing = trim($request->get('packing'));
        $product->weight = trim($request->get('weight'));
        $product->enabled = $request->get('enabled', FALSE);
        $product->save();

        return redirect()->action('Admin\ProductsController@getEdit', array('id' => $product->id))
            ->with('success', 'Продукт успешно отредактирован.');
    }

    /**
     * Отображение страницы редактирования продукта.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['product'] = $this->findProduct($id);

        $this->shareDataToView();

        return view('admin.products.list.edit', $data);
    }

    /**
     * Обработчик запроса на редактирование продукта.
     *
     * @param StoreProductsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StoreProductsRequest $request, $id)
    {
        $product = $this->findProduct($id);
        $product->title = trim($request->get('title'));
        $product->description = trim($request->get('description'));
        $product->category_id = $request->get('category_id');
        $product->manufacturer_id = $request->get('manufacturer_id');
        $product->provider_id = $request->get('provider_id');
        $product->packing = trim($request->get('packing'));
        $product->weight = trim($request->get('weight'));
        $product->enabled = $request->get('enabled', FALSE);
        $product->save();

        return redirect()->action('Admin\ProductsController@getEdit', array('id' => $id))
            ->with('success', 'Продукт успешно отредактирован.');
    }

    public function getDelete($id)
    {

    }

    /**
     * Передаёт в шаблон данные: категории продутвоы, производители, поставщики.
     */
    private function shareDataToView()
    {
        $data['categories'] = ProductCategory::with('childCategories')
            ->whereNull('parent_id')
            ->orderBy('title', 'ASC')
            ->get();
        $data['manufacturers'] = ProductManufacturer::orderBy('title', 'ASC')->get();
        $data['providers'] = ProductProvider::orderBy('title', 'ASC')->get();

        view()->share($data);
    }

    /**
     * Поиск продукта в БД по ид или переадресация на 404
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    private function findProduct($id)
    {
        // Ищем продукт
        $product = Product::find($id);
        if (empty($product))
        {
            abort(404);
        }

        return $product;
    }

}

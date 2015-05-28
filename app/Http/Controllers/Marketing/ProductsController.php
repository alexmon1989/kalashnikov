<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductCategory;
use App\ProductManufacturer;
use App\ProductProvider;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller {

    public function __construct()
    {
        $data['encrypted_csrf_token'] = Crypt::encrypt(csrf_token());
        view()->share($data);
    }

	/**
	 * Отображает список категорий.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $data['categories'] = ProductCategory::with('childCategories')
            ->whereNull('parent_id')
            ->where('enabled', '=', TRUE)
            ->orderBy('title', 'ASC')
            ->get();

		return view('marketing.products.index', $data);
	}

    /**
     * Отображает список продуктов категории.
     *
     * @param $id
     * @return Response
     */
    public function getCategory($id)
    {
        // Ищем категорию
        $data['category'] = ProductCategory::with('parentCategory')
                                ->whereNotNull('parent_id')
                                ->where('enabled', '=', TRUE)
                                ->find($id);
        if (empty($data['category']))
        {
            abort(404);
        }

        // Передаём в вид данные
        $this->setCategoryDataToView($data['category']);

        return view('marketing.products.category.category', $data);
    }

    /**
     * Отображает страницу продукта.
     *
     * @param $id
     * @return Response
     */
    public function getShow($id)
    {
        $data['product'] = Product::with('images')->where('enabled', '=', TRUE)->find($id);
        if (empty($data['product']))
        {
            abort(404);
        }

        return view('marketing.products.show.show', $data);
    }

    /**
     * Добавление в вид вспомогательных данных категории (продукты, фильтры и пр.).
     *
     * @param ProductCategory $category
     */
    private function setCategoryDataToView(ProductCategory $category)
    {
        // Данные для фильтров
        $data['manufacturers'] = ProductManufacturer::orderBy('title')->whereHas('products', function($q) use ($category)
        {
            $q->where('category_id', '=', $category->id);

        })->get();
        $data['providers'] = ProductProvider::orderBy('title')->whereHas('products', function($q) use ($category)
        {
            $q->where('category_id', '=', $category->id);

        })->get();

        // Все категории
        $data['categories'] = ProductCategory::with('childCategories')
            ->whereNull('parent_id')
            ->where('enabled', '=', TRUE)
            ->orderBy('title')
            ->get();

        // Продукты категории
        $data['products'] = $category->products()
            ->with('images', 'manufacturer', 'provider')
            ->where('enabled', '=', TRUE)
            ->orderBy('title', 'ASC');

        // Данные, которые пользователь выбрал в фильтрах для ссылок пагинации,
        // а также доп фильтрация на их основе в продуктах
        $data['pagination_params'] = [];
        if (trim(Input::get('title', '')) != '')
        {
            $data['pagination_params']['title'] = Input::get('title');
            $data['products'] = $data['products']->where('title', 'LIKE', Input::get('title').'%');
        }
        if (Input::get('manufacturer_id'))
        {
            $data['pagination_params']['manufacturer_id'] = Input::get('manufacturer_id');
            $data['products'] = $data['products']->whereIn('manufacturer_id', Input::get('manufacturer_id'));
        }
        if (Input::get('provider_id'))
        {
            $data['pagination_params']['provider_id'] = Input::get('provider_id');
            $data['products'] = $data['products']->whereIn('provider_id', Input::get('provider_id'));
        }

        // Постраничный вывод
        $data['products'] = $data['products']->paginate(9);

        view()->share($data);
    }

}

<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductCategory;
use App\ProductManufacturer;
use App\ProductProvider;
use Debugbar;
use Illuminate\Http\Request;

class ProductsController extends Controller {

	/**
	 * Отображает список категорий.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $data['categories'] = ProductCategory::whereNull('parent_id')
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
    public function getCategory(Request $request, $id)
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

    }

    /**
     * Добавление в вид вспомогательных данных категории (продукты, фильтры и пр.)
     *
     * @param ProductCategory $category
     */
    private function setCategoryDataToView(ProductCategory $category)
    {
        // Все категории
        $data['categories'] = ProductCategory::with('childCategories')
            ->whereNull('parent_id')
            ->where('enabled', '=', TRUE)
            ->orderBy('title')
            ->get();

        // Продукты категории
        $data['products'] = $category->products()
            ->where('enabled', '=', TRUE)
            ->orderBy('title', 'ASC')
            ->get();

        // Id продуктов для последующего
        $productManufacturersIds = [];
        $productProvidersIds = [];
        foreach ($data['products'] as $product)
        {
            $productManufacturersIds[] = $product->manufacturer_id;
            $productProvidersIds[] = $product->provider_id;
        }

        // Данные для фильтров
        $data['manufacturers'] = ProductManufacturer::whereIn('id', $productManufacturersIds)->orderBy('title')->get();
        $data['providers'] = ProductProvider::whereIn('id', $productProvidersIds)->orderBy('title')->get();

        view()->share($data);
    }

}

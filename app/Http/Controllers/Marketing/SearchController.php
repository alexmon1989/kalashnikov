<?php namespace App\Http\Controllers\Marketing;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class SearchController extends Controller {

    private $sources = array(
        'news',
        'articles' => array(
            'about', 'contacts_article'
        ),
        'products',
        'product_categories'
    );

	/**
	 * Действие для поиска и отображения результатов.
	 *
	 * @return Response
	 */
	public function getIndex(Request $request)
	{
        // Если не задан поиск
        if (!$request->get('q') or strlen($request->get('q')) < 3)
        {
            return view('marketing.search.index');
        }

        // Начинаем поиск
        $q = $request->get('q');
        // по новостям
        if (in_array('news', $this->sources))
        {
            $data['news'] = News::where('title', 'LIKE', "%{$q}%")
                ->orWhere('full_text', 'LIKE', "%{$q}%")
                ->orderBy('created_at', 'DESC')
                ->get();
        }


        // по страницам (в таблице articles)
        if (isset($this->sources['articles']))
        {
            $data['articles'] = Article::whereIn('type', $this->sources['articles'])
                ->where(function($query) use ($q)
                {
                    $query->where('title', 'LIKE', "%{$q}%")
                          ->orWhere('full_text', 'LIKE', "%{$q}%");
                })
                ->orderBy('created_at', 'DESC')
                ->get();
        }

        // по продуктам
        if (in_array('products', $this->sources))
        {
            $data['products'] = Product::with('images', 'manufacturer', 'provider', 'category')
                ->where('enabled', '=', TRUE)
                ->where(function($query) use ($q)
                {
                    $query->where('title', 'LIKE', "%{$q}%")
                        ->orWhere('description', 'LIKE', "%{$q}%")
                        ->orWhere('packing', 'LIKE', "%{$q}%");
                })
                ->orderBy('created_at', 'DESC')
                ->get();
        }

        // по категориям продуктов
        if (in_array('product_categories', $this->sources))
        {
            $data['product_categories'] = ProductCategory::with('childCategories')
                ->where('enabled', '=', TRUE)
                ->where(function($query) use ($q)
                {
                    $query->where('title', 'LIKE', "%{$q}%")
                          ->orWhere('description', 'LIKE', "%{$q}%");
                })
                ->orderBy('created_at', 'DESC')
                ->get();
        }

        // Всего результатов
        $resCount = 0;
        foreach($data as $value)
        {
            $resCount += count($value);
        }
        $data['res_count'] = $resCount;


        return view('marketing.search.index', $data);
	}

}

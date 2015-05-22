<?php namespace App\Http\Controllers\Marketing;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use Illuminate\Http\Request;

class SearchController extends Controller {

    private $sources = array(
        'news',
        'articles' => array(
            'footer_about', 'contacts_article'
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
        // Усли не задан поиск
        if (!$request->get('q') and strlen($request->get('q')) > 3)
        {
            return redirect()->back();
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

        return view('marketing.search.index', $data);
	}

}

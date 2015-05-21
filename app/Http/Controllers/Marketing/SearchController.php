<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
		return 12345;
	}

}

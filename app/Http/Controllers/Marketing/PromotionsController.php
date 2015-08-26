<?php namespace App\Http\Controllers\Marketing;

use App\Promotion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PromotionsController extends Controller
{
    /**
     * Отображение списка промо-акций
     *
     * @return Response
     */
    public function getIndex()
    {
        $data['promotions'] = Promotion::where('enabled', '=', TRUE)
                                        ->orderBy('created_at', 'DESC')
                                        ->paginate(4);
        return view('marketing.promotions.index', $data);
    }

    /**
     * Отображение одной промо-акции
     *
     * @param  int  $id  id промо-акции в таблице БД
     * @return Response
     */
    public function getShow($id)
    {
        // Получаем новость из БД
        $data['promotion'] = Promotion::where('enabled', '=', TRUE)->find($id);

        if (!empty($data['promotion'])){
            // Последние 3 новости
            $data['latest_promotions'] = Promotion::where('id', '<>', $id)
                ->where('enabled', '=', TRUE)
                ->orderBy('created_at', 'DESC')
                ->take(3)
                ->get();

            // Отображаем представление
            return view('marketing.promotions.show', $data);
        } else {
            abort(404);
        }
    }
}

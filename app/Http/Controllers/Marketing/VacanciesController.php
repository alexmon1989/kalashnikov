<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use App\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCVRequest;
use Illuminate\Support\Str;

class VacanciesController extends Controller {

	/**
	 * Отображение индексной страницы вакансий
	 */
	public function getIndex()
	{
        $data['vacancies'] = Vacancy::orderBy('created_at')->get();
        return view('marketing.vacancies.index', $data);
	}

    /**
     * Обработка заппроса на отправку файла с резюме.
     *
     * @param StoreCVRequest $request валидатор данных
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSendCV(StoreCVRequest $request)
    {
        // Сохраняем файл с резюме
        //Request::file('file_cv')->move('temp_cv', Str::random().);

        // Отправляем письмо

        // Удаляем файл

        //Возвращаем пользователя на предыд. страницу
        return redirect()->back()->with('success', 'Резюме успешно отправлено, с вами скоро свяжутся!');
    }

	/**
	 * Отображение одной новости
	 *
	 * @param  int  $id  id новости в таблице БД
	 * @return Response
	 */
	public function getShow($id)
	{
        // Получаем новость из БД
        $data['news'] = News::find($id);

        if (!empty($data['news'])){
            // Последние 3 новости
            $data['latest_news'] = News::where('id', '<>', $id)
                                        ->orderBy('created_at', 'DESC')
                                        ->take(3)
                                        ->get();

            // Отображаем представление
            return view('marketing.news.show', $data);
        } else {
            abort(404);
        }
	}

}

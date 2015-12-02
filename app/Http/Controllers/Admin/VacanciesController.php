<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\News;
use App\Vacancy;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreVacanciesRequest;
use App\Http\Requests\StoreVacanciesSettingsRequest;
use Intervention\Image\Facades\Image;
use Orchestra\Support\Facades\Memory;
use Illuminate\Support\Facades\File;

class VacanciesController extends AdminController {

	/**
	 * Отображает список вакансий
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $data['vacancies'] = Vacancy::where('title', '<>', 'Резерв')->get();

		return view('admin.vacancies.index', $data);
	}

	/**
	 * Отображает страницу редактирования вакансит
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
        $data['vacancy'] = Vacancy::find($id);

        if (empty($data['vacancy'])) {
            abort(404);
        }

        return view('admin.vacancies.edit', $data);
	}

	/**
	 * Обработчик запроса на редактирование вакансии
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(StoreVacanciesRequest $request, $id)
	{
        $vacancy = Vacancy::find($id);

        if (empty($vacancy)) {
            abort(404);
        }

        // меняем данные и сохраняем
        $vacancy->title = trim(Input::get('title'));
        $vacancy->full_text = Input::get('full_text');
        $vacancy->enabled = Input::get('enabled', 0);
        $vacancy->save();

        return redirect()->back()->with('success', 'Вакансия успешно сохранена.');
	}

	/**
	 * Отображает страницу создания вакансии
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        return view('admin.vacancies.add');
	}

	/**
	 * Обработчик запроса на создание вакансии
	 *
	 * @return Response
	 */
	public function postCreate(StoreVacanciesRequest $request)
	{
		$vacancy = new Vacancy;
        $vacancy->title = trim(Input::get('title'));
        $vacancy->full_text = Input::get('full_text');
        $vacancy->enabled = Input::get('is_on_main', 0);
        $vacancy->save();

        return redirect()->action('Admin\VacanciesController@getEdit', ['id' => $vacancy->id])
                        ->with('success', 'Вакансия успешно сохранена.');
	}

    /**
     * Действие для сохранения настроек модуля.
     *
     * @param StoreVacanciesSettings $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSaveSettings(StoreVacanciesSettingsRequest $request)
    {
        Memory::put('vacancies.email', $request->email);

        return redirect()->back()->with('success', 'Натсройки успешно сохранены.');
    }

	/**
	 * Удаляет вакансию
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
        $vacancy = Vacancy::find($id);

        if (empty($vacancy)) {
            abort(404);
        }

        $vacancy->delete();

        return redirect()->back()->with('success', 'Новость успешно удалена.');
	}

}

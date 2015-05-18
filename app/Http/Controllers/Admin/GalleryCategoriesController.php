<?php namespace App\Http\Controllers\Admin;

use App\GalleryCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGalleryCategoriesRequest;
use Illuminate\Support\Facades\Input;

class GalleryCategoriesController extends AdminController {

	/**
	 * Отображение списка категорий.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $data['categories'] = GalleryCategory::all();

		return view('admin.gallery.categories.index', $data);
	}

    public function getCreate()
    {
        return view('admin.gallery.categories.create');
    }

    /**
     * Отображение страницы редактирования категории
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['category'] = GalleryCategory::find($id);

        if (empty($data['category']))
        {
            abort(404);
        }

        return view('admin.gallery.categories.edit', $data);
    }

    /**
     * Обработчик запроса на редактирование данных категории
     *
     * @param StoreGalleryCategoriesRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StoreGalleryCategoriesRequest $request, $id)
    {
        // Ищем категорию
        $category = GalleryCategory::find($id);
        if (empty($category))
        {
            abort(404);
        }

        // Меняем данные и сохраняем
        $category->title = trim(Input::get('title'));
        $category->description = trim(Input::get('description'));
        $category->save();

        return redirect()->back()->with('success', 'Категория успешно сохранена.');
    }

    /**
     * Обработка запроса на создание категории
     *
     * @param StoreGalleryCategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StoreGalleryCategoriesRequest $request)
    {
        // Создаём и сохраняем
        $category = new GalleryCategory;
        $category->title = trim(Input::get('title'));
        $category->description = trim(Input::get('description'));
        $category->save();

        return redirect()->action('Admin\GalleryCategoriesController@getEdit', array('id' => $category->id))
            ->with('success', 'Категория успешно сохранена.');
    }

    /**
     * Удаление категории
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
        // Ищем категорию
        $category = GalleryCategory::find($id);
        if (empty($category))
        {
            abort(404);
        }

        // Удаляем все изображения категории с диска
        foreach ($category->images as $image)
        {
            unlink( public_path('img/gallery/'.$image->file_name) );
        }

        // Удаляем категорию из БД
        $category->delete();

        return redirect()->back()->with('success', 'Категория успешно удалена.');
    }

}

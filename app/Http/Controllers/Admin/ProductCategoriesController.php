<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductCategoriesRequest;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ProductCategoriesController extends Controller {

    // Расположение картинок
    protected $thumbDest;

    public function __construct()
    {
        $this->thumbDest = public_path('img/product_categories/');
    }

	/**
	 * Отображает страницу со списком категорий.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $data['categories'] = ProductCategory::all();

		return view('admin.products.categories.index', $data);
	}

    /**
     * Отображение страницы создания категории.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        $data['parent_categories'] = ProductCategory::whereNull('parent_id')->get();

        return view('admin.products.categories.create', $data);
    }

    /**
     * Обработчик запроса на создание категории.
     *
     * @param StoreProductCategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StoreProductCategoriesRequest $request)
    {
        $category = new ProductCategory();
        $category->title = trim($request->get('title'));
        if ($request->hasFile('file_name'))
        {
            $category->file_name = $this->saveImageToDisk();
        }
        else
        {
            $category->file_name = 'no.jpg';
        }
        if ($request->get('parent_id'))
        {
            $category->parent_id = (int) $request->get('parent_id');
        }
        $category->enabled = $request->get('enabled', FALSE);
        $category->description = trim($request->get('description'));
        $category->save();

        return redirect()->action('Admin\ProductCategoriesController@getEdit', array('id' => $category->id))
            ->with('success', 'Категория успешно создана.');
    }

    /**
     * Отображение страницы редактирования категории
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['category'] = $this->findCategory($id);
        $data['parent_categories'] = ProductCategory::whereNull('parent_id')->where('id', '<>', $id)->get();

        return view('admin.products.categories.edit', $data);
    }

    /**
     * Действие для обработки запроса на редактирование категории.
     *
     * @param StoreProductCategoriesRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StoreProductCategoriesRequest $request, $id)
    {
        $category = $this->findCategory($id);
        $category->title = trim($request->get('title'));
        if ($request->hasFile('file_name'))
        {
            // no.jpg удалять не надо, т.к. это изображение-заглушка
            $fileToDelete = $category->file_name != 'no.jpg' ? $category->file_name : NULL;
            $category->file_name = $this->saveImageToDisk($fileToDelete);
        }
        if ($request->get('parent_id'))
        {
            $category->parent_id = (int) $request->get('parent_id');
        }
        $category->enabled = $request->get('enabled', FALSE);
        $category->description = trim($request->get('description'));
        $category->save();

        return redirect()->action('Admin\ProductCategoriesController@getEdit', array('id' => $category->id))
            ->with('success', 'Категория успешно обновлена.');
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
        $category = $this->findCategory($id);

        // Проверяем, есть ли подкатегории
        if (count($category->childCategories) > 0)
        {
            return redirect()->back()
                            ->withErrors('Категория содержит подкатегории. Удалите сначала их.');
        }

        // Удаляем вместе с файлом
        unlink( $this->thumbDest . $category->file_name );
        $category->delete();

        return redirect()->back()->with('success', 'Категория успешно удалена.');
    }

    /**
     * Поиск клиента в БД по ид или переадресация на 404
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    private function findCategory($id)
    {
        // Ищем слайд
        $category = ProductCategory::find($id);
        if (empty($category))
        {
            abort(404);
        }

        return $category;
    }

    /**
     * Метод для добавления изображения в соотв. папку
     *
     * @param $old_name Название старого фалйа (если указан, то он удаляется)
     * @return string Название загруженного файла с его расширением
     */
    private function saveImageToDisk($old_name = NULL)
    {
        // Название изображения
        $name = str_random(10);

        // Загруженный файл
        $upload_file = Input::file('file_name');

        // Делаем преобразования
        $img = Image::make($upload_file)
            ->resize(200, 150);

        // Сохраняем файл
        $img->save($this->thumbDest.$name.'.'.$upload_file->getClientOriginalExtension());

        // Если есть старый файл, то удаляем его
        if ($old_name)
        {
            unlink( $this->thumbDest.$old_name );
        }

        return $name.'.'.$upload_file->getClientOriginalExtension();
    }

}

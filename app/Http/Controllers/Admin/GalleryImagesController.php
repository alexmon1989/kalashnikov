<?php namespace App\Http\Controllers\Admin;

use App\GalleryCategory;
use App\GalleryImage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreGalleryImagesRequest;
use Intervention\Image\Facades\Image;

class GalleryImagesController extends AdminController {

    // Расположение картинок
    protected $thumbDest;

    public function __construct()
    {
        parent::__construct();
        $this->thumbDest = public_path('img/gallery/');
    }

	/**
	 * Показывает список изображений категории.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // ID категории, фотографии которой будем искать
        $categoryId = Input::get('categoryId');

        // Получаем категорию
        $data['category'] = GalleryCategory::find($categoryId);
        if (empty($data['category']))
        {
            abort(404);
        }

        return view('admin.gallery.images.index', $data);
	}

	/**
	 * Показывает страницу добавления изображения в категорию.
	 *
     * @param $categoryId id категории галереи
	 * @return Response
	 */
	public function getCreate($categoryId)
	{
        // Получаем категорию
        $data['category'] = GalleryCategory::find($categoryId);
        if (empty($data['category']))
        {
            abort(404);
        }

        return view('admin.gallery.images.create', $data);
	}

	/**
	 * Обработчик запроса на добавление изображения в категорию
	 *
     * @param $categoryId id категории галереи
	 * @return Response
	 */
	public function postCreate(StoreGalleryImagesRequest $request, $categoryId)
	{
        // Получаем категорию
        $data['category'] = GalleryCategory::find($categoryId);
        if (empty($data['category']))
        {
            abort(404);
        }

        // Создаём новое изображение
        $image = new GalleryImage;
        $image->description = trim(Input::get('description'));
        $image->is_on_main = Input::get('is_on_main', FALSE);
        $image->file_name = $this->saveImageToDisk();
        $data['category']->images()->save($image);

        return redirect()->action('Admin\GalleryImagesController@getEdit', array('id' => $image->id))
            ->with('success', 'Изображение успешно создано.');
	}

    /**
     * Показывает страницу редактирования изображения.
     *
     * @param $id id изображения
     * @return Response
     */
    public function getEdit($id)
    {
        // Получаем изображение и его категорию
        $data['image'] = GalleryImage::find($id);
        if (empty($data['image']))
        {
            abort(404);
        }
        $data['category'] = $data['image']->category;

        return view('admin.gallery.images.edit', $data);
    }

    /**
     * Обработчик запроса на редактирование изображения.
     *
     * @param $id id изображения
     * @return Response
     */
    public function postEdit(StoreGalleryImagesRequest $request, $id)
    {
        // Получаем изображение
        $image = GalleryImage::find($id);
        if (empty($image))
        {
            abort(404);
        }

        // Изменяем данные и сохраняем
        $image->description = trim(Input::get('description'));
        $image->is_on_main = Input::get('is_on_main', FALSE);
        if ($request->hasFile('file_name'))
        {
            $image->file_name = $this->saveImageToDisk($image->file_name);
        }
        $image->save();

        return redirect()->action('Admin\GalleryImagesController@getEdit', array('id' => $image->id))
            ->with('success', 'Изображение успешно сохранено.');
    }

    /**
     * Удаление изображения.
     *
     * @param $id id изображения
     * @return Response
     */
    public function getDelete($id)
    {
        // Получаем изображение
        $image = GalleryImage::find($id);
        if (empty($image))
        {
            abort(404);
        }

        // Удаляем вместе с файлом
        unlink( $this->thumbDest . $image->file_name );
        $image->delete();

        return redirect()->back()->with('success', 'Изображение успешно удалено.');
    }


    /**
     * Отображение превью изображения
     *
     * @param $id
     * @return mixed
     */
    public function getImageThumbnail($id)
    {
        $galleryImage = GalleryImage::find($id);

        if (empty($galleryImage))
        {
            abort(404);
        }

        $img = Image::make($this->thumbDest.$galleryImage->file_name)->resize(158, 100);
        return $img->response();
    }

    /**
     * Отображение полного изображения
     *
     * @param $id
     * @return mixed
     */
    public function getImageFull($id)
    {
        $galleryImage = GalleryImage::find($id);

        if (empty($galleryImage))
        {
            abort(404);
        }

        $img = Image::make($this->thumbDest.$galleryImage->file_name);
        return $img->response();
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

        Image::make($upload_file)
            ->resize(973, 615)
            ->save($this->thumbDest.$name.'.'.$upload_file->getClientOriginalExtension());

        // Если есть старый файл, то удаляем его
        if ($old_name)
        {
            unlink( $this->thumbDest.$old_name );
        }

        return $name.'.'.$upload_file->getClientOriginalExtension();
    }

}

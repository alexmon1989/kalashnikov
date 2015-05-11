<?php namespace App\Http\Controllers\Admin;

use App\GalleryCategory;
use App\GalleryImage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreGalleryImagesRequest;
use Intervention\Image\Facades\Image;

class GalleryImagesController extends Controller {

    // Расположение картинок
    protected $thumbDest;

    public function __construct()
    {
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
            ->with('success', 'Новость успешно сохранена.');
	}

    /**
     * Показывает страницу редактирования изображения.
     *
     * @param $id id изображения
     * @return Response
     */
    public function getEdit($id)
    {
        //
    }

    /**
     * Обработчик запроса на редактирование изображения.
     *
     * @param $id id изображения
     * @return Response
     */
    public function postEdit($id)
    {
        //
    }

    /**
     * Удаление изображения.
     *
     * @param $id id изображения
     * @return Response
     */
    public function getDelete($id)
    {
        //
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

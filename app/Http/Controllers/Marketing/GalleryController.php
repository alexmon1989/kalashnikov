<?php namespace App\Http\Controllers\Marketing;

use App\GalleryCategory;
use App\GalleryImage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller {

    // Расположение картинок
    protected $thumbDest;

    public function __construct()
    {
        $this->thumbDest = public_path('img/gallery/');
    }

	/**
	 * Отображает страницу с категориями галереи.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // Получение категорий
		$data['categories'] = GalleryCategory::paginate(6);

        return view('marketing.gallery.index', $data);
	}

    /**
     * Отображает страницу с изображениями категории.
     *
     * @param $id id категории
     * @return Response
     */
    public function getCategory($id)
    {
        // Получение каитегории
        $data['category'] = GalleryCategory::find($id);
        $data['images'] = $data['category']->images()->paginate(12);

        return view('marketing.gallery.category', $data);
    }

    /**
     * Отображает превью изображения
     *
     * @param $id id изображения
     * @return Response
     */
    public function getImageThumbnail($id)
    {
        $galleryImage = GalleryImage::find($id);

        if (empty($galleryImage))
        {
            abort(404);
        }

        $img = Image::cache(function($image) use (&$galleryImage) {
            $image->make($this->thumbDest.$galleryImage->file_name)->resize(345, 218);
        }, 10, TRUE);

        return $img->response();
    }

    /**
     * Отображает изображение
     *
     * @param $id id изображения
     * @return Response
     */
    public function getImageFull($id)
    {
        $galleryImage = GalleryImage::find($id);

        if (empty($galleryImage))
        {
            abort(404);
        }

        $img = Image::cache(function($image) use (&$galleryImage) {
            $image->make($this->thumbDest.$galleryImage->file_name);
        }, 10, TRUE);

        return $img->response();
    }

}

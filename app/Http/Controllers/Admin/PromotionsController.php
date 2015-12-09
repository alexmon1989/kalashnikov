<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\News;
use App\Promotion;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\StorePromotionsRequest;
use Intervention\Image\Facades\Image;
use Orchestra\Support\Facades\Memory;
use Illuminate\Support\Facades\File;

class PromotionsController extends AdminController {

    // Расположение картинок-превью новостей
    protected $thumbDest;

    public function __construct()
    {
        parent::__construct();

        $this->thumbDest = public_path('img/promotions/');
    }

	/**
	 * Отображает список промо-акций
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $data['promotions'] = Promotion::all();

		return view('admin.promotions.index', $data);
	}

	/**
	 * Отображает страницу редактирования промо-акции
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
        $data['promotion'] = Promotion::find($id);

        if (empty($data['promotion'])) {
            abort(404);
        }

        return view('admin.promotions.edit', $data);
	}

	/**
	 * Обработчик запроса на редактирование промо-акции
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(StorePromotionsRequest $request, $id)
	{
        $promotion = Promotion::find($id);

        if (empty($promotion)) {
            abort(404);
        }

        // меняем данные и сохраняем
        $promotion->title = trim(Input::get('title'));
        $promotion->full_text = Input::get('full_text');
        $promotion->preview_text = Input::get('preview_text');
        $promotion->enabled = Input::get('enabled', 0);
        if ($request->hasFile('thumbnail'))
        {
            $promotion->thumbnail = $this->createThumbnail($promotion->thumbnail);
        }
        $promotion->save();

        return redirect()->action('Admin\PromotionsController@getEdit', array('id' => $id))
                         ->with('success', 'Промо-акция успешно сохранена.');
	}

	/**
	 * Отображает страницу создания промо-акции
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        return view('admin.promotions.add');
	}

	/**
	 * Обработчик запроса на создание промо-акции
	 *
	 * @return Response
	 */
	public function postCreate(StorePromotionsRequest $request)
	{
		$promotion = new Promotion();
        $promotion->title = trim(Input::get('title'));
        $promotion->full_text = Input::get('full_text');
        $promotion->preview_text = Input::get('preview_text');
        $promotion->enabled = Input::get('enabled', 0);
        $promotion->thumbnail = $this->createThumbnail();
        $promotion->save();

        return redirect()->action('Admin\PromotionsController@getEdit', array('id' => $promotion->id))
                        ->with('success', 'Промо-акция успешно сохранена.');
	}

	/**
	 * Удаляет промо-акцию
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
        $promotion = Promotion::find($id);

        if (empty($promotion)) {
            abort(404);
        }

        // Удаляем изображение
        File::delete($this->thumbDest.$promotion->thumbnail);

        $promotion->delete();

        return redirect()->action('Admin\PromotionsController@getIndex')
                        ->with('success', 'Промо-акция успешно удалена.');
	}

    /**
     * Метод для добавления изображения в соотв. папку
     */
    private function createThumbnail($old_name = NULL)
    {
        // Название изображения
        $name = str_random(10);

        // Загруженный файл
        $upload_file = Input::file('thumbnail');

        Image::make($upload_file)
            ->resize(973, 615)
            ->save($this->thumbDest.$name.'.'.$upload_file->getClientOriginalExtension());

        // Если есть старый файл, то удаляем его
        if ($old_name)
        {
            File::delete( $this->thumbDest.$old_name );
        }

        return $name.'.'.$upload_file->getClientOriginalExtension();
    }

}

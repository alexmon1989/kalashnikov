<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\News;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreNewsRequest;
use Intervention\Image\Facades\Image;
use Orchestra\Support\Facades\Memory;

class NewsController extends AdminController {

    // Расположение картинок-превью новостей
    protected $thumbDest;

    public function __construct()
    {
        parent::__construct();

        $this->thumbDest = public_path('img/thumb/');
    }

	/**
	 * Отображает список новостей
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        //dd(Memory::get('site.author', 'Taylor1'));
        $data['news'] = News::all();

		return view('admin.news.index', $data);
	}

	/**
	 * Отображает страницу редактирования новсоти
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
        $data['news'] = News::find($id);

        if (empty($data['news'])) {
            abort(404);
        }

        return view('admin.news.edit', $data);
	}

	/**
	 * Обработчик запроса на редактирование новости
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(StoreNewsRequest $request, $id)
	{
        $news = News::find($id);

        if (empty($news)) {
            abort(404);
        }

        // меняем данные и сохраняем
        $news->title = trim(Input::get('title'));
        $news->full_text = Input::get('full_text');
        $news->preview_text_small = Input::get('preview_text_small');
        $news->preview_text_mid = Input::get('preview_text_mid');
        $news->is_on_main = Input::get('is_on_main', 0);
        if ($request->hasFile('thumbnail'))
        {
            $news->thumbnail = $this->createThumbnail($news->thumbnail);
        }
        $news->save();

        return redirect()->action('Admin\NewsController@getEdit', array('id' => $id))
                         ->with('success', 'Новость успешно сохранена.');
	}

	/**
	 * Отображает страницу создания новости
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        return view('admin.news.add');
	}

	/**
	 * Обработчик запроса на создание новости
	 *
	 * @return Response
	 */
	public function postCreate(StoreNewsRequest $request)
	{
		$news = new News;
        $news->title = trim(Input::get('title'));
        $news->full_text = Input::get('full_text');
        $news->preview_text_small = Input::get('preview_text_small');
        $news->preview_text_mid = Input::get('preview_text_mid');
        $news->is_on_main = Input::get('is_on_main', 0);
        $news->thumbnail = $this->createThumbnail();
        $news->save();

        return redirect()->action('Admin\NewsController@getEdit', array('id' => $news->id))
                        ->with('success', 'Новость успешно сохранена.');
	}

	/**
	 * Удаляет новость
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
        $news = News::find($id);

        if (empty($news)) {
            abort(404);
        }

        // Удаляем изображение
        unlink($this->thumbDest.$news->thumbnail);

        $news->delete();

        return redirect()->action('Admin\NewsController@getIndex')
                        ->with('success', 'Новость успешно удалена.');
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
            unlink( $this->thumbDest.$old_name );
        }

        return $name.'.'.$upload_file->getClientOriginalExtension();
    }

}

<?php namespace App\Http\Controllers\Admin;

use App\Partner;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StorePartnersRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PartnersController extends AdminController {

    // Расположение картинок
    protected $thumbDest;

    public function __construct()
    {
        parent::__construct();
        $this->thumbDest = public_path('img/partners/');
    }

	/**
	 * Отображение страницы со списком партнёров
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data['partners'] = Partner::all();

        return view('admin.partners.index', $data);
	}

    /**
     * Отображение страницы добавления партнёра
     *
     * @return Response
     */
    public function getCreate()
    {
        return view('admin.partners.create');

    }

    /**
     * Обработчик запроса на создание партнёра
     *
     * @param StorePartnersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StorePartnersRequest $request)
    {
        $partner = new Partner;
        $partner->title = trim($request->get('title'));
        $partner->url = trim($request->get('url'));
        $partner->file_name = $this->saveImageToDisk();
        $partner->enabled = $request->get('enabled', FALSE);
        $partner->save();

        return redirect()->action('Admin\PartnersController@getEdit', array('id' => $partner->id))
            ->with('success', 'Партнёр успешно создан.');
    }

    /**
     * Страница редактирования партнёра
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['partner'] = $this->findPartner($id);

        return view('admin.partners.edit', $data);

    }

    /**
     * Обработчик запроса на редактирвоание партнёра
     *
     * @param StorePartnersRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StorePartnersRequest $request, $id)
    {
        // Ищем партнёра
        $partner = $this->findPartner($id);
        $partner->title = trim($request->get('title'));
        $partner->url = trim($request->get('url'));
        if ($request->hasFile('file_name'))
        {
            $partner->file_name = $this->saveImageToDisk($partner->file_name);
        }
        $partner->enabled = $request->get('enabled', FALSE);
        $partner->save();

        return redirect()->action('Admin\PartnersController@getEdit', array('id' => $id))
            ->with('success', 'Партнёр успешно изменён.');
    }

    /**
     * Удаление партнёра
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
        // Ищем партнёра
        $partner = $this->findPartner($id);

        // Удаляем вместе с файлом
        File::delete( $this->thumbDest . $partner->file_name );
        $partner->delete();

        return redirect()->back()->with('success', 'Партнёр успешно удалён.');
    }

    /**
     * Поиск партнёра в БД по ид или переадресация на 404
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    private function findPartner($id)
    {
        // Ищем партнёра
        $partner = Partner::find($id);
        if (empty($partner))
        {
            abort(404);
        }

        return $partner;
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

        // Если используется, то преобразовываем в серый
        if (Config::get('image.driver') == 'imagick')
        {
            $img->greyscale();
        }

        // Сохраняем файл
        $img->save($this->thumbDest.$name.'.'.$upload_file->getClientOriginalExtension());

        // Если есть старый файл, то удаляем его
        if ($old_name)
        {
            File::delete( $this->thumbDest.$old_name );
        }

        return $name.'.'.$upload_file->getClientOriginalExtension();
    }

}

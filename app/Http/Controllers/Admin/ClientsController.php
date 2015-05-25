<?php namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientsRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ClientsController extends AdminController {

    // Расположение картинок
    protected $thumbDest;

    public function __construct()
    {
        parent::__construct();
        $this->thumbDest = public_path('img/clients/');
    }

	/**
	 * Отображение страницы со списком клиентов
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data['clients'] = Client::all();

        return view('admin.clients.index', $data);
	}

    /**
     * Отображение страницы добавления клиента
     *
     * @return Response
     */
    public function getCreate()
    {
        return view('admin.clients.create');

    }

    /**
     * бработчик запроса на создание клиента
     *
     * @param StoreClientsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StoreClientsRequest $request)
    {
        $client = new Client;
        $client->title = trim($request->get('title'));
        $client->file_name = $this->saveImageToDisk();
        $client->enabled = $request->get('enabled', FALSE);
        $client->save();

        return redirect()->action('Admin\ClientsController@getEdit', array('id' => $client->id))
            ->with('success', 'Клиент успешно создан.');
    }

    /**
     * Страница редактирования клиента
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['client'] = $this->findClient($id);

        return view('admin.clients.edit', $data);

    }

    /**
     * Обработчик запроса на редактирвоание клиента
     *
     * @param StoreClientsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StoreClientsRequest $request, $id)
    {
        // Ищем клиента
        $client = $this->findClient($id);
        $client->title = trim($request->get('title'));
        if ($request->hasFile('file_name'))
        {
            $client->file_name = $this->saveImageToDisk($client->file_name);
        }
        $client->enabled = $request->get('enabled', FALSE);
        $client->save();

        return redirect()->action('Admin\ClientsController@getEdit', array('id' => $id))
            ->with('success', 'Клиент успешно изменён.');
    }

    /**
     * Удаление клиента
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
        // Ищем клиента
        $client = $this->findClient($id);

        // Удаляем вместе с файлом
        unlink( $this->thumbDest . $client->file_name );
        $client->delete();

        return redirect()->back()->with('success', 'Клиент успешно удалён.');
    }

    /**
     * Поиск клиента в БД по ид или переадресация на 404
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    private function findClient($id)
    {
        // Ищем клиента
        $client = Client::find($id);
        if (empty($client))
        {
            abort(404);
        }

        return $client;
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
            unlink( $this->thumbDest.$old_name );
        }

        return $name.'.'.$upload_file->getClientOriginalExtension();
    }

}

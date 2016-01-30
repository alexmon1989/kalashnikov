<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\ProductManufacturer;
use App\ProductProvider;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductsRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Datatables;

class ProductsController extends AdminController {

    // Расположение картинок
    protected $thumbDest;

    public function __construct()
    {
        parent::__construct();
        $this->thumbDest = public_path('img/products/');
    }

	/**
	 * Отображает список продуктов.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data['products'] = Product::with(['category', 'manufacturer', 'provider', 'images'])->get();

        return view('admin.products.list.index', $data);
	}

    /**
     * Отображение страницы добавления продукта.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        $this->shareDataToView();

        return view('admin.products.list.create');
    }

    /**
     * Обработчик запроса на создание продукта.
     *
     * @param StoreProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StoreProductsRequest $request)
    {
        // Создаём продукт, заполняем данными, сохраняем
        $product = new Product;
        $product->title = trim($request->get('title'));
        $product->vendor_code = trim($request->get('vendor_code'));
        $product->description = trim($request->get('description'));
        $product->category_id = $request->get('category_id');
        $product->manufacturer_id = $request->get('manufacturer_id');
        $product->provider_id = $request->get('provider_id');
        $product->packing = trim($request->get('packing'));
        $product->weight = trim($request->get('weight'));
        $product->enabled = $request->get('enabled', FALSE);
        $product->save();

        return redirect()->action('Admin\ProductsController@getEdit', array('id' => $product->id))
            ->with('success', 'Продукт успешно отредактирован.');
    }

    /**
     * Отображение страницы редактирования продукта.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getEdit($id)
    {
        $data['product'] = $this->findProduct($id);

        $this->shareDataToView();

        return view('admin.products.list.edit', $data);
    }

    /**
     * Обработчик запроса на редактирование продукта.
     *
     * @param StoreProductsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(StoreProductsRequest $request, $id)
    {
        $product = $this->findProduct($id);
        $product->title = trim($request->get('title'));
        $product->vendor_code = trim($request->get('vendor_code'));
        $product->description = trim($request->get('description'));
        $product->category_id = $request->get('category_id');
        $product->manufacturer_id = $request->get('manufacturer_id');
        $product->provider_id = $request->get('provider_id');
        $product->packing = trim($request->get('packing'));
        $product->weight = trim($request->get('weight'));
        $product->enabled = $request->get('enabled', FALSE);
        $product->save();

        return redirect()->action('Admin\ProductsController@getEdit', array('id' => $id))
            ->with('success', 'Продукт успешно отредактирован.');
    }

    /**
     * Удаление продукта
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
        // Ищем и удаляем продукт и каталог с изображениями
        $product = $this->findProduct($id);
        $product->delete();

        $dir = $this->thumbDest.$id.'/';
        File::deleteDirectory($dir);

        return redirect()->back()
            ->with('success', 'Продукт успешно удалён.');
    }

    /**
     * Передаёт в шаблон данные: категории продутвоы, производители, поставщики.
     */
    private function shareDataToView()
    {
        $data['categories'] = ProductCategory::with('childCategories')
            ->whereNull('parent_id')
            ->orderBy('title', 'ASC')
            ->get();
        $data['manufacturers'] = ProductManufacturer::orderBy('title', 'ASC')->get();
        $data['providers'] = ProductProvider::orderBy('title', 'ASC')->get();

        view()->share($data);
    }

    /**
     * Поиск продукта в БД по ид или переадресация на 404
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    private function findProduct($id)
    {
        // Ищем продукт
        $product = Product::with(['category', 'manufacturer', 'provider', 'images.product'])->find($id);
        if (empty($product))
        {
            abort(404);
        }

        return $product;
    }

    /**
     * Удаление изображения продукта
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteImage($id)
    {
        $image = ProductImage::with('product.images')->find($id);
        if (empty($image))
        {
            abort(404);
        }

        // Удаляем картинку с ЖД
        $dir = $this->thumbDest.$image->product->id.'/';
        File::delete($dir.$image->file_name);

        // Смотрим есть ли еще изображения у продукта. Нет - удаляем весь каталог
        if (count($image->product->images) == 1)
        {
            File::deleteDirectory($dir);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Изображение успешно удалено.');
    }

    /**
     * Действие обработки запроса на добавление изображения
     * @param $id id продукта, которому добавляем изображение
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreateImage(Request $request, $id)
    {
        $this->validate($request, [
            'file_name' => 'required|image',
        ], [
            'file_name.required' => 'Необходимо выбрать изображение.',
            'file_name.image' => 'Выбранный файл должен быть изображением.'
        ]);

        // Создаём изображение и сохраняем
        $image = new ProductImage;
        $image->product_id = $id;
        $image->file_name = $this->saveImageToDisk($id);
        $image->save();

        return redirect()->back()->with('success', 'Изображение успешно добавлено.');
    }

    /**
     * Метод для добавления изображения в соотв. папку
     *
     * @param $id id продукта, которому добавляем изображение
     * @return string Название загруженного файла с его расширением
     */
    private function saveImageToDisk($id)
    {
        // Название изображения
        $name = str_random(10);

        // Загруженный файл
        $upload_file = Input::file('file_name');

        // Если каталога не существует, то создаём
        $dir = $this->thumbDest.$id.'/';
        if (!is_dir($dir))
        {
            mkdir($dir);
        }

        Image::make($upload_file)
            ->resize(550, 550)
            ->save($dir.$name.'.'.$upload_file->getClientOriginalExtension());


        return $name.'.'.$upload_file->getClientOriginalExtension();
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDatatablesData()
    {
        $products = Product::with(['category', 'manufacturer', 'provider', 'images'])->get();

        return Datatables::of($products)
            ->addColumn('action', function ($item) {
                $s =  '<a class="btn btn-primary btn-sm" href="'.action('Admin\ProductsController@getEdit', ['id' => $item->id]).'" title="Редактировать"><i class="fa fa-edit"></i></a>';
                $s .= '<a class="btn btn-danger btn-sm item-delete" href="'.action('Admin\ProductsController@getDelete', ['id' => $item->id]).'" title="Удалить"><i class="fa fa-remove"></i></a>';
                return $s;
            })
            ->addColumn('enabled', function ($item) {
                $s = $item->enabled ? '<strong>Да</strong>' : 'Нет';
                return $s;
            })
            ->addColumn('created_at', function ($item) {
                $s = date('d.m.Y H:i:s', strtotime($item->created_at));
                return $s;
            })
            ->addColumn('updated_at', function ($item) {
                $s = date('d.m.Y H:i:s', strtotime($item->updated_at));
                return $s;
            })
            ->make(true);
    }
}

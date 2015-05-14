<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Orchestra\Support\Facades\Memory;
use Illuminate\Support\Facades\Input;

class SettingsController extends Controller {

	/**
	 * Отображаем список настроек.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('admin.settings.index');
	}

    /**
     * Сохранение настроек футера
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSaveFooter(Request $request)
    {
        // Сохраняем настройки
        Memory::put('footer.about', $request->get('about'));
        Memory::put('footer.contacts', $request->get('contacts'));

        return redirect()->back()
                         ->with('success', 'Настройки успешно сохранены.');
    }

    /**
     * Сохранение настроек запроса прайс-листа
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSavePriceList()
    {
        return redirect()->back()
                         ->with('success', 'Настройки успешно сохранены.');
    }


}

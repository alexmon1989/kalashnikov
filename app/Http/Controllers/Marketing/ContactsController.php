<?php namespace App\Http\Controllers\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ContactsMessageRequest;
use Illuminate\Support\Facades\Mail;
use Orchestra\Support\Facades\Memory;

class ContactsController extends Controller {

	/**
	 * Отображение страницы "Контакты"
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // Контактные данные
        $data['contacts_article'] = Article::where('type', '=', 'contacts_article')
            ->first();
        $data['contacts_widget'] = Article::where('type', '=', 'contacts_widget')
            ->first();

        return view('marketing.contacts.index', $data);
	}

    /**
     * Обработчик запроса на отправку сообщения
     *
     * @param ContactsMessageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postIndex(ContactsMessageRequest $request)
    {
        // Отправляем сообщение на email
        $subject = 'Это сообщение было отправлено с веб-сайта kalashnikovcom.ru';
        Mail::raw(nl2br($request->get('message')), function($message) use (&$request, &$subject)
        {
            $message->from($request->get('email'), $request->get('name'));
            $message->subject($subject);

            $message->to(Memory::get('contacts.email_to'));
        });

        return redirect()->action('Marketing\ContactsController@getIndex')
            ->with('success', 'Спасибо, сообщение успешно отправлено. Наши менеджеры ответят на него в ближайшее время!');
    }


}

<?php namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

class StorePartnersRequest extends Request {

    protected $rules = [
        'title' => 'required|max:255',
        'url' => 'my_url|required|max:255',
        'file_name' => 'image',
        'enabled' => 'boolean',
    ];

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        \Validator::extend('my_url', function($attribute, $value) {
            // Длинная регулярка для валидации всевозможных вариантов URL
            $regExp = '_^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})' .
                '(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])' .
                '(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.' .
                '(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)' .
                '(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))' .
                '(?::\d{2,5})?(?:/[^\s]*)?$_iuS';

            return preg_match($regExp, $value);
        });

        if (Request::segment(3) == 'create')
        {
            $this->rules['file_name'] .= '|required';
        }
		return $this->rules;
	}

    /**
     * Сообщения ошибок
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.max' => 'Количество символов в поле "Название" не может превышать :max.',
            'url.required' => 'Поле "Ссылка" обязательно для заполнения.',
            'url.max' => 'Количество символов в поле "Ссылка" не может превышать :max.',
            'url.url' => 'Поле "Ссылка" должно содержать корректный web-адрес (например, http://example.com).',
            'enabled.boolean' => 'Поле "Показывать в виджете на главной странице" должно иметь значение логического типа.',
            'file_name.image' => 'Поле "Изображение" должно быть изображением.',
            'file_name.required' => 'Поле "Изображение" обязательно для заполнения.',
        ];
    }

}

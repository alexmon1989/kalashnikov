<?php namespace App\Http\Requests;

class StorePartnersRequest extends Request {

    protected $rules = [
        'title' => 'required|max:255',
        'url' => 'url|required|max:255',
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
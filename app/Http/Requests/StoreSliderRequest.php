<?php namespace App\Http\Requests;

class StoreSliderRequest extends Request {

    protected $rules = [
        'title' => 'required|max:255',
        'description_1' => 'required|max:255',
        'description_2' => 'max:255',
        'file_name' => 'image',
        'url' => 'required|url|max:255',
        'btn_text' => 'required|max:50',
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
            'description_1.required' => 'Поле "Описание (строка 1)" обязательно для заполнения.',
            'description_2.required' => 'Поле "Описание (строка 2)" обязательно для заполнения.',
            'description_1.max' => 'Количество символов в поле "Описание (строка 1)" не может превышать :max.',
            'description_2.max' => 'Количество символов в поле "Описание (строка 2)" не может превышать :max.',
            'enabled.boolean' => 'Поле "Показывать в виджете на главной странице" должно иметь значение логического типа.',
            'file_name.image' => 'Поле "Изображение" должно быть изображением.',
            'file_name.required' => 'Поле "Изображение" обязательно для заполнения.',
            'url.required' => 'Поле "Ссылка (полная)" обязательно для заполнения.',
            'url.max' => 'Количество символов в поле "Ссылка (полная)" не может превышать :max.',
            'url.url' => 'Поле "Ссылка (полная)" должно содержать правильную ссылку.',
            'btn_text.required' => 'Поле "Текст кнопки" обязательно для заполнения.',
            'btn_text.max' => 'Количество символов в поле "Текст кнопки" не может превышать :max.',
        ];
    }

}

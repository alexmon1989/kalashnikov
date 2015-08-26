<?php namespace App\Http\Requests;

class StorePromotionsRequest extends Request {

    protected $rules = [
        'title' => 'required|max:255',
        'full_text' => 'required',
        'preview_text' => 'required',
        'enabled' => 'boolean',
        'thumbnail' => 'image',
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
            $this->rules['thumbnail'] .= '|required';
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
            'preview_text.required' => 'Поле "Текст превью" обязательно для заполнения.',
            'full_text.required' => 'Поле "Текст полный" обязательно для заполнения.',
            'is_on_main.boolean' => 'Поле "Включено" должно иметь значение логического типа.',
            'thumbnail.image' => 'Поле "Изображение" должно быть изображением.',
            'thumbnail.required' => 'Поле "Изображение" обязательно для заполнения.',
        ];
    }

}

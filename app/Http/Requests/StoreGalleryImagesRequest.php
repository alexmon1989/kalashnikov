<?php namespace App\Http\Requests;

class StoreGalleryImagesRequest extends Request {

    protected $rules = [
        'description' => 'required|max:255',
        'is_on_main' => 'boolean',
        'file_name' => 'image',
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
        if (Request::segment(4) == 'create')
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
            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'description.max' => 'Количество символов в поле "Описание" не может превышать :max.',
            'is_on_main.boolean' => 'Поле "Показывать в виджете на главной странице" должно иметь значение логического типа.',
            'file_name.image' => 'Поле "Изображение" должно быть изображением.',
            'file_name.required' => 'Поле "Изображение" обязательно для заполнения.',
        ];
    }

}

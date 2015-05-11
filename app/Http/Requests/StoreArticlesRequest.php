<?php namespace App\Http\Requests;

class StoreArticlesRequest extends Request {

    protected $rules = [
        'title' => 'required|max:255',
        'full_text' => 'required',
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
        // На некоторых страницах не нужно, чтоб полу Назнаие было обязательным
        if (Request::segment(2) == 'about' or Request::segment(2) == 'contacts')
        {
            $this->rules['title'] = '';
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
            'full_text.required' => 'Поле "Текст полный" обязательно для заполнения.',
        ];
    }

}

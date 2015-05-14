<?php namespace App\Http\Requests;

class PriceRequest extends Request {

    protected $rules = [
        'email' => 'required|email|max:255',
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
            'email.required' => 'Поле обязательно для заполнения.',
            'email.max' => 'Количество символов в поле не может превышать :max.',
            'email.email' => 'Введите правильный E-Mail.',
        ];
    }

}

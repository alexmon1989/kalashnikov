<?php namespace App\Http\Requests;

class StoreVacanciesSettingsRequest extends Request {

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
            'email.required' => 'Поле "E-Mail" обязательно для заполнения.',
            'email.max' => 'Количество символов в поле "E-Mail" не может превышать :max.',
            'email.email' => 'Поле "E-Mail" должно содержать правильный электронный адрес.',
        ];
    }

}

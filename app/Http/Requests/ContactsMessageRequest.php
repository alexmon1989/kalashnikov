<?php namespace App\Http\Requests;

class ContactsMessageRequest extends Request {

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required',
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
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.max' => 'Количество символов в поле "Имя" не может превышать :max.',
            'email.required' => 'Поле "EMail" обязательно для заполнения.',
            'email.max' => 'Количество символов в поле "EMail" не может превышать :max.',
            'email.email' => 'Поле "EMail" должно быть действительным электронным адресом.',
            'message.required' => 'Поле "Сообщение" обязательно для заполнения.',
        ];
    }

}

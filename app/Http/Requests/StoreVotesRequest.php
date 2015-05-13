<?php namespace App\Http\Requests;

class StoreVotesRequest extends Request {

    protected $rules = [
        'question' => 'required|max:255',
        'is_on_main' => 'boolean',
        'answer_1' => 'required|max:255',
        'answer_2' => 'required|max:255',
        'answer_3' => 'max:255',
        'answer_4' => 'max:255',
        'answer_5' => 'max:255',
        'answer_6' => 'max:255',
        'answer_7' => 'max:255',
        'answer_8' => 'max:255',
        'answer_9' => 'max:255',
        'answer_10' => 'max:255',
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
            'question.required' => 'Поле "Вопрос" обязательно для заполнения.',
            'question.max' => 'Количество символов в поле "Вопрос" не может превышать :max.',
            'is_on_main.boolean' => 'Поле "Отображать на главной" должно иметь значение логического типа.',
            'answer_1.required' => 'Поле "Ответ 1" обязательно для заполнения.',
            'answer_1.max' => 'Количество символов в поле "Ответ 1" не может превышать :max.',
            'answer_2.required' => 'Поле "Ответ 2" обязательно для заполнения.',
            'answer_2.max' => 'Количество символов в поле "Ответ 2" не может превышать :max.',
            'answer_3.max' => 'Количество символов в поле "Ответ 3" не может превышать :max.',
            'answer_4.max' => 'Количество символов в поле "Ответ 4" не может превышать :max.',
            'answer_5.max' => 'Количество символов в поле "Ответ 5" не может превышать :max.',
            'answer_6.max' => 'Количество символов в поле "Ответ 6" не может превышать :max.',
            'answer_7.max' => 'Количество символов в поле "Ответ 7" не может превышать :max.',
            'answer_8.max' => 'Количество символов в поле "Ответ 8" не может превышать :max.',
            'answer_9.max' => 'Количество символов в поле "Ответ 9" не может превышать :max.',
            'answer_10.max' => 'Количество символов в поле "Ответ 10" не может превышать :max.',
        ];
    }

}

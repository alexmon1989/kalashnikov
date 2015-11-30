<?php namespace App\Http\Requests;

class StoreCVRequest extends Request {

    protected $rules = [
        'vacancy_id'    => 'required|exists:vacancies,id',
        'username'      => 'required|max:255',
        'email'         => 'required|email|max:255',
        'file_cv'       => 'required|max:2048|mimes:rtf,doc,docx,pdf',
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
            'vacancy_id.required' => 'Поле "Вакансия" обязательно для заполнения.',
            'vacancy_id.exists' => 'Поле "Вакансия" должно содержать существующую вакансию.',
            'username.required' => 'Поле "ФИО" обязательно для заполнения.',
            'username.max' => 'Максимально допустимое количество символов в поле "ФИО" - 255.',
            'email.required' => 'Поле "E-Mail" обязательно для заполнения.',
            'email.email' => 'Поле "E-Mail" должно содержать правильный электронный адрес.',
            'email.max' => 'Максимально допустимое количество символов в поле "E-Mail" - 255.',
            'file_cv.required' => 'Поле "Файл с резюме" обязательно для заполнения.',
            'file_cv.max' => 'Максимальный допустимый размер файла в поле "Файл с резюме" - 2 Мб.',
            'file_cv.mimes' => 'Поле "Файл с резюме" должно содержать файл MS Word (.doc, .docx, .rtf) или PDF.',
        ];
    }

}

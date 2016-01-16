<?php namespace App\Http\Requests;

class StoreProductsRequest extends Request {

    protected $rules = [
        'title'             => 'required|max:255',
        'vendor_code'       => 'required|max:255',
        'category_id'       => 'required|integer|exists:product_categories,id,parent_id,NOT_NULL',
        'manufacturer_id'   => 'required|integer|exists:product_manufacturers,id',
        'provider_id'       => 'required|integer|exists:product_providers,id',
        'packing'           => 'required|max:255',
        'weight'            => 'required|max:255',
        'enabled'           => 'boolean',
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
        if (Request::segment(4) == 'edit') {
            $this->rules['vendor_code'] .= '|unique:products,vendor_code,' . $this->segment(5);
        } else {
            $this->rules['vendor_code'] .= '|unique:products';
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
            'title.required'            => 'Поле "Название" обязательно для заполнения.',
            'title.max'                 => 'Количество символов в поле "Название" не может превышать :max.',
            'vendor_code.required'      => 'Поле "Артикул" обязательно для заполнения.',
            'vendor_code.max'           => 'Количество символов в поле "Артикул" не может превышать :max.',
            'vendor_code.unique'        => 'Такое значение поля "Артикул" уже существует.',
            'category_id.required'      => 'Поле "Категория" обязательно для заполнения.',
            'category_id.integer'       => 'Поле "Категория" должно быть целым числом.',
            'category_id.exists'        => 'Поле "Категория" должно содержать существующую категорию.',
            'manufacturer_id.required'  => 'Поле "Производитель" обязательно для заполнения.',
            'manufacturer_id.integer'   => 'Поле "Производитель" должно быть целым числом.',
            'manufacturer_id.exists'    => 'Поле "Производитель" должно содержать существующего производителя.',
            'provider_id.required'      => 'Поле "Поставщик" обязательно для заполнения.',
            'provider_id.integer'       => 'Поле "Поставщик" должно быть целым числом.',
            'provider_id.exists'        => 'Поле "Поставщик" должно содержать существующего поставщика.',
            'packing.required'          => 'Поле "Тип упаковки" обязательно для заполнения.',
            'packing.max'               => 'Количество символов в поле "Тип упаковки" не может превышать :max.',
            'weight.required'           => 'Поле "Название" обязательно для заполнения.',
            'weight.max'                => 'Количество символов в поле "Название" не может превышать :max.',
            'enabled.boolean'           => 'Поле "Включено" должно иметь значение логического типа.',
        ];
    }

}

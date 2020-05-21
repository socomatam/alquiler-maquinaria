<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaquinaRequest extends FormRequest
{
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
        return [
            'maq_peso' => 'integer|regex:^[1-9][0-9]+|not_in:0',
            'maq_dimension_alto' => 'integer|min:1',
            'maq_dimension_largo' => 'integer|min:1',
            'maq_dimension_ancho' => 'integer|min:1',
        ];
    }
}

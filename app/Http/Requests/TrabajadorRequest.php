<?php

namespace App\Http\Requests;


use App\Rules\Dni;
use App\Trabajadore;
use App\Rules\Email;
use App\Rules\Telefono;
use Illuminate\Foundation\Http\FormRequest;

class TrabajadorRequest extends FormRequest
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
            'tra_nombre_trabajador' => 'required|max:100|min:2',
            'tra_apellido_1' => 'required|max:100|min:2',
            'tra_apellido_2' => 'required|max:100|min:2',
			'tra_telefono' => ['required','max:9','min:9', new Telefono],
			'tra_dni' => ['required','max:10','min:9', new Dni],
			
          
			'tra_email' => ['max:60', new Email],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\Dni;
use App\Cliente;
use App\Rules\Email;
use App\Rules\Telefono;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'cli_nombre_empresa' => 'required|max:100|min:2',
			'cli_telefono' => ['required','max:9','min:9', new Telefono],
			'cli_nif' => ['required','max:10','min:9','unique:clientes', new Dni],
			'cli_pais' => 'required|max:50|min:2',
            'cli_ciudad' => 'required|max:50|min:2',
            'cli_direccion' => 'required|max:100|min:2',
            'cli_nombre_contacto' => 'required|max:100|min:2',
			'cli_email' => ['max:60', new Email],
        ];
    }
}

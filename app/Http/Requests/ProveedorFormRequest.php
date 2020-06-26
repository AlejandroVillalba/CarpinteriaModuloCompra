<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
            'nombreEmpresa'=>'required',
            'ruc'=>'required', 
            'direccion'=>'max:100',
            'telefono'=>'max:20',
            'email'=>'max:50',
        ];
    }
}

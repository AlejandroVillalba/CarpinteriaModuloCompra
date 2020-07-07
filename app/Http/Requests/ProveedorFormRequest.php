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
            'nombreEmpresa'=>'required|alpha',
<<<<<<< HEAD
            'ruc'=>'required|max:20|unique:proveedor', 
            'direccion'=>'max:200',
            'telefono'=>'max:25',
=======
            'ruc'=>'required|max:20|unique:proveedor',
            'direccion'=>'max:100',
            'telefono'=>'max:20',
>>>>>>> 7e60bc4e2481c63b47012365100004e180c4d03a
            'email'=>'max:50',
        ];
    }
}

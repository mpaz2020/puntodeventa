<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:200|unique:providers',
            'ruc_number'=>'required|string|max:11|min:11|unique:providers',
            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|max:9|min:9|unique:providers'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'este campo es requerido',
            'name.string'=>'el valor no es correcto',
            'name.max'=>'solo se permiten 255 caracteres',

            'email.required'=>'este campo es requerido',
            'email.email'=>'no es un correo electronico',
            'email.string'=>'el valor no es correcto',
            'email.max'=>'solo se permiten 200 caracteres',
            'email.unique'=>'ya se encuentra registrado',

            'ruc_number.required'=>'este campo es requerido',
            'ruc_number.string'=>'el valor no es correcto',
            'ruc_number.max'=>'solo se permiten 11 caracteres',
            'ruc_number.min'=>'se requiere de 11 caracteres',
            'ruc_number.unique'=>'ya se encuentra registrado',

            'address.string'=>'el valor no es correcto',
            'address.max'=>'solo se permiten 255 caracteres',

            'phone.required'=>'este campo es requerido',
            'phone.string'=>'el valor no es correcto',
            'phone.max'=>'solo se permiten 9 caracteres',
            'phone.min'=>'se requiere de 9 caracteres',
            'phone.unique'=>'ya se encuentra registrado',
        ];
    }
}

<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|unique:providers,email,'.$this->route('provider')->id.'|max:255',
            'ruc_number'=>'required|string|min:11|unique:providers,ruc_number,'.$this->route('provider')->id.'|max:11',
            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|min:9|unique:providers,phone,'.$this->route('provider')->id.'|max:9'
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
            'email.max'=>'solo se permiten 255 caracteres',
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

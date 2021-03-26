<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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


    public function rules()
    {
        return [
            'name'=>'string|required|max:255',
            'dni'=>'string|required|unique:clients|min:8|max:8',
            'ruc'=>'string|nullable|unique:clients|min:11|max:11',
            'address'=>'string|nullable|max:255',
            'phone'=>'string|nullable|unique:clients|min:9|max:9',
            'email'=>'string|nullable|unique:clients|max:255|email:rfc,dns'
        ];
    }

    public function messages()
    {
        return [

            'name.required'=>'este campo es requerido',
            'name.string'=>'el valor no es correcto',
            'name.max'=>'solo se permiten 255 caracteres',

            'dni.required'=>'este campo es requerido',
            'dni.string'=>'el valor no es correcto',
            'dni.max'=>'solo se permiten 8 caracteres',
            'dni.min'=>'se requieren 8 caracteres',
            'dni.unique'=>'ya se encuentra registrado',

            'ruc.string'=>'el valor no es correcto',
            'ruc.max'=>'solo se permiten 11 caracteres',
            'ruc.min'=>'se requieren 11 caracteres',
            'ruc.unique'=>'ya se encuentra registrado',

            'address.required'=>'este campo es requerido',
            'address.string'=>'el valor no es correcto',
            'address.max'=>'solo se permiten 255 caracteres',

            'phone.string'=>'el valor no es correcto',
            'phone.max'=>'solo se permiten 9 caracteres',
            'phone.min'=>'se requieren 9 caracteres',
            'phone.unique'=>'ya se encuentra registrado',

            'email.string'=>'el valor no es correcto',
            'email.max'=>'solo se permiten 9 caracteres',
            'email.unique'=>'ya se encuentra registrado',
            'email.email'=>'no es un correo electronico',
        ];
    }
}

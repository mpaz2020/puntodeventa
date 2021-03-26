<?php

namespace App\Http\Requests\Product;

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
            'name'=>'string|required|unique:products|max:255',
            // 'image'=>'required|dimensions:min_width=100,min_height=200',
            'code'=>'nullable|string|min:8|max:8',
            'sell_price'=>'required',
            'category_id'=>'integer|required|exists:App\Category,id',
            'provider_id'=>'integer|required|exists:App\Provider,id',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'El valor no es correcto',
            'name.required' => 'el campo es requerido',
            'name.unique' => 'ya esta registrado',
            'name.max' => 'solo se permite 255 caracteres',

            // 'image.string' => 'El valor no es correcto',
            // 'image.dimensions' => 'solo se permiten imagenes de 100x200 px',
            'code.string' => 'El valor no es correcto',
            'code.min' => 'se requiere de 8 digitos',
            'code.max' => 'solo se permite 8 digitos',

            'sell_price.required' => 'el campo es requerido',

            'category_id.integer' => 'el valor tiene que ser entero',
            'category_id.required' => 'el campo es requerido',
            'category_id.exists' => 'categoria no existe',

            'provider_id.integer' => 'el valor tiene que ser entero',
            'provider_id.required' => 'el campo es requerido',
            'provider_id.exists' => 'proveedor no existe',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Request;

class ProductoRequest extends Request
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
        $rules = [
            'name' => 'required|min:3|max:255',
            'id_tipo_producto'  => 'required',
            'stock'  => 'required'          
        ];
      
        return $rules;
    }

        public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'id_tipo_producto.required' => 'El tipo de producto es requerido',
            'stock.required' => 'El stock es requerido'
        ];

    }


}

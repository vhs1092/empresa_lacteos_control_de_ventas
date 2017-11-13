<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Request;

class ClienteRequest extends Request
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
            'razon_social'  => 'required',
            'nit'  => 'required',
            'address'  => 'required',
            'telephone'  => 'required'

        ];
      
        return $rules;
    }

        public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'razon_social.required' => 'La razón social es requerida',
            'nit.required' => 'El nit es requerido',
            'address.required' => 'La dirección es requerida',
            'telephone.required' => 'El teléfono es requerido'

        ];

    }


}

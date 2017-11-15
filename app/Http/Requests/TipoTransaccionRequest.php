<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Request;

class TipoTransaccionRequest extends Request
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
            'description' => 'required|min:3|max:255',
            'tipo' => 'required',
            'maneja_cliente' => 'required',
            'correlativo' => 'required'    
        ];
      
        return $rules;
    }

        public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'description.required' => 'La descripción es requerida',
            'maneja_cliente.required' => 'Maneja cliente es requerido',
            'tipo.required' => 'El tipo es requerido',
            'correlativo.required' => 'El correlativo es requerido'
        ];

    }


}

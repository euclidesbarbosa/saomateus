<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEmpSetorStore extends FormRequest
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
            'emp_id' => 'required|numeric|min:1',
            'tipo_setor_id' => 'required|numeric|min:1',
        ];
    }
    
    public function messages()
    {
        return [
            'emp_id.required' => 'Selecione a empresa!',
            'emp_id.numeric' => 'Selecione a empresa!',
            'emp_id.min' => 'Selecione a empresa!',
            'tipo_setor_id.required' => 'Selecione o setor!',
            'tipo_setor_id.numeric' => 'Selecione o setor!',
            'tipo_setor_id.min' => 'Selecione o setor!',
        ];
    }
}

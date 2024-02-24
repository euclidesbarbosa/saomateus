<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFuncaoStore extends FormRequest
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
            'tipo_funcao_id' => 'required|numeric|min:1',
            'user_id' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'tipo_funcao_id.required' => 'Selecione o tipo de função!',
            'tipo_funcao_id.numeric' => 'Selecione o tipo de função!',
            'tipo_funcao_id.min' => 'Selecione o tipo de função!',
            'user_id.required' => 'Selecione o usuário!',
            'user_id.numeric' => 'Selecione o usuário!',
            'user_id.min' => 'Selecione o usuário!',
        ];
    }
}

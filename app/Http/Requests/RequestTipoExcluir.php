<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTipoExcluir extends FormRequest
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
            'tipo_id' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'tipo_id.required' => 'Informe o tipo!',
            'tipo_id.numeric' => 'Tipo inválido!',
            'tipo_id.min' => 'Tipo inválido!',
        ];
    }
}

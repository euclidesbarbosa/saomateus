<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserClienteStore extends FormRequest
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
            'user_id' => 'required|numeric|min:1',
            'cliente_id' => 'required|numeric|min:1',
            'tipo_responsavel_id' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Selecione o responsável!',
            'user_id.numeric' => 'Selecione o responsável!',
            'user_id.min' => 'Selecione o responsável!',
            'cliente_id.required' => 'Selecione o desbravador!',
            'cliente_id.numeric' => 'Selecione o desbravador!',
            'cliente_id.min' => 'Selecione o desbravador!',
            'tipo_responsavel_id.required' => 'Selecione o grau de parentêsco!',
            'tipo_responsavel_id.numeric' => 'Selecione o grau de parentêsco!',
            'tipo_responsavel_id.min' => 'Selecione o grau de parentêsco!',
        ];
    }
}

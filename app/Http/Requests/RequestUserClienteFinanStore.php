<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserClienteFinanStore extends FormRequest
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
            'financeiro_id' => 'required|numeric|min:1',
//            'cliente_id' => 'required|numeric|min:1',
//            'user_cliente_finan_dt' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'financeiro_id.required' => 'Selecione o financeiro!',
            'financeiro_id.numeric' => 'Selecione o financeiro!',
            'financeiro_id.min' => 'Selecione o financeiro!',
//            'cliente_id.required' => 'Selecione o cliente!',
//            'cliente_id.numeric' => 'Selecione o cliente!',
//            'cliente_id.min' => 'Selecione o cliente!',
//            'user_cliente_finan_dt.required' => 'Data não informada',
//            'user_cliente_finan_dt.date' => 'Data inválida'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestClienteEndStore extends FormRequest
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
            'cliente.cliente_dtnasc' => 'required|date',
            'cliente.cliente_cpf' => 'required|cpf',
            'membro.cliente_cpf' => 'required_with|cliente_cpf'
        ];
    }

    public function messages()
    {
        return [
            'cliente.cliente_dtnasc.required' => 'Informe a data de nascimento!',
            'cliente.cliente_dtnasc.date' => 'Data de nascimento inválida!',
            'cliente.cliente_cpf.required' => 'Informe o cpf!',
            'cliente.cliente_cpf.cpf' => 'CPF inválido!',
            'membro.cliente_cpf.cpf' => 'CPF inválido!'
        ];
    }
}

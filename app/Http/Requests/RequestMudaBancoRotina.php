<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMudaBancoRotina extends FormRequest
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
            'host' => 'required',
            'database' => 'required',
            'user' => 'required',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'host.required' => 'Informe o nome do Host',
            'database.required' => 'Informe o nome do Banco de Dados',
            'user.required' => 'Informe o nome do Usuário',
            'password.required' => 'Informe a Senha',
        ];
    }
}

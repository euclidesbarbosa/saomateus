<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestClienteStore extends FormRequest
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
            'cliente_nome' => 'required',
            'cliente_dtnasc' => 'required|date',
            'cliente_pai' => 'required_if:cliente_mae,null',
            'cliente_mae' => 'required_if:cliente_pai,null',
        ];
    }

    public function messages()
    {
        return [
            'cliente_nome.required' => 'Informe o nome',
            'cliente_dtnasc.required' => 'Informe a data de nascimento',
            'cliente_dtnasc.date' => 'Data de nascimento inválida',
            'cliente_pai.required_if' => 'Informe o pai',
            'cliente_mae.required_if' => 'Informe a mãe',
        ];
    }
}

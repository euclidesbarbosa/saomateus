<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAtendimentoStore extends FormRequest
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
            'atendimento.pessoa.cpf' => 'nullable|cpf',
            'atendimento.pessoa.nom_pessoa' => 'required',
            'atendimento.pessoa.dta_nasc_pessoa' => 'required|date',
            'atendimento.tipo_menu_id' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'atendimento.pessoa.cpf.nullable' => 'Informe o cpf!',
            'atendimento.pessoa.cpf.cpf' => 'Número do cpf inválido!',
            'atendimento.pessoa.nom_pessoa.required' => 'Informe o nome!',
            'atendimento.pessoa.dta_nasc_pessoa.required' => 'Informe a data de nascimento!',
            'atendimento.pessoa.dta_nasc_pessoa.date' => 'Data de nascimento inválida!',
            'atendimento.tipo_menu_id.required' => 'Informe o Local!',
            'atendimento.tipo_menu_id.numeric' => 'Informe o Local!',
            'atendimento.tipo_menu_id.min' => 'Informe o Local!',
        ];
    }
}

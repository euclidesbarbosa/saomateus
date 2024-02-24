<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCidadeStore extends FormRequest
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
            'uf_sigla' => 'required|min:2|max:2',
            'cidade_nome' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'uf_sigla.required' => 'Informe ou selecione a UF',
            'uf_sigla.min' => 'UF inválida!',
            'uf_sigla.max' => 'UF inválida!',
            'cidade_nome.required' => 'Informe o nome da cidade!',
        ];
    }
}

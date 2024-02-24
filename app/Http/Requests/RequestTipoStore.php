<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTipoStore extends FormRequest
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
            'tipo_sigla' => 'required|min:2|max:30',
            'tipo_nome' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tipo_sigla.required' => 'Informe a sigla!',
            'tipo_sigla.min' => 'A Sigla permitido no mínimo 2 caracteres!',
            'tipo_sigla.max' => 'A Sigla permitido no máximo 30 caracteres!',
            'tipo_nome.required' => 'Informe o nome!',
        ];
    }
}

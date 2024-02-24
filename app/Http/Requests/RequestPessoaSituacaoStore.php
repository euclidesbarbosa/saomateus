<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPessoaSituacaoStore extends FormRequest
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
            'pessoa_situacao_data' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'pessoa_situacao_data.required' => 'Data não informada!',
            'pessoa_situacao_data.date' => 'Data inválida!',
        ];
    }
}

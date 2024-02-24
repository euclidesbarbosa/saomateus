<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRotinaSubstituicaoDuplicados extends FormRequest
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
            'pessoaIdDe' => 'required|numeric|min:1',
            'pessoaIdPara' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'pessoaIdDe.required' => 'Cód da pessoa que será substituída não informado!',
            'pessoaIdDe.numeric' => 'Cód da pessoa que será substituída não informado!',
            'pessoaIdDe.min' => 'Cód da pessoa que será substituída não informado!',
            'pessoaIdPara.required' => 'Cód da pessoa que substituirá não informado!',
            'pessoaIdPara.numeric' => 'Cód da pessoa que substituirá não informado!',
            'pessoaIdPara.min' => 'Cód da pessoa que substituirá não informado!',
        ];
    }
}

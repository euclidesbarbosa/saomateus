<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFileUploadStore extends FormRequest
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
            'file' => 'required|mimes:jpg,jpeg,png|max:2048'
        ];

    }
    public function messages()
    {
        return [
            'file.required' => 'Selecione a imagem do animal!',
            'file.mimes' => 'Os tipos padrões são: jpg,jpeg,png',
            'file.max' => 'O tamanho máximo suportado para o arquivo é de 2048 Bts'
        ];
    }
}

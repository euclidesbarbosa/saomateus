<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserCidadeStore extends FormRequest
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
            'cidade_id' => 'required|numeric|min:1',
            'user_id' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'cidade_id.required' => 'Selecione a cidade!',
            'cidade_id.numeric' => 'Selecione a cidade!',
            'cidade_id.min' => 'Selecione a cidade!',
            'user_id.required' => 'Selecione o usuário!',
            'user_id.numeric' => 'Selecione o usuário!',
            'user_id.min' => 'Selecione o usuário!',
        ];
    }
}

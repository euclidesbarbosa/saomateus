<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserStore extends FormRequest
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
            'password' => 'required',
            'nPassword' => 'required',
            'cPassword' => 'required|same:nPassword'
         ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Informe o a senha atual!',
            'nPassword.required' => 'Informe a nova senha!',
            'cPassword.required' => 'Informe a confirmação da senha!',
            'cPassword.same' => 'A nova senha é diferente da conferida!'
        ];
    }
}

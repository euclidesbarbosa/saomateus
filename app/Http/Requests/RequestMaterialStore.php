<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMaterialStore extends FormRequest
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
            'tipo_mat_id' => 'required|numeric|min:1',
            'tipo_marca_id' => 'required|numeric|min:1',
            'material_num_serie' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'tipo_mat_id.required' => 'Selecione o tipo do material!',
            'tipo_mat_id.numeric' => 'Selecione o tipo do material!',
            'tipo_mat_id.min' => 'Selecione o tipo do material!!',
            'tipo_marca_id.required' => 'Selecione a marca do material!',
            'tipo_marca_id.numeric' => 'Selecione a marca do material!',
            'tipo_marca_id.min' => 'Selecione a marca do material!!',
            'material_num_serie.required' => 'Informe o número de série!',
            'material_num_serie.min' => 'Informe o número de série!',
        ];
    }
}

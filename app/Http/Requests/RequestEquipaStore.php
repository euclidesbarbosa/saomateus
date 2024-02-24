<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEquipaStore extends FormRequest
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
            'tipo_equipa_id' => 'required|numeric|min:1',
            'tipo_marca_id' => 'required|numeric|min:1',
            'tipo_modelo_id' => 'required|numeric|min:1',
            'equipa_num_serie' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'tipo_equipa_id.required' => 'Selecione o tipo do equipamento!',
            'tipo_equipa_id.numeric' => 'Selecione o tipo do equipamento!',
            'tipo_equipa_id.min' => 'Selecione o tipo do equipamento!',
            'tipo_marca_id.required' => 'Selecione a marca do equipamento!',
            'tipo_marca_id.numeric' => 'Selecione a marca do equipamento!',
            'tipo_marca_id.min' => 'Selecione a marca do equipamento!',
            'tipo_modelo_id.required' => 'Selecione o modelo do equipamento!',
            'tipo_modelo_id.numeric' => 'Selecione o modelo do equipamento!',
            'tipo_modelo_id.min' => 'Selecione o modelo do equipamento!',
            'equipa_num_serie.required' => 'Informe o número de série do equipamento!',

        ];
    }
}

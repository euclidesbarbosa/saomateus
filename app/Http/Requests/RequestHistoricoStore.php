<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestHistoricoStore extends FormRequest
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
            'solicitacao.equipaClienteCargo.clienteCargo.cliente.cliente_id' => 'required|numeric|min:1',
            'solicitacao.equipaClienteCargo.equipa.equipa_id' => 'required|numeric|min:1',
            'solicitacao.tipo_solicitacao_id' =>  'required|numeric|min:1',
            'tipo_historico_id' => 'required|numeric|min:1',
            'tipo_reclamacao_id' => 'required|numeric|min:1',
            'tipo_status_id' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'solicitacao.equipaClienteCargo.clienteCargo.cliente.cliente_id.required' => 'Selecione ou cadastre o cliente!',
            'solicitacao.equipaClienteCargo.clienteCargo.cliente.cliente_id.numeric' => 'Selecione ou cadastre o cliente!',
            'solicitacao.equipaClienteCargo.clienteCargo.cliente.cliente_id.min' => 'Selecione ou cadastre o cliente!',
            'solicitacao.equipaClienteCargo.equipa.equipa_id.required' => 'Selecione ou cadastre o equipamento!',
            'solicitacao.equipaClienteCargo.equipa.equipa_id.numeric' => 'Selecione ou cadastre o equipamento!',
            'solicitacao.equipaClienteCargo.equipa.equipa_id.min' => 'Selecione ou cadastre o equipamento!',
            'solicitacao.tipo_solicitacao_id.required' => 'Selecione o tipo de solicitação!',
            'solicitacao.tipo_solicitacao_id.numeric' => 'Selecione o tipo de solicitação!',
            'solicitacao.tipo_solicitacao_id.min' => 'Selecione o tipo de solicitação!',
            'tipo_historico_id.required' => 'Selecione o tipo de histórico!',
            'tipo_historico_id.numeric' => 'Selecione o tipo de histórico!',
            'tipo_historico_id.min' => 'Selecione o tipo de histórico!',
            'tipo_reclamacao_id.required' => 'Selecione a reclamação!',
            'tipo_reclamacao_id.numeric' => 'Selecione a reclamação!',
            'tipo_reclamacao_id.min' => 'Selecione a reclamação!',
            'tipo_status_id.required' => 'Selecione o status!',
            'tipo_status_id.numeric' => 'Selecione o status!',
            'tipo_status_id.min' => 'Selecione o status!',
        ];
    }

}

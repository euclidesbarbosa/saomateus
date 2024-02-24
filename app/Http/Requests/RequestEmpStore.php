<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEmpStore extends FormRequest
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
            'emp_razao_social' => 'required',
            'emp_nome_fantasia' => 'required',
            'emp_nome_abrv' => 'required_if:tipo_cliente_id,6',
            'emp_doc' => 'required|min:14|max:18',
        ];
    }

    public function messages()
    {
        return [
            'emp_razao_social.required' => 'Razão social não informada',
            'emp_nome_fantasia.required' => 'Nome fantasia não informada',
            'emp_nome_abrv.required_if' => 'Abreviação não informada',
            'emp_doc.required' => 'Doc. não informado',
            'emp_doc.min' => 'CPF / CNPJ inválido' ,
            'emp_doc.max' => 'CPF / CNPJ inválido' ,
        ];
    }
}

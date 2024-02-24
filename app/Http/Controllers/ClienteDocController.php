<?php

namespace App\Http\Controllers;

use App\Models\ClienteDoc;
use Illuminate\Http\Request;

class ClienteDocController extends Controller
{
    public function listar(Request $request){

        if(isset($request->input()['docConsulta'])){

            if($request->input()['docConsulta'] == 'CPF'){

                $retorno = $request->validate([
                    'cliente_doc_des' => 'required|cpf'
                ],[
                    'cliente_doc_des.required' => 'Informe o CPF para consulta!',
                    'cliente_doc_des.cpf' => 'CPF inválido!',
                ]);
            }

        }

        return ClienteDoc::listar($request->input());
    }

    public function store(Request $request){
        return ClienteDoc::store($request->input());
    }

    public function excluir(Request $request){
        return ClienteDoc::destroy($request->input());
    }
}

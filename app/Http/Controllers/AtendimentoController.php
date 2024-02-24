<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAtendimentoStore;
use App\Models\Atendimento;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function store(RequestAtendimentoStore $request){
        return Atendimento::store($request->input());
    }

    public function listar(Request $request){

        $atendimento = Atendimento::listar($request->input());

        return $atendimento;

    }

    public function excluir(Request $request){
        return Atendimento::destroy($request->input());
    }
}

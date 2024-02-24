<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRotinaSubstituicaoDuplicados;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function rotinaInclusaoMassa(Request $request){
        return Pessoa::rotinaInclusaoMassa($request->input());
    }

    public function rotinaAtualizacaoMassa(Request $request){
        return Pessoa::rotinaAtualizacaoMassa($request->input());
    }

    public function rotinaInclusaoMassaAlunos(Request $request){
        return Pessoa::rotinaInclusaoMassaAlunos($request->input());
    }

    public function listar(Request $request){
        return Pessoa::listar($request->input());
    }

    public function listarX(Request $request){
        return Pessoa::listarX($request->input());
    }

    public function store(Request $request){
        return Pessoa::store($request->input());
    }

    public function listarP(Request $request){
        return Pessoa::listarP($request->input());
    }

    public function listarP1(Request $request){
        return Pessoa::listarP1($request->input());
    }

    public function listarP2(Request $request){
        return Pessoa::listarP2($request->input());
    }

    public function listarResumo(Request $request){
        return Pessoa::listarResumo($request->input());
    }

    public function indexLocalidade(){
        return view('localidade');
    }

    public function indexHomonimos(){
        return view('homonimos');
    }

    public function rotinaSubstituicaoDuplicados(RequestRotinaSubstituicaoDuplicados $request){
        return Pessoa::rotinaSubstituicaoDuplicados($request->input());
    }
}

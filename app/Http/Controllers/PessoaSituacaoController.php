<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPessoaSituacaoStore;
use App\Models\PessoaSituacao;
use Illuminate\Http\Request;

class PessoaSituacaoController extends Controller
{
    public function index(){
        return view('pessoasituacao');
    }

    public function store(RequestPessoaSituacaoStore $request){
        return PessoaSituacao::store($request->input());
    }

    public function listar(Request $request){
        return PessoaSituacao::listar($request->input());
    }

    public function excluir(Request $request){
        return PessoaSituacao::destroy($request->input());
    }
}

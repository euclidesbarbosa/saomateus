<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestFuncaoStore;
use App\Models\Funcao;
use Illuminate\Http\Request;

class FuncaoController extends Controller
{
    public function index(){
        return view('funcao');
    }

    public function listar(Request $request){
        return Funcao::listar($request->input());
    }

    public function store(RequestFuncaoStore $request){
        return Funcao::store($request->input());
    }

    public function excluir(Request $request){
        return Funcao::destroy($request->input());
    }
}

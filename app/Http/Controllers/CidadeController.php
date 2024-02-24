<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCidadeStore;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index(){
        return view('cidade');
    }

    public function listar(Request $request){
        return Cidade::listar($request->input());
    }

    public function store(RequestCidadeStore $request){
        return Cidade::store($request->input());
    }

    public function excluir(Request $request){
        return Cidade::destroy($request->input());
    }
}

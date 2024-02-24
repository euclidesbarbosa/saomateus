<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestTipoExcluir;
use App\Http\Requests\RequestTipoStore;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function index($tipoSigla){

        $tipoSigla = json_encode($tipoSigla);

        return view('tipo', compact('tipoSigla'));

    }

    public function listar(Request $request){
        return Tipo::listar($request->input());
    }

    public function listarT(Request $request){
        return Tipo::listarT($request->input());
    }

    public function listarMassa(Request $request){
        return Tipo::listarMassa($request->input());
    }

    public function listarPerfil(Request $request){
        return Tipo::listarPerfil($request->input());
    }

    public function store(RequestTipoStore $request){
        return Tipo::store($request->input());
    }

    public function excluir(RequestTipoExcluir $request){
        return Tipo::destroy($request->input());
    }

    public function storeMenus(Request $request){

        return Tipo::storeMenus($request->input());

    }

}

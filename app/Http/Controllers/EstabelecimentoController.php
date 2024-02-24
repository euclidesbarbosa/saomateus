<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use Illuminate\Http\Request;

class EstabelecimentoController extends Controller
{
    public function index(){
        return view('estabelecimento');
    }

    public function listar(Request $request){
        return Estabelecimento::listar($request->input());
    }

    public function store(Request $request){
        return Estabelecimento::store($request->input());
    }

    public function escluir(Request $request){
        return Estabelecimento::destroy($request->input());
    }
}

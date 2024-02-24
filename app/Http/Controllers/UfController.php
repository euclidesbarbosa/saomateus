<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends Controller
{
    public function index(){
        return view('uf');
    }

    public function listar(Request $request){
        return Uf::listar($request->input());
    }

    public function store(Request $request){
        return Uf::store($request->input());
    }

    public function excluir(Request $request){
        return Uf::destroy($request->input());
    }
}

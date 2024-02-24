<?php

namespace App\Http\Controllers;

use App\Models\Censo;
use Illuminate\Http\Request;

class CensoController extends Controller
{
    public function index(){
        return view('censo');
    }

    public function listar(Request $request){
        return Censo::listar($request->input());
    }

    public function store(Request $request){
        return Censo::store($request->input());
    }

    public function excluir(Request $request){
        return Censo::destroy($request->input());
    }

}

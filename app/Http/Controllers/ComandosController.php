<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestMudaBancoRotina;
use App\Models\Comandos;
use Illuminate\Http\Request;

class ComandosController extends Controller
{
    public function index(){
        return view('comandos');
    }
    public function exec(Request $request){
        return Comandos::exec($request->input());
    }
    public function mudaBanco(RequestMudaBancoRotina $request){
        return Comandos::mudaBanco($request->input());
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MenuPerfil;
use Illuminate\Http\Request;

class MenuPerfilController extends Controller
{
    public function index(){
        return view('menuperfil');
    }

    public function store(Request $request){

        return MenuPerfil::store($request->input());

    }

    public function listar(Request $request){

        return MenuPerfil::listar($request->input());

    }

    public function listarMenu(Request $request){

        return MenuPerfil::listarMenu($request->input());

    }

    public function excluir(Request $request){

        return MenuPerfil::destroy($request->input());

    }

}

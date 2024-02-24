<?php

namespace App\Http\Controllers;

use App\Models\MenuPerfilUser;
use Illuminate\Http\Request;

class MenuPerfilUserController extends Controller
{
    public function index(){
        return view('menuperfil');
    }

    public function store(Request $request){

        return MenuPerfilUser::store($request->input());

    }

    public function listar(Request $request){

        return MenuPerfilUser::listar($request->input());

    }

    public function excluir(Request $request){

        return MenuPerfilUser::destroy($request->input());

    }
}

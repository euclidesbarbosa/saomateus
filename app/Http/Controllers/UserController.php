<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUserStore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        return view('user');

    }

    public function indexMudaSenha(){

        return view('usermudasenha');

    }

    public function listar(Request $request){

        return User::listar($request->input());

    }

    public function login(Request $request){

        return User::login($request->input());

    }

    public function store(Request $request){

        return User::store($request->input());

    }

    public function excluir(Request $request){

        return User::destroy($request->input());

    }

    public function mudasenha(RequestUserStore $request){

        return User::mudasenha($request->input());

    }

}

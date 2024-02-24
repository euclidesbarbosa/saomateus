<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUserCidadeStore;
use App\Models\UserCidade;
use Illuminate\Http\Request;

class UserCidadeController extends Controller
{
    public function index(){

        return view('usercidade');

    }

    public function listar(Request $request){

        return UserCidade::listar($request->input());

    }

    public function store(RequestUserCidadeStore $request){

        return UserCidade::store($request->input());

    }

    public function excluir(Request $request){

        return UserCidade::destroy($request->input());

    }
}

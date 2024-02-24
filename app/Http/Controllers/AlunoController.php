<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(){
//
    }

    public function listar(Request $request){
        return Aluno::listar($request->input());
    }

    public function store(Request $request){
        return Aluno::store($request->input());
    }

    public function rotinaInclusaoMassaAlunos(Request $request){
        return Aluno::rotinaInclusaoMassaAlunos($request->input());
    }

    public function rotinaInclusaoMassaAlunosF(Request $request){
        return Aluno::rotinaInclusaoMassaAlunosF($request->input());
    }

    public function rotinaAtualizaPessoa(Request $request){
        return Aluno::rotinaAtualizaPessoa($request->input());
    }
}

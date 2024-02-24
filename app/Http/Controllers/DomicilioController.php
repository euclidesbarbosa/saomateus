<?php

namespace App\Http\Controllers;

use App\Models\Domicilio;
use Illuminate\Http\Request;

class DomicilioController extends Controller
{
    public function store(Request $request){
        return Domicilio::store($request->input());
    }
    public function listar(Request $request){
        return Domicilio::listar($request->input());
    }
}

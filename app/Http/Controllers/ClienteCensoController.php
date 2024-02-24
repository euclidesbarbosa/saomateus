<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteCensoController extends Controller
{
    public function store(Request $request){

        return ClienteCenso::store($request->input());

    }
}

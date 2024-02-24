<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CulturaController extends Controller
{
    public function index(){
        return view('cultura');
    }
}

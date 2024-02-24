<?php

namespace App\Http\Controllers;

use App\Models\ClienteEnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

    }

    public function indexCadastro(){

//        $user = Auth::user(Auth::id());
//
//        $newChefeFamiliar = json_encode((ClienteEnd::getMax() == null ? 1 : ClienteEnd::getMax() + 1));
//
//        return view('home', compact('newChefeFamiliar', 'user'));

    }
}

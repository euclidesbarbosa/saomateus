<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $username = 'user_nome';

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


//    public function login(Request $request){
//
//        $email = $request->input('email');
//        $passwd = $request->input('password');
//
//        $user = User::listar([
//            'email' => $email,
//            'password' => $passwd
//        ]);
//
//        if (Auth::attempt(['email' => $email, 'password' => $passwd])) {
//            // Autenticação bem-sucedida
//            return redirect()->intended('/');
//        }
//
//        // Autenticação falhou
//        return redirect()->back()->withInput($request->only('email', 'identification'))->withErrors([
//            'email' => 'Credenciais inválidas.',
//        ]);
//    }
}

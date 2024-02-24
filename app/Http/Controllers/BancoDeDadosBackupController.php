<?php

namespace App\Http\Controllers;

use App\Models\BancoDeDadosBackup;
use Illuminate\Http\Request;

class BancoDeDadosBackupController extends Controller
{
    public function bancoBackup(Request $request){
        return BancoDeDadosBackup::bancoBackup($request->input());
    }
}

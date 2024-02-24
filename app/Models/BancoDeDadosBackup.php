<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BancoDeDadosBackup extends Model
{
    use HasFactory;

    public static function bancoBackup($request = null){

        try {

            //verifica o usuário logado
            if(Auth::user()['tipo_perfil_id'] != 1){
                $retorno[] =[
                    'erro' => 0,
                    'mensagem' => 'Não foi possível a execução!'
                ];

                return $retorno;
            }

//            ini_set('display_errors', 1);
//            ini_set('display_startup_errors', 1);
//            error_reporting(E_ALL);

            $database = 'adv';
            $user = 'usuario';
            $pass = 'eb2014';
            $host = 'localhost';
            $dir = public_path("dump_{$database}.sql") ;
//dd($dir);
//            echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";\

            $comando = "mysqldump -u {$user} -p{$pass} -h {$host} {$database} > {$dir}";

//            dd($comando);

            exec($comando, $output);

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Backup concluído com sucesso!',
                'output' => $output
            ];

        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao fazer backup!'
            ];


        }

        return $retorno;

    }
}

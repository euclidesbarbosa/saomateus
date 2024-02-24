<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Comandos extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function exec($request){
        try{

            if(Auth::user()['tipo_perfil_id'] != 1){

                $retorno[] =[
                    'erro' => 0,
                    'mensagem' => 'Erro ao gerar arquivo!'
                ];

                return $retorno;

            }

            $linha = -1;

            foreach($request as $row){

                DB::statement($row['cm']);

                $linha++;

            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Comandos executados com sucesso!',
                'id' => $linha
            ];

        }catch (\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao executar comandos!' .
                '<p>Erro na linha' . $linha .'</p>'
            ];
        }

        return $retorno;
    }

    public static function mudaBanco($request)
    {
        try {

            \DOMConfiguration::set("database.connections", [
                "host" => $request['host'],
                "database" => $request['database'],
                "username" => $request['username'],
                "password" => $request['password']
            ]);

            //\DB::reconnect();

            DB::transaction(function () {

                $pdo = DB::reconnect()->getPdo();;

                dd($pdo);


            });

            $retorno[] =[
              'erro' => 1,
              'mensagem' => 'Novo banco de dados conectado com sucesso!'
            ];

        }catch (\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao conectar em outro banco de dados!'
            ];

        }

        return $retorno;

    }
}

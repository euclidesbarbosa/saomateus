<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Uf extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable =[
        'uf_sigla',
        'uf_nome',
        'uf_regiao',
        'uf_capital',
        'uf_sta',
    ];

    //protected $primaryKey = 'uf_sigla';

    protected $table = 'uf';

    public static function listar($request = null){

        $dados = self::select('*');

        if($request != null){

            $uf_sigla = isset($request['uf_sigla']) ? $request['uf_sigla'] : null;

            $uf_sta = isset($request['uf_sta']) ? $request['uf_sta'] : null;

            $dados = $dados
                ->when($uf_sigla, function($query, $campo){
                    return $query->where('uf_sigla', '=', $campo);
                })
                ->when($uf_sta, function($query, $campo){
                    return $query->where('uf_sta', '=', $campo);
                });

        }

        $dados = $dados
            ->orderBy('uf_sigla', 'ASC')
            ->paginate(50);

        return $dados;

    }

    public static function store($request){
        try{

            $uf_sigla =  Str::upper(trim($request['uf_sigla']));
            $uf_nome =  Str::upper(trim($request['uf_nome']));
            $uf_regiao = isset($request['uf_regiao']) ? $request['uf_regiao'] : null;
            $uf_capital = isset($request['uf_capital']) ? $request['uf_capital'] : null;
            $uf_sta = isset($request['uf_sta']) ? $request['uf_sta'] : 1;

            //verifica se já existe
            $ufs = self::listar([
                'uf_sigla' => $uf_sigla
            ]);

            if($ufs->count() == 0){

                self::create([
                    'uf_sigla' => $uf_sigla,
                    'uf_nome' => $uf_nome,
                    'uf_capital' => $uf_capital,
                    'uf_regiao' => $uf_regiao,
                    'uf_sta' => $uf_sta,
                ]);

            }
            else{
                self::where('uf_sigla', $uf_sigla)
                    ->update([
                        'uf_sigla' => $uf_sigla,
                        'uf_nome' => $uf_nome,
                        'uf_capital' => $uf_capital,
                        'uf_regiao' => $uf_regiao,
                        'uf_sta' => $uf_sta,
                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Inserido/Atualizado com sucesso!'
            ];

        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inser/atualizar!'
            ];

        }

        return $retorno;

    }

    public static function destroy($request){
        try{

            $uf_sigla =  $request['uf_sigla'];

            self::where('uf_sigla', $uf_sigla)
                ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Excluído com sucesso!'
            ];

        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao excluir!'
            ];

        }

        return $retorno;

    }

}

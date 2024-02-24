<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaSituacao extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable =[
        'pessoa_id',
        'pessoa_situacao_data',
        'pessoa_situacao_desabrigada',
        'pessoa_situacao_desempregada',
        'pessoa_situacao_estudando',
        'pessoa_situacao_obto',
        'pessoa_situacao_filho',
        'pessoa_situacao_rec_bolsa_familia',
        'user_id',
    ];

    protected $primaryKey = 'pessoa_situacao_id';

    protected $table = 'pessoa_situacao';

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'pessoa_id', 'pessoa_id');
    }

    public static function listar($request = null){
        $dados = self::with([
            'pessoa'
        ]);

        if($request != null){

            $pessoa_situacao_id = isset($request['pessoa_situacao_id']) ? $request['pessoa_situacao_id'] : null;
            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $pessoa_situacao_data = isset($request['pessoa_situacao_data']) ? $request['pessoa_situacao_data'] : null;
            $pessoa_situacao_desabrigada = isset($request['pessoa_situacao_desabrigada']) ? $request['pessoa_situacao_desabrigada'] : null;
            $pessoa_situacao_desempregada = isset($request['pessoa_situacao_desempregada']) ? $request['pessoa_situacao_desempregada'] : null;
            $pessoa_situacao_estudando = isset($request['pessoa_situacao_estudando']) ? $request['pessoa_situacao_estudando'] : null;
            $pessoa_situacao_obto = isset($request['pessoa_situacao_obto']) ? $request['pessoa_situacao_obto'] : null;
            $pessoa_situacao_filho = isset($request['pessoa_situacao_filho']) ? $request['pessoa_situacao_filho'] : null;
            $pessoa_situacao_rec_bolsa_familia = isset($request['pessoa_situacao_rec_bolsa_familia']) ? $request['pessoa_situacao_rec_bolsa_familia'] : null;
            $user_id = isset($request['user_id']) ? $request['user_id'] : null;

            $dados = $dados
                ->when($pessoa_situacao_id, function($query, $campo){
                    return $query->where('pessoa_situacao_id','=', $campo);
                })
                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa_id','=', $campo);
                })
                ->when($pessoa_situacao_data, function($query, $campo){
                    return $query->where('pessoa_situacao_data','=', $campo);
                })
                ->when($pessoa_situacao_desabrigada, function($query, $campo){
                    return $query->where('pessoa_situacao_desabrigada','=', $campo);
                })
                ->when($pessoa_situacao_desempregada, function($query, $campo){
                    return $query->where('pessoa_situacao_desempregada','=', $campo);
                })
                ->when($pessoa_situacao_estudando, function($query, $campo){
                    return $query->where('pessoa_situacao_estudando','=', $campo);
                })
                ->when($pessoa_situacao_obto, function($query, $campo){
                    return $query->where('pessoa_situacao_obto','=', $campo);
                })
                ->when($pessoa_situacao_filho, function($query, $campo){
                    return $query->where('pessoa_situacao_filho','=', $campo);
                })
                ->when($pessoa_situacao_rec_bolsa_familia, function($query, $campo){
                    return $query->where('pessoa_situacao_rec_bolsa_familia','=', $campo);
                })
                ->when($user_id, function($query, $campo){
                    return $query->where('user_id','=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('pessoa_id', 'asc')
            ->orderBy('updated_at', 'desc')
            ->paginate(100);

        return $dados;

    }

    public static function store($request){

        try{

//            dd($request);

            $id = isset($request['pessoa_situacao_id']) ? $request['pessoa_situacao_id'] : null;
            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $pessoa_situacao_data = isset($request['pessoa_situacao_data']) ? $request['pessoa_situacao_data'] : null;
            $pessoa_situacao_desabrigada = isset($request['pessoa_situacao_desabrigada']) ? $request['pessoa_situacao_desabrigada'] : null;
            $pessoa_situacao_desempregada = isset($request['pessoa_situacao_desempregada']) ? $request['pessoa_situacao_desempregada'] : null;
            $pessoa_situacao_estudando = isset($request['pessoa_situacao_estudando']) ? $request['pessoa_situacao_estudando'] : null;
            $pessoa_situacao_obto = isset($request['pessoa_situacao_obto']) ? $request['pessoa_situacao_obto'] : null;
            $pessoa_situacao_filho = isset($request['pessoa_situacao_filho']) ? $request['pessoa_situacao_filho'] : null;
            $pessoa_situacao_rec_bolsa_familia = isset($request['pessoa_situacao_rec_bolsa_familia']) ? $request['pessoa_situacao_rec_bolsa_familia'] : null;
            $user_id = isset($request['user_id']) ? $request['user_id'] : null;


            if($id == null){

                $id = self::create([
                    'pessoa_id' => $pessoa_id,
                    'pessoa_situacao_data' => $pessoa_situacao_data,
                    'pessoa_situacao_desabrigada' => $pessoa_situacao_desabrigada,
                    'pessoa_situacao_desempregada' => $pessoa_situacao_desempregada,
                    'pessoa_situacao_estudando' => $pessoa_situacao_estudando,
                    'pessoa_situacao_obto' => $pessoa_situacao_obto,
                    'pessoa_situacao_filho' => $pessoa_situacao_filho,
                    'pessoa_situacao_rec_bolsa_familia' => $pessoa_situacao_rec_bolsa_familia,
                    'user_id' => $user_id,
                ])->pessoa_situacao_id;

            }
            else{
                self::where('pessoa_situacao_id', $id)
                    ->update([
                        'pessoa_id' => $pessoa_id,
                        'pessoa_situacao_data' => $pessoa_situacao_data,
                        'pessoa_situacao_desabrigada' => $pessoa_situacao_desabrigada,
                        'pessoa_situacao_desempregada' => $pessoa_situacao_desempregada,
                        'pessoa_situacao_estudando' => $pessoa_situacao_estudando,
                        'pessoa_situacao_obto' => $pessoa_situacao_obto,
                        'pessoa_situacao_filho' => $pessoa_situacao_filho,
                        'pessoa_situacao_rec_bolsa_familia' => $pessoa_situacao_rec_bolsa_familia,
                        'user_id' => $user_id,
                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Inserido / Atualizado com sucesso!',
                'id' => $id
            ];

        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir / atualizar! ' . $e->getMessage()
            ];

        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id = $request['pessoa_situacao_id'];

            self::where('pessoa_situacao_id', $id)
                ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Situação da pessoa removida!'
            ];

        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover situação da pessoa!'
            ];

        }

        return $retorno;

    }
}

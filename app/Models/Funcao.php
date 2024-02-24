<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable = [
        'tipo_funcao_id',
        'user_id',
        'funcao_sta',
    ];

    protected $primaryKey = 'funcao_id';

    protected $table = 'funcao';

    public function tipoFuncao(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_funcao_id');
    }

    public function usuarios(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'tipoFuncao',
            'usuarios',
        ]);

        if($request != null){

            $funcao_id = isset($request['funcao_id']) ? $request['funcao_id'] : null;
            $user_id = isset($request['user_id']) ? $request['user_id'] : null;
            $tipo_funcao_id = isset($request['tipo_funcao_id']) ? $request['tipo_funcao_id'] : null;
            $funcao_sta = isset($request['funcao_sta']) ? $request['funcao_sta'] : null;

            $dados = $dados
                ->when($funcao_id, function($query, $funcao_id){
                    return $query->where('funcao_id', '=', $funcao_id);
                })
                ->when($user_id, function($query, $user_id){
                    return $query->where('user_id', '=', $user_id);
                })
                ->when($tipo_funcao_id, function($query, $tipo_funcao_id){
                    return $query->where('tipo_funcao_id', '=', $tipo_funcao_id);
                })
                ->when($funcao_sta, function($query, $funcao_sta){
                    return $query->where('funcao_sta', '=', $funcao_sta);
                });

        }

        $dados = $dados
            ->orderBy('tipo_funcao_id', 'ASC')
            ->paginate(100);

        return $dados;
    }

    public static function store($request){

        try{

            $id = isset($request['funcao_id']) ? $request['funcao_id'] : null;
            $user_id = isset($request['user_id']) ? $request['user_id'] : null;
            $tipo_funcao_id = isset($request['tipo_funcao_id']) ? $request['tipo_funcao_id'] : null;
            $funcao_sta = isset($request['funcao_sta']) ? $request['funcao_sta'] : 1;

            if($id == null){

                $id = self::create([
                    'user_id' => $user_id,
                    'tipo_funcao_id' => $tipo_funcao_id,
                    'funcao_sta' => $funcao_sta,
                ]);

            }
            else{
                self::where('funcao_id', $id)
                ->update([
                    'user_id' => $user_id,
                    'tipo_funcao_id' => $tipo_funcao_id,
                    'funcao_sta' => $funcao_sta,
                ]);
            }

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Inserido/atualizado com sucesso!',
                'id' => $id

            ];

        }catch(\Exception $e){

            $mensagem = 'Erro ao inserir/atualizar usuário na função! ';

            if($e->getCode() == 23000){

                $retorno[] = [
                    'erro' => 0,
                    'mensagem' => $mensagem .
                        '<p>Essa função já existe para o usuário especificado!</p>'
                ];

            }
            else {
                $retorno[] = [
                    'erro' => 0,
                    'mensagem' => 'Erro ao inserir/atualizar usuário na função! ' . $e->getCode()
                ];
            }
        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id = $request['funcao_id'];

            self::where('funcao_id', $id)
            ->delete();

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Removido com sucesso!'

            ];

        }catch(Exception $e){
            $retorno[] = [
                'erro' => 0,
                'mensagem' => 'Erro ao remover usuário da função!'
            ];
        }

        return $retorno;

    }
}

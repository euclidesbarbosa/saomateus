<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscolaAluno extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $fillable =[
      'tipo_escola_id',
      'aluno_id',
      'escola_aluno_sta',
    ];

    protected $primaryKey = 'escola_aluno_id';

    protected $table = 'escola_aluno';

    public function escola(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_escola_id');
    }

    public function aluno(){
        return $this->hasOne(Aluno::class, 'aluno_id', 'aluno_id');
    }

    public static function listar($request = null){

        $dados = self::with([
           'escola',
           'aluno',
        ]);

        if($request != null){

            $id = isset($request['escola_aluno_id']) ? $request['escola_aluno_id'] : null;
            $tipo_escola_id = isset($request['tipo_escola_id']) ? $request['tipo_escola_id'] : null;
            $aluno_id = isset($request['aluno_id']) ? $request['aluno_id'] : null;
            $tipo_escola_id = isset($request['tipo_escola_id']) ? $request['tipo_escola_id'] : null;
            $escola_aluno_sta = isset($request['escola_aluno_sta']) ? $request['escola_aluno_sta'] : null;

            $dados = $dados
                ->when($id, function($query, $campo){
                    return $query->where('escola_aluno_id', '=', $campo);
                })
                ->when($tipo_escola_id, function($query, $campo){
                    return $query->where('tipo_escola_id', '=', $campo);
                })
                ->when($aluno_id, function($query, $campo){
                    return $query->where('aluno_id', '=', $campo);
                })
                ->when($tipo_escola_id, function($query, $campo){
                    return $query->where('tipo_escola_id', '=', $campo);
                })
                ->when($escola_aluno_sta, function($query, $campo){
                    return $query->where('escola_aluno_sta', '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->paginate(200);


        return $dados;

    }

    public static function store($request){

        try{

            $id = isset($request['escola_aluno_id']) ? $request['escola_aluno_id'] : null;
            $tipo_escola_id = isset($request['tipo_escola_id']) ? $request['tipo_escola_id'] : null;
            $aluno_id = isset($request['aluno_id']) ? $request['aluno_id'] : null;
            $tipo_escola_id = isset($request['tipo_escola_id']) ? $request['tipo_escola_id'] : null;
            $escola_aluno_sta = isset($request['escola_aluno_sta']) ? $request['escola_aluno_sta'] : null;

            $alunoEscola = self::listar([
                'tipo_escola_id' => $tipo_escola_id,
                'aluno_id' => $aluno_id,
            ]);

            if($id == null){

                $id = self::create([
                    'tipo_escola_id' => $tipo_escola_id,
                    'aluno_id' => $aluno_id,
                    'tipo_escola_id' => $tipo_escola_id,
                    'escola_aluno_sta' => $escola_aluno_sta,
                ])->escola_aluno_id;

            }
            else{
                self::where('escola_aluno_id', $id)
                ->update([
                    'tipo_escola_id' => $tipo_escola_id,
                    'aluno_id' => $aluno_id,
                    'tipo_escola_id' => $tipo_escola_id,
                    'escola_aluno_sta' => $escola_aluno_sta,
                ]);
            }

            $retorno[] =[
              'erro' => 1,
              'mensagem' => 'Inserido/atualizado com sucesso!',
              'id' => $id
            ];

        }catch(\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar! ' . $e->getMessage()
            ];
        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id = $request['escola_aluno_id'];

            self::where('escola_aluno_id', $id)
            ->delete();

            $retorno[] =[
              'erro' => 1,
              'mensagem' => 'Removido com sucesso!'
            ];

        }catch(\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover!' . $e->getMessage()
            ];
        }

        return $retorno;

    }

}

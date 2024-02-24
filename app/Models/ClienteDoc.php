<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteDoc extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    protected $fillable =[
        'cliente_id',
        'tipo_doc_id',
        'cliente_doc_des',
        'cliente_doc_sta',
    ];

    protected $primaryKey = 'cliente_doc_id';

    protected $table = 'cliente_doc';

    public function tipoDoc(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_doc_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'tipoDoc',
        ]);

        if($request != null){
            $cliente_doc_id = isset($request['cliente_doc_id']) ? $request['cliente_doc_id'] : null;
            $cliente_id = isset($request['cliente_id']) ? $request['cliente_id'] : null;
            $tipo_doc_id = isset($request['tipo_doc_id']) ? $request['tipo_doc_id'] : null;
            $cliente_doc_des = isset($request['cliente_doc_des']) ? $request['cliente_doc_des'] : null;
            $cliente_doc_sta = isset($request['cliente_doc_sta']) ? $request['cliente_doc_sta'] : null;

            $dados = $dados
                ->when($cliente_doc_id, function($query, $campo){
                    return $query->where('cliente_doc_id', '=', $campo);
                })
                ->when($cliente_id, function($query, $campo){
                    return $query->where('cliente_id', '=', $campo);
                })
                ->when($tipo_doc_id, function($query, $campo){
                    return $query->where('tipo_doc_id', '=', $campo);
                })
                ->when($cliente_doc_des, function($query, $campo){
                    return $query->where('cliente_doc_des', '=', $campo);
                })
                ->when($cliente_doc_sta, function($query, $campo){
                    return $query->where('cliente_doc_sta', '=', $campo);
                });


        }

        $dados = $dados
            ->paginate(100);

        return $dados;

    }

    public static function store($request){
        try{

            $id = isset($request['cliente_doc_id']) ? $request['cliente_doc_id'] : null;
            $cliente_id = isset($request['cliente_id']) ? $request['cliente_id'] : null;
            $tipo_doc_id = isset($request['tipo_doc_id']) ? $request['tipo_doc_id'] : null;
            $cliente_doc_des = isset($request['cliente_doc_des']) ? $request['cliente_doc_des'] : null;
            $cliente_doc_sta = isset($request['cliente_doc_sta']) ? $request['cliente_doc_sta'] : null;

            if($id == null){
                $id = self::create([
                    'cliente_id' => $cliente_id,
                    'tipo_doc_id' => $tipo_doc_id,
                    'cliente_doc_des' => $cliente_doc_des,
                    'cliente_doc_sta' => $cliente_doc_sta,
                ])->cliente_doc_id;
            }
            else{
                self::where('cliente_doc_id', $id)
                    ->update([
                        'cliente_id' => $cliente_id,
                        'tipo_doc_id' => $tipo_doc_id,
                        'cliente_doc_des' => $cliente_doc_des,
                        'cliente_doc_sta' => $cliente_doc_sta,
                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Documento inserido com sucesso!',
                'id' => $id
            ];
        }catch (\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir documento!' . $e->getMessage()
            ];

        }

        return $retorno;

    }

    public static function destroy($request){
        try{

            $id = $request['cliente_doc_id'];

            self::where('cliente_doc_id', $id)
                ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Documento removido com sucesso!'
            ];
        }catch (\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover documento!'
            ];

        }

        return $retorno;

    }
}

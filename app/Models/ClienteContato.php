<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteContato extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable =[
        'cliente_id',
        'tipo_contato_id',
        'cliente_contato_des',
        'cliente_contato_sta',
    ];

    protected $primaryKey = 'cliente_contato_id';

    protected $table = 'cliente_contato';

    public function tipoContato(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_contato_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'tipoContato',
        ]);

        if($request != null) {
            $cliente_contato_id = isset($request['cliente_contato_id']) ? $request['cliente_contato_id'] : null;
            $cliente_id = isset($request['cliente_id']) ? $request['cliente_id'] : null;
            $tipo_contato_id = isset($request['tipo_contato_id']) ? $request['tipo_contato_id'] : null;
            $cliente_contato_des = isset($request['cliente_contato_des']) ? $request['cliente_contato_des'] : null;
            $cliente_contato_sta = isset($request['cliente_contato_sta']) ? $request['cliente_contato_sta'] : null;

            $dados = $dados
            ->when($cliente_contato_id, function($query, $campo){
                return $query->where('cliente_contato_id', '=', $campo);
            })
            ->when($cliente_id, function($query, $campo){
                return $query->where('cliente_id', '=', $campo);
            })
            ->when($tipo_contato_id, function($query, $campo){
                return $query->where('tipo_contato_id', '=', $campo);
            })
            ->when($cliente_contato_des, function($query, $campo){
                return $query->where('cliente_contato_des', '=', $campo);
            })
            ->when($cliente_contato_sta, function($query, $campo){
                return $query->where('cliente_contato_sta', '=', $campo);
            });

        }

    }

    public static function store($request){
        try{

            $id = isset($request['cliente_contato_id']) ? $request['cliente_contato_id'] : null;
            $cliente_id = isset($request['cliente_id']) ? $request['cliente_id'] : null;
            $tipo_contato_id = isset($request['tipo_contato_id']) ? $request['tipo_contato_id'] : null;
            $cliente_contato_des = isset($request['cliente_contato_des']) ? $request['cliente_contato_des'] : null;
            $cliente_contato_sta = isset($request['cliente_contato_sta']) ? $request['cliente_contato_sta'] : null;

            if($id == null){
                $id = self::create([
                    'cliente_id' => $cliente_id,
                    'tipo_contato_id' => $tipo_contato_id,
                    'cliente_contato_des' => $cliente_contato_des,
                    'cliente_contato_sta' => $cliente_contato_sta,
                ]);
            }
            else{
                self::where('cliente_contato_id', $id)
                ->update([
                    'cliente_id' => $cliente_id,
                    'tipo_contato_id' => $tipo_contato_id,
                    'cliente_contato_des' => $cliente_contato_des,
                    'cliente_contato_sta' => $cliente_contato_sta,
                ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Contato inserido com sucesso!',
                'id' => $id
            ];
        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir contato!'
            ];

        }

        return $retorno;

    }

    public static function destroy($request){
        try{

            $id = $request['cliente_contato_id'];

            self::where('cliente_contato_id', $id)
            ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Contato removido com sucesso!'
            ];
        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover contato!'
            ];

        }

        return $retorno;

    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Censo extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $fillable = [
        'cidade_id',
        'censo_ano',
        'censo_mes',
        'censo_titulo',
        'censo_desc',
        'censo_sta',
        'tipo_censo_status_id',
    ];

    protected $primaryKey = 'censo_id';

    protected $table = 'censo';

    public function cidade(){
        return $this->hasOne(Cidade::class, 'cidade_id', 'cidade_id')
            ->orderBy('uf_sigla', 'ASC')
            ->orderBy('cidade_nome', 'ASC');
    }

    public function tipoCensoStatus(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_censo_status_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'cidade',
            'tipoCensoStatus'
        ]);

        if($request != null){

            $cidade_id = isset($request['cidade_id']) ? $request['cidade_id'] : null;
            $censo_id = isset($request['censo_id']) ? $request['censo_id'] : null;
            $censo_ano = isset($request['censo_ano']) ? $request['censo_ano'] : null;
            $censo_mes = isset($request['censo_mes']) ? $request['censo_mes'] : null;
            $censo_titulo = isset($request['censo_titulo']) ? $request['censo_titulo'] : null;
            $censo_desc = isset($request['censo_desc']) ? $request['censo_desc'] : null;
            $tipo_censo_status_id = isset($request['tipo_censo_status_id']) ? $request['tipo_censo_status_id'] : null;
            $censo_sta = isset($request['censo_sta']) ? $request['censo_sta'] : null;

            $dados = $dados
                ->when($cidade_id, function($query, $campo){
                    return $query->where('cidade_id', '=', $campo);
                })
                ->when($censo_id, function($query, $campo){
                    return $query->where('censo_id', '=', $campo);
                })
                ->when($censo_ano, function($query, $campo){
                    return $query->where('censo_ano', '=', $campo);
                })
                ->when($censo_mes, function($query, $campo){
                    return $query->where('censo_mes', '=', $campo);
                })
                ->when($censo_titulo, function($query, $campo){
                    return $query->where('censo_titulo', '=', $campo);
                })
                ->when($censo_desc, function($query, $campo){
                    return $query->where('censo_desc', '=', $campo);
                })
                ->when($censo_sta, function($query, $campo){
                    return $query->where('censo_sta', '=', $campo);
                })
                ->when($tipo_censo_status_id, function($query, $campo){
                    return $query->where('tipo_censo_status_id', '=', $campo);
                });

        }

        $dados = $dados
            ->orderBy('censo_ano', 'DESC')
            ->orderBy('censo_mes', 'DESC')
            ->paginate(100);

        return $dados;

    }

    public static function store($request){

        try{

            $id = isset($request['censo_id']) ? $request['censo_id'] : null;
            $cidade_id = $request['cidade_id'];
            $censo_ano = isset($request['censo_ano']) ? $request['censo_ano'] : null;
            $censo_mes = isset($request['censo_mes']) ? $request['censo_mes'] : null;
            $censo_titulo = isset($request['censo_titulo']) ? Str::upper(trim($request['censo_titulo'])) : null;
            $censo_desc = isset($request['censo_desc']) ? Str::upper(trim($request['censo_desc'])) : null;
            $tipo_censo_status_id = isset($request['tipo_censo_status_id']) ? $request['tipo_censo_status_id'] : 0;
            $censo_sta = isset($request['censo_sta']) ? $request['censo_sta'] : 1;

            if($id == null){
                $id = self::create([
                    'cidade_id' => $cidade_id,
                    'censo_ano' => $censo_ano,
                    'censo_mes' => $censo_mes,
                    'censo_titulo' => $censo_titulo,
                    'censo_desc' => $censo_desc,
                    'tipo_censo_status_id' => $tipo_censo_status_id,
                    'censo_sta' => $censo_sta,
                ]);
            }
            else{
                self::where('censo_id', $id)
                    ->update([
                        'cidade_id' => $cidade_id,
                        'censo_ano' => $censo_ano,
                        'censo_mes' => $censo_mes,
                        'censo_titulo' => $censo_titulo,
                        'censo_desc' => $censo_desc,
                        'tipo_censo_status_id' => $tipo_censo_status_id,
                        'censo_sta' => $censo_sta,
                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Censo inserido com sucesso!',
                'id' => $id
            ];
        }catch (\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir censo!' . $e->getMessage()
            ];
        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id = $request['censo_id'];

            self::where('censo_id', $id)
                ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Censo removido com sucesso!'
            ];
        }catch (\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover censo!'
            ];
        }

        return $retorno;

    }
}

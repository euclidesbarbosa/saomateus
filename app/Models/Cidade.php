<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cidade extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    protected $fillable = [
        'uf_sigla',
        'cidade_nome',
        'cidade_ibge',
        'cidade_capital',
        'cidade_cnpj',
        'cidade_sta',
        'cidade_principal',
    ];

    protected $primaryKey = 'cidade_id';

    protected $table = 'cidade';

    public function uF(){
        return $this->hasOne(Uf::class, 'uf_sigla', 'uf_sigla');
    }

    public static function listar($request = null){

        $uf_sigla = isset($request['uf_sigla']) ? $request['uf_sigla'] : 'MA';
        $cidade_id = isset($request['cidade_id']) ? $request['cidade_id'] : null;
        $cidade_nome = isset($request['cidade_nome']) ? $request['cidade_nome'] : null;
        $cidade_capital = isset($request['cidade_capital']) ? $request['cidade_capital'] : null;
        $cidade_principal = isset($request['cidade_principal']) ? $request['cidade_principal'] : null;
        $cidade_cnpj = isset($request['cidade_cnpj']) ? $request['cidade_cnpj'] : null;
        $cidade_sta = isset($request['cidade_sta']) ? $request['cidade_sta'] : null;

        $dados = self::with([
            'uF',
        ]);

        $dados = $dados
            ->when($uf_sigla, function($query, $campo){
                return $query->where('uf_sigla', '=', $campo);
            })
            ->when($cidade_id, function($query, $campo){
                return $query->where('cidade_id', '=', $campo);
            })
            ->when($cidade_nome, function($query, $campo){
                return $query->where('cidade_nome', 'like', '%' . $campo . '%');
            })
            ->when($cidade_capital, function($query, $campo){
                return $query->where('cidade_capital', '=', $campo);
            })
            ->when($cidade_cnpj, function($query, $campo){
                return $query->where('cidade_cnpj', '=', $campo);
            })
            ->when($cidade_sta, function($query, $campo){
                return $query->where('cidade_sta', '=', $campo);
            })
            ->when($cidade_principal, function($query, $campo){
                return $query->where('cidade_principal', '=', $campo);
            })
            ->orderBy('uf_sigla', 'ASC')
            ->orderBy('cidade_nome', 'ASC')
            ->paginate(300);

        return $dados;

    }

    public static function store($request){
        try{
            $id = isset($request['cidade_id']) ? $request['cidade_id'] : null;
            $uf_sigla = Str::upper(trim($request['uf_sigla']));
            $cidade_nome = Str::upper(trim($request['cidade_nome']));
            $cidade_ibge = isseet($request['cidade_ibge']) ? $request['cidade_ibge'] : null;
            $cidade_capital = isseet($request['cidade_capital']) ? $request['cidade_capital'] : null;
            $cidade_principal = isseet($request['cidade_principal']) ? $request['cidade_principal'] : null;
            $cidade_cnpj = isseet($request['cidade_cnpj']) ? $request['cidade_cnpj'] : null;
            $cidade_sta = isseet($request['cidade_sta']) ? $request['cidade_sta'] : 1;

            //verifica se  já existe
            $cidade = self::listar([
                'uf_sigla' => $uf_sigla,
                'cidade_nome' => $cidade_nome
            ]);

            if($cidade->count() != 0){

                if($id != $cidade[0]['cidade_nome']){

                    $retorno[] =[
                        'erro' => 0,
                        'mensagem' => 'Cidade já existe'
                    ];

                    return $retorno;

                }

                unset($retorno);

            }

            if($id == null){
                $id = self::create([
                    'uf_sigla' => $uf_sigla,
                    'cidade_nome' => $cidade_nome,
                    'cidade_capital' => $cidade_capital,
                    'cidade_principal' => $cidade_principal,
                    'cidade_cnpj' => $cidade_cnpj,
                    'cidade_ibge' => $cidade_ibge,
                    'cidade_sta' => $cidade_sta,
                ])->cidade_id;

            }else{
                self::where('cidade_id', $id)
                    ->update([
                        'uf_sigla' => $uf_sigla,
                        'cidade_nome' => $cidade_nome,
                        'cidade_capital' => $cidade_capital,
                        'cidade_principal' => $cidade_principal,
                        'cidade_cnpj' => $cidade_cnpj,
                        'cidade_ibge' => $cidade_ibge,
                        'cidade_sta' => $cidade_sta,
                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Cidade inserida/atualizada com sucesso!',
                'id' => $id
            ];

        }catch(Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar cidade!'
            ];

        }

        return $retorno;

    }

    public static function destroy($request){
        try{

            $id = $request['cidade_id'];

            self::where('cidade_id', $id)
                ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Cidade excluída com sucesso!',
                'id' => $id
            ];

        }catch(Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao excluir cidade!'
            ];

        }

        return $retorno;

    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteCenso extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable = [
        'censo_id',
        'cliente_id',
        'cliente_censo_qtd_dep',
        'cliente_censo_possui_imovel',
        'tipo_moradia_id',
        'cliente_censo_qtd_morador',
        'cliente_censo_desabrigado_situacao',
        'cep',
        'end',
        'end_compl',
        'ibge',
        'cidade',
        'bairro',
        'cliente_censo_sta',
    ];

    protected $primaryKey = 'cliente_censo_id';

    protected $table = 'cliente_censo';

    public function censo(){
        return $this->hasOne(Censo::class, 'censo_id', 'censo_id');
    }

    public function clienteP(){
        return $this->hasOne(Cliente::class, 'cliente_id', 'cliente_id_1');
    }

    public function cliente(){
        return $this->hasMany(Cliente::class, 'cliente_id_1', 'cliente_id_1');
    }

    public function tipoMoradia(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_moradia_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'censo',
            'clienteP',
            'clienteP.contatos',
            'clienteP.docs',
            'clientes',
            'clientes.contatos',
            'clientes.docs',
            'tipoMoradia',
        ]);

        if($request != null){

            $censo_id = isset($request['censo_id']) ? $request['censo_id'] : null;

            $cliente_id = isset($request['cliente_id']) ? $request['cliente_id'] : null;

            $tipo_moradia_id = isset($request['tipo_moradia_id']) ? $request['tipo_moradia_id'] : null;

            $cliente_censo_sta = isset($request['cliente_censo_sta']) ? $request['cliente_censo_sta'] : null;

            $dados = $dados
                ->when($censo_id, function($query, $campo){
                    return $query->where('censo_id', '=', $campo);
                })
                ->when($cliente_id, function($query, $campo){
                    return $query->where('cliente_id', '=', $campo);
                })
                ->when($tipo_moradia_id, function($query, $campo){
                    return $query->where('tipo_moradia_id', '=', $campo);
                })
                ->when($cliente_censo_sta, function($query, $campo){
                    return $query->where('cliente_censo_sta', '=', $campo);
                });

        }

        $dados = $dados
            ->paginate(100);

        return $dados;

    }

    public static function store($request){

        try{

            $censo_id = $request['censo_id'];

            $cliente_id = $request['cliente_id'];

            $request = $request['clienteCenso'];

            $id = isset($request['cliente_censo_id']) ? $request['cliente_censo_id'] : null;
            $cliente_censo_qtd_dep = isset($request['cliente_censo_qtd_dep']) ? $request['cliente_censo_qtd_dep'] : null;
            $cliente_censo_possui_imovel = isset($request['cliente_censo_possui_imovel']) ? $request['cliente_censo_possui_imovel'] : null;
            $tipo_moradia_id = isset($request['tipo_moradia_id']) ? $request['tipo_moradia_id'] : null;
            $cliente_censo_qtd_morador = isset($request['cliente_censo_qtd_morador']) ? $request['cliente_censo_qtd_morador'] : null;
            $cliente_censo_desabrigado_situacao = isset($request['cliente_censo_desabrigado_situacao']) ? $request['cliente_censo_desabrigado_situacao'] : null;
            $cliente_censo_sta = isset($request['cliente_censo_sta']) ? $request['cliente_censo_sta'] : 1;

            //endereço

            $cep = null;
            $end = null;
            $end_compl = null;
            $ibge = null;
            $cidade = null;
            $bairro = null;

            $cepLogradouro = isset($request['cepLogradouro']) ? $request['cepLogradouro'] : null;

            if($cepLogradouro != null) {
                $cep = isset($cepLogradouro['cep']) ? $cepLogradouro['cep'] : null;
                $end = isset($cepLogradouro['end']) ? $cepLogradouro['end'] : null;
                $end_compl = isset($cepLogradouro['end_compl']) ? $cepLogradouro['end_compl'] : null;
                $ibge = isset($cepLogradouro['ibge']) ? $cepLogradouro['ibge'] : null;
                $cidade = isset($cepLogradouro['cidade']) ? $cepLogradouro['cidade'] : null;
                $bairro = isset($cepLogradouro['bairro']) ? $cepLogradouro['bairro'] : null;
            }
            
            if($id == null){

                $id = self::create([
                    'censo_id' => $censo_id,
                    'cliente_id' => $cliente_id,
                    'cliente_censo_qtd_dep' => $cliente_censo_qtd_dep,
                    'cliente_censo_possui_imovel' => $cliente_censo_possui_imovel,
                    'tipo_moradia_id' => $tipo_moradia_id,
                    'cliente_censo_qtd_morador' => $cliente_censo_qtd_morador,
                    'cliente_censo_desabrigado_situacao' => $cliente_censo_desabrigado_situacao,
                    'cliente_censo_sta' => $cliente_censo_sta,
                    'cep' => $cep,
                    'end' => $end,
                    'end_compl' => $end_compl,
                    'ibge' => $ibge,
                    'cidade' => $cidade,
                    'bairro' => $bairro,
                ])->cliente_censo_id;

            }else{

                self::where('cliente_censo_id', $id)
                ->update([
                    'censo_id' => $censo_id,
                    'cliente_id' => $cliente_id,
                    'cliente_censo_qtd_dep' => $cliente_censo_qtd_dep,
                    'cliente_censo_possui_imovel' => $cliente_censo_possui_imovel,
                    'tipo_moradia_id' => $tipo_moradia_id,
                    'cliente_censo_qtd_morador' => $cliente_censo_qtd_morador,
                    'cliente_censo_desabrigado_situacao' => $cliente_censo_desabrigado_situacao,
                    'cliente_censo_sta' => $cliente_censo_sta,
                    'cep' => $cep,
                    'end' => $end,
                    'end_compl' => $end_compl,
                    'ibge' => $ibge,
                    'cidade' => $cidade,
                    'bairro' => $bairro,

                ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Censo cadastrado com sucesso',
                'id' => $id,
            ];

        }catch(Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao cadastro censo',
            ];

        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id = $request['cliente_censo_id'];
            self::where('cliente_censo_id', $id)
            ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Cliente removido do censo com sucesso'
            ];

        }catch(Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover cliente do censo',
            ];

        }

        return $retorno;

    }

}

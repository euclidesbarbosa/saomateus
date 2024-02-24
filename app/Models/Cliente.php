<?php

namespace App\Models;

use App\Http\Controllers\ClienteCensoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id_1',
        'tipo_cliente_id',
        'tipo_parentesco_id', //para o caso de ser relacionamento do cliente
        'cliente_nome',
        'cliente_alcunha',
        'cliente_dtnasc',
        'cliente_sexo',
        'cliente_pai',
        'cliente_mae',
        'tipo_profissao_id',
        'cliente_sta',
        'user_id',
    ];

    protected $primaryKey = 'cliente_id';

    protected  $table = 'cliente';

    public static $snakeAttributes = false;

    public function clienteP(){
        return $this->hasOne(Cliente::class, 'cliente_id', 'cliente_id_1');
    }

    public function tipoCliente(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_cliente_id');
    }

    public function contatos(){
        return $this->hasMany(ClienteContato::class, 'cliente_id', 'cliente_id');
    }

    public function docs(){
        return $this->hasMany(ClienteDoc::class, 'cliente_id', 'cliente_id');
    }

    public function tipoParentesco(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_parentesco_id');
    }

    public static function listar($request = null){

        $docConsulta = isset($request['docConsulta']) ? $request['docConsulta'] : null;
        $cliente_doc_des = isset($request['cliente_doc_des']) ? $request['cliente_doc_des'] : null;
        $cliente_id = isset($request['cliente_id']) ? $request['cliente_id'] : null;
        $cliente_id_1 = isset($request['cliente_id_1']) ? $request['cliente_id_1'] : null;

        if($docConsulta == 'CPF'){

            $clienteDoc = ClienteDoc::listar([
                'cliente_doc_des' => $cliente_doc_des,
            ]);

            if($clienteDoc->count() != 0){

                $cliente_id = $clienteDoc[0]['cliente_id'];

                if($clienteDoc[0]['cliente_id_1'] != null
                    && $clienteDoc[0]['cliente_id_1'] != 0){

                    $cliente_id_1 = $clienteDoc[0]['cliente_id_1'];

                }

            }

        }

        $dados = self::with([
            'clienteP',
            'tipoCliente',
            'tipoParentesco',
            'contatos',
            'contatos.tipoContato',
            'docs'=>function($query) use($cliente_doc_des){
                return $query->when($cliente_doc_des, function($query, $campo){
                    return $query->where('cliente_doc_des', '=', $campo);
                });
            },
            'docs.tipoDoc',
        ]);

        if($request != null) {

            $tipo_cliente_id = isset($request['tipo_cliente_id']) ? $request['tipo_cliente_id'] : null;
            $tipo_parentesco_id = isset($request['tipo_parentesco_id']) ? $request['tipo_parentesco_id'] : null;
            $cliente_nome = isset($request['cliente_nome']) ? $request['cliente_nome'] : null;
            $cliente_alcunha = isset($request['cliente_alcunha']) ? $request['cliente_alcunha'] : null;
            $cliente_dtnasc = isset($request['cliente_dtnasc']) ? $request['cliente_dtnasc'] : null;
            $cliente_sexo = isset($request['cliente_sexo']) ? $request['cliente_sexo'] : null;
            $cliente_pai = isset($request['cliente_pai']) ? $request['cliente_pai'] : null;
            $cliente_mae = isset($request['cliente_mae']) ? $request['cliente_mae'] : null;
            $tipo_profissao_id = isset($request['tipo_profissao_id']) ? $request['tipo_profissao_id'] : null;
            $cliente_sta = isset($request['cliente_sta']) ? $request['cliente_sta'] : null;
            $user_id = isset($request['user_id']) ? $request['user_id'] : null;
            
            $dados = $dados
                ->when($cliente_id, function($query, $campo){
                    return $query->where('cliente_id', '=', $campo);
                })
                ->when($cliente_id_1, function($query, $campo){
                    return $query->where('cliente_id_1', '=', $campo);
                })
                ->when($tipo_parentesco_id, function($query, $campo){
                    return $query->where('tipo_parentesco_id', '=', $campo);
                })
                ->when($tipo_cliente_id, function($query, $campo){
                    return $query->where('tipo_cliente_id', '=', $campo);
                })
                ->when($cliente_nome, function($query, $campo){
                    return $query->where('cliente_nome', 'like', '%' . $campo . '%');
                })
                ->when($cliente_alcunha, function($query, $campo){
                    return $query->where('cliente_alcunha', 'like', '%' . $campo . '%');
                })
                ->when($cliente_dtnasc, function($query, $campo){
                    return $query->where('cliente_dtnasc', '=', $campo);
                })
                ->when($cliente_sexo, function($query, $campo){
                    return $query->where('cliente_sexo', '=', $campo);
                })
                ->when($cliente_pai, function($query, $campo){
                    return $query->where('cliente_pai', 'like', $campo.'%');
                })
                ->when($cliente_mae, function($query, $campo){
                    return $query->where('cliente_mae', 'like', $campo.'%');
                })
                ->when($tipo_profissao_id, function($query, $campo){
                    return $query->where('tipo_profissao_id', '=', $campo);
                })
                ->when($cliente_sta, function($query, $campo){
                    return $query->where('cliente_sta', '=', $campo);
                })
                ->when($user_id, function($query, $campo){
                    return $query->where('user_id', '=', $campo);
                })
            ;

        }

        $dados = $dados
            ->orderBy('cliente_nome', 'ASC')
            ->orderBy('cliente_dtnasc', 'ASC')
            ->paginate(50);

        if(isset($request['retornoTipo'])){

            if($request['retornoTipo'] == 2){

                if($dados->count() != 0){

                    $retorno[] =[
                        'erro' => 1,
                        'mensagem' => 'Já cadastrado!',
                        'id' => $dados[0]['cliente_id'],
                    ];


                }
                else{

                    $retorno[] =[
                        'erro' => 1,
                        'mensagem' => 'Não existe!',
                        'id' => null,
                    ];

                }

                return $retorno;

            }

        }

        return $dados;

    }

    public static function store($request){

        try{

            $id = isset($request['cliente_id']) ? $request['cliente_id'] : null;
            $cliente_id_1 = isset($request['cliente_id_1']) ? $request['cliente_id_1'] : null;
            $tipo_cliente_id = isset($request['tipo_cliente_id']) ? $request['tipo_cliente_id'] : null;
            $tipo_parentesco_id = isset($request['tipo_parentesco_id']) ? $request['tipo_parentesco_id'] : null;
            $cliente_nome = isset($request['cliente_nome']) ? $request['cliente_nome'] : null;
            $cliente_alcunha = isset($request['cliente_alcunha']) ? $request['cliente_alcunha'] : null;
            $cliente_dtnasc = isset($request['cliente_dtnasc']) ? $request['cliente_dtnasc'] : null;
            $cliente_sexo = isset($request['cliente_sexo']) ? $request['cliente_sexo'] : null;
            $cliente_pai = isset($request['cliente_pai']) ? $request['cliente_pai'] : null;
            $cliente_mae = isset($request['cliente_mae']) ? $request['cliente_mae'] : null;
            $tipo_profissao_id = isset($request['tipo_profissao_id']) ? $request['tipo_profissao_id'] : null;
            $cliente_sta = isset($request['cliente_sta']) ? $request['cliente_sta'] : null;
            $clienteCenso = isset($request['clienteCenso']) ? $request['clienteCenso'] : null;
            $parentesco = isset($clienteCenso[0]['parentescoArr']) ? $clienteCenso[0]['parentescoArr'] : null;
            $contatos = isset($request['clienteContato']) ? $request['clienteContato'] : null;
            $docs = isset($request['clienteDoc']) ? $request['clienteDoc'] : null;

            $user_id = Auth::id();

            //pesquisa para saber se o cliente já tem cadastro
            $clientes = self::listar([
                'cliente_nome' => $cliente_nome,
                'cliente_dtnasc' => $cliente_dtnasc
            ]);

            if($clientes->count() != 0){

                if($id != $clientes[0]['cliente_id']){

                    $retorno[] =[
                        'erro' => 0,
                        'mensagem' => "Cliente já possui cadastro!",
                        'cliente' => $clientes[0]
                    ];

                    return $retorno;

                }

            }

            //INICIO TRANSACTION
            DB::beginTransaction();

            //CADASTRO BÁSICO
            if($id == null){

                $id = self::create([
                    'cliente_id_1' => $cliente_id_1,
                    'tipo_cliente_id' => $tipo_cliente_id,
                    'tipo_parentesco_id' => $tipo_parentesco_id,
                    'cliente_nome' => $cliente_nome,
                    'cliente_alcunha' => $cliente_alcunha,
                    'cliente_dtnasc' => $cliente_dtnasc,
                    'cliente_sexo' => $cliente_sexo,
                    'cliente_pai' => $cliente_pai,
                    'cliente_mae' => $cliente_mae,
                    'tipo_profissao_id' => $tipo_profissao_id,
                    'cliente_sta' => $cliente_sta,
                    'user_id' => $user_id,
                ])->cliente_id;

            }else{

                self::where('cliente_id', $id)
                ->update([
                    'cliente_id_1' => $cliente_id_1,
                    'tipo_cliente_id' => $tipo_cliente_id,
                    'tipo_parentesco_id' => $tipo_parentesco_id,
                    'cliente_nome' => $cliente_nome,
                    'cliente_alcunha' => $cliente_alcunha,
                    'cliente_dtnasc' => $cliente_dtnasc,
                    'cliente_sexo' => $cliente_sexo,
                    'cliente_pai' => $cliente_pai,
                    'cliente_mae' => $cliente_mae,
                    'tipo_profissao_id' => $tipo_profissao_id,
                    'cliente_sta' => $cliente_sta,
                    'user_id' => $user_id,
                ]);
            }

            //CLIENTE CENSO
            $censo = Censo::listar([
                'censo_sta' => 1
            ]);

            if($censo->count() == 0){

                $retorno[] =[
                    'erro' => 1,
                    'mensagem' => 'Nenhum censo ativo!',

                ];

                DB::rollBack();

                return $retorno;

            }

            unset($retorno);

            //CADASTRANDO NO CENSO
            $censo_id = $censo[0]['censo_id'];

            $retorno = ClienteCenso::store([
                'censo_id' => $censo_id,
                'cliente_id' => $id,
                'clienteCenso' => $clienteCenso,
                'cliente_censo_sta' => 1,
            ]);

            if($retorno[0]['erro'] != 1){

                DB::rollBack();

                return $retorno;

            }

            unset($retorno);

            //CONTATOS
            if($contatos != null){

                foreach($contatos as $row){

                    $retorno = ClienteContato::store([
                        'tipo_contato_id' => $row['tipo_contato_id'],
                        'cliente_id' => $id,
                        'cliente_contato_des' => $row['cliente_contato_des'],
                        'cliente_contato_sta' => 1,
                    ]);

                    if($retorno[0]['erro'] != 1){

                        DB::rollBack();

                        return $retorno;

                    }

                    unset($retorno);

                }

            }

            //DOCS
            if($docs != null){

                foreach($docs as $row){

                    $retorno = ClienteDoc::store([
                        'tipo_doc_id' => $row['tipo_doc_id'],
                        'cliente_id' => $id,
                        'cliente_doc_des' => $row['cliente_doc_des'],
                        'cliente_doc_sta' => 1,
                    ]);

                    if($retorno[0]['erro'] != 1){

                        DB::rollBack();

                        return $retorno;

                    }

                    unset($retorno);

                }

            }

            //PARENTESCO
            if($parentesco != null){

                foreach($parentesco as $parente){

                    foreach($parente['cliente_doc'] as $doc) {

                        $clienteDocFilho = [
                            'tipo_nome' => 'CPF',
                            'cliente_doc_des' => $doc['cliente_doc_des'],
                            'cliente_doc_sta' => 1,
                        ];
                    }

                    $retorno = Cliente::storeFilho([
                        'cliente_id' => null,
                        'cliente_id_1' => $id,
                        'cliente_nome' => $parente['cliente_nome'],
                        'cliente_dtnasc' => $parente['cliente_dtnasc'],
                        'cliente_sexo' => $parente['cliente_sexo'],
                        'tipo_parentesco_id' => $parente['tipo_parentesco_id'],
                        'clienteDoc' => $clienteDocFilho,
                    ]);

                    if($retorno[0]['erro'] != 1){

                        DB::rollBack();

                        return $retorno;

                    }

                    unset($retorno);

                }

            }

            DB::commit();

            $retorno[]=[
                'erro' => 1,
                'mensagem' => 'Cliente Inserido/atualizado!',
                'id' => $id
            ];

        }catch(\Exception $e){

            DB::rollBack();

            $retorno[]=[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar Cliente' .
                    '<p>' . $e->getMessage() . '</p>'
            ];

        }

        return $retorno;
    }

    public static function storeFilho($request)
    {

        try {

            $id = isset($request['cliente_id']) ? $request['cliente_id'] : null;
            $cliente_id_1 = isset($request['cliente_id_1']) ? $request['cliente_id_1'] : null;
            $tipo_cliente_id = isset($request['tipo_cliente_id']) ? $request['tipo_cliente_id'] : null;
            $tipo_parentesco_id = isset($request['tipo_parentesco_id']) ? $request['tipo_parentesco_id'] : null;
            $cliente_nome = Str::upper(trim($request['cliente_nome']));
            $cliente_alcunha = isset($request['cliente_alcunha']) ? Str::upper(trim($request['cliente_alcunha'])) : null;
            $cliente_dtnasc = isset($request['cliente_dtnasc']) ? $request['cliente_dtnasc'] : null;
            $cliente_sexo = isset($request['cliente_sexo']) ? $request['cliente_sexo'] : null;
            $cliente_pai = isset($request['cliente_pai']) ? $request['cliente_pai'] : null;
            $cliente_mae = isset($request['cliente_mae']) ? $request['cliente_mae'] : null;
            $tipo_profissao_id = isset($request['tipo_profissao_id']) ? $request['tipo_profissao_id'] : null;
            $cliente_sta = isset($request['cliente_sta']) ? $request['cliente_sta'] : 1;
            $docs = isset($request['clienteDoc']) ? $request['clienteDoc'] : null;

            $user_id = Auth::id();

            //pesquisa para saber se o parente já tem cadastro
            $clientes = self::listar([
                'cliente_nome' => $cliente_nome,
                'cliente_dtnasc' => $cliente_dtnasc
            ]);

            if ($clientes->count() != 0) {

                if ($id != $clientes[0]['cliente_id']) {

                    $retorno[] = [
                        'erro' => 2,
                        'mensagem' => "Cliente já possui cadastro!",
                        'id' => $clientes[0]['cliente_id']
                    ];

                    return $retorno;

                }

            }

            //CADASTRO BÁSICO
            if($id == null){

                $id = self::create([
                    'cliente_id_1' => $cliente_id_1,
                    'tipo_cliente_id' => $tipo_cliente_id,
                    'tipo_parentesco_id' => $tipo_parentesco_id,
                    'cliente_nome' => $cliente_nome,
                    'cliente_alcunha' => $cliente_alcunha,
                    'cliente_dtnasc' => $cliente_dtnasc,
                    'cliente_sexo' => $cliente_sexo,
                    'cliente_pai' => $cliente_pai,
                    'cliente_mae' => $cliente_mae,
                    'tipo_profissao_id' => $tipo_profissao_id,
                    'cliente_sta' => $cliente_sta,
                    'user_id' => $user_id,
                ])->cliente_id;

            }else{

                self::where('cliente_id', $id)
                    ->update([
                        'cliente_id_1' => $cliente_id_1,
                        'tipo_cliente_id' => $tipo_cliente_id,
                        'tipo_parentesco_id' => $tipo_parentesco_id,
                        'cliente_nome' => $cliente_nome,
                        'cliente_alcunha' => $cliente_alcunha,
                        'cliente_dtnasc' => $cliente_dtnasc,
                        'cliente_sexo' => $cliente_sexo,
                        'cliente_pai' => $cliente_pai,
                        'cliente_mae' => $cliente_mae,
                        'tipo_profissao_id' => $tipo_profissao_id,
                        'cliente_sta' => $cliente_sta,
                        'user_id' => $user_id,
                    ]);
            }

            if($docs != null){

                //localiza o tipo do documento
                $tipo = Tipo::listar([
                    'tipo_sigla' => 'DOCUMENTO',
                    'tipo_nome' => $docs['tipo_nome'],
                ]);

                $tipo_id = null;

                if($tipo->count() != 0){

                    $tipo_id = $tipo[0]['tipo_id'];

                }

                unset($tipo);

                $retorno = ClienteDoc::store([
                    'tipo_doc_id' => $tipo_id,
                    'cliente_id' => $id,
                    'cliente_doc_des' => $docs['cliente_doc_des'],
                    'cliente_doc_sta' => 1,
                ]);

                if($retorno[0]['erro'] != 1){

                    return $retorno;

                }

                unset($retorno);

            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Parente cadastrado!',
                'id' => $id
            ];

        }catch (\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao cadastrar parente!' . $e->getMessage()
            ];
        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            //!!!fazer verificações!!!

            $id = $request['cliente_id'];

            self::where('cliente_id', $id)
            ->delete();

            $retorno[]=[
                'erro' => 1,
                'mensagem' => 'Cliente removido com sucesso! '
            ];

        }catch(\Exception $e){

            $retorno[]=[
                'erro' => 0,
                'mensagem' => 'Erro ao remover cliente! ' .
                    '<p>' . $e->getMessage() . '</p>'
            ];

        }

        return $retorno;

    }
}

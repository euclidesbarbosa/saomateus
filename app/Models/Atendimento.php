<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Atendimento extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable =[
        'pessoa_id',
        'tipo_menu_id',
        'tipo_profissao_id',
        'tipo_assunto_id',
        'atendimento_descricao',
        'atendimento_situacao',
        'atendimento_receber_inf_pref',
        'atendimento_termo',
        'user_id',
    ];

    protected $primaryKey = 'atendimento_id';

    protected $table = 'atendimento';

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'pessoa_id', 'pessoa_id');
    }

    public function tipoAssunto(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_assunto_id');
    }

    public function tipoMenu(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_menu_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'pessoa',
            'pessoa.domicilio',
            'pessoa.domicilio.cidade',
            'tipoAssunto',
            'tipoMenu',
        ])
            ->select('atendimento.*')
            ->join('pessoa', 'atendimento.pessoa_id', '=', 'pessoa.pessoa_id')
        ;

        if($request != null) {

            $cpf = isset($request['cpf']) ? $request['cpf'] : null;
            $nom_pessoa = isset($request['nom_pessoa']) ? $request['nom_pessoa'] : null;
            $tel_1 = isset($request['tel_1']) ? $request['tel_1'] : null;
            $atendimento_id = isset($request['atendimento_id']) ? $request['atendimento_id'] : null;
            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $tipo_menu_id = isset($request['tipo_menu_id']) ? $request['tipo_menu_id'] : null;
            $tipo_profissao_id = isset($request['tipo_profissao_id']) ? $request['tipo_profissao_id'] : null;
            $tipo_assunto_id = isset($request['tipo_assunto_id']) ? $request['tipo_assunto_id'] : null;
            $atendimento_descricao = isset($request['atendimento_descricao']) ? $request['atendimento_descricao'] : null;
            $atendimento_situacao = isset($request['atendimento_situacao']) ? $request['atendimento_situacao'] : null;
            $atendimento_receber_inf_pref = isset($request['atendimento_receber_inf_pref']) ? $request['atendimento_receber_inf_pref'] : null;
            $atendimento_termo = isset($request['atendimento_termo']) ? $request['atendimento_termo'] : null;

            $user = Auth::user();

            //verificar se o usuário pode ver todas as secretarias
            $menuPerfilUser = MenuPerfilUser::listar([
                'user_id' => $user['id']
            ]);

            $arrMenu = null;

            if($menuPerfilUser->count()!= 0){

                $arrMenu = [];

                foreach($menuPerfilUser as $row){

                    array_push($arrMenu, $row['menuPerfil']['tipo_menu_id']);

                }

            }

            $dados = $dados
                ->when($atendimento_id, function($query, $campo){
                    return $query->where('atendimento_id', '=', $campo);
                })
                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa_id', '=', $campo);
                })
                ->when($tipo_menu_id, function($query, $campo){
                    return $query->where('tipo_menu_id', '=', $campo);
                })
                ->when($tipo_assunto_id, function($query, $campo){
                    return $query->where('tipo_assunto_id', '=', $campo);
                })
                ->when($atendimento_descricao, function($query, $campo){
                    return $query->where('atendimento_descricao', '=', $campo);
                })
                ->when($atendimento_situacao, function($query, $campo){
                    return $query->where('atendimento_situacao', '=', $campo);
                })
                ->when($atendimento_receber_inf_pref, function($query, $campo){
                    return $query->where('atendimento_receber_inf_pref', '=', $campo);
                })
                ->when($atendimento_termo, function($query, $campo){
                    return $query->where('atendimento_termo', '=', $campo);
                })
                ->when($tipo_profissao_id, function($query, $campo){
                    return $query->where('tipo_profissao_id', '=', $campo);
                })
                ->when($arrMenu, function($query, $campo){
                    return $query->whereIn('tipo_menu_id', $campo);
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('pessoa.cpf', '=', $campo);
                })
                ->when($nom_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($tel_1, function($query, $campo){
                    return $query->where('pessoa.tel_1', 'like', '%' . $campo . '%');
                })
            ;
        }

        $dados = $dados
            ->orderBy('updated_at', 'DESC')
            ->paginate(51);

        return $dados;
    }

    public static function store($request){

        try{

//            dd($request);
            $id= isset($request['atendimento']['atendimento_id']) ? $request['atendimento_id'] : null;
            $tipo_menu_id = isset($request['atendimento']['tipo_menu_id']) ? $request['atendimento']['tipo_menu_id'] : null;
            $tipo_profissao_id = isset($request['atendimento']['tipo_profissao_id']) ? $request['atendimento']['tipo_profissao_id'] : null;
            $tipo_assunto_id = isset($request['atendimento']['tipo_assunto_id']) ? $request['atendimento']['tipo_assunto_id'] : null;
            $atendimento_descricao = isset($request['atendimento']['atendimento_descricao']) ? $request['atendimento']['atendimento_descricao'] : null;
            $atendimento_situacao = isset($request['atendimento']['atendimento_situacao']) ? $request['atendimento']['atendimento_situacao'] : null;
            $atendimento_receber_inf_pref = isset($request['atendimento']['atendimento_receber_inf_pref']) ? $request['atendimento']['atendimento_receber_inf_pref'] : null;
            $atendimento_termo = isset($request['atendimento']['atendimento_termo']) ? $request['atendimento']['atendimento_termo'] : null;
            $pessoa = isset($request['atendimento']['pessoa']) ? $request['atendimento']['pessoa'] : null;
            $domicilio = isset($request['atendimento']['pessoa']['domicilio']) ? $request['atendimento']['pessoa']['domicilio'] : null;
            $pessoa_id = isset($request['atendimento']['pessoa']['pessoa_id']) ? $request['atendimento']['pessoa']['pessoa_id'] : null;
            $pessoaSituacao = isset($request['atendimento']['pessoa']['pessoaSituacao']) ? $request['atendimento']['pessoa']['pessoaSituacao'] : null;
            $user_id = Auth::id();
            DB::beginTransaction();

            //ATUALIZA DOMICILIO
            $retorno = Domicilio::store([
                'domicilio' => $domicilio,
            ]);

            if($retorno[0]['erro'] != 1){
                DB::rollBack();
                return $retorno;
            }

            $domicilio_id = $retorno[0]['id'];

            $pessoa['domicilio_id'] = $domicilio_id;

            unset($retorno);

            $retorno = Pessoa::store([
                'pessoa' => $pessoa,
            ]);

            if($retorno[0]['erro'] != 1){
                DB::rollBack();
                return $retorno;
            }

            $pessoa_id = $retorno[0]['id'];

            unset($retorno);

            if($id == null){

                $id = self::create([
                    'pessoa_id' => $pessoa_id,
                    'tipo_menu_id' => $tipo_menu_id,
                    'tipo_profissao_id' => $tipo_profissao_id,
                    'tipo_assunto_id' => $tipo_assunto_id,
                    'atendimento_descricao' => $atendimento_descricao,
                    'atendimento_situacao' => $atendimento_situacao,
                    'atendimento_receber_inf_pref' => $atendimento_receber_inf_pref,
                    'atendimento_termo' => $atendimento_termo,
                    'user_id' => $user_id,
                ])->atendimento_id;

            }else{

                self::where('atendimento_id', $id)
                ->update([
                    'pessoa_id' => $pessoa_id,
                    'tipo_menu_id' => $tipo_menu_id,
                    'tipo_profissao_id' => $tipo_profissao_id,
                    'tipo_assunto_id' => $tipo_assunto_id,
                    'atendimento_descricao' => $atendimento_descricao,
                    'atendimento_situacao' => $atendimento_situacao,
                    'atendimento_receber_inf_pref' => $atendimento_receber_inf_pref,
                    'atendimento_termo' => $atendimento_termo,
                    'user_id' => $user_id,
                ]);

            }

            //PESSOA SITUAÇÃO

            if($pessoaSituacao != null){

                $pessoaSituacao['pessoa_id'] = $pessoa_id;

                $retorno = PessoaSituacao::store(
                  $pessoaSituacao
                );

                if($retorno[0]['erro'] != 1){

                    DB::rollBack();

                    return $retorno;

                }

                unset($retorno);

            }

            $atendimento = self::listar([
                'atendimento_id' => $id
            ]);

            DB::commit();

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Atendimento inserido/atualizado com sucesso!',
                'id' => $id,
                'atendimento' => $atendimento
            ];

        }catch(exception $e){

            DB::rollBack();

            $retorno[] = [
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar Atendimento!' . $e->getMessage(),
                'id' => $id
            ];

        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id= $request['atendimento_id'];

            self::where('atendimento_id', $id)
                ->delete();

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Atendimento excluído!',
                'id' => $id
            ];

        }catch(exception $e){

            $retorno[] = [
                'erro' => 0,
                'mensagem' => 'Erro ao excluir atendimento!',
            ];

        }

        return $retorno;

    }
}

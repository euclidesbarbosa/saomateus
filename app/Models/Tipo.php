<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Tipo extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    protected $fillable =[
        'tipo_sigla',
        'tipo_id_1',
        'tipo_nome',
        'tipo_nome_abrv',
        'tipo_ordem',
        'tipo_style',
        'tipo_mask',
        'tipo_link',
        'tipo_ico',
        'tipo_sta',
        'tipo_orgao',
    ];

    protected $primaryKey = 'tipo_id';

    protected $table = 'tipo';

    public function tipoPai(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_id_1');
    }

    public function menuPerfil(){
        return $this->hasMany(MenuPerfil::class, 'tipo_menu_id', 'tipo_id')
            ->where('tipo_perfil_id', '=', Auth::user()['tipo_perfil_id']);
    }

    public static function listar($request = null){

        $dados = self::with([
            'tipoPai',
            'menuPerfil',
            'menuPerfil.menuPerfilUser'
        ]);

        if($request != null){

            $tipo_id = isset($request['tipo_id']) ? $request['tipo_id'] : null;
            $tipo_id_1 = isset($request['tipo_id_1']) ? $request['tipo_id_1'] : null;
            $tipos = isset($request['tipos']) ? $request['tipos'] : null;
            $tipos_1 = isset($request['tipos_1']) ? $request['tipos_1'] : null;
            $tipo_sigla = isset($request['tipo_sigla']) ? $request['tipo_sigla'] : null;
            $tipo_nome = isset($request['tipo_nome']) ? $request['tipo_nome'] : null;
            $tipo_nome_abrv = isset($request['tipo_nome_abrv']) ? $request['tipo_nome_abrv'] : null;
            $tipo_link = isset($request['tipo_link']) ? $request['tipo_link'] : null;
            $tipo_sta = isset($request['tipo_sta']) ? $request['tipo_sta'] : null;
            $naoMostrarSetor = isset($request['naoMostrarSetor']) ? $request['naoMostrarSetor'] : null;
            $tipo_orgao = isset($request['tipo_orgao']) ? $request['tipo_orgao'] : 0;

            $dados = $dados
                ->when($tipo_id, function($query, $tipo_id){
                    return $query->where('tipo_id', '=', $tipo_id);
                })
                ->when($tipo_id_1, function($query, $tipo_id_1){

                    if($tipo_id_1 == -1){

                        return $query->whereNull('tipo_id_1');

                    }
                    else if($tipo_id_1 == -2){

                        return $query->whereNotNull('tipo_id_1');

                    }

                    return $query->where('tipo_id_1', '=', $tipo_id_1);

                })
                ->when($tipo_sigla, function($query, $tipo_sigla){
                    return $query->where('tipo_sigla', '=', $tipo_sigla);
                })
                ->when($tipo_nome, function($query, $tipo_nome){
                    return $query->where('tipo_nome', '=', $tipo_nome);
                })
                ->when($tipo_nome_abrv, function($query, $tipo_nome_abrv){
                    return $query->where('tipo_nome_abrv', '=', $tipo_nome_abrv);
                })
                ->when($tipo_link, function($query, $tipo_link){
                    return $query->where('tipo_link', '=', $tipo_link);
                })
                ->when($tipo_sta, function($query, $tipo_sta){
                    return $query->where('tipo_sta', '=', $tipo_sta);
                })
                ->when($naoMostrarSetor, function($query, $naoMostrarSetor){
                    return $query->whereNotIn('tipo_id', $naoMostrarSetor);
                })
                ->when($tipos, function($query, $campo){
                    return $query->whereIn('tipo_id', $campo);
                })
                ->when($tipos_1, function($query, $campo){
                    return $query->whereIn('tipo_id_1', $campo);
                })
                ->when($tipo_orgao, function($query, $campo){
                    return $query->where('tipo_orgao', '=', $campo);
                })
            ;

        }

        $dados = $dados
            ->orderBy('tipo_id_1', 'ASC')
            ->orderBy('tipo_sigla', 'ASC')
            ->orderBy('tipo_ordem', 'ASC')
            ->orderBy('tipo_nome', 'ASC')
            ->paginate(300);

        return $dados;

    }

    public static function listarT($request = null){

        $dados = self::with([
            'tipoPai',
            'menuPerfil',
            'menuPerfil.menuPerfilUser'
        ]);

        if($request != null){

            $tipo_id = isset($request['tipo_id']) ? $request['tipo_id'] : null;
            $tipo_id_1 = isset($request['tipo_id_1']) ? $request['tipo_id_1'] : null;
            $tipos = isset($request['tipos']) ? $request['tipos'] : null;
            $tipos_1 = isset($request['tipos_1']) ? $request['tipos_1'] : null;
            $tipo_sigla = isset($request['tipo_sigla']) ? $request['tipo_sigla'] : null;
            $tipo_nome = isset($request['tipo_nome']) ? $request['tipo_nome'] : null;
            $tipo_nome_abrv = isset($request['tipo_nome_abrv']) ? $request['tipo_nome_abrv'] : null;
            $tipo_link = isset($request['tipo_link']) ? $request['tipo_link'] : null;
            $tipo_sta = isset($request['tipo_sta']) ? $request['tipo_sta'] : null;
            $naoMostrarSetor = isset($request['naoMostrarSetor']) ? $request['naoMostrarSetor'] : null;
            $tipo_orgao = isset($request['tipo_orgao']) ? $request['tipo_orgao'] : 0;

            $dados = $dados
                ->when($tipo_id, function($query, $tipo_id){
                    return $query->where('tipo_id', '=', $tipo_id);
                })
                ->when($tipo_id_1, function($query, $tipo_id_1){

                    if($tipo_id_1 == -1){

                        return $query->whereNull('tipo_id_1');

                    }
                    else if($tipo_id_1 == -2){

                        return $query->whereNotNull('tipo_id_1');

                    }

                    return $query->where('tipo_id_1', '=', $tipo_id_1);

                })
                ->when($tipo_sigla, function($query, $tipo_sigla){
                    return $query->where('tipo_sigla', '=', $tipo_sigla);
                })
                ->when($tipo_nome, function($query, $tipo_nome){
                    return $query->where('tipo_nome', '=', $tipo_nome);
                })
                ->when($tipo_nome_abrv, function($query, $tipo_nome_abrv){
                    return $query->where('tipo_nome_abrv', '=', $tipo_nome_abrv);
                })
                ->when($tipo_link, function($query, $tipo_link){
                    return $query->where('tipo_link', '=', $tipo_link);
                })
                ->when($tipo_sta, function($query, $tipo_sta){
                    return $query->where('tipo_sta', '=', $tipo_sta);
                })
                ->when($naoMostrarSetor, function($query, $naoMostrarSetor){
                    return $query->whereNotIn('tipo_id', $naoMostrarSetor);
                })
                ->when($tipos, function($query, $campo){
                    return $query->whereIn('tipo_id', $campo);
                })
                ->when($tipos_1, function($query, $campo){
                    return $query->whereIn('tipo_id_1', $campo);
                })
                ->when($tipo_orgao, function($query, $campo){
                    return $query->where('tipo_orgao', '=', $campo);
                })
            ;

        }

        $dados = $dados
            ->orderBy('tipo_id_1', 'ASC')
            ->orderBy('tipo_sigla', 'ASC')
            ->orderBy('tipo_ordem', 'ASC')
            ->orderBy('tipo_nome', 'ASC')
            ->paginate(102);

        return $dados;

    }

    public static function listarMassa($request = null){

        $dados = self::with([
            'tipoPai',
            'menuPerfil',
            'menuPerfil.menuPerfilUser'
        ]);

        if($request != null){

            $tipo_id = isset($request['tipo_id']) ? $request['tipo_id'] : null;
            $tipo_id_1 = isset($request['tipo_id_1']) ? $request['tipo_id_1'] : null;
            $tipo_sigla = isset($request['tipo_sigla']) ? $request['tipo_sigla'] : null;
            $tipo_nome = isset($request['tipo_nome']) ? $request['tipo_nome'] : null;
            $tipo_nome_abrv = isset($request['tipo_nome_abrv']) ? $request['tipo_nome_abrv'] : null;
            $tipo_link = isset($request['tipo_link']) ? $request['tipo_link'] : null;
            $tipo_sta = isset($request['tipo_sta']) ? $request['tipo_sta'] : null;
            $naoMostrarSetor = isset($request['naoMostrarSetor']) ? $request['naoMostrarSetor'] : null;
            $siglas = isset($request['siglas']) ? $request['siglas'] : null;
            $retornarUser = isset($request['retornarUser']) ? Auth::user() : null;
            $tipo_orgao = isset($request['tipo_orgao']) ? $request['tipo_orgao'] : 0;

            $dados = $dados
                ->when($tipo_id, function($query, $tipo_id){
                    return $query->where('tipo_id', '=', $tipo_id);
                })
                ->when($tipo_id_1, function($query, $tipo_id_1){

                    if($tipo_id_1 == -1){

                        return $query->whereNull('tipo_id_1');

                    }
                    else if($tipo_id_1 == -2){

                        return $query->whereNotNull('tipo_id_1');

                    }

                    return $query->where('tipo_id_1', '=', $tipo_id_1);

                })
                ->when($tipo_sigla, function($query, $tipo_sigla){
                    return $query->where('tipo_sigla', '=', $tipo_sigla);
                })
                ->when($tipo_nome, function($query, $tipo_nome){
                    return $query->where('tipo_nome', '=', $tipo_nome);
                })
                ->when($tipo_nome_abrv, function($query, $tipo_nome_abrv){
                    return $query->where('tipo_nome_abrv', '=', $tipo_nome_abrv);
                })
                ->when($tipo_link, function($query, $tipo_link){
                    return $query->where('tipo_link', '=', $tipo_link);
                })
                ->when($tipo_sta, function($query, $tipo_sta){
                    return $query->where('tipo_sta', '=', $tipo_sta);
                })
                ->when($naoMostrarSetor, function($query, $naoMostrarSetor){
                    return $query->whereNotIn('tipo_id', $naoMostrarSetor);
                })
                ->when($siglas, function($query, $campo){
                    return $query->whereIn('tipo_sigla', $campo);
                })
                ->when($tipo_orgao, function($query, $campo){
                    return $query->where('tipo_orgao', '=', $campo);
                })
            ;

        }

        $dados = $dados
            ->orderBy('tipo_id_1', 'ASC')
            ->orderBy('tipo_sigla', 'ASC')
            ->orderBy('tipo_ordem', 'ASC')
            ->orderBy('tipo_nome', 'ASC')
            ->paginate(5000);

        if($retornarUser != null)
            return ['dados' => $dados, 'user' => $retornarUser];
        else
            return ['dados' =>$dados];

    }

    public static function store($request){
        try{

            $acentua = ["/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(´)/","/(`)/"];

            $desacentua = ["a","A","e","E","i","I","o","O","u","U","n","N","C","c","",""];

//            $cidade_nome = preg_replace($acentua, $desacentua, Str::upper(trim($cidade['cidade_nome'])));

            $id = isset($request['tipo_id']) ? $request['tipo_id'] : null;
            $tipo_id_1 = isset($request['tipo_id_1']) ? $request['tipo_id_1'] : null;
            $tipo_sigla = isset($request['tipo_sigla']) ? Str::upper(trim($request['tipo_sigla'])) : null;

            $tipo_sigla = preg_replace($acentua, $desacentua, $tipo_sigla);

            $tipo_nome = isset($request['tipo_nome']) ? trim($request['tipo_nome']) : null;
            $tipo_nome_abrv = isset($request['tipo_nome_abrv']) ? trim($request['tipo_nome_abrv']) : null;
            $tipo_link = isset($request['tipo_link']) ? trim($request['tipo_link']) : null;
            $tipo_ordem = isset($request['tipo_ordem']) ? $request['tipo_ordem'] : null;
            $tipo_style = isset($request['tipo_style']) ? $request['tipo_style'] : null;
            $tipo_mask = isset($request['tipo_mask']) ? $request['tipo_mask'] : null;
            $tipo_sta = isset($request['tipo_sta']) ? $request['tipo_sta'] : 1;
            $confirmacao = isset($request['confirmacao']) ? $request['confirmacao'] : null;
            $tipo_orgao = isset($request['tipo_orgao']) ? $request['tipo_orgao'] : 0;

            //verifica se já existe
            $tipo = self::listar([
                'tipo_sigla' => $tipo_sigla,
                'tipo_nome' => $tipo_nome,
            ]);

            if($tipo->count() != 0){

                if($id != $tipo[0]['tipo_id']){

                    $retorno[] =[
                        'erro' => ($confirmacao != null ? 1 : 0),
                        'mensagem' => 'Tipo já existe!',
                        'id' => $tipo[0]['tipo_id']
                    ];

                    $id = $tipo[0]['tipo_id'];

                    return $retorno;

                }

                $id = $tipo[0]['tipo_id'];


            }

            if($id == null){

                $id = self::create([
                    'tipo_id_1' => $tipo_id_1,
                    'tipo_sigla' => $tipo_sigla,
                    'tipo_nome' => $tipo_nome,
                    'tipo_nome_abrv' => $tipo_nome_abrv,
                    'tipo_link' => $tipo_link,
                    'tipo_ordem' => $tipo_ordem,
                    'tipo_style' => $tipo_style,
                    'tipo_mask' => $tipo_mask,
                    'tipo_sta' => $tipo_sta,
                    'tipo_orgao' => $tipo_orgao,
                ])->tipo_id;

            }
            else{

                self::where('tipo_id', $id)
                    ->update([
                        'tipo_id_1' => $tipo_id_1,
                        'tipo_sigla' => $tipo_sigla,
                        'tipo_nome' => $tipo_nome,
                        'tipo_nome_abrv' => $tipo_nome_abrv,
                        'tipo_link' => $tipo_link,
                        'tipo_ordem' => $tipo_ordem,
                        'tipo_style' => $tipo_style,
                        'tipo_mask' => $tipo_mask,
                        'tipo_sta' => $tipo_sta,
                        'tipo_orgao' => $tipo_orgao,
                    ]);

            }

            $retorno[]=[
                'erro' => 1,
                'mensagem' => 'Tipo inserido/Atualizando!',
                'id' => $id
            ];

        }catch (\Exception $ex){
            $retorno[]=[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar tipo!' . $ex->getMessage()
            ];
        }

        return $retorno;

    }

    public static function destroy($request){
        try{

            $id = $request['tipo_id'];

            self::where('tipo_id', $id)
                ->delete();

            $retorno[]=[
                'erro' => 1,
                'mensagem' => 'Excluído com sucesso!'
            ];

        }catch (\Exception $ex){
            $retorno[]=[
                'erro' => 0,
                'mensagem' => 'Erro ao Excluir!'
            ];
        }

        return $retorno;

    }

    public static function storeMenus($request = null){

        try {

            $user = Auth::user();

            $tipo_perfil_id = $user['tipo_perfil_id'];

            if ($tipo_perfil_id != 1) {

                $retorno[] = [
                    'erro' => 0,
                    'mensagem' => 'Rotina não pode ser executada '
                ];

                return $retorno;

            }

            DB::statement("DELETE FROM tipo WHERE tipo_sigla = 'MENU'");

            $i = 1;

            DB::table('tipo')
                ->insert([
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Atendimento',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1
                ]);

            $i++;

            $atendimento = self::max('tipo_id');

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Cadastro Inicial',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Câmara Municipal',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Centro de Vigilância em Saúde',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Conselho Tutelar',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Controladoria Geral do Município',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'CRAS',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'unico/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Gabinete do Prefeito',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Hospital Municipal',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Posto de Saúde',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal da Mulher',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Administração',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Agricultura',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Assistência Social',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Educação',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Esportes',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Fazenda',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Governo',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Infraestrutura',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Meio Ambiente',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $atendimento,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Secretaria Municipal de Saúde',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'cliente/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Configuração',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1
                ]);

            $i++;

            $configuracao = self::max('tipo_id');

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Órgãos',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/ORGAO',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Profissões',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/PROFISSAO',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Estabelecimentos',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'pessoa/indexLocalidade',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Tipos de Estabelecimentos',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/LOCAL',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Bairros',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/BAIRRO',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Povoados',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/POVOADO',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Tipos de Assuntos',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/ASSUNTO',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Tipos de Status do Censo',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/CENSO_STATUS',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Tipos de Documentos',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/DOCUMENTO',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Tipos de Contatos',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/CONTATO',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Grau de Parentêsco',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'tipo/index/PARENTESCO',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $configuracao,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Tipos de Funções',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'funcao/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Pesquisa',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1
                ]);

            $pesquisa = self::max('tipo_id');

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $pesquisa,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Pessoas',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 1,
                    'tipo_link' => 'pesquisa/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Usuário',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 0
                ]);

            $usuario = self::max('tipo_id');

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $usuario,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Usuários',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 0,
                    'tipo_link' => 'user/index',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $usuario,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Mudar a Senha',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 0,
                    'tipo_link' => 'user/indexMudaSenha',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $usuario,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Sair',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 0,
                    'tipo_link' => 'logout',
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $usuario,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => '-',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 0,
                    'tipo_link' => null,
                    'tipo_ico' => null,
                ]);

            $i++;

            DB::table('tipo')
                ->insert([
                    'tipo_id_1' => $usuario,
                    'tipo_sigla' => 'MENU',
                    'tipo_nome' => 'Suporte via WhatsApp',
                    'tipo_ordem' => $i,
                    'tipo_sta' => 0,
                    'tipo_link' => 'https://wa.me/5598984010204',
                    'tipo_ico' => '../storage/icones/whatsapp.png',
                ]);

            $tipo = self::listar([
                'tipo_sigla' => 'MENU',
                'tipo_sta' => 1
            ]);

            $perfil = self::listar([
                'tipo_sigla' => 'PERFIL',
                'tipo_sta' => 1
            ]);

            DB::statement('DELETE FROM menu_perfil_user');

            DB::statement('DELETE FROM menu_perfil');

            //TODOS PERFIS TEM ACESSO
            foreach($tipo as $row) {
                foreach($perfil as $p) {
                    DB::table('menu_perfil')
                        ->insert([
                            'tipo_perfil_id' => $p['tipo_id'],
                            'tipo_menu_id' => $row['tipo_id'],
                            'menu_perfil_sta' => 1
                    ]);
                }
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Fim da rotina!'
            ];

        } catch (Exception $e) {
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao rodar rotina!'
            ];
        }

        return $retorno;
    }

    public static function listarPerfil($request = null){

        $dados = self::with([
            'tipoPai'
        ]);

        if($request != null){

            $tipo_id = isset($request['tipo_id']) ? $request['tipo_id'] : null;
            $tipo_id_1 = isset($request['tipo_id_1']) ? $request['tipo_id_1'] : null;
            $tipos = isset($request['tipos']) ? $request['tipos'] : null;
            $tipos_1 = isset($request['tipos_1']) ? $request['tipos_1'] : null;
            $tipo_sigla = isset($request['tipo_sigla']) ? $request['tipo_sigla'] : null;
            $tipo_nome = isset($request['tipo_nome']) ? $request['tipo_nome'] : null;
            $tipo_nome_abrv = isset($request['tipo_nome_abrv']) ? $request['tipo_nome_abrv'] : null;
            $tipo_link = isset($request['tipo_link']) ? $request['tipo_link'] : null;
            $tipo_sta = isset($request['tipo_sta']) ? $request['tipo_sta'] : null;
            $naoMostrarSetor = isset($request['naoMostrarSetor']) ? $request['naoMostrarSetor'] : null;

            $tipo_perfil_id = Auth::user()['tipo_perfil_id'];

            $dados = $dados
                ->when($tipo_id, function($query, $tipo_id){
                    return $query->where('tipo_id', '=', $tipo_id);
                })
                ->when($tipo_id_1, function($query, $tipo_id_1){

                    if($tipo_id_1 == -1){

                        return $query->whereNull('tipo_id_1');

                    }
                    else if($tipo_id_1 == -2){

                        return $query->whereNotNull('tipo_id_1');

                    }

                    return $query->where('tipo_id_1', '=', $tipo_id_1);

                })
                ->when($tipo_sigla, function($query, $tipo_sigla){
                    return $query->where('tipo_sigla', '=', $tipo_sigla);
                })
                ->when($tipo_nome, function($query, $tipo_nome){
                    return $query->where('tipo_nome', '=', $tipo_nome);
                })
                ->when($tipo_nome_abrv, function($query, $tipo_nome_abrv){
                    return $query->where('tipo_nome_abrv', '=', $tipo_nome_abrv);
                })
                ->when($tipo_link, function($query, $tipo_link){
                    return $query->where('tipo_link', '=', $tipo_link);
                })
                ->when($tipo_sta, function($query, $tipo_sta){
                    return $query->where('tipo_sta', '=', $tipo_sta);
                })
                ->when($naoMostrarSetor, function($query, $naoMostrarSetor){
                    return $query->whereNotIn('tipo_id', $naoMostrarSetor);
                })
                ->when($tipos, function($query, $campo){
                    return $query->whereIn('tipo_id', $campo);
                })
                ->when($tipos_1, function($query, $campo){
                    return $query->whereIn('tipo_id_1', $campo);
                })

            ;

        }

        $dados = $dados
            ->where('tipo_id', '>=', $tipo_perfil_id)
            ->orderBy('tipo_id_1', 'ASC')
            ->orderBy('tipo_sigla', 'ASC')
            ->orderBy('tipo_ordem', 'ASC')
            ->orderBy('tipo_nome', 'ASC')
            ->paginate(5000);

        return $dados;

    }

}

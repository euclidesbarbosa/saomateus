<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Aluno extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected  $fillable =[
        'pessoa_id',
        'escola_inep',
        'escola_nome',
        'aluno_nome',
        'cpf',
        'dtnasc',
        'aluno_sta',
    ];

    protected $primaryKey = 'aluno_id';

    protected $table = 'aluno';

    public function pessoa(){

        return $this->hasOne(Pessoa::class, 'pessoa_id', 'pessoa_id');

    }

    public function escolaAluno(){
        return $this->hasOne(EscolaAluno::class, 'aluno_id', 'aluno_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'pessoa',
            'pessoa.domicilio',
            'escolaAluno',
            'escolaAluno.escola',
        ]);

        if($request != null){

            $aluno_id = isset($request['aluno_id']) ? $request['aluno_id'] : null;
            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $pessoa_id_null = isset($request['pessoa_id_null']) ? $request['pessoa_id_null'] : null;
            $aluno_nome = isset($request['aluno_nome']) ? $request['aluno_nome'] : null;
            $cpf = isset($request['cpf']) ? $request['cpf'] : null;
            $dtnasc = isset($request['dtnasc']) ? $request['dtnasc'] : null;
            $aluno_sta = isset($request['aluno_sta']) ? $request['aluno_sta'] : null;
            $todos = isset($request['todos']) ? $request['todos'] : null;

            if($pessoa_id_null == 1){

                $dados = $dados
                    ->where('pessoa_id', '=', null);

            }

            $dados = $dados
                ->when($aluno_id, function($query, $campo){
                    return $query->where('aluno_id', '=', $campo);
                })
                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa_id', '=', $campo);
                })
                ->when($aluno_nome, function($query, $campo){
                    return $query->where('aluno_nome', '=', $campo);
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('cpf', '=', $campo);
                })
                ->when($dtnasc, function($query, $campo){
                    return $query->where('dtnasc', '=', $campo);
                })
                ->when($aluno_sta, function($query, $campo){
                    return $query->where('aluno_sta', '=', $campo);
                })
                ;

        }

        $dados = $dados
            ->orderBy('aluno_nome', 'ASC');

        if($todos == 1)
            $dados = $dados
                ->get();
        else
            $dados = $dados
                ->paginate(100);

        return $dados;

    }

    public static function store($request){

        try{

            $request = isset($request['aluno']) ? $request['aluno'] : $request;

            $id = isset($request['aluno_id']) ? $request['aluno_id'] : null;
            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $aluno_nome = isset($request['aluno_nome']) ? $request['aluno_nome'] : null;
            $cpf = isset($request['cpf']) ? $request['cpf'] : null;
            $dtnasc = isset($request['dtnasc']) ? $request['dtnasc'] : null;
            $aluno_sta = isset($request['aluno_sta']) ? $request['aluno_sta'] : null;

            if($id == null){

                $id = self::create([
                    'pessoa_id' => $pessoa_id,
                    'aluno_nome' => $aluno_nome,
                    'cpf' => $cpf,
                    'dtnasc' => $dtnasc,
                    'aluno_sta' => $aluno_sta,
                ])->aluno_id;

            }
            else{

                self::where('aluno_id', $id)
                    ->update([
                        'pessoa_id' => $pessoa_id,
                        'aluno_nome' => $aluno_nome,
                        'cpf' => $cpf,
                        'dtnasc' => $dtnasc,
                        'aluno_sta' => $aluno_sta,
                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Aluno Inserido/atualizado! ',
                'id' => $id
            ];

        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar Aluno! ' . '<p>' . $e->getMessage() . '</p>'
            ];

        }

        return $retorno;

    }

    private function lerCSVAlunos($name){

        $file = fopen($name, "r");

        $result = [];

        $i = 0;

        $campos = [];

        $cabecalho = [];

        while (!feof($file)):

            if (substr(($result[$i] = fgets($file)), 0, 10) !== ';;;;;;;;') :

                $i++;

            endif;

            if($i == 1) {

                $cabecalho = substr($result[$i -1],0 , strpos($result[$i -1], "\r\n"));

                $cabecalho = explode(";", $cabecalho);
//
//                if(substr($cabecalho[0],0,1) != 'a'){
//                    $cabecalho[0] = substr($cabecalho[0],3, 10);
//
//                }

//                dd($cabecalho[0]);
            }
            else{

                $coluna = explode(";", $result[$i -1]);

                $campo = array_combine($cabecalho, $coluna);

                array_push($campos, $campo);

            }

        endwhile;

        fclose($file);

        return $campos;

    }

    public static function rotinaInclusaoMassaAlunos($request = null){

        try{
//
//            $cidade_nome = app.APP_CIDADE_NOME;
//            $cidade_id = app.APP_CIDADE_ID;
//            $cidade_ibge = app.APP_CIDADE_IBGE;
//            $cidade_cep = app.APP_CIDADE_CEP;

            if(Auth::user()['tipo_perfil_id'] != 1){

                $retorno[] =[
                    'erro' => 0,
                    'mensagem' => 'Erro ao gerar arquivo!'
                ];

                return $retorno;

            }

            $acentua = ["/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(´)/","/(`)/"];

            $desacentua = ["a","A","e","E","i","I","o","O","u","U","n","N","C","c","",""];

            $path = url('/') . '/storage/arquivos/';

            $arquivo = 'alunos.csv';

            $arq = $path . $arquivo;

            $array = self::lerCSVAlunos($arq);

            $keys = array_keys($array[0]);

            $tRegistros = 0;

            $tRegistrosVinculados = 0;

            foreach($array as $row){

                $aluno = [];

                for($k = 0; $k < count($keys); $k++){

                    if($keys[$k] != "") {

                        $aluno += [
                            $keys[$k] => preg_replace($acentua, $desacentua, Str::upper(trim($row[$keys[$k]])))
                        ];
                    }
                }

                $pessoa_id = null;
                $domicilio_id = null;
                $aluno_id = null;
                $num_cpf_pessoa = null;

                //data (inverter)
                $dtnasc = isset($aluno['dtnasc']) ? $aluno['dtnasc'] : null;

                $dtnasc = join(array_reverse(explode('/', substr($dtnasc,0,10))), '-');

                $aluno['dtnasc'] = $dtnasc;

                //verifica se o aluno já existe na tabela pessoa
                if($aluno['cpf'] != null || $aluno['cpf'] != ''){

                    $num_cpf_pessoa = str_replace('-', '', str_replace('.', '', $aluno['cpf']));

                    $pessoa = Pessoa::listar([
                        'cpf' => $aluno['cpf']
                    ]);

                }
                else{

                    $pessoa = Pessoa::listar([
                        'nom_pessoa' => $aluno['aluno_nome'],
                        'dta_nasc_pessoa' => $dtnasc
                    ]);
                }

                if($pessoa->count() != 0){

                    $pessoa_id = $pessoa[0]['pessoa_id'];
                    $domicilio_id = $pessoa[0]['domicilio_id'];

                }

                DB::beginTransaction();

                if($pessoa_id == null){

                    //CADASTRA DOMICÍLIO
                    $retorno = Domicilio::store([
                        'cd_ibge' => 2111508,
                        'cod_familiar_fam' => null,
                        'dat_cadastramento_fam' => null,
                        'cod_forma_coleta_fam' => 2,
                    ]);

                    if($retorno[0]['erro'] == 1){

                        $domicilio_id = $retorno[0]['id'];

                    }
                    else{

                        DB::rollBack();

                        return $retorno;

                    }

                    unset($retorno);

                    //CADASTRA PESSOA
                    $retorno = Pessoa::store([
                        'nom_pessoa' => $aluno['aluno_nome'],
                        'cpf' => $aluno['cpf'],
                        'num_cpf_pessoa' => $num_cpf_pessoa,
                        'domicilio_id' => $domicilio_id,
                    ]);

                    if($retorno[0]['erro'] == 1){

                        $pessoa_id = $retorno[0]['id'];

                    }
                    else{

                        DB::rollBack();

                        return $retorno;

                    }

                    unset($retorno);

                }

                if($aluno['cpf'] != null && $aluno['cpf'] != ''){

                    $alunox = Aluno::listar([
                        'cpf' => $aluno['cpf']
                    ]);

                }
                else{

                    $alunox = Aluno::listar([
                        'aluno_nome' => $aluno['aluno_nome'],
                        'dtnasc' => $aluno['dtnasc'],
                    ]);
                }

                if($alunox->count() != 0){

                    $aluno_id = $alunox[0]['aluno_id'];

                }

                if($aluno_id == null) {

                    //CADASTRA ALUNO
                    $retorno = self::store([
                        'aluno_nome' => $aluno['aluno_nome'],
                        'cpf' => $aluno['cpf'],
                        'dtnasc' => $aluno['dtnasc'],
                        'pessoa_id' => $pessoa_id
                    ]);

                    if($retorno[0]['erro'] != 1){

                        DB::rollBack();

                        return $retorno;

                    }

                    $aluno_id = $retorno[0]['id'];

                    unset($retorno);

                    //LISTA ESCOLA
                    $tipo_escola_id = null;

                    $escola = Tipo::listar([
                        'tipo_sigla' => 'ESCOLA',
                        'tipo_nome' => $aluno['escola_nome']
                    ]);

                    if($escola->count() != 0){

                        $tipo_escola_id = $escola[0]['tipo_id'];

                    }


                    //CADASTRA ESCOLA ALUNO
                    $retorno = EscolaAluno::store([
                        'tipo_escola_id' => $tipo_escola_id,
                        'aluno_id' => $aluno_id,
                        'escola_aluno_sta' => 1
                    ]);

                    if($retorno[0]['erro'] != 1){

                        DB::rollBack();

                        return $retorno;

                    }

                }

                DB::commit();

                $tRegistros++;

            }

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Fim da rotina!',
                'Total de registros vinculados: ' . $tRegistrosVinculados,
                'Total de registros: ' => $tRegistros
            ];

        }catch (Exception $e){

            DB::rollBack();

            $retorno[] = [
                'erro' => 0,
                'mensagem' => 'Erro ! ' . $e->getMessage(),
                'tRegistros' => $tRegistros
            ];
        }

        return $retorno;

    }

//    public static function rotinaInclusaoMassaAlunosF($request = null){
//
//        try{
//
//            $cidade_nome = app.APP_CIDADE_NOME;
//            $cidade_id = app.APP_CIDADE_ID;
//            $cidade_ibge = app.APP_CIDADE_IBGE;
//            $cidade_cep = app.APP_CIDADE_CEP;
//
//            if(Auth::user()['tipo_perfil_id'] != 1){
//
//                $retorno[] =[
//                    'erro' => 0,
//                    'mensagem' => 'Erro ao gerar arquivo!'
//                ];
//
//                return $retorno;
//
//            }
//
//            $acentua = ["/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(´)/","/(`)/"];
//
//            $desacentua = ["a","A","e","E","i","I","o","O","u","U","n","N","C","c","",""];
//
//            $path = url('/') . '/storage/arquivos/';
//
//            $arquivo = 'alunosf.csv';
//
//            $arq = $path . $arquivo;
//
//            $array = self::lerCSVAlunos($arq);
//
//            $keys = array_keys($array[0]);
//
//            $tRegistros = 0;
//
//            $tRegistrosVinculados = 0;
//
//            foreach($array as $row){
//
//                $aluno = [];
//
//                for($k = 0; $k < count($keys); $k++){
//
//                    if($keys[$k] != "") {
//
//                        $aluno += [
//                            $keys[$k] => preg_replace($acentua, $desacentua, Str::upper(trim($row[$keys[$k]])))
//                        ];
//                    }
//                }
//
//                //PRINCIPAL CIDADE
//                $aluno['cidade_id'] = $cidade_id;
//
//                if(isset($row['dtnasc'])){
//
//                    $aluno['dtnasc'] = ($row['dtnasc'] != '' ? $row['dtnasc'] : null);
//
//                }
//
//                if(isset($row['cpf'])){
//
//                    $aluno['cpf'] = ($row['cpf'] != '' ? $row['cpf'] : null);
//
//                }
//
//
//                if($cpf != null){
//
//                    //formatando cpf
//                    $cpf = str_repeat('0', 11 - strlen($cpf)) . $cpf;
//
//                    $cpf = substr($cpf, 0,3) . '.'
//                        . substr($cpf, 3,3) . '.'
//                        . substr($cpf, 6,3) . '-'
//                        . substr($cpf, 9,2);
//
//                    $aluno['cpf'] = $cpf;
//
//                    //verifico se existe na tabela aluno
//                    $alunoExiste = self::listar([
//                        'cpf' => $cpf
//                    ]);
//
//                    //verificando se existe na tabela pessoa
//                    $alunoExistePessoa = Pessoa::listar([
//                        'cpf' => $cpf
//                    ]);
//
//                }
//                else {
//
//                    //verifico se existe na tabela aluno
//                    $alunoExiste = self::listar([
//                        'aluno_nome' => $aluno_nome,
//                        'dtnasc' =>  $dtnasc
//                    ]);
//
//                    //verifico se existe na tabela pessoa
//                    $alunoExistePessoa = Pessoa::listar([
//                        'nom_pessoa' => $aluno_nome,
//                        'dta_nasc_pessoa' => $dtnasc
//                    ]);
//
//                }
//
//                //pega o id do aluno se ele existir
//                if($alunoExiste->count() != 0){
//
//                    $aluno_id = $alunoExiste[0]['aluno_id'];
//
//                    $pessoa_id = $alunoExiste[0]['pessoa_id'];
//
//                }
//                else{
//
//                    $aluno_id  = null;
//
//                    $pessoa_id = null;
//
//                }
//
//                //pega o id do aluno na tabela pessoa se ainda não existir
//                if($pessoa_id == null){
//
//                    if($alunoExistePessoa->count() != 0){
//
//                        $pessoa_id = $alunoExistePessoa[0]['pessoa_id'];
//
//                        //incremento para pessoa
//                        $tRegistrosVinculados++;
//
//                    }
//
//                }
//
//                $aluno +=[
//                    'cidade_id' => $aluno['cidade_id'],
//                    'aluno_id' => $aluno_id,
//                    'pessoa_id' => $pessoa_id,
//                    'aluno_sta' => 1
//                ];
//
//                unset($alunoExiste);
//
//                unset($alunoExistePessoa);
//
//                //verifica se a escola existe na tabela tipo
//                $escola = Tipo::listar([
//                    'tipo_sigla' => 'ESCOLA',
//                    'tipo_nome' => $escola_nome
//                ]);
//
//                DB::beginTransaction();
//
//                //pego o id da escola se existir
//                if($escola->count() != 0) {
//
//                    $tipo_escola_id = $escola[0]['tipo_id'];
//
//                }
//                else{
//
//                    //insiro a escola na tabela tipo
//                    $retorno = Tipo::store([
//                        'tipo_sigla' => 'ESCOLA',
//                        'tipo_nome' => $escola_nome,
//                        'tipo_sta' => 1
//                    ]);
//
//                    if($retorno[0]['erro'] != 1){
//
//                        DB::rollBack();
//
//                        return $retorno;
//
//                    }
//
//                }
//
//                unset($escola);
//
//                unset($retorno);
//
//                //inserindo aluno
//                if($aluno_id == null) {
//
//                    $retorno = self::store(
//
//                        $aluno
//
//                    );
//
//                    if($retorno[0]['erro'] != 1){
//
//                        DB::rollBack();
//
//                        return $retorno;
//
//                    }
//
//                    $aluno_id = $retorno[0]['id'];
//
//                    unset($aluno);
//
//                    if($retorno[0]['erro'] != 1){
//
//                        DB::rollBack();
//
//                        return $retorno;
//
//                    }
//
//                    unset($retorno);
//
//                    //EscolaAluno
//                    $retorno = EscolaAluno::store([
//                       'tipo_escola_id' => $tipo_escola_id,
//                       'aluno_id' => $aluno_id,
//                       'escola_aluno_sta' => 1,
//                    ]);
//
//                    if($retorno[0]['erro'] != 1){
//
//                        DB::rollBack();
//
//                        return $retorno;
//
//                    }
//
//                    unset($retorno);
//
//                }
//
//                DB::commit();
//
//                $tRegistros++;
//
//            }
//
//            $retorno[] = [
//                'erro' => 1,
//                'mensagem' => 'Fim da rotina!',
//                'Total de registros vinculados: ' . $tRegistrosVinculados,
//                'Total de registros: ' => $tRegistros
//            ];
//
//        }catch (Exception $e){
//
//            $retorno[] = [
//                'erro' => 0,
//                'mensagem' => 'Erro ! ' . $e->getMessage(),
//                'tRegistros' => $tRegistros
//            ];
//        }
//
//        return $retorno;
//
//    }

    public static function rotinaAtualizaPessoa($request = null){

        $cidade_nome = app.APP_CIDADE_NOME;
        $cidade_id = app.APP_CIDADE_ID;
        $cidade_ibge = app.APP_CIDADE_IBGE;
        $cidade_cep = app.APP_CIDADE_CEP;

        if(Auth::user()['tipo_perfil_id'] != 1){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao gerar arquivo!'
            ];

            return $retorno;

        }

        $rodaRotinaF = isset($request['rodaRotinaF']) ? $request['rodaRotinaF'] : null;

        $pessoa_id_null = isset($request['pessoa_id_null']) ? $request['pessoa_id_null'] : null;

        if($rodaRotinaF == 1) {
            $retorno = self::rotinaInclusaoMassaAlunosF();

            if($retorno[0]['erro'] != 1)
                return $retorno;

            unset($retorno);
        }

        $alunos = self::listar([
            'aluno_sta' => 1,
            'pessoa_id_null' => $pessoa_id_null,
            'todos' => 1,
        ]);

        //cadastrando todos os alunos que não estão na tabela pessoa
        foreach($alunos as $row){
            //verificando
            $cpf = $row['cpf'];
            $nome = $row['aluno_nome'];
            $dtnasc = $row['dtnasc'];

            $pessoa = Pessoa::listar([
                'cpf' => $cpf,
                'nom_pessoa' => $nome,
                'dta_nasc_pessoa' => $dtnasc
            ]);

            if($pessoa->count() == 0){

                $domicilio = DB::table('domicilio')
                    ->selectRaw('MAX(cod_familiar_fam) as ultimoDomicilio');

                $rowDom = $domicilio->get();

                $valor = doubleval($rowDom[0]->ultimoDomicilio) + 500000000;

                DB::beginTransaction();

                $retorno = Domicilio::store([
                    'cod_ibge' => $cidade_ibge,
                    'cod_familiar_fam' => $valor,
                    'dat_cadastramento_fam' => now(),
                    'dat_atual_fam' => now(),
                ]);

                if($retorno[0]['erro'] != 1){

                    DB::rollBack();

                    return $retorno;

                }

                $domicilio_id = $retorno[0]['id'];

                unset($retorno);

                $num_cpf_pessoa = null;

                if($cpf != null) {

                    $numCpf = explode('.', $cpf);
                    $numCpf1 = explode('-', $numCpf[2]);
                    $num_cpf_pessoa = $numCpf[0] . $numCpf[1] . $numCpf1[0] . $numCpf1[1];

                }

                $retorno = Pessoa::store([
                    'domicilio_id' => $domicilio_id,
                    'nom_pessoa' => $nome,
                    'dta_nasc_pessoa' => $dtnasc,
                    'cpf' => $cpf,
                    'num_cpf_pessoa' => $num_cpf_pessoa,
                ]);

                if($retorno[0]['erro'] != 1){

                    DB::rollBack();

                    return $retorno;

                }

                $pessoa_id = $retorno[0]['id'];

                unset($retorno);

                $retorno = DB::statement('UPDATE aluno SET '
                    . ' pessoa_id =' . $pessoa_id
                    . ' WHERE aluno_id =' . $row['aluno_id']
                );

                if(!$retorno){

                    DB::rollBack();

                    unset($retorno);

                    $retorno[] =[
                        'erro' => 0,
                        'mensagem' => 'Erro ao inserir/atualizar aluno!'
                    ];

                    return $retorno;

                }
                else{

                    unset($retorno);

                    $retorno[] =[
                        'erro' => 1,
                        'mensagem' => 'Aluno atualizado!'
                    ];

                }

                DB::commit();

                unset($retorno);

            }

        }

        $retorno[] =[
            'erro' => 1,
            'mensagem' => 'Rotina de atualização de pessoas concluída!'
        ];

        return $retorno;

    }

}

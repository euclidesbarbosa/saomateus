<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Estabelecimento extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable =[
        'pessoa_id',
        'tipo_local_id',
        'estabelecimento_localizacao',
        'estabelecimento_nome',
        'estabelecimento_end',
        'estabelecimento_end_num',
        'estabelecimento_end_compl',
        'tipo_bairro_id',
        'tipo_povoado_id',
        'estabelecimento_cont_tel',
        'estabelecimento_doc_cnpj',
        'estabelecimento_doc_alvara',
        'estabelecimento_doc_insc_estadual',
        'estabelecimento_sta',
        'estabelecimento_email',
    ];

    protected $primaryKey = 'estabelecimento_id';

    protected $table = 'estabelecimento';

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'pessoa_id', 'pessoa_id');
    }

    public function tipoLocal(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_local_id');
    }

    public function tipoBairro(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_bairro_id');
    }

    public function tipoPovoado(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_povoado_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'pessoa',
            'pessoa.domicilio',
            'pessoa.domicilio.tipoBairro',
            'pessoa.domicilio.tipoPovoado',
            'tipoLocal',
            'tipoBairro',
            'tipoPovoado'
        ]);

        if($request != null){

            $estabelecimento_id = isset($request['estabelecimento_id']) ? $request['estabelecimento_id'] : null;
            $tipo_local_id = isset($request['tipo_local_id']) ? $request['tipo_local_id'] : null;
            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $estabelecimento_localizacao = isset($request['estabelecimento_localizacao']) ? $request['estabelecimento_localizacao'] : null;
            $estabelecimento_nome = isset($request['estabelecimento_nome']) ? $request['estabelecimento_nome'] : null;
            $estabelecimento_end = isset($request['estabelecimento_end']) ? $request['estabelecimento_end'] : null;
            $estabelecimento_end_num = isset($request['estabelecimento_end_num']) ? $request['estabelecimento_end_num'] : null;
            $estabelecimento_end_compl = isset($request['estabelecimento_end_compl']) ? $request['estabelecimento_end_compl'] : null;
            $tipo_bairro_id = isset($request['tipo_bairro_id']) ? $request['tipo_bairro_id'] : null;
            $tipo_povoado_id = isset($request['tipo_povoado_id']) ? $request['tipo_povoado_id'] : null;
            $estabelecimento_cont_tel = isset($request['estabelecimento_cont_tel']) ? $request['estabelecimento_cont_tel'] : null;
            $estabelecimento_doc_cnpj = isset($request['estabelecimento_doc_cnpj']) ? $request['estabelecimento_doc_cnpj'] : null;
            $estabelecimento_doc_alvara = isset($request['estabelecimento_doc_alvara']) ? $request['estabelecimento_doc_alvara'] : null;
            $estabelecimento_doc_insc_estadual = isset($request['estabelecimento_doc_insc_estadual']) ? $request['estabelecimento_doc_insc_estadual'] : null;
            $estabelecimento_sta = isset($request['estabelecimento_sta']) ? $request['estabelecimento_sta'] : null;
            $estabelecimento_email = isset($request['estabelecimento_email']) ? $request['estabelecimento_email'] : null;

            $dados = $dados
                ->when($estabelecimento_id, function($query, $campo){
                    return $query->where("estabelecimento_id", '=', $campo);
                })
                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa_id', '=', $campo);
                })
                ->when($tipo_local_id, function($query, $campo){
                    return $query->where('tipo_local_id', $campo, '=', $campo);
                })
                ->when($estabelecimento_localizacao, function($query, $campo){
                    return $query->where('estabelecimento_localizacao', '=', $campo);
                })
                ->when($estabelecimento_nome, function($query, $campo){
                    return $query->where('estabelecimento_nome', '=', $campo);
                })
                ->when($estabelecimento_end, function($query, $campo){
                    return $query->where('estabelecimento_end', '=', $campo);
                })
                ->when($estabelecimento_end_num, function($query, $campo){
                    return $query->where('estabelecimento_end_num', '=', $campo);
                })
                ->when($estabelecimento_end_compl, function($query, $campo){
                    return $query->where('estabelecimento_end_compl', '=', $campo);
                })
                ->when($tipo_bairro_id, function($query, $campo){
                    return $query->where('tipo_bairro_id', '=', $campo);
                })
                ->when($tipo_povoado_id, function($query, $campo){
                    return $query->where('tipo_povoado_id', '=', $campo);
                })
                ->when($estabelecimento_cont_tel, function($query, $campo){
                    return $query->where('estabelecimento_cont_tel', '=', $campo);
                })
                ->when($estabelecimento_doc_cnpj, function($query, $campo){
                    return $query->where('estabelecimento_doc_cnpj', '=', $campo);
                })
                ->when($estabelecimento_doc_alvara, function($query, $campo){
                    return $query->where('estabelecimento_doc_alvara', '=', $campo);
                })
                ->when($estabelecimento_doc_insc_estadual, function($query, $campo){
                    return $query->where('estabelecimento_doc_insc_estadual', '=', $campo);
                })
                ->when($estabelecimento_sta, function($query, $campo){
                    return $query->where('estabelecimento_sta', '=', $campo);
                })
                ->when($estabelecimento_email, function($query, $campo){
                    return $query->where('estabelecimento_email', '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('estabelecimento_id', 'ASC')
            ->paginate(1000);

        return $dados;

    }

    public static function store($request){

        try{

            $request = $request['estabelecimento'];

            $id = isset($request['estabelecimento_id']) ? $request['estabelecimento_id'] : null;
            $tipo_local_id = isset($request['tipo_local_id']) ? $request['tipo_local_id'] : null;
            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $estabelecimento_localizacao = isset($request['estabelecimento_localizacao']) ? $request['estabelecimento_localizacao'] : null;
            $estabelecimento_nome = isset($request['estabelecimento_nome']) ? Str::upper(trim($request['estabelecimento_nome']))  : null;
            $estabelecimento_end = isset($request['estabelecimento_end']) ? Str::upper(trim($request['estabelecimento_end'])) : null;
            $estabelecimento_end_num = isset($request['estabelecimento_end_num']) ? $request['estabelecimento_end_num'] : null;
            $estabelecimento_end_compl = isset($request['estabelecimento_end_compl']) ? Str::upper(trim($request['estabelecimento_end_compl'])) : null;
            $tipo_bairro_id = isset($request['tipo_bairro_id']) ? $request['tipo_bairro_id'] : null;
            $tipo_povoado_id = isset($request['tipo_povoado_id']) ? $request['tipo_povoado_id'] : null;
            $estabelecimento_cont_tel = isset($request['estabelecimento_cont_tel']) ? $request['estabelecimento_cont_tel'] : null;
            $estabelecimento_doc_cnpj = isset($request['estabelecimento_doc_cnpj']) ? $request['estabelecimento_doc_cnpj'] : null;
            $estabelecimento_doc_alvara = isset($request['estabelecimento_doc_alvara']) ? $request['estabelecimento_doc_alvara'] : null;
            $estabelecimento_doc_insc_estadual = isset($request['estabelecimento_doc_insc_estadual']) ? $request['estabelecimento_doc_insc_estadual'] : null;
            $estabelecimento_sta = isset($request['estabelecimento_sta']) ? $request['estabelecimento_sta'] : null;
            $estabelecimento_email = isset($request['estabelecimento_email']) ? $request['estabelecimento_email'] : null;

            $estabelecimento = self::listar([
                'pessoa_id' => $pessoa_id,
                'estabelecimento_nome' => $estabelecimento_nome
            ]);

            if($estabelecimento->count()!= 0){

                if($id != $estabelecimento[0]['estabelecimento_id']){

                    $retorno[] =[
                        'erro' => 0,
                        'mensagem' => 'Estabelecimento já cadastrado!'
                    ];

                    return $retorno;

                }

            }

            if($id == null){

                $id = self::create([
                    'pessoa_id' => $pessoa_id,
                    'tipo_local_id' => $tipo_local_id,
                    'estabelecimento_localizacao' => $estabelecimento_localizacao,
                    'estabelecimento_nome' => $estabelecimento_nome,
                    'estabelecimento_end' => $estabelecimento_end,
                    'estabelecimento_end_num' => $estabelecimento_end_num,
                    'estabelecimento_end_compl' => $estabelecimento_end_compl,
                    'tipo_bairro_id' => $tipo_bairro_id,
                    'tipo_povoado_id' => $tipo_povoado_id,
                    'estabelecimento_cont_tel' => $estabelecimento_cont_tel,
                    'estabelecimento_doc_cnpj' => $estabelecimento_doc_cnpj,
                    'estabelecimento_doc_alvara' => $estabelecimento_doc_alvara,
                    'estabelecimento_doc_insc_estadual' => $estabelecimento_doc_insc_estadual,
                    'estabelecimento_sta' => ($estabelecimento_sta == null ? 1 : $estabelecimento_sta),
                    'estabelecimento_email' => $estabelecimento_email,
                ])->estabelecimento_id;

            }else{
                self::where('estabelecimento_id', $id)
                ->update([
                    'pessoa_id' => $pessoa_id,
                    'tipo_local_id' => $tipo_local_id,
                    'estabelecimento_localizacao' => $estabelecimento_localizacao,
                    'estabelecimento_nome' => $estabelecimento_nome,
                    'estabelecimento_end' => $estabelecimento_end,
                    'estabelecimento_end_num' => $estabelecimento_end_num,
                    'estabelecimento_end_compl' => $estabelecimento_end_compl,
                    'tipo_bairro_id' => $tipo_bairro_id,
                    'tipo_povoado_id' => $tipo_povoado_id,
                    'estabelecimento_cont_tel' => $estabelecimento_cont_tel,
                    'estabelecimento_doc_cnpj' => $estabelecimento_doc_cnpj,
                    'estabelecimento_doc_alvara' => $estabelecimento_doc_alvara,
                    'estabelecimento_doc_insc_estadual' => $estabelecimento_doc_insc_estadual,
                    'estabelecimento_sta' => ($estabelecimento_sta == null ? 1 : $estabelecimento_sta),
                    'estabelecimento_email' => $estabelecimento_email,
                ]);
            }

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Inserido/Atualizado com sucesso (estabelecimento)!',
                'id' => $id,
            ];

        }catch (\Exception $e){

            $retorno[] = [
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/Atualizar (estabelecimento)!'
                . '<p>' . $e->getMessage() . '</p>'
            ];

        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id = $request['estabelecimento_id'];

            self::where('estabelecimento_id', $id)
                ->delete();

            $retorno = [
                'erro' => 1,
                'mensagem' => 'removido com sucesso!'
            ];

        }catch (\Exception $e){

            $retorno = [
                'erro' => 0,
                'mensagem' => 'Erro ao remover estabelecimento!'
            ];

        }

        return $retorno;

    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Pessoa extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable = [
        'domicilio_id',
        'cod_familiar_fam',
        'cod_est_cadastral_memb',
        'ind_trabalho_infantil_pessoa',
        'nom_pessoa',
        'num_nis_pessoa_atual',
        'nom_apelido_pessoa',
        'cod_sexo_pessoa',
        'dta_nasc_pessoa',
        'cod_parentesco_rf_pessoa',
        'cod_raca_cor_pessoa',
        'nom_completo_mae_pessoa',
        'nom_completo_pai_pessoa',
        'cod_local_nascimento_pessoa',
        'sig_uf_munic_nasc_pessoa',
        'nom_ibge_munic_nasc_pessoa',
        'cod_ibge_munic_nasc_pessoa',
        'nom_pais_origem_pessoa',
        'cod_pais_origem_pessoa',
        'cod_certidao_registrada_pessoa',
        'fx_idade',
        'marc_pbf',
        'cod_certidao_civil_pessoa',
        'cod_livro_termo_certid_pessoa',
        'cod_folha_termo_certid_pessoa',
        'cod_termo_matricula_certid_pessoa',
        'nom_munic_certid_pessoa',
        'cod_ibge_munic_certid_pessoa',
        'cod_cartorio_certid_pessoa',
        'num_cpf_pessoa',
        'cpf', //cpf formatado
        'num_identidade_pessoa',
        'cod_complemento_pessoa',
        'dta_emissao_ident_pessoa',
        'sig_uf_ident_pessoa',
        'sig_orgao_emissor_pessoa',
        'num_cart_trab_prev_soc_pessoa',
        'num_serie_trab_prev_soc_pessoa',
        'dta_emissao_cart_trab_pessoa',
        'sig_uf_cart_trab_pessoa',
        'num_titulo_eleitor_pessoa',
        'num_zona_tit_eleitor_pessoa',
        'num_secao_tit_eleitor_pessoa',
        'cod_deficiencia_memb',
        'ind_def_cegueira_memb',
        'ind_def_baixa_visao_memb',
        'ind_def_surdez_profunda_memb',
        'ind_def_surdez_leve_memb',
        'ind_def_fisica_memb',
        'ind_def_mental_memb',
        'ind_def_sindrome_down_memb',
        'ind_def_transtorno_mental_memb',
        'ind_ajuda_nao_memb',
        'ind_ajuda_familia_memb',
        'ind_ajuda_especializado_memb',
        'ind_ajuda_vizinho_memb',
        'ind_ajuda_instituicao_memb',
        'ind_ajuda_outra_memb',
        'cod_sabe_ler_escrever_memb',
        'ind_frequenta_escola_memb',
        'nom_escola_memb',
        'cod_escola_local_memb',
        'sig_uf_escola_memb',
        'nom_munic_escola_memb',
        'cod_ibge_munic_escola_memb',
        'cod_censo_inep_memb',
        'cod_curso_frequenta_memb',
        'cod_ano_serie_frequenta_memb',
        'cod_curso_frequentou_pessoa_memb',
        'cod_ano_serie_frequentou_memb',
        'cod_concluiu_frequentou_memb',
        'grau_instrucao',
        'cod_trabalhou_memb',
        'cod_afastado_trab_memb',
        'cod_agricultura_trab_memb',
        'cod_principal_trab_memb',
        'val_remuner_emprego_memb',
        'cod_trabalho_12_meses_memb',
        'qtd_meses_12_meses_memb',
        'val_renda_bruta_12_meses_memb',
        'val_renda_doacao_memb',
        'val_renda_aposent_memb',
        'val_renda_seguro_desemp_memb',
        'val_renda_pensao_alimen_memb',
        'val_outras_rendas_memb',
        'marc_sit_rua',
        'ind_dormir_rua_memb',
        'qtd_dormir_freq_rua_memb',
        'ind_dormir_albergue_memb',
        'qtd_dormir_freq_albergue_memb',
        'ind_dormir_dom_part_memb',
        'qtd_dormir_freq_dom_part_memb',
        'ind_outro_memb',
        'qtd_freq_outro_memb',
        'cod_tempo_rua_memb',
        'ind_motivo_perda_memb',
        'ind_motivo_ameaca_memb',
        'ind_motivo_probs_fam_memb',
        'ind_motivo_alcool_memb',
        'ind_motivo_desemprego_memb',
        'ind_motivo_trabalho_memb',
        'ind_motivo_saude_memb',
        'ind_motivo_pref_memb',
        'ind_motivo_outro_memb',
        'ind_motivo_nao_sabe_memb',
        'ind_motivo_nao_resp_memb',
        'cod_tempo_cidade_memb',
        'cod_vive_fam_rua_memb',
        'cod_contato_parente_memb',
        'ind_ativ_com_escola_memb',
        'ind_ativ_com_coop_memb',
        'ind_ativ_com_mov_soc_memb',
        'ind_ativ_com_nao_sabe_memb',
        'ind_ativ_com_nao_resp_memb',
        'ind_atend_cras_memb',
        'ind_atend_creas_memb',
        'ind_atend_centro_ref_rua_memb',
        'ind_atend_inst_gov_memb',
        'ind_atend_inst_nao_gov_memb',
        'ind_atend_hospital_geral_memb',
        'cod_cart_assinada_memb',
        'ind_dinh_const_memb',
        'ind_dinh_flanelhinha_memb',
        'ind_dinh_carregador_memb',
        'ind_dinh_catador_memb',
        'ind_dinh_servs_gerais_memb',
        'ind_dinh_pede_memb',
        'ind_dinh_vendas_memb',
        'ind_dinh_outro_memb',
        'ind_dinh_nao_resp_memb',
        'ind_atend_nenhum_memb',
        'ref_cad',
        'ref_pbf',
        'email',
        'tipo_profissao_id',
        'domicilio_id_1',
        'user_id',
    ];

    protected $primaryKey = 'pessoa_id';

    protected $table = 'pessoa';

    public function domicilio(){
        return $this->hasOne(Domicilio::class, 'domicilio_id', 'domicilio_id');
    }

    public function domicilio1(){
        return $this->hasOne(Domicilio::class, 'domicilio_id', 'domicilio_id_1');
    }

    public function atendimento(){
        return $this->hasMany(Atendimento::class, 'pessoa_id', 'pessoa_id')
            ->orderBy('updated_at', 'DESC');
    }

    public function tipoProfissao(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_profissao_id');
    }

    public function pessoaSituacao(){
        return $this->hasMany(PessoaSituacao::class, 'pessoa_id', 'pessoa_id')
            ->orderBy('updated_at', 'DESC');
    }

    public function aluno(){
        return $this->hasMany(Aluno::class, 'pessoa_id', 'pessoa_id');
    }

    public function estabelecimento(){
        return $this->hasMany(Estabelecimento::class, 'pessoa_id', 'pessoa_id');
    }

    public static function listar($request = null ){

        $dados = self::with([
            'domicilio',
            'domicilio.cidade',
            'domicilio.pessoa',
            'atendimento',
            'atendimento.tipoMenu',
            'pessoaSituacao',
            'tipoProfissao',
            'domicilio1',
            'aluno',
            'aluno.escolaAluno',
            'aluno.escolaAluno.escola',
        ]);

        if($request != null) {

            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $domicilio_id = isset($request['domicilio_id']) ? $request['domicilio_id'] : null;
            $cod_familiar_fam = isset($request['cod_familiar_fam']) ? $request['cod_familiar_fam'] : null;
            $dta_nasc_pessoa = isset($request['dta_nasc_pessoa']) ? $request['dta_nasc_pessoa'] : null;
            $nom_pessoa = isset($request['nom_pessoa']) ? $request['nom_pessoa'] : null;
            $nom_apelido_pessoa = isset($request['nom_apelido_pessoa']) ? $request['nom_apelido_pessoa'] : null;
            $num_cpf_pessoa = isset($request['num_cpf_pessoa']) ? $request['num_cpf_pessoa'] : null;
            $cpf = isset($request['cpf']) ? $request['cpf'] : null;
            $cod_parentesco_rf_pessoa = isset($request['cod_parentesco_rf_pessoa']) ? $request['cod_parentesco_rf_pessoa'] : null;
            $domicilio_id_1 = isset($request['domicilio_id_1']) ? $request['domicilio_id_1'] : null;

            $dados = $dados
                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa_id', '=', $campo);
                })
                ->when($domicilio_id, function($query, $campo){
                    return $query->where('domicilio_id', '=', $campo);
                })
                ->when($cod_familiar_fam, function($query, $campo){
                    return $query->where('cod_familiar_fam', '=', $campo);
                })
                ->when($dta_nasc_pessoa, function($query, $campo){
                    return $query->where('dta_nasc_pessoa', '=', $campo);
                })
                ->when($nom_pessoa, function($query, $campo){
                    return $query->where('nom_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($nom_apelido_pessoa, function($query, $campo){
                    return $query->where('nom_apelido_pessoa', 'like', '%' . $campo . '%' );
                })
                ->when($num_cpf_pessoa, function($query, $campo){
                    return $query->where('num_cpf_pessoa', '=', $campo);
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('cpf', '=', $campo);
                })
                ->when($cod_parentesco_rf_pessoa, function($query, $campo){
                    return $query->where('cod_parentesco_rf_pessoa', '=', $campo);
                })
                ->when($domicilio_id_1, function($query, $campo){
                    return $query->where('domicilio_id_1', '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('nom_pessoa', 'ASC')
            ->orderBy('dta_nasc_pessoa', 'ASC')
            ->paginate(1000);

        return $dados;

    }

    public static function listarResumo($request = null ){

        $dados = self::select(DB::raw('count(cod_familiar_fam) as tPessoas'));

        $dados = $dados
            ->paginate(100);

        return $dados;

    }

    public static function store($request){
        try{

            $request = isset($request['pessoa']) ? $request['pessoa'] : $request;

            $domicilioLocal = isset($request['domicilioLocal']) ? $request['domicilioLocal'] : null;
            $id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $domicilio_id = isset($request['domicilio_id']) ? $request['domicilio_id'] : null;
            $cod_familiar_fam = isset($request['cod_familiar_fam']) ? $request['cod_familiar_fam'] : null;
            $cod_est_cadastral_memb = isset($request['cod_est_cadastral_memb']) ? $request['cod_est_cadastral_memb'] : null;
            $ind_trabalho_infantil_pessoa = isset($request['ind_trabalho_infantil_pessoa']) ? $request['ind_trabalho_infantil_pessoa'] : null;
            $nom_pessoa = isset($request['nom_pessoa']) ? Str::upper(trim($request['nom_pessoa'])) : null;
            $num_nis_pessoa_atual = isset($request['num_nis_pessoa_atual']) ? $request['num_nis_pessoa_atual'] : null;
            $nom_apelido_pessoa = isset($request['nom_apelido_pessoa']) ? Str::upper(trim($request['nom_apelido_pessoa'])) : null;
            $cod_sexo_pessoa = isset($request['cod_sexo_pessoa']) ? $request['cod_sexo_pessoa'] : null;
            $dta_nasc_pessoa = isset($request['dta_nasc_pessoa']) ? $request['dta_nasc_pessoa'] : null;
            $cod_parentesco_rf_pessoa = isset($request['cod_parentesco_rf_pessoa']) ? $request['cod_parentesco_rf_pessoa'] : null;
            $cod_raca_cor_pessoa = isset($request['cod_raca_cor_pessoa']) ? $request['cod_raca_cor_pessoa'] : null;
            $nom_completo_mae_pessoa = isset($request['nom_completo_mae_pessoa']) ? $request['nom_completo_mae_pessoa'] : null;
            $nom_completo_pai_pessoa = isset($request['nom_completo_pai_pessoa']) ? $request['nom_completo_pai_pessoa'] : null;
            $cod_local_nascimento_pessoa = isset($request['cod_local_nascimento_pessoa']) ? $request['cod_local_nascimento_pessoa'] : null;
            $sig_uf_munic_nasc_pessoa = isset($request['sig_uf_munic_nasc_pessoa']) ? $request['sig_uf_munic_nasc_pessoa'] : null;
            $nom_ibge_munic_nasc_pessoa = isset($request['nom_ibge_munic_nasc_pessoa']) ? $request['nom_ibge_munic_nasc_pessoa'] : null;
            $cod_ibge_munic_nasc_pessoa = isset($request['cod_ibge_munic_nasc_pessoa']) ? $request['cod_ibge_munic_nasc_pessoa'] : null;
            $nom_pais_origem_pessoa = isset($request['nom_pais_origem_pessoa']) ? $request['nom_pais_origem_pessoa'] : null;
            $cod_pais_origem_pessoa = isset($request['cod_pais_origem_pessoa']) ? $request['cod_pais_origem_pessoa'] : null;
            $cod_certidao_registrada_pessoa = isset($request['cod_certidao_registrada_pessoa']) ? $request['cod_certidao_registrada_pessoa'] : null;
            $fx_idade = isset($request['fx_idade']) ? $request['fx_idade'] : null;
            $marc_pbf = isset($request['marc_pbf']) ? $request['marc_pbf'] : null;
            $cod_certidao_civil_pessoa = isset($request['cod_certidao_civil_pessoa']) ? $request['cod_certidao_civil_pessoa'] : null;
            $cod_livro_termo_certid_pessoa = isset($request['cod_livro_termo_certid_pessoa']) ? $request['cod_livro_termo_certid_pessoa'] : null;
            $cod_folha_termo_certid_pessoa = isset($request['cod_folha_termo_certid_pessoa']) ? $request['cod_folha_termo_certid_pessoa'] : null;
            $cod_termo_matricula_certid_pessoa = isset($request['cod_termo_matricula_certid_pessoa']) ? $request['cod_termo_matricula_certid_pessoa'] : null;
            $nom_munic_certid_pessoa = isset($request['nom_munic_certid_pessoa']) ? $request['nom_munic_certid_pessoa'] : null;
            $cod_ibge_munic_certid_pessoa = isset($request['cod_ibge_munic_certid_pessoa']) ? $request['cod_ibge_munic_certid_pessoa'] : null;
            $cod_cartorio_certid_pessoa = isset($request['cod_cartorio_certid_pessoa']) ? $request['cod_cartorio_certid_pessoa'] : null;
            $num_cpf_pessoa = isset($request['num_cpf_pessoa']) ? $request['num_cpf_pessoa'] : null;
            $cpf = isset($request['cpf']) ? $request['cpf'] : null;
            $num_identidade_pessoa = isset($request['num_identidade_pessoa']) ? $request['num_identidade_pessoa'] : null;
            $cod_complemento_pessoa = isset($request['cod_complemento_pessoa']) ? $request['cod_complemento_pessoa'] : null;
            $dta_emissao_ident_pessoa = isset($request['dta_emissao_ident_pessoa']) ? $request['dta_emissao_ident_pessoa'] : null;
            $sig_uf_ident_pessoa = isset($request['sig_uf_ident_pessoa']) ? $request['sig_uf_ident_pessoa'] : null;
            $sig_orgao_emissor_pessoa = isset($request['sig_orgao_emissor_pessoa']) ? $request['sig_orgao_emissor_pessoa'] : null;
            $num_cart_trab_prev_soc_pessoa = isset($request['num_cart_trab_prev_soc_pessoa']) ? $request['num_cart_trab_prev_soc_pessoa'] : null;
            $num_serie_trab_prev_soc_pessoa = isset($request['num_serie_trab_prev_soc_pessoa']) ? $request['num_serie_trab_prev_soc_pessoa'] : null;
            $dta_emissao_cart_trab_pessoa = isset($request['dta_emissao_cart_trab_pessoa']) ? $request['dta_emissao_cart_trab_pessoa'] : null;
            $sig_uf_cart_trab_pessoa = isset($request['sig_uf_cart_trab_pessoa']) ? $request['sig_uf_cart_trab_pessoa'] : null;
            $num_titulo_eleitor_pessoa = isset($request['num_titulo_eleitor_pessoa']) ? $request['num_titulo_eleitor_pessoa'] : null;
            $num_zona_tit_eleitor_pessoa = isset($request['num_zona_tit_eleitor_pessoa']) ? $request['num_zona_tit_eleitor_pessoa'] : null;
            $num_secao_tit_eleitor_pessoa = isset($request['num_secao_tit_eleitor_pessoa']) ? $request['num_secao_tit_eleitor_pessoa'] : null;
            $cod_deficiencia_memb = isset($request['cod_deficiencia_memb']) ? $request['cod_deficiencia_memb'] : null;
            $ind_def_cegueira_memb = isset($request['ind_def_cegueira_memb']) ? $request['ind_def_cegueira_memb'] : null;
            $ind_def_baixa_visao_memb = isset($request['ind_def_baixa_visao_memb']) ? $request['ind_def_baixa_visao_memb'] : null;
            $ind_def_surdez_profunda_memb = isset($request['ind_def_surdez_profunda_memb']) ? $request['ind_def_surdez_profunda_memb'] : null;
            $ind_def_surdez_leve_memb = isset($request['ind_def_surdez_leve_memb']) ? $request['ind_def_surdez_leve_memb'] : null;
            $ind_def_fisica_memb = isset($request['ind_def_fisica_memb']) ? $request['ind_def_fisica_memb'] : null;
            $ind_def_mental_memb = isset($request['ind_def_mental_memb']) ? $request['ind_def_mental_memb'] : null;
            $ind_def_sindrome_down_memb = isset($request['ind_def_sindrome_down_memb']) ? $request['ind_def_sindrome_down_memb'] : null;
            $ind_def_transtorno_mental_memb = isset($request['ind_def_transtorno_mental_memb']) ? $request['ind_def_transtorno_mental_memb'] : null;
            $ind_ajuda_nao_memb = isset($request['ind_ajuda_nao_memb']) ? $request['ind_ajuda_nao_memb'] : null;
            $ind_ajuda_familia_memb = isset($request['ind_ajuda_familia_memb']) ? $request['ind_ajuda_familia_memb'] : null;
            $ind_ajuda_especializado_memb = isset($request['ind_ajuda_especializado_memb']) ? $request['ind_ajuda_especializado_memb'] : null;
            $ind_ajuda_vizinho_memb = isset($request['ind_ajuda_vizinho_memb']) ? $request['ind_ajuda_vizinho_memb'] : null;
            $ind_ajuda_instituicao_memb = isset($request['ind_ajuda_instituicao_memb']) ? $request['ind_ajuda_instituicao_memb'] : null;
            $ind_ajuda_outra_memb = isset($request['ind_ajuda_outra_memb']) ? $request['ind_ajuda_outra_memb'] : null;
            $cod_sabe_ler_escrever_memb = isset($request['cod_sabe_ler_escrever_memb']) ? $request['cod_sabe_ler_escrever_memb'] : null;
            $ind_frequenta_escola_memb = isset($request['ind_frequenta_escola_memb']) ? $request['ind_frequenta_escola_memb'] : null;
            $nom_escola_memb = isset($request['nom_escola_memb']) ? $request['nom_escola_memb'] : null;
            $cod_escola_local_memb = isset($request['cod_escola_local_memb']) ? $request['cod_escola_local_memb'] : null;
            $sig_uf_escola_memb = isset($request['sig_uf_escola_memb']) ? $request['sig_uf_escola_memb'] : null;
            $nom_munic_escola_memb = isset($request['nom_munic_escola_memb']) ? $request['nom_munic_escola_memb'] : null;
            $cod_ibge_munic_escola_memb = isset($request['cod_ibge_munic_escola_memb']) ? $request['cod_ibge_munic_escola_memb'] : null;
            $cod_censo_inep_memb = isset($request['cod_censo_inep_memb']) ? $request['cod_censo_inep_memb'] : null;
            $cod_curso_frequenta_memb = isset($request['cod_curso_frequenta_memb']) ? $request['cod_curso_frequenta_memb'] : null;
            $cod_ano_serie_frequenta_memb = isset($request['cod_ano_serie_frequenta_memb']) ? $request['cod_ano_serie_frequenta_memb'] : null;
            $cod_curso_frequentou_pessoa_memb = isset($request['cod_curso_frequentou_pessoa_memb']) ? $request['cod_curso_frequentou_pessoa_memb'] : null;
            $cod_ano_serie_frequentou_memb = isset($request['cod_ano_serie_frequentou_memb']) ? $request['cod_ano_serie_frequentou_memb'] : null;
            $cod_concluiu_frequentou_memb = isset($request['cod_concluiu_frequentou_memb']) ? $request['cod_concluiu_frequentou_memb'] : null;
            $grau_instrucao = isset($request['grau_instrucao']) ? $request['grau_instrucao'] : null;
            $cod_trabalhou_memb = isset($request['cod_trabalhou_memb']) ? $request['cod_trabalhou_memb'] : null;
            $cod_afastado_trab_memb = isset($request['cod_afastado_trab_memb']) ? $request['cod_afastado_trab_memb'] : null;
            $cod_agricultura_trab_memb = isset($request['cod_agricultura_trab_memb']) ? $request['cod_agricultura_trab_memb'] : null;
            $cod_principal_trab_memb = isset($request['cod_principal_trab_memb']) ? $request['cod_principal_trab_memb'] : null;
            $val_remuner_emprego_memb = isset($request['val_remuner_emprego_memb']) ? $request['val_remuner_emprego_memb'] : null;
            $cod_trabalho_12_meses_memb = isset($request['cod_trabalho_12_meses_memb']) ? $request['cod_trabalho_12_meses_memb'] : null;
            $qtd_meses_12_meses_memb = isset($request['qtd_meses_12_meses_memb']) ? $request['qtd_meses_12_meses_memb'] : null;
            $val_renda_bruta_12_meses_memb = isset($request['val_renda_bruta_12_meses_memb']) ? $request['val_renda_bruta_12_meses_memb'] : null;
            $val_renda_doacao_memb = isset($request['val_renda_doacao_memb']) ? $request['val_renda_doacao_memb'] : null;
            $val_renda_aposent_memb = isset($request['val_renda_aposent_memb']) ? $request['val_renda_aposent_memb'] : null;
            $val_renda_seguro_desemp_memb = isset($request['val_renda_seguro_desemp_memb']) ? $request['val_renda_seguro_desemp_memb'] : null;
            $val_renda_pensao_alimen_memb = isset($request['val_renda_pensao_alimen_memb']) ? $request['val_renda_pensao_alimen_memb'] : null;
            $val_outras_rendas_memb = isset($request['val_outras_rendas_memb']) ? $request['val_outras_rendas_memb'] : null;
            $marc_sit_rua = isset($request['marc_sit_rua']) ? $request['marc_sit_rua'] : null;
            $ind_dormir_rua_memb = isset($request['ind_dormir_rua_memb']) ? $request['ind_dormir_rua_memb'] : null;
            $qtd_dormir_freq_rua_memb = isset($request['qtd_dormir_freq_rua_memb']) ? $request['qtd_dormir_freq_rua_memb'] : null;
            $ind_dormir_albergue_memb = isset($request['ind_dormir_albergue_memb']) ? $request['ind_dormir_albergue_memb'] : null;
            $qtd_dormir_freq_albergue_memb = isset($request['qtd_dormir_freq_albergue_memb']) ? $request['qtd_dormir_freq_albergue_memb'] : null;
            $ind_dormir_dom_part_memb = isset($request['ind_dormir_dom_part_memb']) ? $request['ind_dormir_dom_part_memb'] : null;
            $qtd_dormir_freq_dom_part_memb = isset($request['qtd_dormir_freq_dom_part_memb']) ? $request['qtd_dormir_freq_dom_part_memb'] : null;
            $ind_outro_memb = isset($request['ind_outro_memb']) ? $request['ind_outro_memb'] : null;
            $qtd_freq_outro_memb = isset($request['qtd_freq_outro_memb']) ? $request['qtd_freq_outro_memb'] : null;
            $cod_tempo_rua_memb = isset($request['cod_tempo_rua_memb']) ? $request['cod_tempo_rua_memb'] : null;
            $ind_motivo_perda_memb = isset($request['ind_motivo_perda_memb']) ? $request['ind_motivo_perda_memb'] : null;
            $ind_motivo_ameaca_memb = isset($request['ind_motivo_ameaca_memb']) ? $request['ind_motivo_ameaca_memb'] : null;
            $ind_motivo_probs_fam_memb = isset($request['ind_motivo_probs_fam_memb']) ? $request['ind_motivo_probs_fam_memb'] : null;
            $ind_motivo_alcool_memb = isset($request['ind_motivo_alcool_memb']) ? $request['ind_motivo_alcool_memb'] : null;
            $ind_motivo_desemprego_memb = isset($request['ind_motivo_desemprego_memb']) ? $request['ind_motivo_desemprego_memb'] : null;
            $ind_motivo_trabalho_memb = isset($request['ind_motivo_trabalho_memb']) ? $request['ind_motivo_trabalho_memb'] : null;
            $ind_motivo_saude_memb = isset($request['ind_motivo_saude_memb']) ? $request['ind_motivo_saude_memb'] : null;
            $ind_motivo_pref_memb = isset($request['ind_motivo_pref_memb']) ? $request['ind_motivo_pref_memb'] : null;
            $ind_motivo_outro_memb = isset($request['ind_motivo_outro_memb']) ? $request['ind_motivo_outro_memb'] : null;
            $ind_motivo_nao_sabe_memb = isset($request['ind_motivo_nao_sabe_memb']) ? $request['ind_motivo_nao_sabe_memb'] : null;
            $ind_motivo_nao_resp_memb = isset($request['ind_motivo_nao_resp_memb']) ? $request['ind_motivo_nao_resp_memb'] : null;
            $cod_tempo_cidade_memb = isset($request['cod_tempo_cidade_memb']) ? $request['cod_tempo_cidade_memb'] : null;
            $cod_vive_fam_rua_memb = isset($request['cod_vive_fam_rua_memb']) ? $request['cod_vive_fam_rua_memb'] : null;
            $cod_contato_parente_memb = isset($request['cod_contato_parente_memb']) ? $request['cod_contato_parente_memb'] : null;
            $ind_ativ_com_escola_memb = isset($request['ind_ativ_com_escola_memb']) ? $request['ind_ativ_com_escola_memb'] : null;
            $ind_ativ_com_coop_memb = isset($request['ind_ativ_com_coop_memb']) ? $request['ind_ativ_com_coop_memb'] : null;
            $ind_ativ_com_mov_soc_memb = isset($request['ind_ativ_com_mov_soc_memb']) ? $request['ind_ativ_com_mov_soc_memb'] : null;
            $ind_ativ_com_nao_sabe_memb = isset($request['ind_ativ_com_nao_sabe_memb']) ? $request['ind_ativ_com_nao_sabe_memb'] : null;
            $ind_ativ_com_nao_resp_memb = isset($request['ind_ativ_com_nao_resp_memb']) ? $request['ind_ativ_com_nao_resp_memb'] : null;
            $ind_atend_cras_memb = isset($request['ind_atend_cras_memb']) ? $request['ind_atend_cras_memb'] : null;
            $ind_atend_creas_memb = isset($request['ind_atend_creas_memb']) ? $request['ind_atend_creas_memb'] : null;
            $ind_atend_centro_ref_rua_memb = isset($request['ind_atend_centro_ref_rua_memb']) ? $request['ind_atend_centro_ref_rua_memb'] : null;
            $ind_atend_inst_gov_memb = isset($request['ind_atend_inst_gov_memb']) ? $request['ind_atend_inst_gov_memb'] : null;
            $ind_atend_inst_nao_gov_memb = isset($request['ind_atend_inst_nao_gov_memb']) ? $request['ind_atend_inst_nao_gov_memb'] : null;
            $ind_atend_hospital_geral_memb = isset($request['ind_atend_hospital_geral_memb']) ? $request['ind_atend_hospital_geral_memb'] : null;
            $cod_cart_assinada_memb = isset($request['cod_cart_assinada_memb']) ? $request['cod_cart_assinada_memb'] : null;
            $ind_dinh_const_memb = isset($request['ind_dinh_const_memb']) ? $request['ind_dinh_const_memb'] : null;
            $ind_dinh_flanelhinha_memb = isset($request['ind_dinh_flanelhinha_memb']) ? $request['ind_dinh_flanelhinha_memb'] : null;
            $ind_dinh_carregador_memb = isset($request['ind_dinh_carregador_memb']) ? $request['ind_dinh_carregador_memb'] : null;
            $ind_dinh_catador_memb = isset($request['ind_dinh_catador_memb']) ? $request['ind_dinh_catador_memb'] : null;
            $ind_dinh_servs_gerais_memb = isset($request['ind_dinh_servs_gerais_memb']) ? $request['ind_dinh_servs_gerais_memb'] : null;
            $ind_dinh_pede_memb = isset($request['ind_dinh_pede_memb']) ? $request['ind_dinh_pede_memb'] : null;
            $ind_dinh_vendas_memb = isset($request['ind_dinh_vendas_memb']) ? $request['ind_dinh_vendas_memb'] : null;
            $ind_dinh_outro_memb = isset($request['ind_dinh_outro_memb']) ? $request['ind_dinh_outro_memb'] : null;
            $ind_dinh_nao_resp_memb = isset($request['ind_dinh_nao_resp_memb']) ? $request['ind_dinh_nao_resp_memb'] : null;
            $ind_atend_nenhum_memb = isset($request['ind_atend_nenhum_memb']) ? $request['ind_atend_nenhum_memb'] : null;
            $ref_cad = isset($request['ref_cad']) ? $request['ref_cad'] : null;
            $ref_pbf = isset($request['ref_pbf']) ? $request['ref_pbf'] : null;
            $email = isset($request['email']) ? $request['email'] : null;
            $tipo_profissao_id = isset($request['tipo_profissao_id']) ? $request['tipo_profissao_id'] : null;
            $domicilio_id_1 = isset($request['domicilio_id_1']) ? $request['domicilio_id_1'] : null;
            $user_id = Auth::id();
            //vem da função rotinaInclusaoMassa
            $rotinaAtualizacao = isset($request['rotinaAtualizacao']) ? $request['rotinaAtualizacao'] : null;

            if($rotinaAtualizacao != null){

                //verifica se já existe
                $pessoa = self::listar([
                    'cod_familiar_fam' => $cod_familiar_fam,
                    'nom_pessoa' => $nom_pessoa,
                    'dta_nasc_pessoa' => $dta_nasc_pessoa,
                ]);

                if($pessoa->count() > 0){

                    $id = $pessoa[0]['pessoa_id'];

                }

                unset($pessoa);

            }

            //verifica se já existe
            if($cpf != null){

                $pessoa = self::listar([
                    'cpf' => $cpf
                ]);

                if($pessoa->count() != 0){

                    if($id == null){

                        $retorno[] =[
                            'erro' => 2,
                            'mensagem' => 'Cadastro já existe!'
                            . '<p>Mesmo nome e data de nascimento</p>'
                            . '<p>NOME: ' . $pessoa[0]['nom_pessoa'] . '</p>'
                            . '<p>DT NASC.: ' . $pessoa[0]['dta_nasc_pessoa'] . '</p>'
                            . '<p>CPF: ' . $pessoa[0]['num_cpf_pessoa'] . '</p>'
                            . '<p>NIS: ' . $pessoa[0]['num_nis_pessoa_atual'] . '</p>'

                        ];

                        return $retorno;

                    }

                    else{

                        if($pessoa[0]['pessoa_id'] != $id){

                            $retorno[] =[
                                'erro' => 0,
                                'mensagem' => 'Cadastro já existe!'
                                    . '<p>Esse cadastro já está sendo usado por outra pessoa!</p>'
                            ];

                            return $retorno;

                        }

                    }

                }

            }

            //verifica se já existe
            if(($nom_pessoa != null && $dta_nasc_pessoa != null)){

                $pessoa = self::listar([
                    'nom_pessoa' => $nom_pessoa,
                    'dta_nasc_pessoa' => $dta_nasc_pessoa
                ]);

                if($pessoa->count() != 0){

                    if($id == null){

//                        dd($pessoa);

                        $retorno[] =[
                            'erro' => 2,
                            'mensagem' => 'Cadastro já existe!'
                                . '<p>Mesmo nome e data de nascimento</p>'
                                . '<p>NOME: ' . $pessoa[0]['nom_pessoa'] . '</p>'
                                . '<p>DT NASC.: ' . $pessoa[0]['dta_nasc_pessoa'] . '</p>'
                                . '<p>CPF: ' . $pessoa[0]['num_cpf_pessoa'] . '</p>'
                                . '<p>NIS: ' . $pessoa[0]['num_nis_pessoa_atual'] . '</p>'
                        ];

                        return $retorno;

                    }

                    else{

                        if($pessoa[0]['pessoa_id'] != $id){

                            $retorno[] =[
                                'erro' => 0,
                                'mensagem' => 'Cadastro já existe!'
                                    . '<p>Esse cadastro já está sendo usado por outra pessoa!</p>'
                            ];

                            return $retorno;

                        }

                    }

                }

            }

            unset($pessoa);

            if($id == null){
                $id = self::create([
                    'domicilio_id' =>$domicilio_id,
                    'cod_familiar_fam' =>$cod_familiar_fam,
                    'cod_est_cadastral_memb' =>$cod_est_cadastral_memb,
                    'ind_trabalho_infantil_pessoa' =>$ind_trabalho_infantil_pessoa,
                    'nom_pessoa' =>$nom_pessoa,
                    'num_nis_pessoa_atual' =>$num_nis_pessoa_atual,
                    'nom_apelido_pessoa' =>$nom_apelido_pessoa,
                    'cod_sexo_pessoa' =>$cod_sexo_pessoa,
                    'dta_nasc_pessoa' =>$dta_nasc_pessoa,
                    'cod_parentesco_rf_pessoa' =>$cod_parentesco_rf_pessoa,
                    'cod_raca_cor_pessoa' =>$cod_raca_cor_pessoa,
                    'nom_completo_mae_pessoa' =>$nom_completo_mae_pessoa,
                    'nom_completo_pai_pessoa' =>$nom_completo_pai_pessoa,
                    'cod_local_nascimento_pessoa' =>$cod_local_nascimento_pessoa,
                    'sig_uf_munic_nasc_pessoa' =>$sig_uf_munic_nasc_pessoa,
                    'nom_ibge_munic_nasc_pessoa' =>$nom_ibge_munic_nasc_pessoa,
                    'cod_ibge_munic_nasc_pessoa' =>$cod_ibge_munic_nasc_pessoa,
                    'nom_pais_origem_pessoa' =>$nom_pais_origem_pessoa,
                    'cod_pais_origem_pessoa' =>$cod_pais_origem_pessoa,
                    'cod_certidao_registrada_pessoa' =>$cod_certidao_registrada_pessoa,
                    'fx_idade' =>$fx_idade,
                    'marc_pbf' =>$marc_pbf,
                    'cod_certidao_civil_pessoa' =>$cod_certidao_civil_pessoa,
                    'cod_livro_termo_certid_pessoa' =>$cod_livro_termo_certid_pessoa,
                    'cod_folha_termo_certid_pessoa' =>$cod_folha_termo_certid_pessoa,
                    'cod_termo_matricula_certid_pessoa' =>$cod_termo_matricula_certid_pessoa,
                    'nom_munic_certid_pessoa' =>$nom_munic_certid_pessoa,
                    'cod_ibge_munic_certid_pessoa' =>$cod_ibge_munic_certid_pessoa,
                    'cod_cartorio_certid_pessoa' =>$cod_cartorio_certid_pessoa,
                    'num_cpf_pessoa' =>$num_cpf_pessoa,
                    'cpf' =>$cpf,
                    'num_identidade_pessoa' =>$num_identidade_pessoa,
                    'cod_complemento_pessoa' =>$cod_complemento_pessoa,
                    'dta_emissao_ident_pessoa' =>$dta_emissao_ident_pessoa,
                    'sig_uf_ident_pessoa' =>$sig_uf_ident_pessoa,
                    'sig_orgao_emissor_pessoa' =>$sig_orgao_emissor_pessoa,
                    'num_cart_trab_prev_soc_pessoa' =>$num_cart_trab_prev_soc_pessoa,
                    'num_serie_trab_prev_soc_pessoa' =>$num_serie_trab_prev_soc_pessoa,
                    'dta_emissao_cart_trab_pessoa' =>$dta_emissao_cart_trab_pessoa,
                    'sig_uf_cart_trab_pessoa' =>$sig_uf_cart_trab_pessoa,
                    'num_titulo_eleitor_pessoa' =>$num_titulo_eleitor_pessoa,
                    'num_zona_tit_eleitor_pessoa' =>$num_zona_tit_eleitor_pessoa,
                    'num_secao_tit_eleitor_pessoa' =>$num_secao_tit_eleitor_pessoa,
                    'cod_deficiencia_memb' =>$cod_deficiencia_memb,
                    'ind_def_cegueira_memb' =>$ind_def_cegueira_memb,
                    'ind_def_baixa_visao_memb' =>$ind_def_baixa_visao_memb,
                    'ind_def_surdez_profunda_memb' =>$ind_def_surdez_profunda_memb,
                    'ind_def_surdez_leve_memb' =>$ind_def_surdez_leve_memb,
                    'ind_def_fisica_memb' =>$ind_def_fisica_memb,
                    'ind_def_mental_memb' =>$ind_def_mental_memb,
                    'ind_def_sindrome_down_memb' =>$ind_def_sindrome_down_memb,
                    'ind_def_transtorno_mental_memb' =>$ind_def_transtorno_mental_memb,
                    'ind_ajuda_nao_memb' =>$ind_ajuda_nao_memb,
                    'ind_ajuda_familia_memb' =>$ind_ajuda_familia_memb,
                    'ind_ajuda_especializado_memb' =>$ind_ajuda_especializado_memb,
                    'ind_ajuda_vizinho_memb' =>$ind_ajuda_vizinho_memb,
                    'ind_ajuda_instituicao_memb' =>$ind_ajuda_instituicao_memb,
                    'ind_ajuda_outra_memb' =>$ind_ajuda_outra_memb,
                    'cod_sabe_ler_escrever_memb' =>$cod_sabe_ler_escrever_memb,
                    'ind_frequenta_escola_memb' =>$ind_frequenta_escola_memb,
                    'nom_escola_memb' =>$nom_escola_memb,
                    'cod_escola_local_memb' =>$cod_escola_local_memb,
                    'sig_uf_escola_memb' =>$sig_uf_escola_memb,
                    'nom_munic_escola_memb' =>$nom_munic_escola_memb,
                    'cod_ibge_munic_escola_memb' =>$cod_ibge_munic_escola_memb,
                    'cod_censo_inep_memb' =>$cod_censo_inep_memb,
                    'cod_curso_frequenta_memb' =>$cod_curso_frequenta_memb,
                    'cod_ano_serie_frequenta_memb' =>$cod_ano_serie_frequenta_memb,
                    'cod_curso_frequentou_pessoa_memb' =>$cod_curso_frequentou_pessoa_memb,
                    'cod_ano_serie_frequentou_memb' =>$cod_ano_serie_frequentou_memb,
                    'cod_concluiu_frequentou_memb' =>$cod_concluiu_frequentou_memb,
                    'grau_instrucao' =>$grau_instrucao,
                    'cod_trabalhou_memb' =>$cod_trabalhou_memb,
                    'cod_afastado_trab_memb' =>$cod_afastado_trab_memb,
                    'cod_agricultura_trab_memb' =>$cod_agricultura_trab_memb,
                    'cod_principal_trab_memb' =>$cod_principal_trab_memb,
                    'val_remuner_emprego_memb' =>$val_remuner_emprego_memb,
                    'cod_trabalho_12_meses_memb' =>$cod_trabalho_12_meses_memb,
                    'qtd_meses_12_meses_memb' =>$qtd_meses_12_meses_memb,
                    'val_renda_bruta_12_meses_memb' =>$val_renda_bruta_12_meses_memb,
                    'val_renda_doacao_memb' =>$val_renda_doacao_memb,
                    'val_renda_aposent_memb' =>$val_renda_aposent_memb,
                    'val_renda_seguro_desemp_memb' =>$val_renda_seguro_desemp_memb,
                    'val_renda_pensao_alimen_memb' =>$val_renda_pensao_alimen_memb,
                    'val_outras_rendas_memb' =>$val_outras_rendas_memb,
                    'marc_sit_rua' =>$marc_sit_rua,
                    'ind_dormir_rua_memb' =>$ind_dormir_rua_memb,
                    'qtd_dormir_freq_rua_memb' =>$qtd_dormir_freq_rua_memb,
                    'ind_dormir_albergue_memb' =>$ind_dormir_albergue_memb,
                    'qtd_dormir_freq_albergue_memb' =>$qtd_dormir_freq_albergue_memb,
                    'ind_dormir_dom_part_memb' =>$ind_dormir_dom_part_memb,
                    'qtd_dormir_freq_dom_part_memb' =>$qtd_dormir_freq_dom_part_memb,
                    'ind_outro_memb' =>$ind_outro_memb,
                    'qtd_freq_outro_memb' =>$qtd_freq_outro_memb,
                    'cod_tempo_rua_memb' =>$cod_tempo_rua_memb,
                    'ind_motivo_perda_memb' =>$ind_motivo_perda_memb,
                    'ind_motivo_ameaca_memb' =>$ind_motivo_ameaca_memb,
                    'ind_motivo_probs_fam_memb' =>$ind_motivo_probs_fam_memb,
                    'ind_motivo_alcool_memb' =>$ind_motivo_alcool_memb,
                    'ind_motivo_desemprego_memb' =>$ind_motivo_desemprego_memb,
                    'ind_motivo_trabalho_memb' =>$ind_motivo_trabalho_memb,
                    'ind_motivo_saude_memb' =>$ind_motivo_saude_memb,
                    'ind_motivo_pref_memb' =>$ind_motivo_pref_memb,
                    'ind_motivo_outro_memb' =>$ind_motivo_outro_memb,
                    'ind_motivo_nao_sabe_memb' =>$ind_motivo_nao_sabe_memb,
                    'ind_motivo_nao_resp_memb' =>$ind_motivo_nao_resp_memb,
                    'cod_tempo_cidade_memb' =>$cod_tempo_cidade_memb,
                    'cod_vive_fam_rua_memb' =>$cod_vive_fam_rua_memb,
                    'cod_contato_parente_memb' =>$cod_contato_parente_memb,
                    'ind_ativ_com_escola_memb' =>$ind_ativ_com_escola_memb,
                    'ind_ativ_com_coop_memb' =>$ind_ativ_com_coop_memb,
                    'ind_ativ_com_mov_soc_memb' =>$ind_ativ_com_mov_soc_memb,
                    'ind_ativ_com_nao_sabe_memb' =>$ind_ativ_com_nao_sabe_memb,
                    'ind_ativ_com_nao_resp_memb' =>$ind_ativ_com_nao_resp_memb,
                    'ind_atend_cras_memb' =>$ind_atend_cras_memb,
                    'ind_atend_creas_memb' =>$ind_atend_creas_memb,
                    'ind_atend_centro_ref_rua_memb' =>$ind_atend_centro_ref_rua_memb,
                    'ind_atend_inst_gov_memb' =>$ind_atend_inst_gov_memb,
                    'ind_atend_inst_nao_gov_memb' =>$ind_atend_inst_nao_gov_memb,
                    'ind_atend_hospital_geral_memb' =>$ind_atend_hospital_geral_memb,
                    'cod_cart_assinada_memb' =>$cod_cart_assinada_memb,
                    'ind_dinh_const_memb' =>$ind_dinh_const_memb,
                    'ind_dinh_flanelhinha_memb' =>$ind_dinh_flanelhinha_memb,
                    'ind_dinh_carregador_memb' =>$ind_dinh_carregador_memb,
                    'ind_dinh_catador_memb' =>$ind_dinh_catador_memb,
                    'ind_dinh_servs_gerais_memb' =>$ind_dinh_servs_gerais_memb,
                    'ind_dinh_pede_memb' =>$ind_dinh_pede_memb,
                    'ind_dinh_vendas_memb' =>$ind_dinh_vendas_memb,
                    'ind_dinh_outro_memb' =>$ind_dinh_outro_memb,
                    'ind_dinh_nao_resp_memb' =>$ind_dinh_nao_resp_memb,
                    'ind_atend_nenhum_memb' =>$ind_atend_nenhum_memb,
                    'ref_cad' =>$ref_cad,
                    'ref_pbf' =>$ref_pbf,
                    'email' =>$email,
                    'tipo_profissao_id' =>$tipo_profissao_id,
                    'domicilio_id_1' =>$domicilio_id_1,
                    'user_id' => $user_id,
                ])->pessoa_id;
            }
            else{
                self::where('pessoa_id', $id)
                    ->update([
                    'domicilio_id' =>$domicilio_id,
                    'cod_est_cadastral_memb' =>$cod_est_cadastral_memb,
                    'ind_trabalho_infantil_pessoa' =>$ind_trabalho_infantil_pessoa,
                    'nom_pessoa' =>$nom_pessoa,
                    'num_nis_pessoa_atual' =>$num_nis_pessoa_atual,
                    'nom_apelido_pessoa' =>$nom_apelido_pessoa,
                    'cod_sexo_pessoa' =>$cod_sexo_pessoa,
                    'dta_nasc_pessoa' =>$dta_nasc_pessoa,
                    'cod_parentesco_rf_pessoa' =>$cod_parentesco_rf_pessoa,
                    'cod_raca_cor_pessoa' =>$cod_raca_cor_pessoa,
                    'nom_completo_mae_pessoa' =>$nom_completo_mae_pessoa,
                    'nom_completo_pai_pessoa' =>$nom_completo_pai_pessoa,
                    'cod_local_nascimento_pessoa' =>$cod_local_nascimento_pessoa,
                    'sig_uf_munic_nasc_pessoa' =>$sig_uf_munic_nasc_pessoa,
                    'nom_ibge_munic_nasc_pessoa' =>$nom_ibge_munic_nasc_pessoa,
                    'cod_ibge_munic_nasc_pessoa' =>$cod_ibge_munic_nasc_pessoa,
                    'nom_pais_origem_pessoa' =>$nom_pais_origem_pessoa,
                    'cod_pais_origem_pessoa' =>$cod_pais_origem_pessoa,
                    'cod_certidao_registrada_pessoa' =>$cod_certidao_registrada_pessoa,
                    'fx_idade' =>$fx_idade,
                    'marc_pbf' =>$marc_pbf,
                    'cod_certidao_civil_pessoa' =>$cod_certidao_civil_pessoa,
                    'cod_livro_termo_certid_pessoa' =>$cod_livro_termo_certid_pessoa,
                    'cod_folha_termo_certid_pessoa' =>$cod_folha_termo_certid_pessoa,
                    'cod_termo_matricula_certid_pessoa' =>$cod_termo_matricula_certid_pessoa,
                    'nom_munic_certid_pessoa' =>$nom_munic_certid_pessoa,
                    'cod_ibge_munic_certid_pessoa' =>$cod_ibge_munic_certid_pessoa,
                    'cod_cartorio_certid_pessoa' =>$cod_cartorio_certid_pessoa,
                    'num_cpf_pessoa' =>$num_cpf_pessoa,
                    'cpf' =>$cpf,
                    'num_identidade_pessoa' =>$num_identidade_pessoa,
                    'cod_complemento_pessoa' =>$cod_complemento_pessoa,
                    'dta_emissao_ident_pessoa' =>$dta_emissao_ident_pessoa,
                    'sig_uf_ident_pessoa' =>$sig_uf_ident_pessoa,
                    'sig_orgao_emissor_pessoa' =>$sig_orgao_emissor_pessoa,
                    'num_cart_trab_prev_soc_pessoa' =>$num_cart_trab_prev_soc_pessoa,
                    'num_serie_trab_prev_soc_pessoa' =>$num_serie_trab_prev_soc_pessoa,
                    'dta_emissao_cart_trab_pessoa' =>$dta_emissao_cart_trab_pessoa,
                    'sig_uf_cart_trab_pessoa' =>$sig_uf_cart_trab_pessoa,
                    'num_titulo_eleitor_pessoa' =>$num_titulo_eleitor_pessoa,
                    'num_zona_tit_eleitor_pessoa' =>$num_zona_tit_eleitor_pessoa,
                    'num_secao_tit_eleitor_pessoa' =>$num_secao_tit_eleitor_pessoa,
                    'cod_deficiencia_memb' =>$cod_deficiencia_memb,
                    'ind_def_cegueira_memb' =>$ind_def_cegueira_memb,
                    'ind_def_baixa_visao_memb' =>$ind_def_baixa_visao_memb,
                    'ind_def_surdez_profunda_memb' =>$ind_def_surdez_profunda_memb,
                    'ind_def_surdez_leve_memb' =>$ind_def_surdez_leve_memb,
                    'ind_def_fisica_memb' =>$ind_def_fisica_memb,
                    'ind_def_mental_memb' =>$ind_def_mental_memb,
                    'ind_def_sindrome_down_memb' =>$ind_def_sindrome_down_memb,
                    'ind_def_transtorno_mental_memb' =>$ind_def_transtorno_mental_memb,
                    'ind_ajuda_nao_memb' =>$ind_ajuda_nao_memb,
                    'ind_ajuda_familia_memb' =>$ind_ajuda_familia_memb,
                    'ind_ajuda_especializado_memb' =>$ind_ajuda_especializado_memb,
                    'ind_ajuda_vizinho_memb' =>$ind_ajuda_vizinho_memb,
                    'ind_ajuda_instituicao_memb' =>$ind_ajuda_instituicao_memb,
                    'ind_ajuda_outra_memb' =>$ind_ajuda_outra_memb,
                    'cod_sabe_ler_escrever_memb' =>$cod_sabe_ler_escrever_memb,
                    'ind_frequenta_escola_memb' =>$ind_frequenta_escola_memb,
                    'nom_escola_memb' =>$nom_escola_memb,
                    'cod_escola_local_memb' =>$cod_escola_local_memb,
                    'sig_uf_escola_memb' =>$sig_uf_escola_memb,
                    'nom_munic_escola_memb' =>$nom_munic_escola_memb,
                    'cod_ibge_munic_escola_memb' =>$cod_ibge_munic_escola_memb,
                    'cod_censo_inep_memb' =>$cod_censo_inep_memb,
                    'cod_curso_frequenta_memb' =>$cod_curso_frequenta_memb,
                    'cod_ano_serie_frequenta_memb' =>$cod_ano_serie_frequenta_memb,
                    'cod_curso_frequentou_pessoa_memb' =>$cod_curso_frequentou_pessoa_memb,
                    'cod_ano_serie_frequentou_memb' =>$cod_ano_serie_frequentou_memb,
                    'cod_concluiu_frequentou_memb' =>$cod_concluiu_frequentou_memb,
                    'grau_instrucao' =>$grau_instrucao,
                    'cod_trabalhou_memb' =>$cod_trabalhou_memb,
                    'cod_afastado_trab_memb' =>$cod_afastado_trab_memb,
                    'cod_agricultura_trab_memb' =>$cod_agricultura_trab_memb,
                    'cod_principal_trab_memb' =>$cod_principal_trab_memb,
                    'val_remuner_emprego_memb' =>$val_remuner_emprego_memb,
                    'cod_trabalho_12_meses_memb' =>$cod_trabalho_12_meses_memb,
                    'qtd_meses_12_meses_memb' =>$qtd_meses_12_meses_memb,
                    'val_renda_bruta_12_meses_memb' =>$val_renda_bruta_12_meses_memb,
                    'val_renda_doacao_memb' =>$val_renda_doacao_memb,
                    'val_renda_aposent_memb' =>$val_renda_aposent_memb,
                    'val_renda_seguro_desemp_memb' =>$val_renda_seguro_desemp_memb,
                    'val_renda_pensao_alimen_memb' =>$val_renda_pensao_alimen_memb,
                    'val_outras_rendas_memb' =>$val_outras_rendas_memb,
                    'marc_sit_rua' =>$marc_sit_rua,
                    'ind_dormir_rua_memb' =>$ind_dormir_rua_memb,
                    'qtd_dormir_freq_rua_memb' =>$qtd_dormir_freq_rua_memb,
                    'ind_dormir_albergue_memb' =>$ind_dormir_albergue_memb,
                    'qtd_dormir_freq_albergue_memb' =>$qtd_dormir_freq_albergue_memb,
                    'ind_dormir_dom_part_memb' =>$ind_dormir_dom_part_memb,
                    'qtd_dormir_freq_dom_part_memb' =>$qtd_dormir_freq_dom_part_memb,
                    'ind_outro_memb' =>$ind_outro_memb,
                    'qtd_freq_outro_memb' =>$qtd_freq_outro_memb,
                    'cod_tempo_rua_memb' =>$cod_tempo_rua_memb,
                    'ind_motivo_perda_memb' =>$ind_motivo_perda_memb,
                    'ind_motivo_ameaca_memb' =>$ind_motivo_ameaca_memb,
                    'ind_motivo_probs_fam_memb' =>$ind_motivo_probs_fam_memb,
                    'ind_motivo_alcool_memb' =>$ind_motivo_alcool_memb,
                    'ind_motivo_desemprego_memb' =>$ind_motivo_desemprego_memb,
                    'ind_motivo_trabalho_memb' =>$ind_motivo_trabalho_memb,
                    'ind_motivo_saude_memb' =>$ind_motivo_saude_memb,
                    'ind_motivo_pref_memb' =>$ind_motivo_pref_memb,
                    'ind_motivo_outro_memb' =>$ind_motivo_outro_memb,
                    'ind_motivo_nao_sabe_memb' =>$ind_motivo_nao_sabe_memb,
                    'ind_motivo_nao_resp_memb' =>$ind_motivo_nao_resp_memb,
                    'cod_tempo_cidade_memb' =>$cod_tempo_cidade_memb,
                    'cod_vive_fam_rua_memb' =>$cod_vive_fam_rua_memb,
                    'cod_contato_parente_memb' =>$cod_contato_parente_memb,
                    'ind_ativ_com_escola_memb' =>$ind_ativ_com_escola_memb,
                    'ind_ativ_com_coop_memb' =>$ind_ativ_com_coop_memb,
                    'ind_ativ_com_mov_soc_memb' =>$ind_ativ_com_mov_soc_memb,
                    'ind_ativ_com_nao_sabe_memb' =>$ind_ativ_com_nao_sabe_memb,
                    'ind_ativ_com_nao_resp_memb' =>$ind_ativ_com_nao_resp_memb,
                    'ind_atend_cras_memb' =>$ind_atend_cras_memb,
                    'ind_atend_creas_memb' =>$ind_atend_creas_memb,
                    'ind_atend_centro_ref_rua_memb' =>$ind_atend_centro_ref_rua_memb,
                    'ind_atend_inst_gov_memb' =>$ind_atend_inst_gov_memb,
                    'ind_atend_inst_nao_gov_memb' =>$ind_atend_inst_nao_gov_memb,
                    'ind_atend_hospital_geral_memb' =>$ind_atend_hospital_geral_memb,
                    'cod_cart_assinada_memb' =>$cod_cart_assinada_memb,
                    'ind_dinh_const_memb' =>$ind_dinh_const_memb,
                    'ind_dinh_flanelhinha_memb' =>$ind_dinh_flanelhinha_memb,
                    'ind_dinh_carregador_memb' =>$ind_dinh_carregador_memb,
                    'ind_dinh_catador_memb' =>$ind_dinh_catador_memb,
                    'ind_dinh_servs_gerais_memb' =>$ind_dinh_servs_gerais_memb,
                    'ind_dinh_pede_memb' =>$ind_dinh_pede_memb,
                    'ind_dinh_vendas_memb' =>$ind_dinh_vendas_memb,
                    'ind_dinh_outro_memb' =>$ind_dinh_outro_memb,
                    'ind_dinh_nao_resp_memb' =>$ind_dinh_nao_resp_memb,
                    'ind_atend_nenhum_memb' =>$ind_atend_nenhum_memb,
                    'ref_cad' =>$ref_cad,
                    'ref_pbf' =>$ref_pbf,
                    'email' =>$email,
                    'tipo_profissao_id'=>$tipo_profissao_id,
                    'domicilio_id_1'=>$domicilio_id_1,
                    'user_id' => $user_id,
                ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Inserido/atualizado com sucesso!',
                'id' => $id,
            ];

        }catch(Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar pessoa'
            ];
        }

        return $retorno;

    }

    public static function listarP($request = null){

        $dados = self::with([
            'domicilio',
            'domicilio.cidade',
            'domicilio.pessoa',
            'atendimento',
            'atendimento.tipoMenu',
            'pessoaSituacao',
            'tipoProfissao',
            'aluno',
            'aluno.escolaAluno',
            'aluno.escolaAluno.escola',
            'domicilio1',
        ])->select(DB::raw('distinct pessoa.*'))
        ->leftJoin('domicilio', 'pessoa.domicilio_id', '=', 'domicilio.domicilio_id')
        ->leftJoin('atendimento', 'pessoa.pessoa_id', '=', 'atendimento.pessoa_id')
        ->leftJoin('aluno', 'pessoa.pessoa_id', '=', 'aluno.pessoa_id')
        ->leftJoin('escola_aluno', 'aluno.aluno_id', '=', 'escola_aluno.aluno_id')
        ->leftJoin('tipo as escola', 'escola_aluno.tipo_escola_id', '=', 'escola.tipo_id')
        ;

        if($request != null) {
//dd($request);
            $updated_at = isset($request['updated_at']) ? $request['updated_at'] : null;
            $domicilio_id = isset($request['domicilio']['domicilio_id']) ? $request['domicilio']['domicilio_id'] : null;
            $cd_ibge = isset($request['domicilio']['cd_ibge']) ? $request['domicilio']['cd_ibge'] : null;
            $cod_familiar_fam = isset($request['domicilio']['cod_familiar_fam']) ? $request['domicilio']['cod_familiar_fam'] : null;
            $dat_cadastramento_fam = isset($request['domicilio']['dat_cadastramento_fam']) ? $request['domicilio']['dat_cadastramento_fam'] : null;
            $dat_atual_fam = isset($request['domicilio']['dat_atual_fam']) ? $request['domicilio']['dat_atual_fam'] : null;
            $cod_est_cadastral_fam = isset($request['domicilio']['cod_est_cadastral_fam']) ? $request['domicilio']['cod_est_cadastral_fam'] : null;
            $cod_forma_coleta_fam = isset($request['domicilio']['cod_forma_coleta_fam']) ? $request['domicilio']['cod_forma_coleta_fam'] : null;
            $dta_entrevista_fam = isset($request['domicilio']['dta_entrevista_fam']) ? $request['domicilio']['dta_entrevista_fam'] : null;
            $nom_localidade_fam = isset($request['domicilio']['nom_localidade_fam']) ? $request['domicilio']['nom_localidade_fam'] : null;
            $nom_tip_logradouro_fam = isset($request['domicilio']['nom_tip_logradouro_fam']) ? $request['domicilio']['nom_tip_logradouro_fam'] : null;
            $nom_titulo_logradouro_fam = isset($request['domicilio']['nom_titulo_logradouro_fam']) ? $request['domicilio']['nom_titulo_logradouro_fam'] : null;
            $nom_logradouro_fam = isset($request['domicilio']['nom_logradouro_fam']) ? $request['domicilio']['nom_logradouro_fam'] : null;
            $num_logradouro_fam = isset($request['domicilio']['num_logradouro_fam']) ? $request['domicilio']['num_logradouro_fam'] : null;
            $des_complemento_fam = isset($request['domicilio']['des_complemento_fam']) ? $request['domicilio']['des_complemento_fam'] : null;
            $des_complemento_adic_fam = isset($request['domicilio']['des_complemento_adic_fam']) ? $request['domicilio']['des_complemento_adic_fam'] : null;
            $num_cep_logradouro_fam = isset($request['domicilio']['num_cep_logradouro_fam']) ? $request['domicilio']['num_cep_logradouro_fam'] : null;
            $cod_unidade_territorial_fam = isset($request['domicilio']['cod_unidade_territorial_fam']) ? $request['domicilio']['cod_unidade_territorial_fam'] : null;
            $nom_unidade_territorial_fam = isset($request['domicilio']['nom_unidade_territorial_fam']) ? $request['domicilio']['nom_unidade_territorial_fam'] : null;
            $txt_referencia_local_fam = isset($request['domicilio']['txt_referencia_local_fam']) ? $request['domicilio']['txt_referencia_local_fam'] : null;
            $nom_entrevistador_fam = isset($request['domicilio']['nom_entrevistador_fam']) ? $request['domicilio']['nom_entrevistador_fam'] : null;
            $num_cpf_entrevistador_fam = isset($request['domicilio']['num_cpf_entrevistador_fam']) ? $request['domicilio']['num_cpf_entrevistador_fam'] : null;
            $vlr_renda_media_fam = isset($request['domicilio']['vlr_renda_media_fam']) ? $request['domicilio']['vlr_renda_media_fam'] : null;
            $fx_rfpc = isset($request['domicilio']['fx_rfpc']) ? $request['domicilio']['fx_rfpc'] : null;
            $vlr_renda_total_fam = isset($request['domicilio']['vlr_renda_total_fam']) ? $request['domicilio']['vlr_renda_total_fam'] : null;
            $marc_pbf = isset($request['domicilio']['marc_pbf']) ? $request['domicilio']['marc_pbf'] : null;
            $qtde_meses_desat_cat = isset($request['domicilio']['qtde_meses_desat_cat']) ? $request['domicilio']['qtde_meses_desat_cat'] : null;
            $cod_local_domic_fam = isset($request['domicilio']['cod_local_domic_fam']) ? $request['domicilio']['cod_local_domic_fam'] : null;
            $cod_especie_domic_fam = isset($request['domicilio']['cod_especie_domic_fam']) ? $request['domicilio']['cod_especie_domic_fam'] : null;
            $qtd_comodos_domic_fam = isset($request['domicilio']['qtd_comodos_domic_fam']) ? $request['domicilio']['qtd_comodos_domic_fam'] : null;
            $qtd_comodos_dormitorio_fam = isset($request['domicilio']['qtd_comodos_dormitorio_fam']) ? $request['domicilio']['qtd_comodos_dormitorio_fam'] : null;
            $cod_material_piso_fam = isset($request['domicilio']['cod_material_piso_fam']) ? $request['domicilio']['cod_material_piso_fam'] : null;
            $cod_material_domic_fam = isset($request['domicilio']['cod_material_domic_fam']) ? $request['domicilio']['cod_material_domic_fam'] : null;
            $cod_agua_canalizada_fam = isset($request['domicilio']['cod_agua_canalizada_fam']) ? $request['domicilio']['cod_agua_canalizada_fam'] : null;
            $cod_abaste_agua_domic_fam = isset($request['domicilio']['cod_abaste_agua_domic_fam']) ? $request['domicilio']['cod_abaste_agua_domic_fam'] : null;
            $cod_banheiro_domic_fam = isset($request['domicilio']['cod_banheiro_domic_fam']) ? $request['domicilio']['cod_banheiro_domic_fam'] : null;
            $cod_escoa_sanitario_domic_fam = isset($request['domicilio']['cod_escoa_sanitario_domic_fam']) ? $request['domicilio']['cod_escoa_sanitario_domic_fam'] : null;
            $cod_destino_lixo_domic_fam = isset($request['domicilio']['cod_destino_lixo_domic_fam']) ? $request['domicilio']['cod_destino_lixo_domic_fam'] : null;
            $cod_iluminacao_domic_fam = isset($request['domicilio']['cod_iluminacao_domic_fam']) ? $request['domicilio']['cod_iluminacao_domic_fam'] : null;
            $cod_calcamento_domic_fam = isset($request['domicilio']['cod_calcamento_domic_fam']) ? $request['domicilio']['cod_calcamento_domic_fam'] : null;
            $cod_familia_indigena_fam = isset($request['domicilio']['cod_familia_indigena_fam']) ? $request['domicilio']['cod_familia_indigena_fam'] : null;
            $cod_povo_indigena_fam = isset($request['domicilio']['cod_povo_indigena_fam']) ? $request['domicilio']['cod_povo_indigena_fam'] : null;
            $nom_povo_indigena_fam = isset($request['domicilio']['nom_povo_indigena_fam']) ? $request['domicilio']['nom_povo_indigena_fam'] : null;
            $cod_indigena_reside_fam = isset($request['domicilio']['cod_indigena_reside_fam']) ? $request['domicilio']['cod_indigena_reside_fam'] : null;
            $cod_reserva_indigena_fam = isset($request['domicilio']['cod_reserva_indigena_fam']) ? $request['domicilio']['cod_reserva_indigena_fam'] : null;
            $nom_reserva_indigena_fam = isset($request['domicilio']['nom_reserva_indigena_fam']) ? $request['domicilio']['nom_reserva_indigena_fam'] : null;
            $ind_familia_quilombola_fam = isset($request['domicilio']['ind_familia_quilombola_fam']) ? $request['domicilio']['ind_familia_quilombola_fam'] : null;
            $cod_comunidade_quilombola_fam = isset($request['domicilio']['cod_comunidade_quilombola_fam']) ? $request['domicilio']['cod_comunidade_quilombola_fam'] : null;
            $nom_comunidade_quilombola_fam = isset($request['domicilio']['nom_comunidade_quilombola_fam']) ? $request['domicilio']['nom_comunidade_quilombola_fam'] : null;
            $qtd_pessoas_domic_fam = isset($request['domicilio']['qtd_pessoas_domic_fam']) ? $request['domicilio']['qtd_pessoas_domic_fam'] : null;
            $qtd_familias_domic_fam = isset($request['domicilio']['qtd_familias_domic_fam']) ? $request['domicilio']['qtd_familias_domic_fam'] : null;
            $qtd_pessoa_inter_0_17_anos_fam = isset($request['domicilio']['qtd_pessoa_inter_0_17_anos_fam']) ? $request['domicilio']['qtd_pessoa_inter_0_17_anos_fam'] : null;
            $qtd_pessoa_inter_18_64_anos_fam = isset($request['domicilio']['qtd_pessoa_inter_18_64_anos_fam']) ? $request['domicilio']['qtd_pessoa_inter_18_64_anos_fam'] : null;
            $qtd_pessoa_inter_65_anos_fam = isset($request['domicilio']['qtd_pessoa_inter_65_anos_fam']) ? $request['domicilio']['qtd_pessoa_inter_65_anos_fam'] : null;
            $val_desp_energia_fam = isset($request['domicilio']['val_desp_energia_fam']) ? $request['domicilio']['val_desp_energia_fam'] : null;
            $val_desp_agua_esgoto_fam = isset($request['domicilio']['val_desp_agua_esgoto_fam']) ? $request['domicilio']['val_desp_agua_esgoto_fam'] : null;
            $val_desp_gas_fam = isset($request['domicilio']['val_desp_gas_fam']) ? $request['domicilio']['val_desp_gas_fam'] : null;
            $val_desp_alimentacao_fam = isset($request['domicilio']['val_desp_alimentacao_fam']) ? $request['domicilio']['val_desp_alimentacao_fam'] : null;
            $val_desp_transpor_fam = isset($request['domicilio']['val_desp_transpor_fam']) ? $request['domicilio']['val_desp_transpor_fam'] : null;
            $val_desp_aluguel_fam = isset($request['domicilio']['val_desp_aluguel_fam']) ? $request['domicilio']['val_desp_aluguel_fam'] : null;
            $val_desp_medicamentos_fam = isset($request['domicilio']['val_desp_medicamentos_fam']) ? $request['domicilio']['val_desp_medicamentos_fam'] : null;
            $nom_estab_assist_saude_fam = isset($request['domicilio']['nom_estab_assist_saude_fam']) ? $request['domicilio']['nom_estab_assist_saude_fam'] : null;
            $cod_eas_fam = isset($request['domicilio']['cod_eas_fam']) ? $request['domicilio']['cod_eas_fam'] : null;
            $nom_centro_assist_fam = isset($request['domicilio']['nom_centro_assist_fam']) ? $request['domicilio']['nom_centro_assist_fam'] : null;
            $cod_centro_assist_fam = isset($request['domicilio']['cod_centro_assist_fam']) ? $request['domicilio']['cod_centro_assist_fam'] : null;
            $num_ddd_contato_1_fam = isset($request['domicilio']['num_ddd_contato_1_fam']) ? $request['domicilio']['num_ddd_contato_1_fam'] : null;
            $num_tel_contato_1_fam = isset($request['domicilio']['num_tel_contato_1_fam']) ? $request['domicilio']['num_tel_contato_1_fam'] : null;
            $ic_tipo_contato_1_fam = isset($request['domicilio']['ic_tipo_contato_1_fam']) ? $request['domicilio']['ic_tipo_contato_1_fam'] : null;
            $ic_envo_sms_contato_1_fam = isset($request['domicilio']['ic_envo_sms_contato_1_fam']) ? $request['domicilio']['ic_envo_sms_contato_1_fam'] : null;
            $num_tel_contato_2_fam = isset($request['domicilio']['num_tel_contato_2_fam']) ? $request['domicilio']['num_tel_contato_2_fam'] : null;
            $num_ddd_contato_2_fam = isset($request['domicilio']['num_ddd_contato_2_fam']) ? $request['domicilio']['num_ddd_contato_2_fam'] : null;
            $ic_tipo_contato_2_fam = isset($request['domicilio']['ic_tipo_contato_2_fam']) ? $request['domicilio']['ic_tipo_contato_2_fam'] : null;
            $ic_envo_sms_contato_2_fam = isset($request['domicilio']['ic_envo_sms_contato_2_fam']) ? $request['domicilio']['ic_envo_sms_contato_2_fam'] : null;
            $cod_cta_energ_unid_consum_fam = isset($request['domicilio']['cod_cta_energ_unid_consum_fam']) ? $request['domicilio']['cod_cta_energ_unid_consum_fam'] : null;
            $ind_parc_mds_fam = isset($request['domicilio']['ind_parc_mds_fam']) ? $request['domicilio']['ind_parc_mds_fam'] : null;
            $ref_cad = isset($request['domicilio']['ref_cad']) ? $request['domicilio']['ref_cad'] : null;
            $ref_pbf = isset($request['domicilio']['ref_pbf']) ? $request['domicilio']['ref_pbf'] : null;
            $tel_1 = isset($request['domicilio']['tel_1']) ? $request['domicilio']['tel_1'] : null;
            $tel_2 = isset($request['domicilio']['tel_2']) ? $request['domicilio']['tel_2'] : null;

            $pessoa_id = isset($request['domicilio']['pessoa'][0]['pessoa_id']) ? $request['domicilio']['pessoa'][0]['pessoa_id'] : null;
            $p_domicilio_id = isset($request['domicilio']['pessoa'][0]['domicilio_id']) ? $request['domicilio']['pessoa'][0]['domicilio_id'] : null;
            $p_cod_familiar_fam = isset($request['domicilio']['pessoa'][0]['cod_familiar_fam']) ? $request['domicilio']['pessoa'][0]['cod_familiar_fam'] : null;
            $cod_est_cadastral_memb = isset($request['domicilio']['pessoa'][0]['cod_est_cadastral_memb']) ? $request['domicilio']['pessoa'][0]['cod_est_cadastral_memb'] : null;
            $ind_trabalho_infantil_pessoa = isset($request['domicilio']['pessoa'][0]['ind_trabalho_infantil_pessoa']) ? $request['domicilio']['pessoa'][0]['ind_trabalho_infantil_pessoa'] : null;
            $nom_pessoa = isset($request['domicilio']['pessoa'][0]['nom_pessoa']) ? $request['domicilio']['pessoa'][0]['nom_pessoa'] : null;
            $num_nis_pessoa_atual = isset($request['domicilio']['pessoa'][0]['num_nis_pessoa_atual']) ? $request['domicilio']['pessoa'][0]['num_nis_pessoa_atual'] : null;
            $nom_apelido_pessoa = isset($request['domicilio']['pessoa'][0]['nom_apelido_pessoa']) ? $request['domicilio']['pessoa'][0]['nom_apelido_pessoa'] : null;
            $cod_sexo_pessoa = isset($request['domicilio']['pessoa'][0]['cod_sexo_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_sexo_pessoa'] : null;
            $dta_nasc_pessoa = isset($request['domicilio']['pessoa'][0]['dta_nasc_pessoa']) ? $request['domicilio']['pessoa'][0]['dta_nasc_pessoa'] : null;
            $cod_parentesco_rf_pessoa = isset($request['domicilio']['pessoa'][0]['cod_parentesco_rf_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_parentesco_rf_pessoa'] : null;
            $cod_raca_cor_pessoa = isset($request['domicilio']['pessoa'][0]['cod_raca_cor_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_raca_cor_pessoa'] : null;
            $nom_completo_mae_pessoa = isset($request['domicilio']['pessoa'][0]['nom_completo_mae_pessoa']) ? $request['domicilio']['pessoa'][0]['nom_completo_mae_pessoa'] : null;
            $nom_completo_pai_pessoa = isset($request['domicilio']['pessoa'][0]['nom_completo_pai_pessoa']) ? $request['domicilio']['pessoa'][0]['nom_completo_pai_pessoa'] : null;
            $cod_local_nascimento_pessoa = isset($request['domicilio']['pessoa'][0]['cod_local_nascimento_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_local_nascimento_pessoa'] : null;
            $sig_uf_munic_nasc_pessoa = isset($request['domicilio']['pessoa'][0]['sig_uf_munic_nasc_pessoa']) ? $request['domicilio']['pessoa'][0]['sig_uf_munic_nasc_pessoa'] : null;
            $nom_ibge_munic_nasc_pessoa = isset($request['domicilio']['pessoa'][0]['nom_ibge_munic_nasc_pessoa']) ? $request['domicilio']['pessoa'][0]['nom_ibge_munic_nasc_pessoa'] : null;
            $cod_ibge_munic_nasc_pessoa = isset($request['domicilio']['pessoa'][0]['cod_ibge_munic_nasc_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_ibge_munic_nasc_pessoa'] : null;
            $nom_pais_origem_pessoa = isset($request['domicilio']['pessoa'][0]['nom_pais_origem_pessoa']) ? $request['domicilio']['pessoa'][0]['nom_pais_origem_pessoa'] : null;
            $cod_pais_origem_pessoa = isset($request['domicilio']['pessoa'][0]['cod_pais_origem_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_pais_origem_pessoa'] : null;
            $cod_certidao_registrada_pessoa = isset($request['domicilio']['pessoa'][0]['cod_certidao_registrada_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_certidao_registrada_pessoa'] : null;
            $fx_idade = isset($request['domicilio']['pessoa'][0]['fx_idade']) ? $request['domicilio']['pessoa'][0]['fx_idade'] : null;
            $p_marc_pbf = isset($request['domicilio']['pessoa'][0]['marc_pbf']) ? $request['domicilio']['pessoa'][0]['marc_pbf'] : null;
            $cod_certidao_civil_pessoa = isset($request['domicilio']['pessoa'][0]['cod_certidao_civil_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_certidao_civil_pessoa'] : null;
            $cod_livro_termo_certid_pessoa = isset($request['domicilio']['pessoa'][0]['cod_livro_termo_certid_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_livro_termo_certid_pessoa'] : null;
            $cod_folha_termo_certid_pessoa = isset($request['domicilio']['pessoa'][0]['cod_folha_termo_certid_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_folha_termo_certid_pessoa'] : null;
            $cod_termo_matricula_certid_pessoa = isset($request['domicilio']['pessoa'][0]['cod_termo_matricula_certid_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_termo_matricula_certid_pessoa'] : null;
            $nom_munic_certid_pessoa = isset($request['domicilio']['pessoa'][0]['nom_munic_certid_pessoa']) ? $request['domicilio']['pessoa'][0]['nom_munic_certid_pessoa'] : null;
            $cod_ibge_munic_certid_pessoa = isset($request['domicilio']['pessoa'][0]['cod_ibge_munic_certid_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_ibge_munic_certid_pessoa'] : null;
            $cod_cartorio_certid_pessoa = isset($request['domicilio']['pessoa'][0]['cod_cartorio_certid_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_cartorio_certid_pessoa'] : null;
            $num_cpf_pessoa = isset($request['domicilio']['pessoa'][0]['num_cpf_pessoa']) ? $request['domicilio']['pessoa'][0]['num_cpf_pessoa'] : null;
            $num_identidade_pessoa = isset($request['domicilio']['pessoa'][0]['num_identidade_pessoa']) ? $request['domicilio']['pessoa'][0]['num_identidade_pessoa'] : null;
            $cod_complemento_pessoa = isset($request['domicilio']['pessoa'][0]['cod_complemento_pessoa']) ? $request['domicilio']['pessoa'][0]['cod_complemento_pessoa'] : null;
            $dta_emissao_ident_pessoa = isset($request['domicilio']['pessoa'][0]['dta_emissao_ident_pessoa']) ? $request['domicilio']['pessoa'][0]['dta_emissao_ident_pessoa'] : null;
            $sig_uf_ident_pessoa = isset($request['domicilio']['pessoa'][0]['sig_uf_ident_pessoa']) ? $request['domicilio']['pessoa'][0]['sig_uf_ident_pessoa'] : null;
            $sig_orgao_emissor_pessoa = isset($request['domicilio']['pessoa'][0]['sig_orgao_emissor_pessoa']) ? $request['domicilio']['pessoa'][0]['sig_orgao_emissor_pessoa'] : null;
            $num_cart_trab_prev_soc_pessoa = isset($request['domicilio']['pessoa'][0]['num_cart_trab_prev_soc_pessoa']) ? $request['domicilio']['pessoa'][0]['num_cart_trab_prev_soc_pessoa'] : null;
            $num_serie_trab_prev_soc_pessoa = isset($request['domicilio']['pessoa'][0]['num_serie_trab_prev_soc_pessoa']) ? $request['domicilio']['pessoa'][0]['num_serie_trab_prev_soc_pessoa'] : null;
            $dta_emissao_cart_trab_pessoa = isset($request['domicilio']['pessoa'][0]['dta_emissao_cart_trab_pessoa']) ? $request['domicilio']['pessoa'][0]['dta_emissao_cart_trab_pessoa'] : null;
            $sig_uf_cart_trab_pessoa = isset($request['domicilio']['pessoa'][0]['sig_uf_cart_trab_pessoa']) ? $request['domicilio']['pessoa'][0]['sig_uf_cart_trab_pessoa'] : null;
            $num_titulo_eleitor_pessoa = isset($request['domicilio']['pessoa'][0]['num_titulo_eleitor_pessoa']) ? $request['domicilio']['pessoa'][0]['num_titulo_eleitor_pessoa'] : null;
            $num_zona_tit_eleitor_pessoa = isset($request['domicilio']['pessoa'][0]['num_zona_tit_eleitor_pessoa']) ? $request['domicilio']['pessoa'][0]['num_zona_tit_eleitor_pessoa'] : null;
            $num_secao_tit_eleitor_pessoa = isset($request['domicilio']['pessoa'][0]['num_secao_tit_eleitor_pessoa']) ? $request['domicilio']['pessoa'][0]['num_secao_tit_eleitor_pessoa'] : null;
            $cod_deficiencia_memb = isset($request['domicilio']['pessoa'][0]['cod_deficiencia_memb']) ? $request['domicilio']['pessoa'][0]['cod_deficiencia_memb'] : null;
            $ind_def_cegueira_memb = isset($request['domicilio']['pessoa'][0]['ind_def_cegueira_memb']) ? $request['domicilio']['pessoa'][0]['ind_def_cegueira_memb'] : null;
            $ind_def_baixa_visao_memb = isset($request['domicilio']['pessoa'][0]['ind_def_baixa_visao_memb']) ? $request['domicilio']['pessoa'][0]['ind_def_baixa_visao_memb'] : null;
            $ind_def_surdez_profunda_memb = isset($request['domicilio']['pessoa'][0]['ind_def_surdez_profunda_memb']) ? $request['domicilio']['pessoa'][0]['ind_def_surdez_profunda_memb'] : null;
            $ind_def_surdez_leve_memb = isset($request['domicilio']['pessoa'][0]['ind_def_surdez_leve_memb']) ? $request['domicilio']['pessoa'][0]['ind_def_surdez_leve_memb'] : null;
            $ind_def_fisica_memb = isset($request['domicilio']['pessoa'][0]['ind_def_fisica_memb']) ? $request['domicilio']['pessoa'][0]['ind_def_fisica_memb'] : null;
            $ind_def_mental_memb = isset($request['domicilio']['pessoa'][0]['ind_def_mental_memb']) ? $request['domicilio']['pessoa'][0]['ind_def_mental_memb'] : null;
            $ind_def_sindrome_down_memb = isset($request['domicilio']['pessoa'][0]['ind_def_sindrome_down_memb']) ? $request['domicilio']['pessoa'][0]['ind_def_sindrome_down_memb'] : null;
            $ind_def_transtorno_mental_memb = isset($request['domicilio']['pessoa'][0]['ind_def_transtorno_mental_memb']) ? $request['domicilio']['pessoa'][0]['ind_def_transtorno_mental_memb'] : null;
            $ind_ajuda_nao_memb = isset($request['domicilio']['pessoa'][0]['ind_ajuda_nao_memb']) ? $request['domicilio']['pessoa'][0]['ind_ajuda_nao_memb'] : null;
            $ind_ajuda_familia_memb = isset($request['domicilio']['pessoa'][0]['ind_ajuda_familia_memb']) ? $request['domicilio']['pessoa'][0]['ind_ajuda_familia_memb'] : null;
            $ind_ajuda_especializado_memb = isset($request['domicilio']['pessoa'][0]['ind_ajuda_especializado_memb']) ? $request['domicilio']['pessoa'][0]['ind_ajuda_especializado_memb'] : null;
            $ind_ajuda_vizinho_memb = isset($request['domicilio']['pessoa'][0]['ind_ajuda_vizinho_memb']) ? $request['domicilio']['pessoa'][0]['ind_ajuda_vizinho_memb'] : null;
            $ind_ajuda_instituicao_memb = isset($request['domicilio']['pessoa'][0]['ind_ajuda_instituicao_memb']) ? $request['domicilio']['pessoa'][0]['ind_ajuda_instituicao_memb'] : null;
            $ind_ajuda_outra_memb = isset($request['domicilio']['pessoa'][0]['ind_ajuda_outra_memb']) ? $request['domicilio']['pessoa'][0]['ind_ajuda_outra_memb'] : null;
            $cod_sabe_ler_escrever_memb = isset($request['domicilio']['pessoa'][0]['cod_sabe_ler_escrever_memb']) ? $request['domicilio']['pessoa'][0]['cod_sabe_ler_escrever_memb'] : null;
            $ind_frequenta_escola_memb = isset($request['domicilio']['pessoa'][0]['ind_frequenta_escola_memb']) ? $request['domicilio']['pessoa'][0]['ind_frequenta_escola_memb'] : null;
            $nom_escola_memb = isset($request['domicilio']['pessoa'][0]['nom_escola_memb']) ? $request['domicilio']['pessoa'][0]['nom_escola_memb'] : null;
            $cod_escola_local_memb = isset($request['domicilio']['pessoa'][0]['cod_escola_local_memb']) ? $request['domicilio']['pessoa'][0]['cod_escola_local_memb'] : null;
            $sig_uf_escola_memb = isset($request['domicilio']['pessoa'][0]['sig_uf_escola_memb']) ? $request['domicilio']['pessoa'][0]['sig_uf_escola_memb'] : null;
            $nom_munic_escola_memb = isset($request['domicilio']['pessoa'][0]['nom_munic_escola_memb']) ? $request['domicilio']['pessoa'][0]['nom_munic_escola_memb'] : null;
            $cod_ibge_munic_escola_memb = isset($request['domicilio']['pessoa'][0]['cod_ibge_munic_escola_memb']) ? $request['domicilio']['pessoa'][0]['cod_ibge_munic_escola_memb'] : null;
            $cod_censo_inep_memb = isset($request['domicilio']['pessoa'][0]['cod_censo_inep_memb']) ? $request['domicilio']['pessoa'][0]['cod_censo_inep_memb'] : null;
            $cod_curso_frequenta_memb = isset($request['domicilio']['pessoa'][0]['cod_curso_frequenta_memb']) ? $request['domicilio']['pessoa'][0]['cod_curso_frequenta_memb'] : null;
            $cod_ano_serie_frequenta_memb = isset($request['domicilio']['pessoa'][0]['cod_ano_serie_frequenta_memb']) ? $request['domicilio']['pessoa'][0]['cod_ano_serie_frequenta_memb'] : null;
            $cod_curso_frequentou_pessoa_memb = isset($request['domicilio']['pessoa'][0]['cod_curso_frequentou_pessoa_memb']) ? $request['domicilio']['pessoa'][0]['cod_curso_frequentou_pessoa_memb'] : null;
            $cod_ano_serie_frequentou_memb = isset($request['domicilio']['pessoa'][0]['cod_ano_serie_frequentou_memb']) ? $request['domicilio']['pessoa'][0]['cod_ano_serie_frequentou_memb'] : null;
            $cod_concluiu_frequentou_memb = isset($request['domicilio']['pessoa'][0]['cod_concluiu_frequentou_memb']) ? $request['domicilio']['pessoa'][0]['cod_concluiu_frequentou_memb'] : null;
            $grau_instrucao = isset($request['domicilio']['pessoa'][0]['grau_instrucao']) ? $request['domicilio']['pessoa'][0]['grau_instrucao'] : null;
            $cod_trabalhou_memb = isset($request['domicilio']['pessoa'][0]['cod_trabalhou_memb']) ? $request['domicilio']['pessoa'][0]['cod_trabalhou_memb'] : null;
            $cod_afastado_trab_memb = isset($request['domicilio']['pessoa'][0]['cod_afastado_trab_memb']) ? $request['domicilio']['pessoa'][0]['cod_afastado_trab_memb'] : null;
            $cod_agricultura_trab_memb = isset($request['domicilio']['pessoa'][0]['cod_agricultura_trab_memb']) ? $request['domicilio']['pessoa'][0]['cod_agricultura_trab_memb'] : null;
            $cod_principal_trab_memb = isset($request['domicilio']['pessoa'][0]['cod_principal_trab_memb']) ? $request['domicilio']['pessoa'][0]['cod_principal_trab_memb'] : null;
            $val_remuner_emprego_memb = isset($request['domicilio']['pessoa'][0]['val_remuner_emprego_memb']) ? $request['domicilio']['pessoa'][0]['val_remuner_emprego_memb'] : null;
            $cod_trabalho_12_meses_memb = isset($request['domicilio']['pessoa'][0]['cod_trabalho_12_meses_memb']) ? $request['domicilio']['pessoa'][0]['cod_trabalho_12_meses_memb'] : null;
            $qtd_meses_12_meses_memb = isset($request['domicilio']['pessoa'][0]['qtd_meses_12_meses_memb']) ? $request['domicilio']['pessoa'][0]['qtd_meses_12_meses_memb'] : null;
            $val_renda_bruta_12_meses_memb = isset($request['domicilio']['pessoa'][0]['val_renda_bruta_12_meses_memb']) ? $request['domicilio']['pessoa'][0]['val_renda_bruta_12_meses_memb'] : null;
            $val_renda_doacao_memb = isset($request['domicilio']['pessoa'][0]['val_renda_doacao_memb']) ? $request['domicilio']['pessoa'][0]['val_renda_doacao_memb'] : null;
            $val_renda_aposent_memb = isset($request['domicilio']['pessoa'][0]['val_renda_aposent_memb']) ? $request['domicilio']['pessoa'][0]['val_renda_aposent_memb'] : null;
            $val_renda_seguro_desemp_memb = isset($request['domicilio']['pessoa'][0]['val_renda_seguro_desemp_memb']) ? $request['domicilio']['pessoa'][0]['val_renda_seguro_desemp_memb'] : null;
            $val_renda_pensao_alimen_memb = isset($request['domicilio']['pessoa'][0]['val_renda_pensao_alimen_memb']) ? $request['domicilio']['pessoa'][0]['val_renda_pensao_alimen_memb'] : null;
            $val_outras_rendas_memb = isset($request['domicilio']['pessoa'][0]['val_outras_rendas_memb']) ? $request['domicilio']['pessoa'][0]['val_outras_rendas_memb'] : null;
            $marc_sit_rua = isset($request['domicilio']['pessoa'][0]['marc_sit_rua']) ? $request['domicilio']['pessoa'][0]['marc_sit_rua'] : null;
            $ind_dormir_rua_memb = isset($request['domicilio']['pessoa'][0]['ind_dormir_rua_memb']) ? $request['domicilio']['pessoa'][0]['ind_dormir_rua_memb'] : null;
            $qtd_dormir_freq_rua_memb = isset($request['domicilio']['pessoa'][0]['qtd_dormir_freq_rua_memb']) ? $request['domicilio']['pessoa'][0]['qtd_dormir_freq_rua_memb'] : null;
            $ind_dormir_albergue_memb = isset($request['domicilio']['pessoa'][0]['ind_dormir_albergue_memb']) ? $request['domicilio']['pessoa'][0]['ind_dormir_albergue_memb'] : null;
            $qtd_dormir_freq_albergue_memb = isset($request['domicilio']['pessoa'][0]['qtd_dormir_freq_albergue_memb']) ? $request['domicilio']['pessoa'][0]['qtd_dormir_freq_albergue_memb'] : null;
            $ind_dormir_dom_part_memb = isset($request['domicilio']['pessoa'][0]['ind_dormir_dom_part_memb']) ? $request['domicilio']['pessoa'][0]['ind_dormir_dom_part_memb'] : null;
            $qtd_dormir_freq_dom_part_memb = isset($request['domicilio']['pessoa'][0]['qtd_dormir_freq_dom_part_memb']) ? $request['domicilio']['pessoa'][0]['qtd_dormir_freq_dom_part_memb'] : null;
            $ind_outro_memb = isset($request['domicilio']['pessoa'][0]['ind_outro_memb']) ? $request['domicilio']['pessoa'][0]['ind_outro_memb'] : null;
            $qtd_freq_outro_memb = isset($request['domicilio']['pessoa'][0]['qtd_freq_outro_memb']) ? $request['domicilio']['pessoa'][0]['qtd_freq_outro_memb'] : null;
            $cod_tempo_rua_memb = isset($request['domicilio']['pessoa'][0]['cod_tempo_rua_memb']) ? $request['domicilio']['pessoa'][0]['cod_tempo_rua_memb'] : null;
            $ind_motivo_perda_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_perda_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_perda_memb'] : null;
            $ind_motivo_ameaca_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_ameaca_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_ameaca_memb'] : null;
            $ind_motivo_probs_fam_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_probs_fam_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_probs_fam_memb'] : null;
            $ind_motivo_alcool_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_alcool_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_alcool_memb'] : null;
            $ind_motivo_desemprego_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_desemprego_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_desemprego_memb'] : null;
            $ind_motivo_trabalho_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_trabalho_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_trabalho_memb'] : null;
            $ind_motivo_saude_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_saude_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_saude_memb'] : null;
            $ind_motivo_pref_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_pref_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_pref_memb'] : null;
            $ind_motivo_outro_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_outro_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_outro_memb'] : null;
            $ind_motivo_nao_sabe_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_nao_sabe_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_nao_sabe_memb'] : null;
            $ind_motivo_nao_resp_memb = isset($request['domicilio']['pessoa'][0]['ind_motivo_nao_resp_memb']) ? $request['domicilio']['pessoa'][0]['ind_motivo_nao_resp_memb'] : null;
            $cod_tempo_cidade_memb = isset($request['domicilio']['pessoa'][0]['cod_tempo_cidade_memb']) ? $request['domicilio']['pessoa'][0]['cod_tempo_cidade_memb'] : null;
            $cod_vive_fam_rua_memb = isset($request['domicilio']['pessoa'][0]['cod_vive_fam_rua_memb']) ? $request['domicilio']['pessoa'][0]['cod_vive_fam_rua_memb'] : null;
            $cod_contato_parente_memb = isset($request['domicilio']['pessoa'][0]['cod_contato_parente_memb']) ? $request['domicilio']['pessoa'][0]['cod_contato_parente_memb'] : null;
            $ind_ativ_com_escola_memb = isset($request['domicilio']['pessoa'][0]['ind_ativ_com_escola_memb']) ? $request['domicilio']['pessoa'][0]['ind_ativ_com_escola_memb'] : null;
            $ind_ativ_com_coop_memb = isset($request['domicilio']['pessoa'][0]['ind_ativ_com_coop_memb']) ? $request['domicilio']['pessoa'][0]['ind_ativ_com_coop_memb'] : null;
            $ind_ativ_com_mov_soc_memb = isset($request['domicilio']['pessoa'][0]['ind_ativ_com_mov_soc_memb']) ? $request['domicilio']['pessoa'][0]['ind_ativ_com_mov_soc_memb'] : null;
            $ind_ativ_com_nao_sabe_memb = isset($request['domicilio']['pessoa'][0]['ind_ativ_com_nao_sabe_memb']) ? $request['domicilio']['pessoa'][0]['ind_ativ_com_nao_sabe_memb'] : null;
            $ind_ativ_com_nao_resp_memb = isset($request['domicilio']['pessoa'][0]['ind_ativ_com_nao_resp_memb']) ? $request['domicilio']['pessoa'][0]['ind_ativ_com_nao_resp_memb'] : null;
            $ind_atend_cras_memb = isset($request['domicilio']['pessoa'][0]['ind_atend_cras_memb']) ? $request['domicilio']['pessoa'][0]['ind_atend_cras_memb'] : null;
            $ind_atend_creas_memb = isset($request['domicilio']['pessoa'][0]['ind_atend_creas_memb']) ? $request['domicilio']['pessoa'][0]['ind_atend_creas_memb'] : null;
            $ind_atend_centro_ref_rua_memb = isset($request['domicilio']['pessoa'][0]['ind_atend_centro_ref_rua_memb']) ? $request['domicilio']['pessoa'][0]['ind_atend_centro_ref_rua_memb'] : null;
            $ind_atend_inst_gov_memb = isset($request['domicilio']['pessoa'][0]['ind_atend_inst_gov_memb']) ? $request['domicilio']['pessoa'][0]['ind_atend_inst_gov_memb'] : null;
            $ind_atend_inst_nao_gov_memb = isset($request['domicilio']['pessoa'][0]['ind_atend_inst_nao_gov_memb']) ? $request['domicilio']['pessoa'][0]['ind_atend_inst_nao_gov_memb'] : null;
            $ind_atend_hospital_geral_memb = isset($request['domicilio']['pessoa'][0]['ind_atend_hospital_geral_memb']) ? $request['domicilio']['pessoa'][0]['ind_atend_hospital_geral_memb'] : null;
            $cod_cart_assinada_memb = isset($request['domicilio']['pessoa'][0]['cod_cart_assinada_memb']) ? $request['domicilio']['pessoa'][0]['cod_cart_assinada_memb'] : null;
            $ind_dinh_const_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_const_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_const_memb'] : null;
            $ind_dinh_flanelhinha_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_flanelhinha_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_flanelhinha_memb'] : null;
            $ind_dinh_carregador_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_carregador_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_carregador_memb'] : null;
            $ind_dinh_catador_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_catador_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_catador_memb'] : null;
            $ind_dinh_servs_gerais_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_servs_gerais_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_servs_gerais_memb'] : null;
            $ind_dinh_pede_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_pede_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_pede_memb'] : null;
            $ind_dinh_vendas_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_vendas_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_vendas_memb'] : null;
            $ind_dinh_outro_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_outro_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_outro_memb'] : null;
            $ind_dinh_nao_resp_memb = isset($request['domicilio']['pessoa'][0]['ind_dinh_nao_resp_memb']) ? $request['domicilio']['pessoa'][0]['ind_dinh_nao_resp_memb'] : null;
            $ind_atend_nenhum_memb = isset($request['domicilio']['pessoa'][0]['ind_atend_nenhum_memb']) ? $request['domicilio']['pessoa'][0]['ind_atend_nenhum_memb'] : null;
            $cpf = isset($request['domicilio']['pessoa'][0]['cpf']) ? $request['domicilio']['pessoa'][0]['cpf'] : null;
            $p_ref_cad = isset($request['domicilio']['pessoa'][0]['ref_cad']) ? $request['domicilio']['pessoa'][0]['ref_cad'] : null;
            $p_ref_pbf = isset($request['domicilio']['pessoa'][0]['ref_pbf']) ? $request['domicilio']['pessoa'][0]['ref_pbf'] : null;
            $domicilio_id_1 = isset($request['domicilio']['pessoa'][0]['domicilio_id_1']) ? $request['domicilio']['pessoa'][0]['domicilio_id_1'] : null;
//            $tipo_profissao_id = isset($request['domicilio']['pessoa'][0]['tipo_profissao_id']) ? $request['domicilio']['pessoa'][0]['tipo_profissao_id'] : null;

            $idade = isset($request['idade']) ? $request['idade'] : null;
            $ano = isset($request['ano']) ? $request['ano'] : null;

            $diaAniversario = isset($request['diaAniversario']) ? $request['diaAniversario'] : null;
            $mesAniversario = isset($request['mesAniversario']) ? $request['mesAniversario'] : null;

            $tipo_bairro_id = isset($request['tipo_bairro_id']) ? $request['tipo_bairro_id'] : null;
            $tipo_povoado_id = isset($request['tipo_povoado_id']) ? $request['tipo_povoado_id'] : null;
            $tipo_profissao_id = isset($request['tipo_profissao_id']) ? $request['tipo_profissao_id'] : null;
            $tipo_menu_id = isset($request['tipo_menu_id']) ? $request['tipo_menu_id'] : null;
            $tipo_escola_id = isset($request['tipo_escola_id']) ? $request['tipo_escola_id'] : null;

            $profissao_nome = null;
            $orgao_nome = null;
//
//            if($tipo_bairro_id != null){
//                $retorno = Tipo::listar([
//                    'tipo_id' => $tipo_bairro_id
//                ]);
//
////                if($retorno->count() != 0){
////                    $nom_logradouro_fam = $retorno[0]['tipo_nome'];
////                }
//
//                unset($retorno);
//            }

//            if($tipo_povoado_id != null){
//                $retorno = Tipo::listar([
//                    'tipo_id' => $tipo_povoado_id
//                ]);
//
//                if($retorno->count() != 0){
//                    $nom_logradouro_fam = $retorno[0]['tipo_nome'];
//                }
//
//                unset($retorno);
//            }

//            if($tipo_profissao_id != null){
//                $retorno = Tipo::listar([
//                    'tipo_id' => $tipo_profissao_id
//                ]);
//
//                if($retorno->count() != 0){
//                    $profissao_nome = $retorno[0]['tipo_nome'];
//                }
//
//                unset($retorno);
//
//            }

            $dados = $dados
                ->when($tipo_menu_id, function($query, $campo){
                    return $query->where('atendimento.tipo_menu_id', '=', $campo);
                })
                ->when($tipo_bairro_id, function($query, $campo){
                    return $query->where('domicilio.tipo_bairro_id', '=', $campo);
                })
                ->when($tipo_povoado_id, function($query, $campo){
                    return $query->where('domicilio.tipo_povoado_id', '=', $campo);
                })
                ->when($domicilio_id, function($query, $campo){
                    return $query->where('domicilio.domicilio_id', '=', $campo);
                })
                ->when($cd_ibge, function($query, $campo){
                    return $query->where('domicilio.cd_ibge', '=', $campo);
                })
                ->when($cod_familiar_fam, function($query, $campo){
                    return $query->where('domicilio.cod_familiar_fam', '=', $campo);
                })
                ->when($dat_cadastramento_fam, function($query, $campo){
                    return $query->where('domicilio.dat_cadastramento_fam', '=', $campo);
                })
                ->when($dat_atual_fam, function($query, $campo){
                    return $query->where('domicilio.dat_atual_fam', '=', $campo);
                })
                ->when($cod_est_cadastral_fam, function($query, $campo){
                    return $query->where('domicilio.cod_est_cadastral_fam', '=', $campo);
                })
                ->when($cod_forma_coleta_fam, function($query, $campo){
                    return $query->where('domicilio.cod_forma_coleta_fam', '=', $campo);
                })
                ->when($dta_entrevista_fam, function($query, $campo){
                    return $query->where('domicilio.dta_entrevista_fam', '=', $campo);
                })
                ->when($nom_localidade_fam, function($query, $campo){
                    return $query->where('domicilio.nom_localidade_fam', 'like', '%' . $campo . '%');
                })
                ->when($nom_tip_logradouro_fam, function($query, $campo){
                    return $query->where('domicilio.nom_tip_logradouro_fam', '=', $campo);
                })
                ->when($nom_titulo_logradouro_fam, function($query, $campo){
                    return $query->where('domicilio.nom_titulo_logradouro_fam', '=', $campo);
                })
                ->when($nom_logradouro_fam, function($query, $campo){
                    return $query->where('domicilio.nom_logradouro_fam', '=', $campo);
                })
                ->when($num_logradouro_fam, function($query, $campo){
                    return $query->where('domicilio.num_logradouro_fam', '=', $campo);
                })
                ->when($des_complemento_fam, function($query, $campo){
                    return $query->where('domicilio.des_complemento_fam', '=', $campo);
                })
                ->when($des_complemento_adic_fam, function($query, $campo){
                    return $query->where('domicilio.des_complemento_adic_fam', '=', $campo);
                })
//                ->when($num_cep_logradouro_fam, function($query, $campo){
//                    return $query->where('domicilio.num_cep_logradouro_fam', '=', $campo);
//                })
                ->when($cod_unidade_territorial_fam, function($query, $campo){
                    return $query->where('domicilio.cod_unidade_territorial_fam', '=', $campo);
                })
                ->when($nom_unidade_territorial_fam, function($query, $campo){
                    return $query->where('domicilio.nom_unidade_territorial_fam', '=', $campo);
                })
                ->when($txt_referencia_local_fam, function($query, $campo){
                    return $query->where('domicilio.txt_referencia_local_fam', '=', $campo);
                })
                ->when($nom_entrevistador_fam, function($query, $campo){
                    return $query->where('domicilio.nom_entrevistador_fam', '=', $campo);
                })
                ->when($num_cpf_entrevistador_fam, function($query, $campo){
                    return $query->where('domicilio.num_cpf_entrevistador_fam', '=', $campo);
                })
                ->when($vlr_renda_media_fam, function($query, $campo){
                    return $query->where('domicilio.vlr_renda_media_fam', '=', $campo);
                })
                ->when($fx_rfpc, function($query, $campo){
                    return $query->where('domicilio.fx_rfpc', '=', $campo);
                })
                ->when($vlr_renda_total_fam, function($query, $campo){
                    return $query->where('domicilio.vlr_renda_total_fam', '=', $campo);
                })
                ->when($marc_pbf, function($query, $campo){
                    return $query->where('domicilio.marc_pbf', '=', $campo);
                })
                ->when($qtde_meses_desat_cat, function($query, $campo){
                    return $query->where('domicilio.qtde_meses_desat_cat', '=', $campo);
                })
                ->when($cod_local_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_local_domic_fam', '=', $campo);
                })
                ->when($cod_especie_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_especie_domic_fam', '=', $campo);
                })
                ->when($qtd_comodos_domic_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_comodos_domic_fam', '=', $campo);
                })
                ->when($qtd_comodos_dormitorio_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_comodos_dormitorio_fam', '=', $campo);
                })
                ->when($cod_material_piso_fam, function($query, $campo){
                    return $query->where('domicilio.cod_material_piso_fam', '=', $campo);
                })
                ->when($cod_material_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_material_domic_fam', '=', $campo);
                })
                ->when($cod_agua_canalizada_fam, function($query, $campo){
                    return $query->where('domicilio.cod_agua_canalizada_fam', '=', $campo);
                })
                ->when($cod_abaste_agua_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_abaste_agua_domic_fam', '=', $campo);
                })
                ->when($cod_banheiro_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_banheiro_domic_fam', '=', $campo);
                })
                ->when($cod_escoa_sanitario_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_escoa_sanitario_domic_fam', '=', $campo);
                })
                ->when($cod_destino_lixo_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_destino_lixo_domic_fam', '=', $campo);
                })
                ->when($cod_iluminacao_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_iluminacao_domic_fam', '=', $campo);
                })
                ->when($cod_calcamento_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_calcamento_domic_fam', '=', $campo);
                })
                ->when($cod_familia_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.cod_familia_indigena_fam', '=', $campo);
                })
                ->when($cod_povo_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.cod_povo_indigena_fam', '=', $campo);
                })
                ->when($nom_povo_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.nom_povo_indigena_fam', '=', $campo);
                })
                ->when($cod_indigena_reside_fam, function($query, $campo){
                    return $query->where('domicilio.cod_indigena_reside_fam', '=', $campo);
                })
                ->when($cod_reserva_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.cod_reserva_indigena_fam', '=', $campo);
                })
                ->when($nom_reserva_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.nom_reserva_indigena_fam', '=', $campo);
                })
                ->when($ind_familia_quilombola_fam, function($query, $campo){
                    return $query->where('domicilio.ind_familia_quilombola_fam', '=', $campo);
                })
                ->when($cod_comunidade_quilombola_fam, function($query, $campo){
                    return $query->where('domicilio.cod_comunidade_quilombola_fam', '=', $campo);
                })
                ->when($nom_comunidade_quilombola_fam, function($query, $campo){
                    return $query->where('domicilio.nom_comunidade_quilombola_fam', '=', $campo);
                })
                ->when($qtd_pessoas_domic_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_pessoas_domic_fam', '=', $campo);
                })
                ->when($qtd_familias_domic_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_familias_domic_fam', '=', $campo);
                })
                ->when($qtd_pessoa_inter_0_17_anos_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_pessoa_inter_0_17_anos_fam', '=', $campo);
                })
                ->when($qtd_pessoa_inter_18_64_anos_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_pessoa_inter_18_64_anos_fam', '=', $campo);
                })
                ->when($qtd_pessoa_inter_65_anos_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_pessoa_inter_65_anos_fam', '=', $campo);
                })
                ->when($val_desp_energia_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_energia_fam', '=', $campo);
                })
                ->when($val_desp_agua_esgoto_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_agua_esgoto_fam', '=', $campo);
                })
                ->when($val_desp_gas_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_gas_fam', '=', $campo);
                })
                ->when($val_desp_alimentacao_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_alimentacao_fam', '=', $campo);
                })
                ->when($val_desp_transpor_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_transpor_fam', '=', $campo);
                })
                ->when($val_desp_aluguel_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_aluguel_fam', '=', $campo);
                })
                ->when($val_desp_medicamentos_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_medicamentos_fam', '=', $campo);
                })
                ->when($nom_estab_assist_saude_fam, function($query, $campo){
                    return $query->where('domicilio.nom_estab_assist_saude_fam', '=', $campo);
                })
                ->when($cod_eas_fam, function($query, $campo){
                    return $query->where('domicilio.cod_eas_fam', '=', $campo);
                })
                ->when($nom_centro_assist_fam, function($query, $campo){
                    return $query->where('domicilio.nom_centro_assist_fam', '=', $campo);
                })
                ->when($cod_centro_assist_fam, function($query, $campo){
                    return $query->where('domicilio.cod_centro_assist_fam', '=', $campo);
                })
                ->when($num_ddd_contato_1_fam, function($query, $campo){
                    return $query->where('domicilio.num_ddd_contato_1_fam', '=', $campo);
                })
                ->when($num_tel_contato_1_fam, function($query, $campo){
                    return $query->where('domicilio.num_tel_contato_1_fam', '=', $campo);
                })
                ->when($ic_tipo_contato_1_fam, function($query, $campo){
                    return $query->where('domicilio.ic_tipo_contato_1_fam', '=', $campo);
                })
                ->when($ic_envo_sms_contato_1_fam, function($query, $campo){
                    return $query->where('domicilio.ic_envo_sms_contato_1_fam', '=', $campo);
                })
                ->when($num_tel_contato_2_fam, function($query, $campo){
                    return $query->where('domicilio.num_tel_contato_2_fam', '=', $campo);
                })
                ->when($num_ddd_contato_2_fam, function($query, $campo){
                    return $query->where('domicilio.num_ddd_contato_2_fam', '=', $campo);
                })
                ->when($ic_tipo_contato_2_fam, function($query, $campo){
                    return $query->where('domicilio.ic_tipo_contato_2_fam', '=', $campo);
                })
                ->when($ic_envo_sms_contato_2_fam, function($query, $campo){
                    return $query->where('domicilio.ic_envo_sms_contato_2_fam', '=', $campo);
                })
                ->when($cod_cta_energ_unid_consum_fam, function($query, $campo){
                    return $query->where('domicilio.cod_cta_energ_unid_consum_fam', '=', $campo);
                })
                ->when($ind_parc_mds_fam, function($query, $campo){
                    return $query->where('domicilio.ind_parc_mds_fam', '=', $campo);
                })
                ->when($ref_cad, function($query, $campo){
                    return $query->where('domicilio.ref_cad', '=', $campo);
                })
                ->when($ref_pbf, function($query, $campo){
                    return $query->where('domicilio.ref_pbf', '=', $campo);
                })

                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa.pessoa_id', '=', $campo);
                })
                ->when($p_domicilio_id, function($query, $campo){
                    return $query->where('pessoa.domicilio_id', '=', $campo);
                })
                ->when($p_cod_familiar_fam, function($query, $campo){
                    return $query->where('pessoa.cod_familiar_fam', '=', $campo);
                })
                ->when($cod_est_cadastral_memb, function($query, $campo){
                    return $query->where('pessoa.cod_est_cadastral_memb', '=', $campo);
                })
                ->when($ind_trabalho_infantil_pessoa, function($query, $campo){
                    return $query->where('pessoa.ind_trabalho_infantil_pessoa', '=', $campo);
                })
                ->when($nom_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($num_nis_pessoa_atual, function($query, $campo){
                    return $query->where('pessoa.num_nis_pessoa_atual', '=', $campo);
                })
                ->when($nom_apelido_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_apelido_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($cod_sexo_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_sexo_pessoa', '=', $campo);
                })
                ->when($dta_nasc_pessoa, function($query, $campo){
                    return $query->where('pessoa.dta_nasc_pessoa', '=', $campo);
                })
                ->when($cod_parentesco_rf_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_parentesco_rf_pessoa', '=', $campo);
                })
                ->when($cod_raca_cor_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_raca_cor_pessoa', '=', $campo);
                })
                ->when($nom_completo_mae_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_completo_mae_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($nom_completo_pai_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_completo_pai_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($cod_local_nascimento_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_local_nascimento_pessoa', '=', $campo);
                })
                ->when($sig_uf_munic_nasc_pessoa, function($query, $campo){
                    return $query->where('pessoa.sig_uf_munic_nasc_pessoa', '=', $campo);
                })
                ->when($nom_ibge_munic_nasc_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_ibge_munic_nasc_pessoa', '=', $campo);
                })
                ->when($cod_ibge_munic_nasc_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_ibge_munic_nasc_pessoa', '=', $campo);
                })
                ->when($nom_pais_origem_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_pais_origem_pessoa', '=', $campo);
                })
                ->when($cod_pais_origem_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_pais_origem_pessoa', '=', $campo);
                })
                ->when($cod_certidao_registrada_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_certidao_registrada_pessoa', '=', $campo);
                })
                ->when($fx_idade, function($query, $campo){
                    return $query->where('pessoa.fx_idade', '=', $campo);
                })
                ->when($p_marc_pbf, function($query, $campo){
                    return $query->where('pessoa.marc_pbf', '=', $campo);
                })
                ->when($cod_certidao_civil_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_certidao_civil_pessoa', '=', $campo);
                })
                ->when($cod_livro_termo_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_livro_termo_certid_pessoa', '=', $campo);
                })
                ->when($cod_folha_termo_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_folha_termo_certid_pessoa', '=', $campo);
                })
                ->when($cod_termo_matricula_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_termo_matricula_certid_pessoa', '=', $campo);
                })
                ->when($nom_munic_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_munic_certid_pessoa', '=', $campo);
                })
                ->when($cod_ibge_munic_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_ibge_munic_certid_pessoa', '=', $campo);
                })
                ->when($cod_cartorio_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_cartorio_certid_pessoa', '=', $campo);
                })
                ->when($num_cpf_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_cpf_pessoa', '=', $campo);
                })
                ->when($num_identidade_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_identidade_pessoa', '=', $campo);
                })
                ->when($cod_complemento_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_complemento_pessoa', '=', $campo);
                })
                ->when($dta_emissao_ident_pessoa, function($query, $campo){
                    return $query->where('pessoa.dta_emissao_ident_pessoa', '=', $campo);
                })
                ->when($sig_uf_ident_pessoa, function($query, $campo){
                    return $query->where('pessoa.sig_uf_ident_pessoa', '=', $campo);
                })
                ->when($sig_orgao_emissor_pessoa, function($query, $campo){
                    return $query->where('pessoa.sig_orgao_emissor_pessoa', '=', $campo);
                })
                ->when($num_cart_trab_prev_soc_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_cart_trab_prev_soc_pessoa', '=', $campo);
                })
                ->when($num_serie_trab_prev_soc_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_serie_trab_prev_soc_pessoa', '=', $campo);
                })
                ->when($dta_emissao_cart_trab_pessoa, function($query, $campo){
                    return $query->where('pessoa.dta_emissao_cart_trab_pessoa', '=', $campo);
                })
                ->when($sig_uf_cart_trab_pessoa, function($query, $campo){
                    return $query->where('pessoa.sig_uf_cart_trab_pessoa', '=', $campo);
                })
                ->when($num_titulo_eleitor_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_titulo_eleitor_pessoa', '=', $campo);
                })
                ->when($num_zona_tit_eleitor_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_zona_tit_eleitor_pessoa', '=', $campo);
                })
                ->when($num_secao_tit_eleitor_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_secao_tit_eleitor_pessoa', '=', $campo);
                })
                ->when($cod_deficiencia_memb, function($query, $campo){
                    return $query->where('pessoa.cod_deficiencia_memb', '=', $campo);
                })
                ->when($ind_def_cegueira_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_cegueira_memb', '=', $campo);
                })
                ->when($ind_def_baixa_visao_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_baixa_visao_memb', '=', $campo);
                })
                ->when($ind_def_surdez_profunda_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_surdez_profunda_memb', '=', $campo);
                })
                ->when($ind_def_surdez_leve_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_surdez_leve_memb', '=', $campo);
                })
                ->when($ind_def_fisica_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_fisica_memb', '=', $campo);
                })
                ->when($ind_def_mental_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_mental_memb', '=', $campo);
                })
                ->when($ind_def_sindrome_down_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_sindrome_down_memb', '=', $campo);
                })
                ->when($ind_def_transtorno_mental_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_transtorno_mental_memb', '=', $campo);
                })
                ->when($ind_ajuda_nao_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_nao_memb', '=', $campo);
                })
                ->when($ind_ajuda_familia_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_familia_memb', '=', $campo);
                })
                ->when($ind_ajuda_especializado_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_especializado_memb', '=', $campo);
                })
                ->when($ind_ajuda_vizinho_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_vizinho_memb', '=', $campo);
                })
                ->when($ind_ajuda_instituicao_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_instituicao_memb', '=', $campo);
                })
                ->when($ind_ajuda_outra_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_outra_memb', '=', $campo);
                })
                ->when($cod_sabe_ler_escrever_memb, function($query, $campo){
                    return $query->where('pessoa.cod_sabe_ler_escrever_memb', '=', $campo);
                })
                ->when($ind_frequenta_escola_memb, function($query, $campo){
                    return $query->where('pessoa.ind_frequenta_escola_memb', '=', $campo);
                })
                ->when($nom_escola_memb, function($query, $campo){
                    return $query->where('pessoa.nom_escola_memb', '=', $campo);
                })
                ->when($cod_escola_local_memb, function($query, $campo){
                    return $query->where('pessoa.cod_escola_local_memb', '=', $campo);
                })
                ->when($sig_uf_escola_memb, function($query, $campo){
                    return $query->where('pessoa.sig_uf_escola_memb', '=', $campo);
                })
                ->when($nom_munic_escola_memb, function($query, $campo){
                    return $query->where('pessoa.nom_munic_escola_memb', '=', $campo);
                })
                ->when($cod_ibge_munic_escola_memb, function($query, $campo){
                    return $query->where('pessoa.cod_ibge_munic_escola_memb', '=', $campo);
                })
                ->when($cod_censo_inep_memb, function($query, $campo){
                    return $query->where('pessoa.cod_censo_inep_memb', '=', $campo);
                })
                ->when($cod_curso_frequenta_memb, function($query, $campo){
                    return $query->where('pessoa.cod_curso_frequenta_memb', '=', $campo);
                })
                ->when($cod_ano_serie_frequenta_memb, function($query, $campo){
                    return $query->where('pessoa.cod_ano_serie_frequenta_memb', '=', $campo);
                })
                ->when($cod_curso_frequentou_pessoa_memb, function($query, $campo){
                    return $query->where('pessoa.cod_curso_frequentou_pessoa_memb', '=', $campo);
                })
                ->when($cod_ano_serie_frequentou_memb, function($query, $campo){
                    return $query->where('pessoa.cod_ano_serie_frequentou_memb', '=', $campo);
                })
                ->when($cod_concluiu_frequentou_memb, function($query, $campo){
                    return $query->where('pessoa.cod_concluiu_frequentou_memb', '=', $campo);
                })
                ->when($grau_instrucao, function($query, $campo){
                    return $query->where('pessoa.grau_instrucao', '=', $campo);
                })
                ->when($cod_trabalhou_memb, function($query, $campo){
                    return $query->where('pessoa.cod_trabalhou_memb', '=', $campo);
                })
                ->when($cod_afastado_trab_memb, function($query, $campo){
                    return $query->where('pessoa.cod_afastado_trab_memb', '=', $campo);
                })
                ->when($cod_agricultura_trab_memb, function($query, $campo){
                    return $query->where('pessoa.cod_agricultura_trab_memb', '=', $campo);
                })
                ->when($cod_principal_trab_memb, function($query, $campo){
                    return $query->where('pessoa.cod_principal_trab_memb', '=', $campo);
                })
                ->when($val_remuner_emprego_memb, function($query, $campo){
                    return $query->where('pessoa.val_remuner_emprego_memb', '=', $campo);
                })
                ->when($cod_trabalho_12_meses_memb, function($query, $campo){
                    return $query->where('pessoa.cod_trabalho_12_meses_memb', '=', $campo);
                })
                ->when($qtd_meses_12_meses_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_meses_12_meses_memb', '=', $campo);
                })
                ->when($val_renda_bruta_12_meses_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_bruta_12_meses_memb', '=', $campo);
                })
                ->when($val_renda_doacao_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_doacao_memb', '=', $campo);
                })
                ->when($val_renda_aposent_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_aposent_memb', '=', $campo);
                })
                ->when($val_renda_seguro_desemp_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_seguro_desemp_memb', '=', $campo);
                })
                ->when($val_renda_pensao_alimen_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_pensao_alimen_memb', '=', $campo);
                })
                ->when($val_outras_rendas_memb, function($query, $campo){
                    return $query->where('pessoa.val_outras_rendas_memb', '=', $campo);
                })
                ->when($marc_sit_rua, function($query, $campo){
                    return $query->where('pessoa.marc_sit_rua', '=', $campo);
                })
                ->when($ind_dormir_rua_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dormir_rua_memb', '=', $campo);
                })
                ->when($qtd_dormir_freq_rua_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_dormir_freq_rua_memb', '=', $campo);
                })
                ->when($ind_dormir_albergue_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dormir_albergue_memb', '=', $campo);
                })
                ->when($qtd_dormir_freq_albergue_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_dormir_freq_albergue_memb', '=', $campo);
                })
                ->when($ind_dormir_dom_part_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dormir_dom_part_memb', '=', $campo);
                })
                ->when($qtd_dormir_freq_dom_part_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_dormir_freq_dom_part_memb', '=', $campo);
                })
                ->when($ind_outro_memb, function($query, $campo){
                    return $query->where('pessoa.ind_outro_memb', '=', $campo);
                })
                ->when($qtd_freq_outro_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_freq_outro_memb', '=', $campo);
                })
                ->when($cod_tempo_rua_memb, function($query, $campo){
                    return $query->where('pessoa.cod_tempo_rua_memb', '=', $campo);
                })
                ->when($ind_motivo_perda_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_perda_memb', '=', $campo);
                })
                ->when($ind_motivo_ameaca_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_ameaca_memb', '=', $campo);
                })
                ->when($ind_motivo_probs_fam_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_probs_fam_memb', '=', $campo);
                })
                ->when($ind_motivo_alcool_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_alcool_memb', '=', $campo);
                })
                ->when($ind_motivo_desemprego_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_desemprego_memb', '=', $campo);
                })
                ->when($ind_motivo_trabalho_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_trabalho_memb', '=', $campo);
                })
                ->when($ind_motivo_saude_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_saude_memb', '=', $campo);
                })
                ->when($ind_motivo_pref_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_pref_memb', '=', $campo);
                })
                ->when($ind_motivo_outro_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_outro_memb', '=', $campo);
                })
                ->when($ind_motivo_nao_sabe_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_nao_sabe_memb', '=', $campo);
                })
                ->when($ind_motivo_nao_resp_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_nao_resp_memb', '=', $campo);
                })
                ->when($cod_tempo_cidade_memb, function($query, $campo){
                    return $query->where('pessoa.cod_tempo_cidade_memb', '=', $campo);
                })
                ->when($cod_vive_fam_rua_memb, function($query, $campo){
                    return $query->where('pessoa.cod_vive_fam_rua_memb', '=', $campo);
                })
                ->when($cod_contato_parente_memb, function($query, $campo){
                    return $query->where('pessoa.cod_contato_parente_memb', '=', $campo);
                })
                ->when($ind_ativ_com_escola_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_escola_memb', '=', $campo);
                })
                ->when($ind_ativ_com_coop_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_coop_memb', '=', $campo);
                })
                ->when($ind_ativ_com_mov_soc_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_mov_soc_memb', '=', $campo);
                })
                ->when($ind_ativ_com_nao_sabe_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_nao_sabe_memb', '=', $campo);
                })
                ->when($ind_ativ_com_nao_resp_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_nao_resp_memb', '=', $campo);
                })
                ->when($ind_atend_cras_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_cras_memb', '=', $campo);
                })
                ->when($ind_atend_creas_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_creas_memb', '=', $campo);
                })
                ->when($ind_atend_centro_ref_rua_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_centro_ref_rua_memb', '=', $campo);
                })
                ->when($ind_atend_inst_gov_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_inst_gov_memb', '=', $campo);
                })
                ->when($ind_atend_inst_nao_gov_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_inst_nao_gov_memb', '=', $campo);
                })
                ->when($ind_atend_hospital_geral_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_hospital_geral_memb', '=', $campo);
                })
                ->when($cod_cart_assinada_memb, function($query, $campo){
                    return $query->where('pessoa.cod_cart_assinada_memb', '=', $campo);
                })
                ->when($ind_dinh_const_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_const_memb', '=', $campo);
                })
                ->when($ind_dinh_flanelhinha_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_flanelhinha_memb', '=', $campo);
                })
                ->when($ind_dinh_carregador_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_carregador_memb', '=', $campo);
                })
                ->when($ind_dinh_catador_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_catador_memb', '=', $campo);
                })
                ->when($ind_dinh_servs_gerais_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_servs_gerais_memb', '=', $campo);
                })
                ->when($ind_dinh_pede_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_pede_memb', '=', $campo);
                })
                ->when($ind_dinh_vendas_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_vendas_memb', '=', $campo);
                })
                ->when($ind_dinh_outro_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_outro_memb', '=', $campo);
                })
                ->when($ind_dinh_nao_resp_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_nao_resp_memb', '=', $campo);
                })
                ->when($ind_atend_nenhum_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_nenhum_memb', '=', $campo);
                })
                ->when($p_ref_cad, function($query, $campo){
                    return $query->where('pessoa.ref_cad', '=', $campo);
                })
                ->when($p_ref_pbf, function($query, $campo){
                    return $query->where('pessoa.ref_pbf', '=', $campo);
                })
                ->when($idade, function($query, $campo){
                    return $query->whereRaw('year(now()) - year(pessoa.dta_nasc_pessoa) =' . $campo);
                })
                ->when($ano, function($query, $campo){
                    return $query->whereRaw('year(pessoa.dta_nasc_pessoa) =' . $campo);
                })
                ->when($diaAniversario, function($query, $campo){
                    return $query->whereRaw('day(pessoa.dta_nasc_pessoa) =' . $campo);
                })
                ->when($mesAniversario, function($query, $campo){
                    return $query->whereRaw('month(pessoa.dta_nasc_pessoa) =' . $campo);
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('pessoa.cpf' , '=', $campo);
                })
                ->when($tipo_profissao_id, function($query, $campo){
                    return $query->where('pessoa.tipo_profissao_id' , '=', $campo);
                })
                ->when($domicilio_id_1, function($query, $campo){
                    return $query->where('pessoa.domicilio_id_1' , '=', $campo);
                })
                ->when($updated_at, function($query, $campo){
                    return $query->where('atendimento.updated_at' , '>=', $campo)
                    ->where('atendimento.updated_at' , '<=', $campo . ' 23:59:59');
                })
                ->when($tipo_escola_id, function($query, $campo){
                    return $query->where('escola_aluno.tipo_escola_id' , '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('pessoa.nom_pessoa', 'ASC')
            ->orderBy('pessoa.dta_nasc_pessoa', 'ASC')
            ->paginate(51);

        return $dados;

    }

    private function lerCSV($name){

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

                $cabecalho = explode(";", $result[$i -1]);

                $cabecalhoDomicilio = [];

                $cabecalhoPessoa = [];

                foreach($cabecalho as $row){

                    $row = trim($row);

                    if(substr($row,0,2) == "d.")
                        array_push($cabecalhoDomicilio, "d_" . substr($row,2, strlen($row)));
                    else
                        array_push($cabecalhoPessoa, "p_" . substr($row,2, strlen($row)));
                }

                $cabecalho = array_merge($cabecalhoDomicilio, $cabecalhoPessoa);

            }
            else{

                $coluna = explode(";", $result[$i -1]);

                $campo = array_combine($cabecalho, $coluna);

                array_push($campos, $campo);

            }

            //mil registros
//            if($i >= 1000)
//                break;

        endwhile;

        fclose($file);

        return $campos;

    }

    private function lerDePara($name){

        $file = fopen($name, "r");

        $result = [];

        $i = 0;

        $campos = [];

        $cabecalho = [];

        while (!feof($file)):

            if (substr(($result[$i] = fgets($file)), 0, 10) !== ';;;;;;;;') :

                $i++;

            endif;

            if($i == 1){

                $cabecalhoArr = explode(";", $result[$i -1]);

                $cabecalho = [];

                $conteudo = [];

                foreach($cabecalhoArr as $row){

                    $row = trim($row);

                    array_push($cabecalho, $row);

                }

                $cabecalho = array_merge($cabecalho, $conteudo);

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

    public static function rotinaInclusaoMassa($request = null){

        try{

            if(Auth::user()['tipo_perfil_id'] != 1){

                $retorno[] =[
                    'erro' => 0,
                    'mensagem' => 'Erro ao gerar arquivo!'
                ];

                return $retorno;

            }

            $rodarUpdate = isset($request['rupdate']) ? $request['rupdate'] : 0;

            $acentua = ["/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(´)/","/(`)/"];

            $desacentua = ["a","A","e","E","i","I","o","O","u","U","n","N","C","c","",""];

//            $cidade_nome = preg_replace($acentua, $desacentua, Str::upper(trim($cidade['cidade_nome'])));

            $path = url('/') . '/storage/arquivos/';

            $arquivo = 'tudo.csv';

            $arquivoDe = 'depara.csv';

            $arq = $path . $arquivo;

            $array = self::lerCSV($arq);

            $keys = array_keys($array[0]);

            $tRegistros = 0;

            foreach($array as $row){

                $cpfFormatado = null;
                $tel_1 = null;
                $tel_2 = null;

                $domicilio = [];

                $pessoa = [];

                for($k = 0; $k < count($keys); $k++){

                    if(substr($keys[$k],0,2) == "d_"){

                        //TELEFONE
                        if($keys[$k] == "d_num_tel_contato_1_fam" ||
                            $keys[$k] == "d_num_tel_contato_2_fam") {

                            if($row[$keys[$k]] > 0) {

                                $tel = $row[$keys[$k]];

                                if ($tel > 99999999) {

                                    $tel = '(' . ($keys[$k]
                                        == "d_num_tel_contato_1_fam" ? $row['d_num_ddd_contato_1_fam'] : $row['d_num_ddd_contato_2_fam']) . ') '
                                        . substr($tel, 1, 5) . '-'
                                        . substr($tel, 6, 4);
                                }
                                elseif ($tel > 9999999) {

                                        $tel = '(' . ($keys[$k]
                                            == "d_num_tel_contato_1_fam" ? $row['d_num_ddd_contato_1_fam'] : $row['d_num_ddd_contato_2_fam']) . ') 9'
                                            . substr($tel, 1, 4) . '-'
                                            . substr($tel, 5, 4);
                                }

                            }

                            $domicilio += [
                                substr($keys[$k], 2, strlen($keys[$k])) =>
                                    (trim($row[$keys[$k]]) == "" ? null : trim($row[$keys[$k]]))
                            ];

                        }
                        elseif(substr($keys[$k],0,5) == 'd_dat'
                                || substr($keys[$k],0,5) == 'd_dta'
                                || $keys[$k] == 'd_ref_cad'){

                            $dtTemp = null;

                            if(trim($row[$keys[$k]]) != "") {

                                $dt = explode("/", $row[$keys[$k]]);

                                $dtTemp = $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                $domicilio += [
                                    substr($keys[$k], 2, strlen($keys[$k])) =>
                                        (trim($row[$keys[$k]]) == "" ? null : $dtTemp)
                                ];
                            }

                            $domicilio += [
                                substr($keys[$k], 2, strlen($keys[$k])) => $dtTemp
                            ];

                        }
                        else{

                            $domicilio += [
                                substr($keys[$k], 2, strlen($keys[$k])) =>
                                    (trim($row[$keys[$k]]) == "" ? null : trim($row[$keys[$k]]))
                            ];

//                            if(substr($keys[$k], 2, strlen($keys[$k])) == "nom_logradouro_fam"){
//
//                                dd($domicilio);
//
//                            }

                        }

                    }else{

                        if($keys[$k] == "p_num_cpf_pessoa"){

                            //formatando cpf 0 à esquerda
                            if($row[$keys[$k]] != null
                                && $row[$keys[$k]] != 0){

                                $cpf = $row[$keys[$k]];

                                $cpf = str_repeat("0", 11 - strlen($cpf)) . $cpf;

                                $cpfFormatado = substr($cpf,0,3) . '.' . substr($cpf, 3,3) . '.'
                                    . substr($cpf,6,3) . '-' . substr($cpf,9,2);

                                $row[$keys[$k]] = $cpf;

                            }

                            $pessoa += [
                                substr($keys[$k], 2, strlen($keys[$k])) =>
                                    $cpf
                            ];

                        }
                        elseif(substr($keys[$k],0,5) == 'p_dat'
                            || substr($keys[$k],0,5) == 'p_dta'
                            || $keys[$k] == 'p_ref_cad'){

                            $dtTemp = null;

                            if(trim($row[$keys[$k]]) != "") {

                                $dt = explode("/", $row[$keys[$k]]);

                                $dtTemp = $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                $domicilio += [
                                    substr($keys[$k], 2, strlen($keys[$k])) =>
                                        (trim($row[$keys[$k]]) == "" ? null : $dtTemp)
                                ];
                            }

                            $pessoa += [
                                substr($keys[$k], 2, strlen($keys[$k])) => $dtTemp
                            ];

                        }
                        else{

                            $pessoa += [
                                substr($keys[$k], 2, strlen($keys[$k])) =>
                                    (trim($row[$keys[$k]]) == "" ? null : trim($row[$keys[$k]]))
                            ];

                        }

                    }
                }

                DB::beginTransaction();

                //ACRESCENTANDO rotinaAtualizacao
                $domicilio +=[

                    'rotinaAtualizacao' => 1,

                ];

                $retorno = Domicilio::store($domicilio);

                if($retorno[0]['erro'] != 1){

                    DB::rollBack();

                    return $retorno;

                }

                $domicilio_id = $retorno[0]['id'];

                unset($retorno);

                $pessoa += [
                    "domicilio_id" => $domicilio_id,
                    "cpf" => $cpfFormatado,
                    "rotinaAtualizacao" => 1,
                ];

                $retorno = self::store($pessoa);

                if($retorno[0]['erro'] == 0){

                    DB::rollBack();

                    return $retorno;

                }

                unset($retorno);

                DB::commit();

                $tRegistros++;

//                if($tRegistros >= 10){
//                    break;
//                }

            }

            if($rodarUpdate == 1) {

                $retorno = self::rotinaAtualizacaoMassa();

                if ($retorno[0]['erro'] != 1)
                    return $retorno;

                unset($retorno);

            }

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Fim da rotina!',
                'tRegistros' => $tRegistros,
                'Total de registros: ' => $tRegistros
            ];

        }catch (Exception $e){

            $retorno[] = [
                'erro' => 0,
                'mensagem' => 'Erro ! ' . $e->getMessage(),
                'tRegistros' => $tRegistros
            ];
        }

        return $retorno;

    }

    public static function rotinaAtualizacaoMassa(){

        try {

            if(Auth::user()['tipo_perfil_id'] != 1){

                $retorno[] =[
                    'erro' => 0,
                    'mensagem' => 'Erro ao gerar arquivo!'
                ];

                return $retorno;

            }

            //ATUALIZAÇÕES
            $iDePara = 0;
            //ATUALIZANDO DE ACORDO COM O ARQUIVO DEPARA
            $path = url('/') . '/storage/arquivos/';

            $arquivoDe = 'depara.csv';

            $arqDePara = $path . $arquivoDe;

            $arrayDePara = self::lerDePara($arqDePara);

            foreach ($arrayDePara as $rowDe) {

                $tabela = $rowDe['tabela'];

                $sql = "UPDATE " . $tabela . " SET";

                $sql .= " " . $rowDe["nom_c_para"] . " = '" . $rowDe['cont_c_para'] . "' ";

                $sql .= " WHERE " . $rowDe["nome_c_de"] . " ='" . $rowDe["cont_c_de"] . "' ";

                if ($rowDe["nome_c_com"] != null && $rowDe["nome_c_com"] != "") {

                    $sql .= " AND " . $rowDe["nome_c_com"] . " ='" . $rowDe["cont_c_com"] . "'";

                }

                if ($rowDe["nome_c_com_1"] != null && $rowDe["nome_c_com_1"] != "") {

                    $sql .= " AND " . $rowDe["nome_c_com_1"] . " ='" . $rowDe["cont_c_com_1"] . "'";

                }

                $sql = str_replace("\r\n", "", $sql) . ";";

//                dd($sql);
//
                DB::statement($sql);

            }

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Atualização de arquivo concluída!'
            ];
        }
        catch(Exception $e){

            $retorno[] = [
                'erro' => 0,
                'mensagem' => 'Erro ao atualizar! ' . $e->getMessage()
            ];

        }

        return $retorno;

    }

    public static function listarP1($request = null){

        $dados = self::with([
            'domicilio',
            'domicilio.cidade',
            'domicilio.pessoa',
            'domicilio.tipoLocal',
            'atendimento',
            'atendimento.tipoMenu',
//            'atendimento.tipoLocal',
            'pessoaSituacao',
            'tipoProfissao',
            'aluno',
            'domicilio1',
            'estabelecimento',
        ])->select(DB::raw('distinct pessoa.*'))
            ->leftJoin('domicilio', 'pessoa.domicilio_id', '=', 'domicilio.domicilio_id')
            ->leftJoin('atendimento', 'pessoa.pessoa_id', '=', 'atendimento.pessoa_id');

        if($request != null) {

//            dd($request['pessoa']);

            $domicilio_id = isset($request['pessoa']['domicilio']['domicilio_id']) ? $request['pessoa']['domicilio']['domicilio_id'] : null;
            $cd_ibge = isset($request['pessoa']['domicilio']['cd_ibge']) ? $request['pessoa']['domicilio']['cd_ibge'] : null;
            $cod_familiar_fam = isset($request['pessoa']['domicilio']['cod_familiar_fam']) ? $request['pessoa']['domicilio']['cod_familiar_fam'] : null;
            $dat_cadastramento_fam = isset($request['pessoa']['domicilio']['dat_cadastramento_fam']) ? $request['pessoa']['domicilio']['dat_cadastramento_fam'] : null;
            $dat_atual_fam = isset($request['pessoa']['domicilio']['dat_atual_fam']) ? $request['pessoa']['domicilio']['dat_atual_fam'] : null;
            $cod_est_cadastral_fam = isset($request['pessoa']['domicilio']['cod_est_cadastral_fam']) ? $request['pessoa']['domicilio']['cod_est_cadastral_fam'] : null;
            $cod_forma_coleta_fam = isset($request['pessoa']['domicilio']['cod_forma_coleta_fam']) ? $request['pessoa']['domicilio']['cod_forma_coleta_fam'] : null;
            $dta_entrevista_fam = isset($request['pessoa']['domicilio']['dta_entrevista_fam']) ? $request['pessoa']['domicilio']['dta_entrevista_fam'] : null;
            $nom_localidade_fam = isset($request['pessoa']['domicilio']['nom_localidade_fam']) ? $request['pessoa']['domicilio']['nom_localidade_fam'] : null;
            $nom_tip_logradouro_fam = isset($request['pessoa']['domicilio']['nom_tip_logradouro_fam']) ? $request['pessoa']['domicilio']['nom_tip_logradouro_fam'] : null;
            $nom_titulo_logradouro_fam = isset($request['pessoa']['domicilio']['nom_titulo_logradouro_fam']) ? $request['pessoa']['domicilio']['nom_titulo_logradouro_fam'] : null;
            $nom_logradouro_fam = isset($request['pessoa']['domicilio']['nom_logradouro_fam']) ? $request['pessoa']['domicilio']['nom_logradouro_fam'] : null;
            $num_logradouro_fam = isset($request['pessoa']['domicilio']['num_logradouro_fam']) ? $request['pessoa']['domicilio']['num_logradouro_fam'] : null;
            $des_complemento_fam = isset($request['pessoa']['domicilio']['des_complemento_fam']) ? $request['pessoa']['domicilio']['des_complemento_fam'] : null;
            $des_complemento_adic_fam = isset($request['pessoa']['domicilio']['des_complemento_adic_fam']) ? $request['pessoa']['domicilio']['des_complemento_adic_fam'] : null;
            $num_cep_logradouro_fam = isset($request['pessoa']['domicilio']['num_cep_logradouro_fam']) ? $request['pessoa']['domicilio']['num_cep_logradouro_fam'] : null;
            $cod_unidade_territorial_fam = isset($request['pessoa']['domicilio']['cod_unidade_territorial_fam']) ? $request['pessoa']['domicilio']['cod_unidade_territorial_fam'] : null;
            $nom_unidade_territorial_fam = isset($request['pessoa']['domicilio']['nom_unidade_territorial_fam']) ? $request['pessoa']['domicilio']['nom_unidade_territorial_fam'] : null;
            $txt_referencia_local_fam = isset($request['pessoa']['domicilio']['txt_referencia_local_fam']) ? $request['pessoa']['domicilio']['txt_referencia_local_fam'] : null;
            $nom_entrevistador_fam = isset($request['pessoa']['domicilio']['nom_entrevistador_fam']) ? $request['pessoa']['domicilio']['nom_entrevistador_fam'] : null;
            $num_cpf_entrevistador_fam = isset($request['pessoa']['domicilio']['num_cpf_entrevistador_fam']) ? $request['pessoa']['domicilio']['num_cpf_entrevistador_fam'] : null;
            $vlr_renda_media_fam = isset($request['pessoa']['domicilio']['vlr_renda_media_fam']) ? $request['pessoa']['domicilio']['vlr_renda_media_fam'] : null;
            $fx_rfpc = isset($request['pessoa']['domicilio']['fx_rfpc']) ? $request['pessoa']['domicilio']['fx_rfpc'] : null;
            $vlr_renda_total_fam = isset($request['pessoa']['domicilio']['vlr_renda_total_fam']) ? $request['pessoa']['domicilio']['vlr_renda_total_fam'] : null;
            $marc_pbf = isset($request['pessoa']['domicilio']['marc_pbf']) ? $request['pessoa']['domicilio']['marc_pbf'] : null;
            $qtde_meses_desat_cat = isset($request['pessoa']['domicilio']['qtde_meses_desat_cat']) ? $request['pessoa']['domicilio']['qtde_meses_desat_cat'] : null;
            $cod_local_domic_fam = isset($request['pessoa']['domicilio']['cod_local_domic_fam']) ? $request['pessoa']['domicilio']['cod_local_domic_fam'] : null;
            $cod_especie_domic_fam = isset($request['pessoa']['domicilio']['cod_especie_domic_fam']) ? $request['pessoa']['domicilio']['cod_especie_domic_fam'] : null;
            $qtd_comodos_domic_fam = isset($request['pessoa']['domicilio']['qtd_comodos_domic_fam']) ? $request['pessoa']['domicilio']['qtd_comodos_domic_fam'] : null;
            $qtd_comodos_dormitorio_fam = isset($request['pessoa']['domicilio']['qtd_comodos_dormitorio_fam']) ? $request['pessoa']['domicilio']['qtd_comodos_dormitorio_fam'] : null;
            $cod_material_piso_fam = isset($request['pessoa']['domicilio']['cod_material_piso_fam']) ? $request['pessoa']['domicilio']['cod_material_piso_fam'] : null;
            $cod_material_domic_fam = isset($request['pessoa']['domicilio']['cod_material_domic_fam']) ? $request['pessoa']['domicilio']['cod_material_domic_fam'] : null;
            $cod_agua_canalizada_fam = isset($request['pessoa']['domicilio']['cod_agua_canalizada_fam']) ? $request['pessoa']['domicilio']['cod_agua_canalizada_fam'] : null;
            $cod_abaste_agua_domic_fam = isset($request['pessoa']['domicilio']['cod_abaste_agua_domic_fam']) ? $request['pessoa']['domicilio']['cod_abaste_agua_domic_fam'] : null;
            $cod_banheiro_domic_fam = isset($request['pessoa']['domicilio']['cod_banheiro_domic_fam']) ? $request['pessoa']['domicilio']['cod_banheiro_domic_fam'] : null;
            $cod_escoa_sanitario_domic_fam = isset($request['pessoa']['domicilio']['cod_escoa_sanitario_domic_fam']) ? $request['pessoa']['domicilio']['cod_escoa_sanitario_domic_fam'] : null;
            $cod_destino_lixo_domic_fam = isset($request['pessoa']['domicilio']['cod_destino_lixo_domic_fam']) ? $request['pessoa']['domicilio']['cod_destino_lixo_domic_fam'] : null;
            $cod_iluminacao_domic_fam = isset($request['pessoa']['domicilio']['cod_iluminacao_domic_fam']) ? $request['pessoa']['domicilio']['cod_iluminacao_domic_fam'] : null;
            $cod_calcamento_domic_fam = isset($request['pessoa']['domicilio']['cod_calcamento_domic_fam']) ? $request['pessoa']['domicilio']['cod_calcamento_domic_fam'] : null;
            $cod_familia_indigena_fam = isset($request['pessoa']['domicilio']['cod_familia_indigena_fam']) ? $request['pessoa']['domicilio']['cod_familia_indigena_fam'] : null;
            $cod_povo_indigena_fam = isset($request['pessoa']['domicilio']['cod_povo_indigena_fam']) ? $request['pessoa']['domicilio']['cod_povo_indigena_fam'] : null;
            $nom_povo_indigena_fam = isset($request['pessoa']['domicilio']['nom_povo_indigena_fam']) ? $request['pessoa']['domicilio']['nom_povo_indigena_fam'] : null;
            $cod_indigena_reside_fam = isset($request['pessoa']['domicilio']['cod_indigena_reside_fam']) ? $request['pessoa']['domicilio']['cod_indigena_reside_fam'] : null;
            $cod_reserva_indigena_fam = isset($request['pessoa']['domicilio']['cod_reserva_indigena_fam']) ? $request['pessoa']['domicilio']['cod_reserva_indigena_fam'] : null;
            $nom_reserva_indigena_fam = isset($request['pessoa']['domicilio']['nom_reserva_indigena_fam']) ? $request['pessoa']['domicilio']['nom_reserva_indigena_fam'] : null;
            $ind_familia_quilombola_fam = isset($request['pessoa']['domicilio']['ind_familia_quilombola_fam']) ? $request['pessoa']['domicilio']['ind_familia_quilombola_fam'] : null;
            $cod_comunidade_quilombola_fam = isset($request['pessoa']['domicilio']['cod_comunidade_quilombola_fam']) ? $request['pessoa']['domicilio']['cod_comunidade_quilombola_fam'] : null;
            $nom_comunidade_quilombola_fam = isset($request['pessoa']['domicilio']['nom_comunidade_quilombola_fam']) ? $request['pessoa']['domicilio']['nom_comunidade_quilombola_fam'] : null;
            $qtd_pessoas_domic_fam = isset($request['pessoa']['domicilio']['qtd_pessoas_domic_fam']) ? $request['pessoa']['domicilio']['qtd_pessoas_domic_fam'] : null;
            $qtd_familias_domic_fam = isset($request['pessoa']['domicilio']['qtd_familias_domic_fam']) ? $request['pessoa']['domicilio']['qtd_familias_domic_fam'] : null;
            $qtd_pessoa_inter_0_17_anos_fam = isset($request['pessoa']['domicilio']['qtd_pessoa_inter_0_17_anos_fam']) ? $request['pessoa']['domicilio']['qtd_pessoa_inter_0_17_anos_fam'] : null;
            $qtd_pessoa_inter_18_64_anos_fam = isset($request['pessoa']['domicilio']['qtd_pessoa_inter_18_64_anos_fam']) ? $request['pessoa']['domicilio']['qtd_pessoa_inter_18_64_anos_fam'] : null;
            $qtd_pessoa_inter_65_anos_fam = isset($request['pessoa']['domicilio']['qtd_pessoa_inter_65_anos_fam']) ? $request['pessoa']['domicilio']['qtd_pessoa_inter_65_anos_fam'] : null;
            $val_desp_energia_fam = isset($request['pessoa']['domicilio']['val_desp_energia_fam']) ? $request['pessoa']['domicilio']['val_desp_energia_fam'] : null;
            $val_desp_agua_esgoto_fam = isset($request['pessoa']['domicilio']['val_desp_agua_esgoto_fam']) ? $request['pessoa']['domicilio']['val_desp_agua_esgoto_fam'] : null;
            $val_desp_gas_fam = isset($request['pessoa']['domicilio']['val_desp_gas_fam']) ? $request['pessoa']['domicilio']['val_desp_gas_fam'] : null;
            $val_desp_alimentacao_fam = isset($request['pessoa']['domicilio']['val_desp_alimentacao_fam']) ? $request['pessoa']['domicilio']['val_desp_alimentacao_fam'] : null;
            $val_desp_transpor_fam = isset($request['pessoa']['domicilio']['val_desp_transpor_fam']) ? $request['pessoa']['domicilio']['val_desp_transpor_fam'] : null;
            $val_desp_aluguel_fam = isset($request['pessoa']['domicilio']['val_desp_aluguel_fam']) ? $request['pessoa']['domicilio']['val_desp_aluguel_fam'] : null;
            $val_desp_medicamentos_fam = isset($request['pessoa']['domicilio']['val_desp_medicamentos_fam']) ? $request['pessoa']['domicilio']['val_desp_medicamentos_fam'] : null;
            $nom_estab_assist_saude_fam = isset($request['pessoa']['domicilio']['nom_estab_assist_saude_fam']) ? $request['pessoa']['domicilio']['nom_estab_assist_saude_fam'] : null;
            $cod_eas_fam = isset($request['pessoa']['domicilio']['cod_eas_fam']) ? $request['pessoa']['domicilio']['cod_eas_fam'] : null;
            $nom_centro_assist_fam = isset($request['pessoa']['domicilio']['nom_centro_assist_fam']) ? $request['pessoa']['domicilio']['nom_centro_assist_fam'] : null;
            $cod_centro_assist_fam = isset($request['pessoa']['domicilio']['cod_centro_assist_fam']) ? $request['pessoa']['domicilio']['cod_centro_assist_fam'] : null;
            $num_ddd_contato_1_fam = isset($request['pessoa']['domicilio']['num_ddd_contato_1_fam']) ? $request['pessoa']['domicilio']['num_ddd_contato_1_fam'] : null;
            $num_tel_contato_1_fam = isset($request['pessoa']['domicilio']['num_tel_contato_1_fam']) ? $request['pessoa']['domicilio']['num_tel_contato_1_fam'] : null;
            $ic_tipo_contato_1_fam = isset($request['pessoa']['domicilio']['ic_tipo_contato_1_fam']) ? $request['pessoa']['domicilio']['ic_tipo_contato_1_fam'] : null;
            $ic_envo_sms_contato_1_fam = isset($request['pessoa']['domicilio']['ic_envo_sms_contato_1_fam']) ? $request['pessoa']['domicilio']['ic_envo_sms_contato_1_fam'] : null;
            $num_tel_contato_2_fam = isset($request['pessoa']['domicilio']['num_tel_contato_2_fam']) ? $request['pessoa']['domicilio']['num_tel_contato_2_fam'] : null;
            $num_ddd_contato_2_fam = isset($request['pessoa']['domicilio']['num_ddd_contato_2_fam']) ? $request['pessoa']['domicilio']['num_ddd_contato_2_fam'] : null;
            $ic_tipo_contato_2_fam = isset($request['pessoa']['domicilio']['ic_tipo_contato_2_fam']) ? $request['pessoa']['domicilio']['ic_tipo_contato_2_fam'] : null;
            $ic_envo_sms_contato_2_fam = isset($request['pessoa']['domicilio']['ic_envo_sms_contato_2_fam']) ? $request['pessoa']['domicilio']['ic_envo_sms_contato_2_fam'] : null;
            $cod_cta_energ_unid_consum_fam = isset($request['pessoa']['domicilio']['cod_cta_energ_unid_consum_fam']) ? $request['pessoa']['domicilio']['cod_cta_energ_unid_consum_fam'] : null;
            $ind_parc_mds_fam = isset($request['pessoa']['domicilio']['ind_parc_mds_fam']) ? $request['pessoa']['domicilio']['ind_parc_mds_fam'] : null;
            $ref_cad = isset($request['pessoa']['domicilio']['ref_cad']) ? $request['pessoa']['domicilio']['ref_cad'] : null;
            $ref_pbf = isset($request['pessoa']['domicilio']['ref_pbf']) ? $request['pessoa']['domicilio']['ref_pbf'] : null;
            $tel_1 = isset($request['pessoa']['domicilio']['tel_1']) ? $request['pessoa']['domicilio']['tel_1'] : null;
            $tel_2 = isset($request['pessoa']['domicilio']['tel_2']) ? $request['pessoa']['domicilio']['tel_2'] : null;

            $pessoa_id = isset($request['pessoa']['domicilio']['pessoa'][0]['pessoa_id']) ? $request['pessoa']['domicilio']['pessoa'][0]['pessoa_id'] : null;
            $p_domicilio_id = isset($request['pessoa']['domicilio']['pessoa'][0]['domicilio_id']) ? $request['pessoa']['domicilio']['pessoa'][0]['domicilio_id'] : null;
            $p_cod_familiar_fam = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_familiar_fam']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_familiar_fam'] : null;
            $cod_est_cadastral_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_est_cadastral_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_est_cadastral_memb'] : null;
            $ind_trabalho_infantil_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_trabalho_infantil_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_trabalho_infantil_pessoa'] : null;
            $nom_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_pessoa'] : null;
            $num_nis_pessoa_atual = isset($request['pessoa']['domicilio']['pessoa'][0]['num_nis_pessoa_atual']) ? $request['pessoa']['domicilio']['pessoa'][0]['num_nis_pessoa_atual'] : null;
            $nom_apelido_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_apelido_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_apelido_pessoa'] : null;
            $cod_sexo_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_sexo_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_sexo_pessoa'] : null;
            $dta_nasc_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['dta_nasc_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['dta_nasc_pessoa'] : null;
            $cod_parentesco_rf_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_parentesco_rf_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_parentesco_rf_pessoa'] : null;
            $cod_raca_cor_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_raca_cor_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_raca_cor_pessoa'] : null;
            $nom_completo_mae_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_completo_mae_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_completo_mae_pessoa'] : null;
            $nom_completo_pai_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_completo_pai_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_completo_pai_pessoa'] : null;
            $cod_local_nascimento_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_local_nascimento_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_local_nascimento_pessoa'] : null;
            $sig_uf_munic_nasc_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['sig_uf_munic_nasc_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['sig_uf_munic_nasc_pessoa'] : null;
            $nom_ibge_munic_nasc_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_ibge_munic_nasc_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_ibge_munic_nasc_pessoa'] : null;
            $cod_ibge_munic_nasc_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_ibge_munic_nasc_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_ibge_munic_nasc_pessoa'] : null;
            $nom_pais_origem_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_pais_origem_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_pais_origem_pessoa'] : null;
            $cod_pais_origem_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_pais_origem_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_pais_origem_pessoa'] : null;
            $cod_certidao_registrada_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_certidao_registrada_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_certidao_registrada_pessoa'] : null;
            $fx_idade = isset($request['pessoa']['domicilio']['pessoa'][0]['fx_idade']) ? $request['pessoa']['domicilio']['pessoa'][0]['fx_idade'] : null;
            $p_marc_pbf = isset($request['pessoa']['domicilio']['pessoa'][0]['marc_pbf']) ? $request['pessoa']['domicilio']['pessoa'][0]['marc_pbf'] : null;
            $cod_certidao_civil_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_certidao_civil_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_certidao_civil_pessoa'] : null;
            $cod_livro_termo_certid_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_livro_termo_certid_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_livro_termo_certid_pessoa'] : null;
            $cod_folha_termo_certid_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_folha_termo_certid_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_folha_termo_certid_pessoa'] : null;
            $cod_termo_matricula_certid_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_termo_matricula_certid_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_termo_matricula_certid_pessoa'] : null;
            $nom_munic_certid_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_munic_certid_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_munic_certid_pessoa'] : null;
            $cod_ibge_munic_certid_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_ibge_munic_certid_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_ibge_munic_certid_pessoa'] : null;
            $cod_cartorio_certid_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_cartorio_certid_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_cartorio_certid_pessoa'] : null;
            $num_cpf_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['num_cpf_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['num_cpf_pessoa'] : null;
            $num_identidade_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['num_identidade_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['num_identidade_pessoa'] : null;
            $cod_complemento_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_complemento_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_complemento_pessoa'] : null;
            $dta_emissao_ident_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['dta_emissao_ident_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['dta_emissao_ident_pessoa'] : null;
            $sig_uf_ident_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['sig_uf_ident_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['sig_uf_ident_pessoa'] : null;
            $sig_orgao_emissor_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['sig_orgao_emissor_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['sig_orgao_emissor_pessoa'] : null;
            $num_cart_trab_prev_soc_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['num_cart_trab_prev_soc_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['num_cart_trab_prev_soc_pessoa'] : null;
            $num_serie_trab_prev_soc_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['num_serie_trab_prev_soc_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['num_serie_trab_prev_soc_pessoa'] : null;
            $dta_emissao_cart_trab_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['dta_emissao_cart_trab_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['dta_emissao_cart_trab_pessoa'] : null;
            $sig_uf_cart_trab_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['sig_uf_cart_trab_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['sig_uf_cart_trab_pessoa'] : null;
            $num_titulo_eleitor_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['num_titulo_eleitor_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['num_titulo_eleitor_pessoa'] : null;
            $num_zona_tit_eleitor_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['num_zona_tit_eleitor_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['num_zona_tit_eleitor_pessoa'] : null;
            $num_secao_tit_eleitor_pessoa = isset($request['pessoa']['domicilio']['pessoa'][0]['num_secao_tit_eleitor_pessoa']) ? $request['pessoa']['domicilio']['pessoa'][0]['num_secao_tit_eleitor_pessoa'] : null;
            $cod_deficiencia_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_deficiencia_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_deficiencia_memb'] : null;
            $ind_def_cegueira_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_def_cegueira_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_def_cegueira_memb'] : null;
            $ind_def_baixa_visao_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_def_baixa_visao_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_def_baixa_visao_memb'] : null;
            $ind_def_surdez_profunda_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_def_surdez_profunda_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_def_surdez_profunda_memb'] : null;
            $ind_def_surdez_leve_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_def_surdez_leve_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_def_surdez_leve_memb'] : null;
            $ind_def_fisica_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_def_fisica_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_def_fisica_memb'] : null;
            $ind_def_mental_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_def_mental_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_def_mental_memb'] : null;
            $ind_def_sindrome_down_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_def_sindrome_down_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_def_sindrome_down_memb'] : null;
            $ind_def_transtorno_mental_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_def_transtorno_mental_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_def_transtorno_mental_memb'] : null;
            $ind_ajuda_nao_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_nao_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_nao_memb'] : null;
            $ind_ajuda_familia_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_familia_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_familia_memb'] : null;
            $ind_ajuda_especializado_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_especializado_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_especializado_memb'] : null;
            $ind_ajuda_vizinho_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_vizinho_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_vizinho_memb'] : null;
            $ind_ajuda_instituicao_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_instituicao_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_instituicao_memb'] : null;
            $ind_ajuda_outra_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_outra_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ajuda_outra_memb'] : null;
            $cod_sabe_ler_escrever_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_sabe_ler_escrever_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_sabe_ler_escrever_memb'] : null;
            $ind_frequenta_escola_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_frequenta_escola_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_frequenta_escola_memb'] : null;
            $nom_escola_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_escola_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_escola_memb'] : null;
            $cod_escola_local_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_escola_local_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_escola_local_memb'] : null;
            $sig_uf_escola_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['sig_uf_escola_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['sig_uf_escola_memb'] : null;
            $nom_munic_escola_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['nom_munic_escola_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['nom_munic_escola_memb'] : null;
            $cod_ibge_munic_escola_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_ibge_munic_escola_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_ibge_munic_escola_memb'] : null;
            $cod_censo_inep_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_censo_inep_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_censo_inep_memb'] : null;
            $cod_curso_frequenta_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_curso_frequenta_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_curso_frequenta_memb'] : null;
            $cod_ano_serie_frequenta_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_ano_serie_frequenta_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_ano_serie_frequenta_memb'] : null;
            $cod_curso_frequentou_pessoa_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_curso_frequentou_pessoa_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_curso_frequentou_pessoa_memb'] : null;
            $cod_ano_serie_frequentou_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_ano_serie_frequentou_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_ano_serie_frequentou_memb'] : null;
            $cod_concluiu_frequentou_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_concluiu_frequentou_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_concluiu_frequentou_memb'] : null;
            $grau_instrucao = isset($request['pessoa']['domicilio']['pessoa'][0]['grau_instrucao']) ? $request['pessoa']['domicilio']['pessoa'][0]['grau_instrucao'] : null;
            $cod_trabalhou_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_trabalhou_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_trabalhou_memb'] : null;
            $cod_afastado_trab_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_afastado_trab_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_afastado_trab_memb'] : null;
            $cod_agricultura_trab_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_agricultura_trab_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_agricultura_trab_memb'] : null;
            $cod_principal_trab_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_principal_trab_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_principal_trab_memb'] : null;
            $val_remuner_emprego_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['val_remuner_emprego_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['val_remuner_emprego_memb'] : null;
            $cod_trabalho_12_meses_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_trabalho_12_meses_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_trabalho_12_meses_memb'] : null;
            $qtd_meses_12_meses_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['qtd_meses_12_meses_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['qtd_meses_12_meses_memb'] : null;
            $val_renda_bruta_12_meses_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['val_renda_bruta_12_meses_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['val_renda_bruta_12_meses_memb'] : null;
            $val_renda_doacao_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['val_renda_doacao_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['val_renda_doacao_memb'] : null;
            $val_renda_aposent_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['val_renda_aposent_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['val_renda_aposent_memb'] : null;
            $val_renda_seguro_desemp_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['val_renda_seguro_desemp_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['val_renda_seguro_desemp_memb'] : null;
            $val_renda_pensao_alimen_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['val_renda_pensao_alimen_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['val_renda_pensao_alimen_memb'] : null;
            $val_outras_rendas_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['val_outras_rendas_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['val_outras_rendas_memb'] : null;
            $marc_sit_rua = isset($request['pessoa']['domicilio']['pessoa'][0]['marc_sit_rua']) ? $request['pessoa']['domicilio']['pessoa'][0]['marc_sit_rua'] : null;
            $ind_dormir_rua_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dormir_rua_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dormir_rua_memb'] : null;
            $qtd_dormir_freq_rua_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['qtd_dormir_freq_rua_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['qtd_dormir_freq_rua_memb'] : null;
            $ind_dormir_albergue_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dormir_albergue_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dormir_albergue_memb'] : null;
            $qtd_dormir_freq_albergue_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['qtd_dormir_freq_albergue_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['qtd_dormir_freq_albergue_memb'] : null;
            $ind_dormir_dom_part_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dormir_dom_part_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dormir_dom_part_memb'] : null;
            $qtd_dormir_freq_dom_part_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['qtd_dormir_freq_dom_part_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['qtd_dormir_freq_dom_part_memb'] : null;
            $ind_outro_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_outro_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_outro_memb'] : null;
            $qtd_freq_outro_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['qtd_freq_outro_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['qtd_freq_outro_memb'] : null;
            $cod_tempo_rua_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_tempo_rua_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_tempo_rua_memb'] : null;
            $ind_motivo_perda_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_perda_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_perda_memb'] : null;
            $ind_motivo_ameaca_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_ameaca_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_ameaca_memb'] : null;
            $ind_motivo_probs_fam_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_probs_fam_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_probs_fam_memb'] : null;
            $ind_motivo_alcool_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_alcool_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_alcool_memb'] : null;
            $ind_motivo_desemprego_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_desemprego_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_desemprego_memb'] : null;
            $ind_motivo_trabalho_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_trabalho_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_trabalho_memb'] : null;
            $ind_motivo_saude_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_saude_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_saude_memb'] : null;
            $ind_motivo_pref_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_pref_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_pref_memb'] : null;
            $ind_motivo_outro_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_outro_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_outro_memb'] : null;
            $ind_motivo_nao_sabe_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_nao_sabe_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_nao_sabe_memb'] : null;
            $ind_motivo_nao_resp_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_nao_resp_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_motivo_nao_resp_memb'] : null;
            $cod_tempo_cidade_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_tempo_cidade_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_tempo_cidade_memb'] : null;
            $cod_vive_fam_rua_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_vive_fam_rua_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_vive_fam_rua_memb'] : null;
            $cod_contato_parente_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_contato_parente_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_contato_parente_memb'] : null;
            $ind_ativ_com_escola_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_escola_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_escola_memb'] : null;
            $ind_ativ_com_coop_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_coop_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_coop_memb'] : null;
            $ind_ativ_com_mov_soc_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_mov_soc_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_mov_soc_memb'] : null;
            $ind_ativ_com_nao_sabe_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_nao_sabe_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_nao_sabe_memb'] : null;
            $ind_ativ_com_nao_resp_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_nao_resp_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_ativ_com_nao_resp_memb'] : null;
            $ind_atend_cras_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_atend_cras_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_atend_cras_memb'] : null;
            $ind_atend_creas_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_atend_creas_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_atend_creas_memb'] : null;
            $ind_atend_centro_ref_rua_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_atend_centro_ref_rua_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_atend_centro_ref_rua_memb'] : null;
            $ind_atend_inst_gov_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_atend_inst_gov_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_atend_inst_gov_memb'] : null;
            $ind_atend_inst_nao_gov_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_atend_inst_nao_gov_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_atend_inst_nao_gov_memb'] : null;
            $ind_atend_hospital_geral_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_atend_hospital_geral_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_atend_hospital_geral_memb'] : null;
            $cod_cart_assinada_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['cod_cart_assinada_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['cod_cart_assinada_memb'] : null;
            $ind_dinh_const_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_const_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_const_memb'] : null;
            $ind_dinh_flanelhinha_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_flanelhinha_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_flanelhinha_memb'] : null;
            $ind_dinh_carregador_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_carregador_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_carregador_memb'] : null;
            $ind_dinh_catador_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_catador_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_catador_memb'] : null;
            $ind_dinh_servs_gerais_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_servs_gerais_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_servs_gerais_memb'] : null;
            $ind_dinh_pede_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_pede_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_pede_memb'] : null;
            $ind_dinh_vendas_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_vendas_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_vendas_memb'] : null;
            $ind_dinh_outro_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_outro_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_outro_memb'] : null;
            $ind_dinh_nao_resp_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_nao_resp_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_dinh_nao_resp_memb'] : null;
            $ind_atend_nenhum_memb = isset($request['pessoa']['domicilio']['pessoa'][0]['ind_atend_nenhum_memb']) ? $request['pessoa']['domicilio']['pessoa'][0]['ind_atend_nenhum_memb'] : null;
            $cpf = isset($request['pessoa']['domicilio']['pessoa'][0]['cpf']) ? $request['pessoa']['domicilio']['pessoa'][0]['cpf'] : null;
            $p_ref_cad = isset($request['pessoa']['domicilio']['pessoa'][0]['ref_cad']) ? $request['pessoa']['domicilio']['pessoa'][0]['ref_cad'] : null;
            $p_ref_pbf = isset($request['pessoa']['domicilio']['pessoa'][0]['ref_pbf']) ? $request['pessoa']['domicilio']['pessoa'][0]['ref_pbf'] : null;
            $domicilio_id_1 = isset($request['pessoa']['domicilio']['pessoa'][0]['domicilio_id_1']) ? $request['pessoa']['domicilio']['pessoa'][0]['domicilio_id_1'] : null;
//            $tipo_profissao_id = isset($request['domicilio']['pessoa'][0]['tipo_profissao_id']) ? $request['domicilio']['pessoa'][0]['tipo_profissao_id'] : null;

            $idade = isset($request['idade']) ? $request['idade'] : null;
            $ano = isset($request['ano']) ? $request['ano'] : null;

            $diaAniversario = isset($request['diaAniversario']) ? $request['diaAniversario'] : null;
            $mesAniversario = isset($request['mesAniversario']) ? $request['mesAniversario'] : null;

            $tipo_bairro_id = isset($request['tipo_bairro_id']) ? $request['tipo_bairro_id'] : null;
            $tipo_povoado_id = isset($request['tipo_povoado_id']) ? $request['tipo_povoado_id'] : null;
            $tipo_profissao_id = isset($request['tipo_profissao_id']) ? $request['tipo_profissao_id'] : null;
            $tipo_menu_id = isset($request['tipo_menu_id']) ? $request['tipo_menu_id'] : null;

            $profissao_nome = null;
            $orgao_nome = null;

            $cpf = isset($request['pessoa']['cpf']) ? $request['pessoa']['cpf'] : null;

//            if($tipo_bairro_id != null){
//                $retorno = Tipo::listar([
//                    'tipo_id' => $tipo_bairro_id
//                ]);
//
//                if($retorno->count() != 0){
//                    $nom_logradouro_fam = $retorno[0]['tipo_nome'];
//                }
//
//                unset($retorno);
//            }

//            if($tipo_povoado_id != null){
//                $retorno = Tipo::listar([
//                    'tipo_id' => $tipo_povoado_id
//                ]);
//
//                if($retorno->count() != 0){
//                    $nom_logradouro_fam = $retorno[0]['tipo_nome'];
//                }
//
//                unset($retorno);
//            }

//            if($tipo_profissao_id != null){
//                $retorno = Tipo::listar([
//                    'tipo_id' => $tipo_profissao_id
//                ]);
//
//                if($retorno->count() != 0){
//                    $profissao_nome = $retorno[0]['tipo_nome'];
//                }
//
//                unset($retorno);
//
//            }

            $dados = $dados
                ->when($tipo_menu_id, function($query, $campo){
                    return $query->where('atendimento.tipo_menu_id', '=', $campo);
                })
                ->when($domicilio_id, function($query, $campo){
                    return $query->where('domicilio.domicilio_id', '=', $campo);
                })
//                ->when($cd_ibge, function($query, $campo){
//                    return $query->where('domicilio.cd_ibge', '=', $campo);
//                })
                ->when($cod_familiar_fam, function($query, $campo){
                    return $query->where('domicilio.cod_familiar_fam', '=', $campo);
                })
                ->when($dat_cadastramento_fam, function($query, $campo){
                    return $query->where('domicilio.dat_cadastramento_fam', '=', $campo);
                })
                ->when($dat_atual_fam, function($query, $campo){
                    return $query->where('domicilio.dat_atual_fam', '=', $campo);
                })
                ->when($cod_est_cadastral_fam, function($query, $campo){
                    return $query->where('domicilio.cod_est_cadastral_fam', '=', $campo);
                })
                ->when($cod_forma_coleta_fam, function($query, $campo){
                    return $query->where('domicilio.cod_forma_coleta_fam', '=', $campo);
                })
                ->when($dta_entrevista_fam, function($query, $campo){
                    return $query->where('domicilio.dta_entrevista_fam', '=', $campo);
                })
                ->when($nom_localidade_fam, function($query, $campo){
                    return $query->where('domicilio.nom_localidade_fam', 'like', '%' . $campo . '%');
                })
                ->when($nom_tip_logradouro_fam, function($query, $campo){
                    return $query->where('domicilio.nom_tip_logradouro_fam', '=', $campo);
                })
                ->when($nom_titulo_logradouro_fam, function($query, $campo){
                    return $query->where('domicilio.nom_titulo_logradouro_fam', '=', $campo);
                })
                ->when($nom_logradouro_fam, function($query, $campo){
                    return $query->where('domicilio.nom_logradouro_fam', '=', $campo);
                })
                ->when($num_logradouro_fam, function($query, $campo){
                    return $query->where('domicilio.num_logradouro_fam', '=', $campo);
                })
                ->when($des_complemento_fam, function($query, $campo){
                    return $query->where('domicilio.des_complemento_fam', '=', $campo);
                })
                ->when($des_complemento_adic_fam, function($query, $campo){
                    return $query->where('domicilio.des_complemento_adic_fam', '=', $campo);
                })
//                ->when($num_cep_logradouro_fam, function($query, $campo){
//                    return $query->where('domicilio.num_cep_logradouro_fam', '=', $campo);
//                })
                ->when($cod_unidade_territorial_fam, function($query, $campo){
                    return $query->where('domicilio.cod_unidade_territorial_fam', '=', $campo);
                })
                ->when($nom_unidade_territorial_fam, function($query, $campo){
                    return $query->where('domicilio.nom_unidade_territorial_fam', '=', $campo);
                })
                ->when($txt_referencia_local_fam, function($query, $campo){
                    return $query->where('domicilio.txt_referencia_local_fam', '=', $campo);
                })
                ->when($nom_entrevistador_fam, function($query, $campo){
                    return $query->where('domicilio.nom_entrevistador_fam', '=', $campo);
                })
                ->when($num_cpf_entrevistador_fam, function($query, $campo){
                    return $query->where('domicilio.num_cpf_entrevistador_fam', '=', $campo);
                })
                ->when($vlr_renda_media_fam, function($query, $campo){
                    return $query->where('domicilio.vlr_renda_media_fam', '=', $campo);
                })
                ->when($fx_rfpc, function($query, $campo){
                    return $query->where('domicilio.fx_rfpc', '=', $campo);
                })
                ->when($vlr_renda_total_fam, function($query, $campo){
                    return $query->where('domicilio.vlr_renda_total_fam', '=', $campo);
                })
                ->when($marc_pbf, function($query, $campo){
                    return $query->where('domicilio.marc_pbf', '=', $campo);
                })
                ->when($qtde_meses_desat_cat, function($query, $campo){
                    return $query->where('domicilio.qtde_meses_desat_cat', '=', $campo);
                })
                ->when($cod_local_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_local_domic_fam', '=', $campo);
                })
                ->when($cod_especie_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_especie_domic_fam', '=', $campo);
                })
                ->when($qtd_comodos_domic_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_comodos_domic_fam', '=', $campo);
                })
                ->when($qtd_comodos_dormitorio_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_comodos_dormitorio_fam', '=', $campo);
                })
                ->when($cod_material_piso_fam, function($query, $campo){
                    return $query->where('domicilio.cod_material_piso_fam', '=', $campo);
                })
                ->when($cod_material_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_material_domic_fam', '=', $campo);
                })
                ->when($cod_agua_canalizada_fam, function($query, $campo){
                    return $query->where('domicilio.cod_agua_canalizada_fam', '=', $campo);
                })
                ->when($cod_abaste_agua_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_abaste_agua_domic_fam', '=', $campo);
                })
                ->when($cod_banheiro_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_banheiro_domic_fam', '=', $campo);
                })
                ->when($cod_escoa_sanitario_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_escoa_sanitario_domic_fam', '=', $campo);
                })
                ->when($cod_destino_lixo_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_destino_lixo_domic_fam', '=', $campo);
                })
                ->when($cod_iluminacao_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_iluminacao_domic_fam', '=', $campo);
                })
                ->when($cod_calcamento_domic_fam, function($query, $campo){
                    return $query->where('domicilio.cod_calcamento_domic_fam', '=', $campo);
                })
                ->when($cod_familia_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.cod_familia_indigena_fam', '=', $campo);
                })
                ->when($cod_povo_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.cod_povo_indigena_fam', '=', $campo);
                })
                ->when($nom_povo_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.nom_povo_indigena_fam', '=', $campo);
                })
                ->when($cod_indigena_reside_fam, function($query, $campo){
                    return $query->where('domicilio.cod_indigena_reside_fam', '=', $campo);
                })
                ->when($cod_reserva_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.cod_reserva_indigena_fam', '=', $campo);
                })
                ->when($nom_reserva_indigena_fam, function($query, $campo){
                    return $query->where('domicilio.nom_reserva_indigena_fam', '=', $campo);
                })
                ->when($ind_familia_quilombola_fam, function($query, $campo){
                    return $query->where('domicilio.ind_familia_quilombola_fam', '=', $campo);
                })
                ->when($cod_comunidade_quilombola_fam, function($query, $campo){
                    return $query->where('domicilio.cod_comunidade_quilombola_fam', '=', $campo);
                })
                ->when($nom_comunidade_quilombola_fam, function($query, $campo){
                    return $query->where('domicilio.nom_comunidade_quilombola_fam', '=', $campo);
                })
                ->when($qtd_pessoas_domic_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_pessoas_domic_fam', '=', $campo);
                })
                ->when($qtd_familias_domic_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_familias_domic_fam', '=', $campo);
                })
                ->when($qtd_pessoa_inter_0_17_anos_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_pessoa_inter_0_17_anos_fam', '=', $campo);
                })
                ->when($qtd_pessoa_inter_18_64_anos_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_pessoa_inter_18_64_anos_fam', '=', $campo);
                })
                ->when($qtd_pessoa_inter_65_anos_fam, function($query, $campo){
                    return $query->where('domicilio.qtd_pessoa_inter_65_anos_fam', '=', $campo);
                })
                ->when($val_desp_energia_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_energia_fam', '=', $campo);
                })
                ->when($val_desp_agua_esgoto_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_agua_esgoto_fam', '=', $campo);
                })
                ->when($val_desp_gas_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_gas_fam', '=', $campo);
                })
                ->when($val_desp_alimentacao_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_alimentacao_fam', '=', $campo);
                })
                ->when($val_desp_transpor_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_transpor_fam', '=', $campo);
                })
                ->when($val_desp_aluguel_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_aluguel_fam', '=', $campo);
                })
                ->when($val_desp_medicamentos_fam, function($query, $campo){
                    return $query->where('domicilio.val_desp_medicamentos_fam', '=', $campo);
                })
                ->when($nom_estab_assist_saude_fam, function($query, $campo){
                    return $query->where('domicilio.nom_estab_assist_saude_fam', '=', $campo);
                })
                ->when($cod_eas_fam, function($query, $campo){
                    return $query->where('domicilio.cod_eas_fam', '=', $campo);
                })
                ->when($nom_centro_assist_fam, function($query, $campo){
                    return $query->where('domicilio.nom_centro_assist_fam', '=', $campo);
                })
                ->when($cod_centro_assist_fam, function($query, $campo){
                    return $query->where('domicilio.cod_centro_assist_fam', '=', $campo);
                })
                ->when($num_ddd_contato_1_fam, function($query, $campo){
                    return $query->where('domicilio.num_ddd_contato_1_fam', '=', $campo);
                })
                ->when($num_tel_contato_1_fam, function($query, $campo){
                    return $query->where('domicilio.num_tel_contato_1_fam', '=', $campo);
                })
                ->when($ic_tipo_contato_1_fam, function($query, $campo){
                    return $query->where('domicilio.ic_tipo_contato_1_fam', '=', $campo);
                })
                ->when($ic_envo_sms_contato_1_fam, function($query, $campo){
                    return $query->where('domicilio.ic_envo_sms_contato_1_fam', '=', $campo);
                })
                ->when($num_tel_contato_2_fam, function($query, $campo){
                    return $query->where('domicilio.num_tel_contato_2_fam', '=', $campo);
                })
                ->when($num_ddd_contato_2_fam, function($query, $campo){
                    return $query->where('domicilio.num_ddd_contato_2_fam', '=', $campo);
                })
                ->when($ic_tipo_contato_2_fam, function($query, $campo){
                    return $query->where('domicilio.ic_tipo_contato_2_fam', '=', $campo);
                })
                ->when($ic_envo_sms_contato_2_fam, function($query, $campo){
                    return $query->where('domicilio.ic_envo_sms_contato_2_fam', '=', $campo);
                })
                ->when($cod_cta_energ_unid_consum_fam, function($query, $campo){
                    return $query->where('domicilio.cod_cta_energ_unid_consum_fam', '=', $campo);
                })
                ->when($ind_parc_mds_fam, function($query, $campo){
                    return $query->where('domicilio.ind_parc_mds_fam', '=', $campo);
                })
                ->when($ref_cad, function($query, $campo){
                    return $query->where('domicilio.ref_cad', '=', $campo);
                })
                ->when($ref_pbf, function($query, $campo){
                    return $query->where('domicilio.ref_pbf', '=', $campo);
                })

                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa.pessoa_id', '=', $campo);
                })
                ->when($p_domicilio_id, function($query, $campo){
                    return $query->where('pessoa.domicilio_id', '=', $campo);
                })
                ->when($p_cod_familiar_fam, function($query, $campo){
                    return $query->where('pessoa.cod_familiar_fam', '=', $campo);
                })
                ->when($cod_est_cadastral_memb, function($query, $campo){
                    return $query->where('pessoa.cod_est_cadastral_memb', '=', $campo);
                })
                ->when($ind_trabalho_infantil_pessoa, function($query, $campo){
                    return $query->where('pessoa.ind_trabalho_infantil_pessoa', '=', $campo);
                })
                ->when($nom_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($num_nis_pessoa_atual, function($query, $campo){
                    return $query->where('pessoa.num_nis_pessoa_atual', '=', $campo);
                })
                ->when($nom_apelido_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_apelido_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($cod_sexo_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_sexo_pessoa', '=', $campo);
                })
                ->when($dta_nasc_pessoa, function($query, $campo){
                    return $query->where('pessoa.dta_nasc_pessoa', '=', $campo);
                })
//                ->when($cod_parentesco_rf_pessoa, function($query, $campo){
//                    return $query->where('pessoa.cod_parentesco_rf_pessoa', '=', $campo);
//                })
                ->when($cod_raca_cor_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_raca_cor_pessoa', '=', $campo);
                })
                ->when($nom_completo_mae_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_completo_mae_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($nom_completo_pai_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_completo_pai_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($cod_local_nascimento_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_local_nascimento_pessoa', '=', $campo);
                })
                ->when($sig_uf_munic_nasc_pessoa, function($query, $campo){
                    return $query->where('pessoa.sig_uf_munic_nasc_pessoa', '=', $campo);
                })
                ->when($nom_ibge_munic_nasc_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_ibge_munic_nasc_pessoa', '=', $campo);
                })
                ->when($cod_ibge_munic_nasc_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_ibge_munic_nasc_pessoa', '=', $campo);
                })
                ->when($nom_pais_origem_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_pais_origem_pessoa', '=', $campo);
                })
                ->when($cod_pais_origem_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_pais_origem_pessoa', '=', $campo);
                })
                ->when($cod_certidao_registrada_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_certidao_registrada_pessoa', '=', $campo);
                })
                ->when($fx_idade, function($query, $campo){
                    return $query->where('pessoa.fx_idade', '=', $campo);
                })
                ->when($p_marc_pbf, function($query, $campo){
                    return $query->where('pessoa.marc_pbf', '=', $campo);
                })
                ->when($cod_certidao_civil_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_certidao_civil_pessoa', '=', $campo);
                })
                ->when($cod_livro_termo_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_livro_termo_certid_pessoa', '=', $campo);
                })
                ->when($cod_folha_termo_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_folha_termo_certid_pessoa', '=', $campo);
                })
                ->when($cod_termo_matricula_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_termo_matricula_certid_pessoa', '=', $campo);
                })
                ->when($nom_munic_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.nom_munic_certid_pessoa', '=', $campo);
                })
                ->when($cod_ibge_munic_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_ibge_munic_certid_pessoa', '=', $campo);
                })
                ->when($cod_cartorio_certid_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_cartorio_certid_pessoa', '=', $campo);
                })
                ->when($num_cpf_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_cpf_pessoa', '=', $campo);
                })
                ->when($num_identidade_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_identidade_pessoa', '=', $campo);
                })
                ->when($cod_complemento_pessoa, function($query, $campo){
                    return $query->where('pessoa.cod_complemento_pessoa', '=', $campo);
                })
                ->when($dta_emissao_ident_pessoa, function($query, $campo){
                    return $query->where('pessoa.dta_emissao_ident_pessoa', '=', $campo);
                })
                ->when($sig_uf_ident_pessoa, function($query, $campo){
                    return $query->where('pessoa.sig_uf_ident_pessoa', '=', $campo);
                })
                ->when($sig_orgao_emissor_pessoa, function($query, $campo){
                    return $query->where('pessoa.sig_orgao_emissor_pessoa', '=', $campo);
                })
                ->when($num_cart_trab_prev_soc_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_cart_trab_prev_soc_pessoa', '=', $campo);
                })
                ->when($num_serie_trab_prev_soc_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_serie_trab_prev_soc_pessoa', '=', $campo);
                })
                ->when($dta_emissao_cart_trab_pessoa, function($query, $campo){
                    return $query->where('pessoa.dta_emissao_cart_trab_pessoa', '=', $campo);
                })
                ->when($sig_uf_cart_trab_pessoa, function($query, $campo){
                    return $query->where('pessoa.sig_uf_cart_trab_pessoa', '=', $campo);
                })
                ->when($num_titulo_eleitor_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_titulo_eleitor_pessoa', '=', $campo);
                })
                ->when($num_zona_tit_eleitor_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_zona_tit_eleitor_pessoa', '=', $campo);
                })
                ->when($num_secao_tit_eleitor_pessoa, function($query, $campo){
                    return $query->where('pessoa.num_secao_tit_eleitor_pessoa', '=', $campo);
                })
                ->when($cod_deficiencia_memb, function($query, $campo){
                    return $query->where('pessoa.cod_deficiencia_memb', '=', $campo);
                })
                ->when($ind_def_cegueira_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_cegueira_memb', '=', $campo);
                })
                ->when($ind_def_baixa_visao_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_baixa_visao_memb', '=', $campo);
                })
                ->when($ind_def_surdez_profunda_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_surdez_profunda_memb', '=', $campo);
                })
                ->when($ind_def_surdez_leve_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_surdez_leve_memb', '=', $campo);
                })
                ->when($ind_def_fisica_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_fisica_memb', '=', $campo);
                })
                ->when($ind_def_mental_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_mental_memb', '=', $campo);
                })
                ->when($ind_def_sindrome_down_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_sindrome_down_memb', '=', $campo);
                })
                ->when($ind_def_transtorno_mental_memb, function($query, $campo){
                    return $query->where('pessoa.ind_def_transtorno_mental_memb', '=', $campo);
                })
                ->when($ind_ajuda_nao_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_nao_memb', '=', $campo);
                })
                ->when($ind_ajuda_familia_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_familia_memb', '=', $campo);
                })
                ->when($ind_ajuda_especializado_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_especializado_memb', '=', $campo);
                })
                ->when($ind_ajuda_vizinho_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_vizinho_memb', '=', $campo);
                })
                ->when($ind_ajuda_instituicao_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_instituicao_memb', '=', $campo);
                })
                ->when($ind_ajuda_outra_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ajuda_outra_memb', '=', $campo);
                })
                ->when($cod_sabe_ler_escrever_memb, function($query, $campo){
                    return $query->where('pessoa.cod_sabe_ler_escrever_memb', '=', $campo);
                })
                ->when($ind_frequenta_escola_memb, function($query, $campo){
                    return $query->where('pessoa.ind_frequenta_escola_memb', '=', $campo);
                })
                ->when($nom_escola_memb, function($query, $campo){
                    return $query->where('pessoa.nom_escola_memb', '=', $campo);
                })
                ->when($cod_escola_local_memb, function($query, $campo){
                    return $query->where('pessoa.cod_escola_local_memb', '=', $campo);
                })
                ->when($sig_uf_escola_memb, function($query, $campo){
                    return $query->where('pessoa.sig_uf_escola_memb', '=', $campo);
                })
                ->when($nom_munic_escola_memb, function($query, $campo){
                    return $query->where('pessoa.nom_munic_escola_memb', '=', $campo);
                })
                ->when($cod_ibge_munic_escola_memb, function($query, $campo){
                    return $query->where('pessoa.cod_ibge_munic_escola_memb', '=', $campo);
                })
                ->when($cod_censo_inep_memb, function($query, $campo){
                    return $query->where('pessoa.cod_censo_inep_memb', '=', $campo);
                })
                ->when($cod_curso_frequenta_memb, function($query, $campo){
                    return $query->where('pessoa.cod_curso_frequenta_memb', '=', $campo);
                })
                ->when($cod_ano_serie_frequenta_memb, function($query, $campo){
                    return $query->where('pessoa.cod_ano_serie_frequenta_memb', '=', $campo);
                })
                ->when($cod_curso_frequentou_pessoa_memb, function($query, $campo){
                    return $query->where('pessoa.cod_curso_frequentou_pessoa_memb', '=', $campo);
                })
                ->when($cod_ano_serie_frequentou_memb, function($query, $campo){
                    return $query->where('pessoa.cod_ano_serie_frequentou_memb', '=', $campo);
                })
                ->when($cod_concluiu_frequentou_memb, function($query, $campo){
                    return $query->where('pessoa.cod_concluiu_frequentou_memb', '=', $campo);
                })
                ->when($grau_instrucao, function($query, $campo){
                    return $query->where('pessoa.grau_instrucao', '=', $campo);
                })
                ->when($cod_trabalhou_memb, function($query, $campo){
                    return $query->where('pessoa.cod_trabalhou_memb', '=', $campo);
                })
                ->when($cod_afastado_trab_memb, function($query, $campo){
                    return $query->where('pessoa.cod_afastado_trab_memb', '=', $campo);
                })
                ->when($cod_agricultura_trab_memb, function($query, $campo){
                    return $query->where('pessoa.cod_agricultura_trab_memb', '=', $campo);
                })
                ->when($cod_principal_trab_memb, function($query, $campo){
                    return $query->where('pessoa.cod_principal_trab_memb', '=', $campo);
                })
                ->when($val_remuner_emprego_memb, function($query, $campo){
                    return $query->where('pessoa.val_remuner_emprego_memb', '=', $campo);
                })
                ->when($cod_trabalho_12_meses_memb, function($query, $campo){
                    return $query->where('pessoa.cod_trabalho_12_meses_memb', '=', $campo);
                })
                ->when($qtd_meses_12_meses_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_meses_12_meses_memb', '=', $campo);
                })
                ->when($val_renda_bruta_12_meses_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_bruta_12_meses_memb', '=', $campo);
                })
                ->when($val_renda_doacao_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_doacao_memb', '=', $campo);
                })
                ->when($val_renda_aposent_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_aposent_memb', '=', $campo);
                })
                ->when($val_renda_seguro_desemp_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_seguro_desemp_memb', '=', $campo);
                })
                ->when($val_renda_pensao_alimen_memb, function($query, $campo){
                    return $query->where('pessoa.val_renda_pensao_alimen_memb', '=', $campo);
                })
                ->when($val_outras_rendas_memb, function($query, $campo){
                    return $query->where('pessoa.val_outras_rendas_memb', '=', $campo);
                })
                ->when($marc_sit_rua, function($query, $campo){
                    return $query->where('pessoa.marc_sit_rua', '=', $campo);
                })
                ->when($ind_dormir_rua_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dormir_rua_memb', '=', $campo);
                })
                ->when($qtd_dormir_freq_rua_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_dormir_freq_rua_memb', '=', $campo);
                })
                ->when($ind_dormir_albergue_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dormir_albergue_memb', '=', $campo);
                })
                ->when($qtd_dormir_freq_albergue_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_dormir_freq_albergue_memb', '=', $campo);
                })
                ->when($ind_dormir_dom_part_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dormir_dom_part_memb', '=', $campo);
                })
                ->when($qtd_dormir_freq_dom_part_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_dormir_freq_dom_part_memb', '=', $campo);
                })
                ->when($ind_outro_memb, function($query, $campo){
                    return $query->where('pessoa.ind_outro_memb', '=', $campo);
                })
                ->when($qtd_freq_outro_memb, function($query, $campo){
                    return $query->where('pessoa.qtd_freq_outro_memb', '=', $campo);
                })
                ->when($cod_tempo_rua_memb, function($query, $campo){
                    return $query->where('pessoa.cod_tempo_rua_memb', '=', $campo);
                })
                ->when($ind_motivo_perda_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_perda_memb', '=', $campo);
                })
                ->when($ind_motivo_ameaca_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_ameaca_memb', '=', $campo);
                })
                ->when($ind_motivo_probs_fam_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_probs_fam_memb', '=', $campo);
                })
                ->when($ind_motivo_alcool_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_alcool_memb', '=', $campo);
                })
                ->when($ind_motivo_desemprego_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_desemprego_memb', '=', $campo);
                })
                ->when($ind_motivo_trabalho_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_trabalho_memb', '=', $campo);
                })
                ->when($ind_motivo_saude_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_saude_memb', '=', $campo);
                })
                ->when($ind_motivo_pref_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_pref_memb', '=', $campo);
                })
                ->when($ind_motivo_outro_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_outro_memb', '=', $campo);
                })
                ->when($ind_motivo_nao_sabe_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_nao_sabe_memb', '=', $campo);
                })
                ->when($ind_motivo_nao_resp_memb, function($query, $campo){
                    return $query->where('pessoa.ind_motivo_nao_resp_memb', '=', $campo);
                })
                ->when($cod_tempo_cidade_memb, function($query, $campo){
                    return $query->where('pessoa.cod_tempo_cidade_memb', '=', $campo);
                })
                ->when($cod_vive_fam_rua_memb, function($query, $campo){
                    return $query->where('pessoa.cod_vive_fam_rua_memb', '=', $campo);
                })
                ->when($cod_contato_parente_memb, function($query, $campo){
                    return $query->where('pessoa.cod_contato_parente_memb', '=', $campo);
                })
                ->when($ind_ativ_com_escola_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_escola_memb', '=', $campo);
                })
                ->when($ind_ativ_com_coop_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_coop_memb', '=', $campo);
                })
                ->when($ind_ativ_com_mov_soc_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_mov_soc_memb', '=', $campo);
                })
                ->when($ind_ativ_com_nao_sabe_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_nao_sabe_memb', '=', $campo);
                })
                ->when($ind_ativ_com_nao_resp_memb, function($query, $campo){
                    return $query->where('pessoa.ind_ativ_com_nao_resp_memb', '=', $campo);
                })
                ->when($ind_atend_cras_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_cras_memb', '=', $campo);
                })
                ->when($ind_atend_creas_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_creas_memb', '=', $campo);
                })
                ->when($ind_atend_centro_ref_rua_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_centro_ref_rua_memb', '=', $campo);
                })
                ->when($ind_atend_inst_gov_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_inst_gov_memb', '=', $campo);
                })
                ->when($ind_atend_inst_nao_gov_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_inst_nao_gov_memb', '=', $campo);
                })
                ->when($ind_atend_hospital_geral_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_hospital_geral_memb', '=', $campo);
                })
                ->when($cod_cart_assinada_memb, function($query, $campo){
                    return $query->where('pessoa.cod_cart_assinada_memb', '=', $campo);
                })
                ->when($ind_dinh_const_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_const_memb', '=', $campo);
                })
                ->when($ind_dinh_flanelhinha_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_flanelhinha_memb', '=', $campo);
                })
                ->when($ind_dinh_carregador_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_carregador_memb', '=', $campo);
                })
                ->when($ind_dinh_catador_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_catador_memb', '=', $campo);
                })
                ->when($ind_dinh_servs_gerais_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_servs_gerais_memb', '=', $campo);
                })
                ->when($ind_dinh_pede_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_pede_memb', '=', $campo);
                })
                ->when($ind_dinh_vendas_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_vendas_memb', '=', $campo);
                })
                ->when($ind_dinh_outro_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_outro_memb', '=', $campo);
                })
                ->when($ind_dinh_nao_resp_memb, function($query, $campo){
                    return $query->where('pessoa.ind_dinh_nao_resp_memb', '=', $campo);
                })
                ->when($ind_atend_nenhum_memb, function($query, $campo){
                    return $query->where('pessoa.ind_atend_nenhum_memb', '=', $campo);
                })
                ->when($p_ref_cad, function($query, $campo){
                    return $query->where('pessoa.ref_cad', '=', $campo);
                })
                ->when($p_ref_pbf, function($query, $campo){
                    return $query->where('pessoa.ref_pbf', '=', $campo);
                })
                ->when($idade, function($query, $campo){
                    return $query->whereRaw('year(now()) - year(pessoa.dta_nasc_pessoa) =' . $campo);
                })
                ->when($ano, function($query, $campo){
                    return $query->whereRaw('year(pessoa.dta_nasc_pessoa) =' . $campo);
                })
                ->when($diaAniversario, function($query, $campo){
                    return $query->whereRaw('day(pessoa.dta_nasc_pessoa) =' . $campo);
                })
                ->when($mesAniversario, function($query, $campo){
                    return $query->whereRaw('month(pessoa.dta_nasc_pessoa) =' . $campo);
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('pessoa.cpf' , '=', $campo);
                })
                ->when($tipo_profissao_id, function($query, $campo){
                    return $query->where('pessoa.tipo_profissao_id' , '=', $campo);
                })
                ->when($domicilio_id_1, function($query, $campo){
                    return $query->where('pessoa.domicilio_id_1' , '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('pessoa.nom_pessoa', 'ASC')
            ->orderBy('pessoa.dta_nasc_pessoa', 'ASC')
            ->paginate(15000);

        return $dados;

    }

    public static function rotinaSubstituicaoDuplicados($request){
        try{

            $pessoaIdDe = $request['pessoaIdDe'];
            $pessoaIdPara = $request['pessoaIdPara'];

            $domicilioIdDe = null;
            $domicilioIdPara = null;

            $pessoa = Pessoa::listar([
                'pessoa_id' => $pessoaIdDe
            ]);

            if($pessoa->count() != 0){

                $domicilioIdDe = $pessoa[0]['domicilio_id'];

            }

            unset($pessoa);

            $pessoa = Pessoa::listar([
                'pessoa_id' => $pessoaIdPara
            ]);

            if($pessoa->count() != 0){

                $domicilioIdPara = $pessoa[0]['domicilio_id'];

            }

//            dd([
//                  'pessoaIdDe' => $pessoaIdDe
//                , 'pessoaIdPara' => $pessoaIdPara
//                , 'domicilioIdDe' => $domicilioIdDe
//                , 'domicilioIdPara' => $domicilioIdPara
//            ]);

            unset($pessoa);

            DB::beginTransaction();

            DB::statement(
                " UPDATE atendimento as a1, atendimento as a2 " .
                " SET a1.pessoa_id = a2.pessoa_id " .
                " WHERE a2.pessoa_id = " . $pessoaIdPara .
                " AND a1.pessoa_id = " . $pessoaIdDe
            );

            DB::statement(
                " UPDATE pessoa_situacao as p1, pessoa_situacao as p2 " .
                " SET p1.pessoa_id = p2.pessoa_id " .
                " WHERE p2.pessoa_id = " . $pessoaIdPara .
                " AND p1.pessoa_id = " . $pessoaIdDe
            );

            DB::statement(
                " UPDATE pessoa as p1, pessoa as p2 " .
                " SET p1.nom_apelido_pessoa = p2.nom_apelido_pessoa, " .
                " p1.tipo_profissao_id = p2.tipo_profissao_id, " .
                " p1.email = p2.email " .
                " WHERE p2.pessoa_id = " . $pessoaIdPara .
                " AND p1.pessoa_id = " . $pessoaIdDe
            );

            DB::statement(
                " UPDATE domicilio as d1, domicilio as d2 " .
                " SET d1.nom_logradouro_fam = d2.nom_logradouro_fam, " .
                " d1.des_complemento_fam = d2.des_complemento_fam, " .
                " d1.tipo_bairro_id = d2.tipo_bairro_id " .
                " WHERE d2.domicilio_id = " . $domicilioIdDe .
                " AND d1.domicilio_id = " . $domicilioIdPara
            );


            DB::statement("DELETE FROM atendimento where pessoa_id = " . $pessoaIdDe);

            DB::statement("DELETE FROM pessoa_situacao where pessoa_id =" . $pessoaIdDe);

            DB::statement("DELETE FROM pessoa where pessoa_id =" . $pessoaIdDe);

            DB::statement("DELETE FROM domicilio where domicilio_id = " . $domicilioIdDe);

            DB::commit();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Rotina completada!'
            ];

        }catch(\Exception $e){

            DB::rollBack();

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao finalizar a rotina! (' . $e->getMessage() . ')'
            ];

        }

        return $retorno;

    }
    
    public static function listarP2($request = null){

        $dados = self::with([
            'domicilio',
            'domicilio.cidade',
            'domicilio.pessoa',
            'domicilio.tipoLocal',
            'atendimento',
            'atendimento.tipoMenu',
            'pessoaSituacao',
            'tipoProfissao',
            'aluno',
            'domicilio1',
            'estabelecimento',
        ])->select(DB::raw('distinct pessoa.*'))
            ->leftJoin('domicilio', 'pessoa.domicilio_id', '=', 'domicilio.domicilio_id')
            ->leftJoin('atendimento', 'pessoa.pessoa_id', '=', 'atendimento.pessoa_id');

        if($request != null) {

            $domicilio_id = isset($request['pessoa']['domicilio']['domicilio_id']) ? $request['pessoa']['domicilio']['domicilio_id'] : null;
            $pessoa_id = isset($request['pessoa']['pessoa_id']) ? $request['pessoa']['pessoa_id'] : null;
            $cpf = isset($request['pessoa']['cpf']) ? $request['pessoa']['cpf'] : null;

            $dados = $dados
                ->when($domicilio_id, function($query, $campo){
                    return $query->where('pessoa.domicilio_id' , '=', $campo);
                })
                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa.pessoa_id' , '=', $campo);
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('pessoa.cpf' , '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('pessoa.nom_pessoa', 'ASC')
            ->orderBy('pessoa.dta_nasc_pessoa', 'ASC')
            ->paginate(15000);

        return $dados;

    }

    public static function listarX($request = null ){

        $dados = self::select('pessoa.*')
            ->with([
                'domicilio',
                'domicilio.cidade',
                'domicilio.pessoa',
                'atendimento',
                'atendimento.tipoMenu',
                'pessoaSituacao',
                'tipoProfissao',
                'domicilio1',
                'aluno',
                'aluno.escolaAluno',
                'aluno.escolaAluno.escola',
            ])->join('domicilio', 'pessoa.domicilio_id', '=', 'domicilio.domicilio_id')
            ->whereNotNull(['domicilio.tel_1']);

        if($request != null) {

            $pessoa_id = isset($request['pessoa_id']) ? $request['pessoa_id'] : null;
            $domicilio_id = isset($request['domicilio_id']) ? $request['domicilio_id'] : null;
            $cod_familiar_fam = isset($request['cod_familiar_fam']) ? $request['cod_familiar_fam'] : null;
            $dta_nasc_pessoa = isset($request['dta_nasc_pessoa']) ? $request['dta_nasc_pessoa'] : null;
            $nom_pessoa = isset($request['nom_pessoa']) ? $request['nom_pessoa'] : null;
            $nom_apelido_pessoa = isset($request['nom_apelido_pessoa']) ? $request['nom_apelido_pessoa'] : null;
            $num_cpf_pessoa = isset($request['num_cpf_pessoa']) ? $request['num_cpf_pessoa'] : null;
            $cpf = isset($request['cpf']) ? $request['cpf'] : null;
            $cod_parentesco_rf_pessoa = isset($request['cod_parentesco_rf_pessoa']) ? $request['cod_parentesco_rf_pessoa'] : null;
            $domicilio_id_1 = isset($request['domicilio_id_1']) ? $request['domicilio_id_1'] : null;

            $dados = $dados
                ->when($pessoa_id, function($query, $campo){
                    return $query->where('pessoa_id', '=', $campo);
                })
                ->when($domicilio_id, function($query, $campo){
                    return $query->where('domicilio_id', '=', $campo);
                })
                ->when($cod_familiar_fam, function($query, $campo){
                    return $query->where('cod_familiar_fam', '=', $campo);
                })
                ->when($dta_nasc_pessoa, function($query, $campo){
                    return $query->where('dta_nasc_pessoa', '=', $campo);
                })
                ->when($nom_pessoa, function($query, $campo){
                    return $query->where('nom_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($nom_apelido_pessoa, function($query, $campo){
                    return $query->where('nom_apelido_pessoa', 'like', '%' . $campo . '%' );
                })
                ->when($num_cpf_pessoa, function($query, $campo){
                    return $query->where('num_cpf_pessoa', '=', $campo);
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('cpf', '=', $campo);
                })
                ->when($cod_parentesco_rf_pessoa, function($query, $campo){
                    return $query->where('cod_parentesco_rf_pessoa', '=', $campo);
                })
                ->when($domicilio_id_1, function($query, $campo){
                    return $query->where('domicilio_id_1', '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('nom_pessoa', 'ASC')
            ->orderBy('dta_nasc_pessoa', 'ASC')
            ->paginate(100);

        return $dados;

    }

}

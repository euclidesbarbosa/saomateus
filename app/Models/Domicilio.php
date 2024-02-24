<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Domicilio extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable =[
        'cd_ibge',
        'cod_familiar_fam',
        'dat_cadastramento_fam',
        'dat_atual_fam',
        'cod_est_cadastral_fam',
        'cod_forma_coleta_fam',
        'dta_entrevista_fam',
        'nom_localidade_fam',
        'nom_tip_logradouro_fam',
        'nom_titulo_logradouro_fam',
        'nom_logradouro_fam',
        'num_logradouro_fam',
        'des_complemento_fam',
        'des_complemento_adic_fam',
        'num_cep_logradouro_fam',
        'cod_unidade_territorial_fam',
        'nom_unidade_territorial_fam',
        'txt_referencia_local_fam',
        'nom_entrevistador_fam',
        'num_cpf_entrevistador_fam',
        'vlr_renda_media_fam',
        'fx_rfpc',
        'vlr_renda_total_fam',
        'marc_pbf',
        'qtde_meses_desat_cat',
        'cod_local_domic_fam',
        'cod_especie_domic_fam',
        'qtd_comodos_domic_fam',
        'qtd_comodos_dormitorio_fam',
        'cod_material_piso_fam',
        'cod_material_domic_fam',
        'cod_agua_canalizada_fam',
        'cod_abaste_agua_domic_fam',
        'cod_banheiro_domic_fam',
        'cod_escoa_sanitario_domic_fam',
        'cod_destino_lixo_domic_fam',
        'cod_iluminacao_domic_fam',
        'cod_calcamento_domic_fam',
        'cod_familia_indigena_fam',
        'cod_povo_indigena_fam',
        'nom_povo_indigena_fam',
        'cod_indigena_reside_fam',
        'cod_reserva_indigena_fam',
        'nom_reserva_indigena_fam',
        'ind_familia_quilombola_fam',
        'cod_comunidade_quilombola_fam',
        'nom_comunidade_quilombola_fam',
        'qtd_pessoas_domic_fam',
        'qtd_familias_domic_fam',
        'qtd_pessoa_inter_0_17_anos_fam',
        'qtd_pessoa_inter_18_64_anos_fam',
        'qtd_pessoa_inter_65_anos_fam',
        'val_desp_energia_fam',
        'val_desp_agua_esgoto_fam',
        'val_desp_gas_fam',
        'val_desp_alimentacao_fam',
        'val_desp_transpor_fam',
        'val_desp_aluguel_fam',
        'val_desp_medicamentos_fam',
        'nom_estab_assist_saude_fam',
        'cod_eas_fam',
        'nom_centro_assist_fam',
        'cod_centro_assist_fam',
        'num_ddd_contato_1_fam',
        'num_tel_contato_1_fam',
        'ic_tipo_contato_1_fam',
        'ic_envo_sms_contato_1_fam',
        'num_tel_contato_2_fam',
        'num_ddd_contato_2_fam',
        'ic_tipo_contato_2_fam',
        'ic_envo_sms_contato_2_fam',
        'cod_cta_energ_unid_consum_fam',
        'ind_parc_mds_fam',
        'ref_cad',
        'ref_pbf',
        'tel_1',
        'tel_2',
        'tipo_bairro_id',
        'tipo_povoado_id',
        'tipo_local_id',
        'cnpj',
        'insc_est',
        'insc_mun',
        'nom_estabelecimento',
        'num_alvara',
        'end',
        'end_num',
        'cod_local_domic_fam',
    ];

    protected $primaryKey = 'domicilio_id';

    protected $table = 'domicilio';

    public function tipoBairro(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_bairro_id');
    }

    public function tipoPovoado(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_povoado_id');
    }

    public function tipoLocal(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_local_id');
    }

    public function cidade(){
        return $this->hasOne(Cidade::class, 'cidade_ibge', 'cd_ibge');
    }

    public function pessoa(){
        return $this->hasMany(Pessoa::class, 'cod_familiar_fam', 'cod_familiar_fam')
            ->orderBy('cod_parentesco_rf_pessoa', 'ASC')
            ->orderBy('nom_pessoa', 'ASC')
            ->orderBy('dta_nasc_pessoa', 'ASC');
    }

    public static function listar($request = null){

        $nom_pessoa = isset($request['pessoa']['nom_pessoa']) ? $request['pessoa']['nom_pessoa'] : null;
        $cpf = isset($request['pessoa']['cpf']) ? $request['pessoa']['cpf'] : null;

        $dados = self::with([
            'cidade',
            'pessoa'=>function($query) use($nom_pessoa, $cpf){
                return $query->when($nom_pessoa, function($query, $campo){
                    return $query->where('nom_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('cpf', '=', $campo);
                })
                ;
            },
            'tipoBairro',
            'tipoPovoado',
            'tipoLocal',
        ])
        ->select('domicilio.*')
        ->distinct()
        ->leftJoin('pessoa', 'domicilio.cod_familiar_fam', '=', 'pessoa.cod_familiar_fam');

        if($request != null){

            $cd_ibge = isset($request['cd_ibge']) ? $request['cd_ibge'] : null;
            $cod_familiar_fam = isset($request['cod_familiar_fam']) ? $request['cod_familiar_fam'] : null;
            $dat_atual_fam = isset($request['dat_atual_fam']) ? $request['dat_atual_fam'] : null;
            $num_tel_contato_1_fam = isset($request['num_tel_contato_1_fam']) ? $request['num_tel_contato_1_fam'] : null;
            $num_tel_contato_2_fam = isset($request['num_tel_contato_2_fam']) ? $request['num_tel_contato_2_fam'] : null;
            $tel_1 = isset($request['tel_1']) ? $request['tel_1'] : null;
            $tel_2 = isset($request['tel_2']) ? $request['tel_2'] : null;
            $tipo_bairro_id = isset($request['tipo_bairro_id']) ? $request['tipo_bairro_id'] : null;
            $tipo_povoado_id = isset($request['tipo_povoado_id']) ? $request['tipo_povoado_id'] : null;
            $tipo_local_id = isset($request['tipo_local_id']) ? $request['tipo_local_id'] : null;
            $cnpj = isset($request['cnpj']) ? $request['cnpj'] : null;
            $insc_est = isset($request['insc_est']) ? $request['insc_est'] : null;
            $insc_mun = isset($request['insc_mun']) ? $request['insc_mun'] : null;
            $nom_estabelecimento = isset($request['nom_estabelecimento']) ? $request['nom_estabelecimento'] : null;
            $num_alvara = isset($request['num_alvara']) ? $request['num_alvara'] : null;

            $dados = $dados
                ->when($nom_pessoa, function($query, $campo){
                    return $query->where('nom_pessoa', 'like', '%' . $campo . '%');
                })
                ->when($cpf, function($query, $campo){
                    return $query->where('cpf', '=', $campo);
                })
                ->when($cd_ibge, function($query, $campo){
                    return $query->where('cd_ibge', '=', $campo);
                })
                ->when($cod_familiar_fam, function($query, $campo){
                    return $query->where('domicilio.cod_familiar_fam', '=', $campo);
                })
                ->when($dat_atual_fam, function($query, $campo){
                    return $query->where('dat_atual_fam', '=', $campo);
                })
                ->when($num_tel_contato_1_fam, function($query, $campo){
                    return $query->where('num_tel_contato_1_fam', '=', '%' . $campo . '%');
                })
                ->when($num_tel_contato_2_fam, function($query, $campo){
                    return $query->where('num_tel_contato_2_fam', 'like', '%' . $campo . '%');
                })
                ->when($tel_1, function($query, $campo){
                    return $query->where('tel_1', 'like', '%' . $campo . '%');
                })
                ->when($tel_2, function($query, $campo){
                    return $query->where('tel_2', 'like', '%' . $campo . '%');
                })
                ->when($tipo_bairro_id, function($query, $campo){
                    return $query->where('tipo_bairro_id', '=', $campo);
                })
                ->when($tipo_povoado_id, function($query, $campo){
                    return $query->where('tipo_povoado_id', '=', $campo);
                })
                ->when($tipo_local_id, function($query, $campo){
                    return $query->where('tipo_local_id', '=', $campo);
                })
                ->when($cnpj, function($query, $campo){
                    return $query->where('cnpj', '=', $campo);
                })
                ->when($insc_est, function($query, $campo){
                    return $query->where('insc_est', '=', $campo);
                })
                ->when($insc_mun, function($query, $campo){
                    return $query->where('insc_mun', '=', $campo);
                })
                ->when($nom_estabelecimento, function($query, $campo){
                    return $query->where('nom_estabelecimento', '=', $campo);
                })
                ->when($num_alvara, function($query, $campo){
                    return $query->where('num_alvara', '=', $campo);
                })
                ;
        }

        $dados = $dados
            ->orderBy('nom_pessoa', 'ASC')
            ->paginate(100);

        return $dados;

    }

    public static function store($request){

        try{

            $request = isset($request['domicilio']) ? $request['domicilio'] : $request;

            $id = isset($request['domicilio_id']) ? $request['domicilio_id'] : null;
            $cd_ibge = isset($request['cd_ibge']) ? $request['cd_ibge'] : null;
            $cod_familiar_fam = isset($request['cod_familiar_fam']) ? $request['cod_familiar_fam'] : null;
            $dat_cadastramento_fam = isset($request['dat_cadastramento_fam']) ? $request['dat_cadastramento_fam'] : null;
            $dat_atual_fam = isset($request['dat_atual_fam']) ? $request['dat_atual_fam'] : null;
            $cod_est_cadastral_fam = isset($request['cod_est_cadastral_fam']) ? $request['cod_est_cadastral_fam'] : null;
            $cod_forma_coleta_fam = isset($request['cod_forma_coleta_fam']) ? $request['cod_forma_coleta_fam'] : null;
            $dta_entrevista_fam = isset($request['dta_entrevista_fam']) ? $request['dta_entrevista_fam'] : null;
            $nom_localidade_fam = isset($request['nom_localidade_fam']) ? $request['nom_localidade_fam'] : null;
            $nom_tip_logradouro_fam = isset($request['nom_tip_logradouro_fam']) ? $request['nom_tip_logradouro_fam'] : null;
            $nom_titulo_logradouro_fam = isset($request['nom_titulo_logradouro_fam']) ? $request['nom_titulo_logradouro_fam'] : null;
            $nom_logradouro_fam = isset($request['nom_logradouro_fam']) ? $request['nom_logradouro_fam'] : null;
            $num_logradouro_fam = isset($request['num_logradouro_fam']) ? $request['num_logradouro_fam'] : null;
            $des_complemento_fam = isset($request['des_complemento_fam']) ? $request['des_complemento_fam'] : null;
            $des_complemento_adic_fam = isset($request['des_complemento_adic_fam']) ? $request['des_complemento_adic_fam'] : null;
            $num_cep_logradouro_fam = isset($request['num_cep_logradouro_fam']) ? $request['num_cep_logradouro_fam'] : null;
            $cod_unidade_territorial_fam = isset($request['cod_unidade_territorial_fam']) ? $request['cod_unidade_territorial_fam'] : null;
            $nom_unidade_territorial_fam = isset($request['nom_unidade_territorial_fam']) ? $request['nom_unidade_territorial_fam'] : null;
            $txt_referencia_local_fam = isset($request['txt_referencia_local_fam']) ? $request['txt_referencia_local_fam'] : null;
            $nom_entrevistador_fam = isset($request['nom_entrevistador_fam']) ? $request['nom_entrevistador_fam'] : null;
            $num_cpf_entrevistador_fam = isset($request['num_cpf_entrevistador_fam']) ? $request['num_cpf_entrevistador_fam'] : null;
            $vlr_renda_media_fam = isset($request['vlr_renda_media_fam']) ? $request['vlr_renda_media_fam'] : null;
            $fx_rfpc = isset($request['fx_rfpc']) ? $request['fx_rfpc'] : null;
            $vlr_renda_total_fam = isset($request['vlr_renda_total_fam']) ? $request['vlr_renda_total_fam'] : null;
            $marc_pbf = isset($request['marc_pbf']) ? $request['marc_pbf'] : null;
            $qtde_meses_desat_cat = isset($request['qtde_meses_desat_cat']) ? $request['qtde_meses_desat_cat'] : null;
            $cod_local_domic_fam = isset($request['cod_local_domic_fam']) ? $request['cod_local_domic_fam'] : null;
            $cod_especie_domic_fam = isset($request['cod_especie_domic_fam']) ? $request['cod_especie_domic_fam'] : null;
            $qtd_comodos_domic_fam = isset($request['qtd_comodos_domic_fam']) ? $request['qtd_comodos_domic_fam'] : null;
            $qtd_comodos_dormitorio_fam = isset($request['qtd_comodos_dormitorio_fam']) ? $request['qtd_comodos_dormitorio_fam'] : null;
            $cod_material_piso_fam = isset($request['cod_material_piso_fam']) ? $request['cod_material_piso_fam'] : null;
            $cod_material_domic_fam = isset($request['cod_material_domic_fam']) ? $request['cod_material_domic_fam'] : null;
            $cod_agua_canalizada_fam = isset($request['cod_agua_canalizada_fam']) ? $request['cod_agua_canalizada_fam'] : null;
            $cod_abaste_agua_domic_fam = isset($request['cod_abaste_agua_domic_fam']) ? $request['cod_abaste_agua_domic_fam'] : null;
            $cod_banheiro_domic_fam = isset($request['cod_banheiro_domic_fam']) ? $request['cod_banheiro_domic_fam'] : null;
            $cod_escoa_sanitario_domic_fam = isset($request['cod_escoa_sanitario_domic_fam']) ? $request['cod_escoa_sanitario_domic_fam'] : null;
            $cod_destino_lixo_domic_fam = isset($request['cod_destino_lixo_domic_fam']) ? $request['cod_destino_lixo_domic_fam'] : null;
            $cod_iluminacao_domic_fam = isset($request['cod_iluminacao_domic_fam']) ? $request['cod_iluminacao_domic_fam'] : null;
            $cod_calcamento_domic_fam = isset($request['cod_calcamento_domic_fam']) ? $request['cod_calcamento_domic_fam'] : null;
            $cod_familia_indigena_fam = isset($request['cod_familia_indigena_fam']) ? $request['cod_familia_indigena_fam'] : null;
            $cod_povo_indigena_fam = isset($request['cod_povo_indigena_fam']) ? $request['cod_povo_indigena_fam'] : null;
            $nom_povo_indigena_fam = isset($request['nom_povo_indigena_fam']) ? $request['nom_povo_indigena_fam'] : null;
            $cod_indigena_reside_fam = isset($request['cod_indigena_reside_fam']) ? $request['cod_indigena_reside_fam'] : null;
            $cod_reserva_indigena_fam = isset($request['cod_reserva_indigena_fam']) ? $request['cod_reserva_indigena_fam'] : null;
            $nom_reserva_indigena_fam = isset($request['nom_reserva_indigena_fam']) ? $request['nom_reserva_indigena_fam'] : null;
            $ind_familia_quilombola_fam = isset($request['ind_familia_quilombola_fam']) ? $request['ind_familia_quilombola_fam'] : null;
            $cod_comunidade_quilombola_fam = isset($request['cod_comunidade_quilombola_fam']) ? $request['cod_comunidade_quilombola_fam'] : null;
            $nom_comunidade_quilombola_fam = isset($request['nom_comunidade_quilombola_fam']) ? $request['nom_comunidade_quilombola_fam'] : null;
            $qtd_pessoas_domic_fam = isset($request['qtd_pessoas_domic_fam']) ? $request['qtd_pessoas_domic_fam'] : null;
            $qtd_familias_domic_fam = isset($request['qtd_familias_domic_fam']) ? $request['qtd_familias_domic_fam'] : null;
            $qtd_pessoa_inter_0_17_anos_fam = isset($request['qtd_pessoa_inter_0_17_anos_fam']) ? $request['qtd_pessoa_inter_0_17_anos_fam'] : null;
            $qtd_pessoa_inter_18_64_anos_fam = isset($request['qtd_pessoa_inter_18_64_anos_fam']) ? $request['qtd_pessoa_inter_18_64_anos_fam'] : null;
            $qtd_pessoa_inter_65_anos_fam = isset($request['qtd_pessoa_inter_65_anos_fam']) ? $request['qtd_pessoa_inter_65_anos_fam'] : null;
            $val_desp_energia_fam = isset($request['val_desp_energia_fam']) ? $request['val_desp_energia_fam'] : null;
            $val_desp_agua_esgoto_fam = isset($request['val_desp_agua_esgoto_fam']) ? $request['val_desp_agua_esgoto_fam'] : null;
            $val_desp_gas_fam = isset($request['val_desp_gas_fam']) ? $request['val_desp_gas_fam'] : null;
            $val_desp_alimentacao_fam = isset($request['val_desp_alimentacao_fam']) ? $request['val_desp_alimentacao_fam'] : null;
            $val_desp_transpor_fam = isset($request['val_desp_transpor_fam']) ? $request['val_desp_transpor_fam'] : null;
            $val_desp_aluguel_fam = isset($request['val_desp_aluguel_fam']) ? $request['val_desp_aluguel_fam'] : null;
            $val_desp_medicamentos_fam = isset($request['val_desp_medicamentos_fam']) ? $request['val_desp_medicamentos_fam'] : null;
            $nom_estab_assist_saude_fam = isset($request['nom_estab_assist_saude_fam']) ? $request['nom_estab_assist_saude_fam'] : null;
            $cod_eas_fam = isset($request['cod_eas_fam']) ? $request['cod_eas_fam'] : null;
            $nom_centro_assist_fam = isset($request['nom_centro_assist_fam']) ? $request['nom_centro_assist_fam'] : null;
            $cod_centro_assist_fam = isset($request['cod_centro_assist_fam']) ? $request['cod_centro_assist_fam'] : null;
            $num_ddd_contato_1_fam = isset($request['num_ddd_contato_1_fam']) ? $request['num_ddd_contato_1_fam'] : null;
            $num_tel_contato_1_fam = isset($request['num_tel_contato_1_fam']) ? $request['num_tel_contato_1_fam'] : null;
            $ic_tipo_contato_1_fam = isset($request['ic_tipo_contato_1_fam']) ? $request['ic_tipo_contato_1_fam'] : null;
            $ic_envo_sms_contato_1_fam = isset($request['ic_envo_sms_contato_1_fam']) ? $request['ic_envo_sms_contato_1_fam'] : null;
            $num_tel_contato_2_fam = isset($request['num_tel_contato_2_fam']) ? $request['num_tel_contato_2_fam'] : null;
            $num_ddd_contato_2_fam = isset($request['num_ddd_contato_2_fam']) ? $request['num_ddd_contato_2_fam'] : null;
            $ic_tipo_contato_2_fam = isset($request['ic_tipo_contato_2_fam']) ? $request['ic_tipo_contato_2_fam'] : null;
            $ic_envo_sms_contato_2_fam = isset($request['ic_envo_sms_contato_2_fam']) ? $request['ic_envo_sms_contato_2_fam'] : null;
            $cod_cta_energ_unid_consum_fam = isset($request['cod_cta_energ_unid_consum_fam']) ? $request['cod_cta_energ_unid_consum_fam'] : null;
            $ind_parc_mds_fam = isset($request['ind_parc_mds_fam']) ? $request['ind_parc_mds_fam'] : null;
            $ref_cad = isset($request['ref_cad']) ? $request['ref_cad'] : null;
            $ref_pbf = isset($request['ref_pbf']) ? $request['ref_pbf'] : null;
            $tel_1 = isset($request['tel_1']) ? $request['tel_1'] : null;
            $tel_2 = isset($request['tel_2']) ? $request['tel_2'] : null;
            $tipo_bairro_id = isset($request['tipo_bairro_id']) ? $request['tipo_bairro_id'] : null;
            $tipo_povoado_id = isset($request['tipo_povoado_id']) ? $request['tipo_povoado_id'] : null;
            $tipo_local_id = isset($request['tipo_local_id']) ? $request['tipo_local_id'] : null;
            $cnpj = isset($request['cnpj']) ? $request['cnpj'] : null;
            $insc_est = isset($request['insc_est']) ? $request['insc_est'] : null;
            $insc_mun = isset($request['insc_mun']) ? $request['insc_mun'] : null;
            $nom_estabelecimento = isset($request['nom_estabelecimento']) ? $request['nom_estabelecimento'] : null;
            $num_alvara = isset($request['num_alvara']) ? $request['num_alvara'] : null;
            $end = isset($request['end']) ? Str::upper(trim($request['end'])) : null;
            $end_num = isset($request['end_num']) ? $request['end_num'] : null;
            $cod_local_domic_fam = isset($request['cod_local_domic_fam']) ? $request['cod_local_domic_fam'] : null;

            //vem da função rotinaInclusaoMassa do Model Pessoa
            $rotinaAtualizacao = isset($request['rotinaAtualizacao']) ? $request['rotinaAtualizacao'] : null;

            if($rotinaAtualizacao != null){

                //verifica se já existe
                $domicilio = self::listar([
                    'cod_familiar_fam' => $cod_familiar_fam,
                ]);

                if($domicilio->count() > 0){

                    $id = $domicilio[0]['domicilio_id'];

                }

                unset($domicilio);

            }

            if($id == null){

                $id = self::create([
                    'cd_ibge' => $cd_ibge,
                    'cod_familiar_fam' => $cod_familiar_fam,
                    'dat_cadastramento_fam' => $dat_cadastramento_fam,
                    'dat_atual_fam' => $dat_atual_fam,
                    'cod_est_cadastral_fam' => $cod_est_cadastral_fam,
                    'cod_forma_coleta_fam' => $cod_forma_coleta_fam,
                    'dta_entrevista_fam' => $dta_entrevista_fam,
                    'nom_localidade_fam' => $nom_localidade_fam,
                    'nom_tip_logradouro_fam' => $nom_tip_logradouro_fam,
                    'nom_titulo_logradouro_fam' => $nom_titulo_logradouro_fam,
                    'nom_logradouro_fam' => $nom_logradouro_fam,
                    'num_logradouro_fam' => $num_logradouro_fam,
                    'des_complemento_fam' => $des_complemento_fam,
                    'des_complemento_adic_fam' => $des_complemento_adic_fam,
                    'num_cep_logradouro_fam' => $num_cep_logradouro_fam,
                    'cod_unidade_territorial_fam' => $cod_unidade_territorial_fam,
                    'nom_unidade_territorial_fam' => $nom_unidade_territorial_fam,
                    'txt_referencia_local_fam' => $txt_referencia_local_fam,
                    'nom_entrevistador_fam' => $nom_entrevistador_fam,
                    'num_cpf_entrevistador_fam' => $num_cpf_entrevistador_fam,
                    'vlr_renda_media_fam' => $vlr_renda_media_fam,
                    'fx_rfpc' => $fx_rfpc,
                    'vlr_renda_total_fam' => $vlr_renda_total_fam,
                    'marc_pbf' => $marc_pbf,
                    'qtde_meses_desat_cat' => $qtde_meses_desat_cat,
                    'cod_local_domic_fam' => $cod_local_domic_fam,
                    'cod_especie_domic_fam' => $cod_especie_domic_fam,
                    'qtd_comodos_domic_fam' => $qtd_comodos_domic_fam,
                    'qtd_comodos_dormitorio_fam' => $qtd_comodos_dormitorio_fam,
                    'cod_material_piso_fam' => $cod_material_piso_fam,
                    'cod_material_domic_fam' => $cod_material_domic_fam,
                    'cod_agua_canalizada_fam' => $cod_agua_canalizada_fam,
                    'cod_abaste_agua_domic_fam' => $cod_abaste_agua_domic_fam,
                    'cod_banheiro_domic_fam' => $cod_banheiro_domic_fam,
                    'cod_escoa_sanitario_domic_fam' => $cod_escoa_sanitario_domic_fam,
                    'cod_destino_lixo_domic_fam' => $cod_destino_lixo_domic_fam,
                    'cod_iluminacao_domic_fam' => $cod_iluminacao_domic_fam,
                    'cod_calcamento_domic_fam' => $cod_calcamento_domic_fam,
                    'cod_familia_indigena_fam' => $cod_familia_indigena_fam,
                    'cod_povo_indigena_fam' => $cod_povo_indigena_fam,
                    'nom_povo_indigena_fam' => $nom_povo_indigena_fam,
                    'cod_indigena_reside_fam' => $cod_indigena_reside_fam,
                    'cod_reserva_indigena_fam' => $cod_reserva_indigena_fam,
                    'nom_reserva_indigena_fam' => $nom_reserva_indigena_fam,
                    'ind_familia_quilombola_fam' => $ind_familia_quilombola_fam,
                    'cod_comunidade_quilombola_fam' => $cod_comunidade_quilombola_fam,
                    'nom_comunidade_quilombola_fam' => $nom_comunidade_quilombola_fam,
                    'qtd_pessoas_domic_fam' => $qtd_pessoas_domic_fam,
                    'qtd_familias_domic_fam' => $qtd_familias_domic_fam,
                    'qtd_pessoa_inter_0_17_anos_fam' => $qtd_pessoa_inter_0_17_anos_fam,
                    'qtd_pessoa_inter_18_64_anos_fam' => $qtd_pessoa_inter_18_64_anos_fam,
                    'qtd_pessoa_inter_65_anos_fam' => $qtd_pessoa_inter_65_anos_fam,
                    'val_desp_energia_fam' => $val_desp_energia_fam,
                    'val_desp_agua_esgoto_fam' => $val_desp_agua_esgoto_fam,
                    'val_desp_gas_fam' => $val_desp_gas_fam,
                    'val_desp_alimentacao_fam' => $val_desp_alimentacao_fam,
                    'val_desp_transpor_fam' => $val_desp_transpor_fam,
                    'val_desp_aluguel_fam' => $val_desp_aluguel_fam,
                    'val_desp_medicamentos_fam' => $val_desp_medicamentos_fam,
                    'nom_estab_assist_saude_fam' => $nom_estab_assist_saude_fam,
                    'cod_eas_fam' => $cod_eas_fam,
                    'nom_centro_assist_fam' => $nom_centro_assist_fam,
                    'cod_centro_assist_fam' => $cod_centro_assist_fam,
                    'num_ddd_contato_1_fam' => $num_ddd_contato_1_fam,
                    'num_tel_contato_1_fam' => $num_tel_contato_1_fam,
                    'ic_tipo_contato_1_fam' => $ic_tipo_contato_1_fam,
                    'ic_envo_sms_contato_1_fam' => $ic_envo_sms_contato_1_fam,
                    'num_tel_contato_2_fam' => $num_tel_contato_2_fam,
                    'num_ddd_contato_2_fam' => $num_ddd_contato_2_fam,
                    'ic_tipo_contato_2_fam' => $ic_tipo_contato_2_fam,
                    'ic_envo_sms_contato_2_fam' => $ic_envo_sms_contato_2_fam,
                    'cod_cta_energ_unid_consum_fam' => $cod_cta_energ_unid_consum_fam,
                    'ind_parc_mds_fam' => $ind_parc_mds_fam,
                    'ref_cad' => $ref_cad,
                    'ref_pbf' => $ref_pbf,
                    'tel_1' => $tel_1,
                    'tel_2' => $tel_2,
                    'tipo_bairro_id' => $tipo_bairro_id,
                    'tipo_povoado_id' => $tipo_povoado_id,
                    'tipo_local_id' => $tipo_local_id,
                    'cnpj' => $cnpj,
                    'insc_est' => $insc_est,
                    'insc_mun' => $insc_mun,
                    'nom_estabelecimento' => $nom_estabelecimento,
                    'num_alvara' => $num_alvara,
                    'end' => $end,
                    'end_num' => $end_num,
                ])->domicilio_id;
            }

            else{
                self::where('domicilio_id', $id)
                    ->update([
                        'cd_ibge' => $cd_ibge,
                        'cod_familiar_fam' => $cod_familiar_fam,
                        'dat_cadastramento_fam' => $dat_cadastramento_fam,
                        'dat_atual_fam' => $dat_atual_fam,
                        'cod_est_cadastral_fam' => $cod_est_cadastral_fam,
                        'cod_forma_coleta_fam' => $cod_forma_coleta_fam,
                        'dta_entrevista_fam' => $dta_entrevista_fam,
                        'nom_localidade_fam' => $nom_localidade_fam,
                        'nom_tip_logradouro_fam' => $nom_tip_logradouro_fam,
                        'nom_titulo_logradouro_fam' => $nom_titulo_logradouro_fam,
                        'nom_logradouro_fam' => $nom_logradouro_fam,
                        'num_logradouro_fam' => $num_logradouro_fam,
                        'des_complemento_fam' => $des_complemento_fam,
                        'des_complemento_adic_fam' => $des_complemento_adic_fam,
                        'num_cep_logradouro_fam' => $num_cep_logradouro_fam,
                        'cod_unidade_territorial_fam' => $cod_unidade_territorial_fam,
                        'nom_unidade_territorial_fam' => $nom_unidade_territorial_fam,
                        'txt_referencia_local_fam' => $txt_referencia_local_fam,
                        'nom_entrevistador_fam' => $nom_entrevistador_fam,
                        'num_cpf_entrevistador_fam' => $num_cpf_entrevistador_fam,
                        'vlr_renda_media_fam' => $vlr_renda_media_fam,
                        'fx_rfpc' => $fx_rfpc,
                        'vlr_renda_total_fam' => $vlr_renda_total_fam,
                        'marc_pbf' => $marc_pbf,
                        'qtde_meses_desat_cat' => $qtde_meses_desat_cat,
                        'cod_local_domic_fam' => $cod_local_domic_fam,
                        'cod_especie_domic_fam' => $cod_especie_domic_fam,
                        'qtd_comodos_domic_fam' => $qtd_comodos_domic_fam,
                        'qtd_comodos_dormitorio_fam' => $qtd_comodos_dormitorio_fam,
                        'cod_material_piso_fam' => $cod_material_piso_fam,
                        'cod_material_domic_fam' => $cod_material_domic_fam,
                        'cod_agua_canalizada_fam' => $cod_agua_canalizada_fam,
                        'cod_abaste_agua_domic_fam' => $cod_abaste_agua_domic_fam,
                        'cod_banheiro_domic_fam' => $cod_banheiro_domic_fam,
                        'cod_escoa_sanitario_domic_fam' => $cod_escoa_sanitario_domic_fam,
                        'cod_destino_lixo_domic_fam' => $cod_destino_lixo_domic_fam,
                        'cod_iluminacao_domic_fam' => $cod_iluminacao_domic_fam,
                        'cod_calcamento_domic_fam' => $cod_calcamento_domic_fam,
                        'cod_familia_indigena_fam' => $cod_familia_indigena_fam,
                        'cod_povo_indigena_fam' => $cod_povo_indigena_fam,
                        'nom_povo_indigena_fam' => $nom_povo_indigena_fam,
                        'cod_indigena_reside_fam' => $cod_indigena_reside_fam,
                        'cod_reserva_indigena_fam' => $cod_reserva_indigena_fam,
                        'nom_reserva_indigena_fam' => $nom_reserva_indigena_fam,
                        'ind_familia_quilombola_fam' => $ind_familia_quilombola_fam,
                        'cod_comunidade_quilombola_fam' => $cod_comunidade_quilombola_fam,
                        'nom_comunidade_quilombola_fam' => $nom_comunidade_quilombola_fam,
                        'qtd_pessoas_domic_fam' => $qtd_pessoas_domic_fam,
                        'qtd_familias_domic_fam' => $qtd_familias_domic_fam,
                        'qtd_pessoa_inter_0_17_anos_fam' => $qtd_pessoa_inter_0_17_anos_fam,
                        'qtd_pessoa_inter_18_64_anos_fam' => $qtd_pessoa_inter_18_64_anos_fam,
                        'qtd_pessoa_inter_65_anos_fam' => $qtd_pessoa_inter_65_anos_fam,
                        'val_desp_energia_fam' => $val_desp_energia_fam,
                        'val_desp_agua_esgoto_fam' => $val_desp_agua_esgoto_fam,
                        'val_desp_gas_fam' => $val_desp_gas_fam,
                        'val_desp_alimentacao_fam' => $val_desp_alimentacao_fam,
                        'val_desp_transpor_fam' => $val_desp_transpor_fam,
                        'val_desp_aluguel_fam' => $val_desp_aluguel_fam,
                        'val_desp_medicamentos_fam' => $val_desp_medicamentos_fam,
                        'nom_estab_assist_saude_fam' => $nom_estab_assist_saude_fam,
                        'cod_eas_fam' => $cod_eas_fam,
                        'nom_centro_assist_fam' => $nom_centro_assist_fam,
                        'cod_centro_assist_fam' => $cod_centro_assist_fam,
                        'num_ddd_contato_1_fam' => $num_ddd_contato_1_fam,
                        'num_tel_contato_1_fam' => $num_tel_contato_1_fam,
                        'ic_tipo_contato_1_fam' => $ic_tipo_contato_1_fam,
                        'ic_envo_sms_contato_1_fam' => $ic_envo_sms_contato_1_fam,
                        'num_tel_contato_2_fam' => $num_tel_contato_2_fam,
                        'num_ddd_contato_2_fam' => $num_ddd_contato_2_fam,
                        'ic_tipo_contato_2_fam' => $ic_tipo_contato_2_fam,
                        'ic_envo_sms_contato_2_fam' => $ic_envo_sms_contato_2_fam,
                        'cod_cta_energ_unid_consum_fam' => $cod_cta_energ_unid_consum_fam,
                        'ind_parc_mds_fam' => $ind_parc_mds_fam,
                        'ref_cad' => $ref_cad,
                        'ref_pbf' => $ref_pbf,
                        'tel_1' => $tel_1,
                        'tel_2' => $tel_2,
                        'tipo_bairro_id' => $tipo_bairro_id,
                        'tipo_povoado_id' => $tipo_povoado_id,
                        'tipo_local_id' => $tipo_local_id,
                        'cnpj' => $cnpj,
                        'insc_est' => $insc_est,
                        'insc_mun' => $insc_mun,
                        'nom_estabelecimento' => $nom_estabelecimento,
                        'num_alvara' => $num_alvara,
                        'end' => $end,
                        'end_num' => $end_num,

                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Domicílio Inserido/atualizado com sucesso!',
                'id' => $id,
            ];

        }catch(Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar domicílio' . $e->getMessage()
            ];
        }

        return $retorno;

    }

}

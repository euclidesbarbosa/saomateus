<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->bigInteger('pessoa_id')->autoIncrement();
            $table->bigInteger('domicilio_id')->nullable();
            $table->bigInteger('cod_familiar_fam')->nullable();
            $table->integer('cod_est_cadastral_memb')->nullable();
            $table->integer('ind_trabalho_infantil_pessoa')->nullable();
            $table->string('nom_pessoa',120)->nullable();
            $table->string('num_nis_pessoa_atual',20)->nullable();
            $table->string('nom_apelido_pessoa',50)->nullable();
            $table->integer('cod_sexo_pessoa')->nullable();
            $table->date('dta_nasc_pessoa')->nullable();
            $table->integer('cod_parentesco_rf_pessoa')->nullable();
            $table->integer('cod_raca_cor_pessoa')->nullable();
            $table->string('nom_completo_mae_pessoa',120)->nullable();
            $table->string('nom_completo_pai_pessoa',120)->nullable();
            $table->integer('cod_local_nascimento_pessoa')->nullable();
            $table->string('sig_uf_munic_nasc_pessoa',2)->nullable();
            $table->string('nom_ibge_munic_nasc_pessoa',100)->nullable();
            $table->bigInteger('cod_ibge_munic_nasc_pessoa')->nullable();
            $table->string('nom_pais_origem_pessoa',50)->nullable();
            $table->integer('cod_pais_origem_pessoa')->nullable();
            $table->integer('cod_certidao_registrada_pessoa')->nullable();
            $table->integer('fx_idade')->nullable();
            $table->integer('marc_pbf')->nullable();
            $table->integer('cod_certidao_civil_pessoa')->nullable();
            $table->string('cod_livro_termo_certid_pessoa',10)->nullable();
            $table->string('cod_folha_termo_certid_pessoa',10)->nullable();
            $table->string('cod_termo_matricula_certid_pessoa',50)->nullable();
            $table->string('nom_munic_certid_pessoa',100)->nullable();
            $table->bigInteger('cod_ibge_munic_certid_pessoa')->nullable();
            $table->string('cod_cartorio_certid_pessoa',50)->nullable();
            $table->string('num_cpf_pessoa',14)->nullable();
            $table->string('num_identidade_pessoa',50)->nullable();
            $table->string('cod_complemento_pessoa',30)->nullable();
            $table->date('dta_emissao_ident_pessoa')->nullable();
            $table->string('sig_uf_ident_pessoa',2)->nullable();
            $table->string('sig_orgao_emissor_pessoa',10)->nullable();
            $table->bigInteger('num_cart_trab_prev_soc_pessoa')->nullable();
            $table->integer('num_serie_trab_prev_soc_pessoa')->nullable();
            $table->date('dta_emissao_cart_trab_pessoa')->nullable();
            $table->string('sig_uf_cart_trab_pessoa',2)->nullable();
            $table->string('num_titulo_eleitor_pessoa',30)->nullable();
            $table->integer('num_zona_tit_eleitor_pessoa')->nullable();
            $table->integer('num_secao_tit_eleitor_pessoa')->nullable();
            $table->integer('cod_deficiencia_memb')->nullable();
            $table->integer('ind_def_cegueira_memb')->nullable();
            $table->integer('ind_def_baixa_visao_memb')->nullable();
            $table->integer('ind_def_surdez_profunda_memb')->nullable();
            $table->integer('ind_def_surdez_leve_memb')->nullable();
            $table->integer('ind_def_fisica_memb')->nullable();
            $table->integer('ind_def_mental_memb')->nullable();
            $table->integer('ind_def_sindrome_down_memb')->nullable();
            $table->integer('ind_def_transtorno_mental_memb')->nullable();
            $table->integer('ind_ajuda_nao_memb')->nullable();
            $table->integer('ind_ajuda_familia_memb')->nullable();
            $table->integer('ind_ajuda_especializado_memb')->nullable();
            $table->integer('ind_ajuda_vizinho_memb')->nullable();
            $table->integer('ind_ajuda_instituicao_memb')->nullable();
            $table->integer('ind_ajuda_outra_memb')->nullable();
            $table->integer('cod_sabe_ler_escrever_memb')->nullable();
            $table->integer('ind_frequenta_escola_memb')->nullable();
            $table->string('nom_escola_memb',120)->nullable();
            $table->integer('cod_escola_local_memb')->nullable();
            $table->string('sig_uf_escola_memb',2)->nullable();
            $table->string('nom_munic_escola_memb',120)->nullable();
            $table->bigInteger('cod_ibge_munic_escola_memb')->nullable();
            $table->bigInteger('cod_censo_inep_memb')->nullable();
            $table->integer('cod_curso_frequenta_memb')->nullable();
            $table->integer('cod_ano_serie_frequenta_memb')->nullable();
            $table->integer('cod_curso_frequentou_pessoa_memb')->nullable();
            $table->integer('cod_ano_serie_frequentou_memb')->nullable();
            $table->integer('cod_concluiu_frequentou_memb')->nullable();
            $table->integer('grau_instrucao')->nullable();
            $table->integer('cod_trabalhou_memb')->nullable();
            $table->integer('cod_afastado_trab_memb')->nullable();
            $table->integer('cod_agricultura_trab_memb')->nullable();
            $table->integer('cod_principal_trab_memb')->nullable();
            $table->integer('val_remuner_emprego_memb')->nullable();
            $table->integer('cod_trabalho_12_meses_memb')->nullable();
            $table->integer('qtd_meses_12_meses_memb')->nullable();
            $table->decimal('val_renda_bruta_12_meses_memb',18,2)->nullable();
            $table->decimal('val_renda_doacao_memb',18,2)->nullable();
            $table->decimal('val_renda_aposent_memb',18,2)->nullable();
            $table->decimal('val_renda_seguro_desemp_memb',18,2)->nullable();
            $table->decimal('val_renda_pensao_alimen_memb',18,2)->nullable();
            $table->decimal('val_outras_rendas_memb',18,2)->nullable();
            $table->integer('marc_sit_rua')->nullable();
            $table->integer('ind_dormir_rua_memb')->nullable();
            $table->integer('qtd_dormir_freq_rua_memb')->nullable();
            $table->integer('ind_dormir_albergue_memb')->nullable();
            $table->integer('qtd_dormir_freq_albergue_memb')->nullable();
            $table->integer('ind_dormir_dom_part_memb')->nullable();
            $table->integer('qtd_dormir_freq_dom_part_memb')->nullable();
            $table->integer('ind_outro_memb')->nullable();
            $table->integer('qtd_freq_outro_memb')->nullable();
            $table->integer('cod_tempo_rua_memb')->nullable();
            $table->integer('ind_motivo_perda_memb')->nullable();
            $table->integer('ind_motivo_ameaca_memb')->nullable();
            $table->integer('ind_motivo_probs_fam_memb')->nullable();
            $table->integer('ind_motivo_alcool_memb')->nullable();
            $table->integer('ind_motivo_desemprego_memb')->nullable();
            $table->integer('ind_motivo_trabalho_memb')->nullable();
            $table->integer('ind_motivo_saude_memb')->nullable();
            $table->integer('ind_motivo_pref_memb')->nullable();
            $table->integer('ind_motivo_outro_memb')->nullable();
            $table->integer('ind_motivo_nao_sabe_memb')->nullable();
            $table->integer('ind_motivo_nao_resp_memb')->nullable();
            $table->integer('cod_tempo_cidade_memb')->nullable();
            $table->integer('cod_vive_fam_rua_memb')->nullable();
            $table->integer('cod_contato_parente_memb')->nullable();
            $table->integer('ind_ativ_com_escola_memb')->nullable();
            $table->integer('ind_ativ_com_coop_memb')->nullable();
            $table->integer('ind_ativ_com_mov_soc_memb')->nullable();
            $table->integer('ind_ativ_com_nao_sabe_memb')->nullable();
            $table->integer('ind_ativ_com_nao_resp_memb')->nullable();
            $table->integer('ind_atend_cras_memb')->nullable();
            $table->integer('ind_atend_creas_memb')->nullable();
            $table->integer('ind_atend_centro_ref_rua_memb')->nullable();
            $table->integer('ind_atend_inst_gov_memb')->nullable();
            $table->integer('ind_atend_inst_nao_gov_memb')->nullable();
            $table->integer('ind_atend_hospital_geral_memb')->nullable();
            $table->integer('cod_cart_assinada_memb')->nullable();
            $table->integer('ind_dinh_const_memb')->nullable();
            $table->integer('ind_dinh_flanelhinha_memb')->nullable();
            $table->integer('ind_dinh_carregador_memb')->nullable();
            $table->integer('ind_dinh_catador_memb')->nullable();
            $table->integer('ind_dinh_servs_gerais_memb')->nullable();
            $table->integer('ind_dinh_pede_memb')->nullable();
            $table->integer('ind_dinh_vendas_memb')->nullable();
            $table->integer('ind_dinh_outro_memb')->nullable();
            $table->integer('ind_dinh_nao_resp_memb')->nullable();
            $table->integer('ind_atend_nenhum_memb')->nullable();
            $table->date('ref_cad')->nullable();
            $table->integer('ref_pbf')->nullable();
            $table->string('cpf',14)->nullable();
            $table->bigInteger('domicilio_id_1')->nullable();
            $table->timestamps();
            $table->index('domicilio_id', 'idx_pessoa_1');
            $table->index('cod_familiar_fam', 'idx_pessoa_2');
            $table->index('nom_pessoa', 'idx_pessoa_3');
            $table->index('num_cpf_pessoa', 'idx_pessoa_4');
            $table->index('dta_nasc_pessoa', 'idx_pessoa_5');
            $table->index('email', 'idx_pessoa_6');
            $table->index('domicilio_id_1', 'idx_pessoa_7');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa');
    }
}

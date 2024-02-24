<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicilioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilio', function (Blueprint $table) {
            $table->bigInteger('domicilio_id')->autoIncrement();
            $table->bigInteger('cd_ibge')->nullable();
            $table->bigInteger('cod_familiar_fam')->nullable();
            $table->date('dat_cadastramento_fam')->nullable();
            $table->date('dat_atual_fam')->nullable();
            $table->integer('cod_est_cadastral_fam')->nullable();
            $table->integer('cod_forma_coleta_fam')->nullable();
            $table->date('dta_entrevista_fam')->nullable();
            $table->string('nom_localidade_fam', 100)->nullable();
            $table->string('nom_tip_logradouro_fam',100)->nullable();
            $table->string('nom_titulo_logradouro_fam',100)->nullable();
            $table->string('nom_logradouro_fam',100)->nullable();
            $table->integer('num_logradouro_fam')->nullable();
            $table->string('des_complemento_fam',100)->nullable();
            $table->string('des_complemento_adic_fam',100)->nullable();
            $table->integer('num_cep_logradouro_fam')->nullable();
            $table->integer('cod_unidade_territorial_fam')->nullable();
            $table->string('nom_unidade_territorial_fam',100)->nullable();
            $table->string('txt_referencia_local_fam',500)->nullable();
            $table->string('nom_entrevistador_fam',100)->nullable();
            $table->string('num_cpf_entrevistador_fam',14)->nullable();
            $table->decimal('vlr_renda_media_fam',18,2)->nullable();
            $table->integer('fx_rfpc')->nullable();
            $table->decimal('vlr_renda_total_fam',18,2)->nullable();
            $table->integer('marc_pbf')->nullable();
            $table->integer('qtde_meses_desat_cat')->nullable();
            $table->integer('cod_local_domic_fam')->nullable();
            $table->integer('cod_especie_domic_fam')->nullable();
            $table->integer('qtd_comodos_domic_fam')->nullable();
            $table->integer('qtd_comodos_dormitorio_fam')->nullable();
            $table->integer('cod_material_piso_fam')->nullable();
            $table->integer('cod_material_domic_fam')->nullable();
            $table->integer('cod_agua_canalizada_fam')->nullable();
            $table->integer('cod_abaste_agua_domic_fam')->nullable();
            $table->integer('cod_banheiro_domic_fam')->nullable();
            $table->integer('cod_escoa_sanitario_domic_fam')->nullable();
            $table->integer('cod_destino_lixo_domic_fam')->nullable();
            $table->integer('cod_iluminacao_domic_fam')->nullable();
            $table->integer('cod_calcamento_domic_fam')->nullable();
            $table->integer('cod_familia_indigena_fam')->nullable();
            $table->integer('cod_povo_indigena_fam')->nullable();
            $table->integer('nom_povo_indigena_fam')->nullable();
            $table->integer('cod_indigena_reside_fam')->nullable();
            $table->integer('cod_reserva_indigena_fam')->nullable();
            $table->integer('nom_reserva_indigena_fam')->nullable();
            $table->integer('ind_familia_quilombola_fam')->nullable();
            $table->integer('cod_comunidade_quilombola_fam')->nullable();
            $table->string('nom_comunidade_quilombola_fam',100)->nullable();
            $table->integer('qtd_pessoas_domic_fam')->nullable();
            $table->integer('qtd_familias_domic_fam')->nullable();
            $table->integer('qtd_pessoa_inter_0_17_anos_fam')->nullable();
            $table->integer('qtd_pessoa_inter_18_64_anos_fam')->nullable();
            $table->integer('qtd_pessoa_inter_65_anos_fam')->nullable();
            $table->decimal('val_desp_energia_fam',18,2)->nullable();
            $table->decimal('val_desp_agua_esgoto_fam',18,2)->nullable();
            $table->decimal('val_desp_gas_fam',18,2)->nullable();
            $table->decimal('val_desp_alimentacao_fam',18,2)->nullable();
            $table->decimal('val_desp_transpor_fam',18,2)->nullable();
            $table->decimal('val_desp_aluguel_fam',18,2)->nullable();
            $table->decimal('val_desp_medicamentos_fam',18,2)->nullable();
            $table->string('nom_estab_assist_saude_fam',100)->nullable();
            $table->bigInteger('cod_eas_fam')->nullable();
            $table->string('nom_centro_assist_fam',120)->nullable();
            $table->bigInteger('cod_centro_assist_fam')->nullable();
            $table->string('num_ddd_contato_1_fam',10)->nullable();
            $table->string('num_tel_contato_1_fam',20)->nullable();
            $table->string('ic_tipo_contato_1_fam',10)->nullable();
            $table->string('ic_envo_sms_contato_1_fam',10)->nullable();
            $table->string('num_tel_contato_2_fam',20)->nullable();
            $table->string('num_ddd_contato_2_fam',10)->nullable();
            $table->string('ic_tipo_contato_2_fam', 10)->nullable();
            $table->string('ic_envo_sms_contato_2_fam',10)->nullable();
            $table->string('cod_cta_energ_unid_consum_fam',20)->nullable();
            $table->integer('ind_parc_mds_fam')->nullable();
            $table->date('ref_cad')->nullable();
            $table->integer('ref_pbf')->nullable();
            $table->string('tel_1',15)->nullable();
            $table->string('tel_2',15)->nullable();
            $table->integer('tipo_bairro_id')->nullable();
            $table->integer('tipo_povoado_id')->nullable();
            $table->integer('tipo_local_id')->nullable();
            $table->string('cnpj', 18)->nullable();
            $table->string('insc_est', 20)->nullable();
            $table->string('insc_mun', 20)->nullable();
            $table->string('nom_estabelecimento', 100)->nullable();
            $table->string('num_alvara', 30)->nullable();
            $table->timestamps();
            $table->index('cd_ibge', 'idx_domicilio_1');
            $table->index('cod_familiar_fam', 'idx_domicilio_2');
            $table->index('dat_atual_fam', 'idx_domicilio_3');
            $table->index('tipo_bairro_id', 'idx_domicilio_4');
            $table->index('tipo_povoado_id', 'idx_domicilio_5');
            $table->index('tipo_local_id', 'idx_domicilio_6');
            $table->index('cnpj', 'idx_domicilio_7');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domicilio');
    }
}

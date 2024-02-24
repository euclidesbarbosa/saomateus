<template>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a :class="(tab1 ? 'nav-link active' : 'nav-link')" id="principal-tab" data-toggle="tab" href="#home" role="tab"
               aria-controls="principal" aria-selected="{{tab1}}" @click="getTab(1)">Cadastro Inicial</a>
        </li>
        <li class="nav-item">
            <a :class="(tab2 ? 'nav-link active' : 'nav-link')" id="pesquisa-tab" data-toggle="tab" href="#home" role="tab"
               aria-controls="pesquisa" aria-selected="{{tab2}}" @click="getTab(2)">Acompanhamento</a>
        </li>
        <li class="nav-item">
            <a :class="(tab3 ? 'nav-link active' : 'nav-link')" id="unico-tab" data-toggle="tab" href="#profile" role="tab"
               aria-controls="suplementar" aria-selected="{{tab3}}" @click="getTab(3)">Cadastro Único</a>
        </li>
        <li class="nav-item">
            <a :class="(tab4 ? 'nav-link active' : 'nav-link')" id="suplementar-tab" data-toggle="tab" href="#profile" role="tab"
               aria-controls="suplementar" aria-selected="{{tab4}}" @click="getTab(4)">Suplementar</a>
        </li>
        <li class="nav-item" >
            <span class="nav-link">Total de Cadastros:&nbsp;{{new Intl.NumberFormat('pt-BR', { maximumSignificantDigits: 10 }).format(resumo.tPessoas)}}</span>
<!--            <a :class="(tab4 ? 'nav-link active' : 'nav-link')" id="informacoes-tab" data-toggle="tab" href="#profile" role="tab"-->
<!--               aria-controls="informacoes" aria-selected="{{tab4}}" ></a>-->
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div v-show="tab1" ref="principal"
             :class="(tab1 ? 'tab-pane fade show active' : '')"
             role="tabpanel" aria-labelledby="principal-tab">
            <div class="container" style="border-radius: 0.5px; border-left: solid 0.5px #cccccc;border-right: solid 0.5px #cccccc; border-bottom: solid 0.5px #cccccc">
                <Atendimento :atendimento-arr="atendimentoArr"></Atendimento>
            </div>
        </div>
        <div v-show="tab2" ref="principal"
             :class="(tab2 ? 'tab-pane fade show active' : '')"
             role="tabpanel" aria-labelledby="principal-tab">
            <div class="container" style="border-radius: 0.5px; border-left: solid 0.5px #cccccc;border-right: solid 0.5px #cccccc; border-bottom: solid 0.5px #cccccc">
                <AtendimentoPesquisa :tipo-orgao="22"></AtendimentoPesquisa>
            </div>
        </div>
        <div v-show="tab3" ref="principal"
             :class="(tab3 ? 'tab-pane fade show active' : '')"
             role="tabpanel" aria-labelledby="principal-tab">
            <div class="container" style="border-radius: 0.5px; border-left: solid 0.5px #cccccc;border-right: solid 0.5px #cccccc; border-bottom: solid 0.5px #cccccc">
                <Domicilio :domicilio-arr="atendimentoArr.pessoa.domicilio"></Domicilio>
            </div>
        </div>
        <div v-show="tab4" ref="principal"
             :class="(tab4 ? 'tab-pane fade show active' : '')"
             role="tabpanel" aria-labelledby="suplementar-tab">
            <div class="container" style="border-radius: 0.5px; border-left: solid 0.5px #cccccc;border-right: solid 0.5px #cccccc; border-bottom: solid 0.5px #cccccc">
                <Suplementar></Suplementar>
            </div>
        </div>
        <div v-show="tab9" class="tab-pane fade"
             :class="(tab3 ? 'show active' : '')"
             ref="suplementar" role="tabpanel" aria-labelledby="suplementar-tab">
            <div class="container" style="border-left: solid 0.5px #cccccc;border-right: solid 0.5px #cccccc; border-bottom: solid 0.5px #cccccc">
                <Domicilio :domicilio-arr="domicilioArr"></Domicilio>
            </div>
            <br/>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Domicilio from "./Domicilio";
    import Cep from "./Cep";
    import AtendimentoPesquisa from "./AtendimentoPesquisa";
    import Suplementar from "./Suplementar";
    import Atendimento from "./Atendimento";
    import PessoaSituacao from "./PessoaSituacao";

    export default {
        name: "Unico",
        components: {Atendimento, Suplementar, Domicilio, Cep, AtendimentoPesquisa, PessoaSituacao},
        data(){
            return{

                atendimentoArr:{
                    pessoa_id: null,
                    atendimento_id: null,
                    tipo_orgao_id: null,
                    tipo_profissao_id: null,
                    tipo_assunto_id: null,
                    atendimento_situacao: null,
                    atendimento_descricao: null,
                    atendimento_receber_inf_pref: 1,
                    atendimento_termo: 1,
                    pessoa: {
                        pessoa_id: null,
                        domicilio_id: null,
                        cod_familiar_fam: null,
                        cod_est_cadastral_memb: null,
                        ind_trabalho_infantil_pessoa: null,
                        nom_pessoa: null,
                        num_nis_pessoa_atual: null,
                        nom_apelido_pessoa: null,
                        cod_sexo_pessoa: null,
                        dta_nasc_pessoa: null,
                        cod_parentesco_rf_pessoa: null,
                        cod_raca_cor_pessoa: null,
                        nom_completo_mae_pessoa: null,
                        nom_completo_pai_pessoa: null,
                        cod_local_nascimento_pessoa: null,
                        sig_uf_munic_nasc_pessoa: null,
                        nom_ibge_munic_nasc_pessoa: null,
                        cod_ibge_munic_nasc_pessoa: null,
                        nom_pais_origem_pessoa: null,
                        cod_pais_origem_pessoa: null,
                        cod_certidao_registrada_pessoa: null,
                        fx_idade: null,
                        marc_pbf: null,
                        cod_certidao_civil_pessoa: null,
                        cod_livro_termo_certid_pessoa: null,
                        cod_folha_termo_certid_pessoa: null,
                        cod_termo_matricula_certid_pessoa: null,
                        nom_munic_certid_pessoa: null,
                        cod_ibge_munic_certid_pessoa: null,
                        cod_cartorio_certid_pessoa: null,
                        num_cpf_pessoa: null,
                        num_identidade_pessoa: null,
                        cod_complemento_pessoa: null,
                        dta_emissao_ident_pessoa: null,
                        sig_uf_ident_pessoa: null,
                        sig_orgao_emissor_pessoa: null,
                        num_cart_trab_prev_soc_pessoa: null,
                        num_serie_trab_prev_soc_pessoa: null,
                        dta_emissao_cart_trab_pessoa: null,
                        sig_uf_cart_trab_pessoa: null,
                        num_titulo_eleitor_pessoa: null,
                        num_zona_tit_eleitor_pessoa: null,
                        num_secao_tit_eleitor_pessoa: null,
                        cod_deficiencia_memb: null,
                        ind_def_cegueira_memb: null,
                        ind_def_baixa_visao_memb: null,
                        ind_def_surdez_profunda_memb: null,
                        ind_def_surdez_leve_memb: null,
                        ind_def_fisica_memb: null,
                        ind_def_mental_memb: null,
                        ind_def_sindrome_down_memb: null,
                        ind_def_transtorno_mental_memb: null,
                        ind_ajuda_nao_memb: null,
                        ind_ajuda_familia_memb: null,
                        ind_ajuda_especializado_memb: null,
                        ind_ajuda_vizinho_memb: null,
                        ind_ajuda_instituicao_memb: null,
                        ind_ajuda_outra_memb: null,
                        cod_sabe_ler_escrever_memb: null,
                        ind_frequenta_escola_memb: null,
                        nom_escola_memb: null,
                        cod_escola_local_memb: null,
                        sig_uf_escola_memb: null,
                        nom_munic_escola_memb: null,
                        cod_ibge_munic_escola_memb: null,
                        cod_censo_inep_memb: null,
                        cod_curso_frequenta_memb: null,
                        cod_ano_serie_frequenta_memb: null,
                        cod_curso_frequentou_pessoa_memb: null,
                        cod_ano_serie_frequentou_memb: null,
                        cod_concluiu_frequentou_memb: null,
                        grau_instrucao: null,
                        cod_trabalhou_memb: null,
                        cod_afastado_trab_memb: null,
                        cod_agricultura_trab_memb: null,
                        cod_principal_trab_memb: null,
                        val_remuner_emprego_memb: null,
                        cod_trabalho_12_meses_memb: null,
                        qtd_meses_12_meses_memb: null,
                        val_renda_bruta_12_meses_memb: null,
                        val_renda_doacao_memb: null,
                        val_renda_aposent_memb: null,
                        val_renda_seguro_desemp_memb: null,
                        val_renda_pensao_alimen_memb: null,
                        val_outras_rendas_memb: null,
                        marc_sit_rua: null,
                        ind_dormir_rua_memb: null,
                        qtd_dormir_freq_rua_memb: null,
                        ind_dormir_albergue_memb: null,
                        qtd_dormir_freq_albergue_memb: null,
                        ind_dormir_dom_part_memb: null,
                        qtd_dormir_freq_dom_part_memb: null,
                        ind_outro_memb: null,
                        qtd_freq_outro_memb: null,
                        cod_tempo_rua_memb: null,
                        ind_motivo_perda_memb: null,
                        ind_motivo_ameaca_memb: null,
                        ind_motivo_probs_fam_memb: null,
                        ind_motivo_alcool_memb: null,
                        ind_motivo_desemprego_memb: null,
                        ind_motivo_trabalho_memb: null,
                        ind_motivo_saude_memb: null,
                        ind_motivo_pref_memb: null,
                        ind_motivo_outro_memb: null,
                        ind_motivo_nao_sabe_memb: null,
                        ind_motivo_nao_resp_memb: null,
                        cod_tempo_cidade_memb: null,
                        cod_vive_fam_rua_memb: null,
                        cod_contato_parente_memb: null,
                        ind_ativ_com_escola_memb: null,
                        ind_ativ_com_coop_memb: null,
                        ind_ativ_com_mov_soc_memb: null,
                        ind_ativ_com_nao_sabe_memb: null,
                        ind_ativ_com_nao_resp_memb: null,
                        ind_atend_cras_memb: null,
                        ind_atend_creas_memb: null,
                        ind_atend_centro_ref_rua_memb: null,
                        ind_atend_inst_gov_memb: null,
                        ind_atend_inst_nao_gov_memb: null,
                        ind_atend_hospital_geral_memb: null,
                        cod_cart_assinada_memb: null,
                        ind_dinh_const_memb: null,
                        ind_dinh_flanelhinha_memb: null,
                        ind_dinh_carregador_memb: null,
                        ind_dinh_catador_memb: null,
                        ind_dinh_servs_gerais_memb: null,
                        ind_dinh_pede_memb: null,
                        ind_dinh_vendas_memb: null,
                        ind_dinh_outro_memb: null,
                        ind_dinh_nao_resp_memb: null,
                        ind_atend_nenhum_memb: null,
                        ref_cad: null,
                        ref_pbf: null,
                        cpf: null,
                        domicilio: {
                            domicilio_id: null,
                            cd_ibge: null,
                            cod_familiar_fam: null,
                            dat_cadastramento_fam: null,
                            dat_atual_fam: null,
                            cod_est_cadastral_fam: null,
                            cod_forma_coleta_fam: null,
                            dta_entrevista_fam: null,
                            nom_localidade_fam: null,
                            nom_tip_logradouro_fam: null,
                            nom_titulo_logradouro_fam: null,
                            nom_logradouro_fam: null,
                            num_logradouro_fam: null,
                            des_complemento_fam: null,
                            des_complemento_adic_fam: null,
                            num_cep_logradouro_fam: null,
                            cod_unidade_territorial_fam: null,
                            nom_unidade_territorial_fam: null,
                            txt_referencia_local_fam: null,
                            nom_entrevistador_fam: null,
                            num_cpf_entrevistador_fam: null,
                            vlr_renda_media_fam: null,
                            fx_rfpc: null,
                            vlr_renda_total_fam: null,
                            marc_pbf: null,
                            qtde_meses_desat_cat: null,
                            cod_local_domic_fam: null,
                            cod_especie_domic_fam: null,
                            qtd_comodos_domic_fam: null,
                            qtd_comodos_dormitorio_fam: null,
                            cod_material_piso_fam: null,
                            cod_material_domic_fam: null,
                            cod_agua_canalizada_fam: null,
                            cod_abaste_agua_domic_fam: null,
                            cod_banheiro_domic_fam: null,
                            cod_escoa_sanitario_domic_fam: null,
                            cod_destino_lixo_domic_fam: null,
                            cod_iluminacao_domic_fam: null,
                            cod_calcamento_domic_fam: null,
                            cod_familia_indigena_fam: null,
                            cod_povo_indigena_fam: null,
                            nom_povo_indigena_fam: null,
                            cod_indigena_reside_fam: null,
                            cod_reserva_indigena_fam: null,
                            nom_reserva_indigena_fam: null,
                            ind_familia_quilombola_fam: null,
                            cod_comunidade_quilombola_fam: null,
                            nom_comunidade_quilombola_fam: null,
                            qtd_pessoas_domic_fam: null,
                            qtd_familias_domic_fam: null,
                            qtd_pessoa_inter_0_17_anos_fam: null,
                            qtd_pessoa_inter_18_64_anos_fam: null,
                            qtd_pessoa_inter_65_anos_fam: null,
                            val_desp_energia_fam: null,
                            val_desp_agua_esgoto_fam: null,
                            val_desp_gas_fam: null,
                            val_desp_alimentacao_fam: null,
                            val_desp_transpor_fam: null,
                            val_desp_aluguel_fam: null,
                            val_desp_medicamentos_fam: null,
                            nom_estab_assist_saude_fam: null,
                            cod_eas_fam: null,
                            nom_centro_assist_fam: null,
                            cod_centro_assist_fam: null,
                            num_ddd_contato_1_fam: null,
                            num_tel_contato_1_fam: null,
                            ic_tipo_contato_1_fam: null,
                            ic_envo_sms_contato_1_fam: null,
                            num_tel_contato_2_fam: null,
                            num_ddd_contato_2_fam: null,
                            ic_tipo_contato_2_fam: null,
                            ic_envo_sms_contato_2_fam: null,
                            cod_cta_energ_unid_consum_fam: null,
                            ind_parc_mds_fam: null,
                            ref_cad: null,
                            ref_pbf: null,
                            cidade: {
                                cidade_capital: null,
                                cidade_cnpj: null,
                                cidade_end: null,
                                cidade_end_cep: null,
                                cidade_end_comp: null,
                                cidade_end_num: null,
                                cidade_ibge: null,
                                cidade_id: null,
                                cidade_nome: null,
                                cidade_sta: null,
                                uf_sigla: null,
                            },
                            pessoa: [{
                                pessoa_id: null,
                                domicilio_id: null,
                                cod_familiar_fam: null,
                                cod_est_cadastral_memb: null,
                                ind_trabalho_infantil_pessoa: null,
                                nom_pessoa: null,
                                num_nis_pessoa_atual: null,
                                nom_apelido_pessoa: null,
                                cod_sexo_pessoa: null,
                                dta_nasc_pessoa: null,
                                cod_parentesco_rf_pessoa: null,
                                cod_raca_cor_pessoa: null,
                                nom_completo_mae_pessoa: null,
                                nom_completo_pai_pessoa: null,
                                cod_local_nascimento_pessoa: null,
                                sig_uf_munic_nasc_pessoa: null,
                                nom_ibge_munic_nasc_pessoa: null,
                                cod_ibge_munic_nasc_pessoa: null,
                                nom_pais_origem_pessoa: null,
                                cod_pais_origem_pessoa: null,
                                cod_certidao_registrada_pessoa: null,
                                fx_idade: null,
                                marc_pbf: null,
                                cod_certidao_civil_pessoa: null,
                                cod_livro_termo_certid_pessoa: null,
                                cod_folha_termo_certid_pessoa: null,
                                cod_termo_matricula_certid_pessoa: null,
                                nom_munic_certid_pessoa: null,
                                cod_ibge_munic_certid_pessoa: null,
                                cod_cartorio_certid_pessoa: null,
                                num_cpf_pessoa: null,
                                num_identidade_pessoa: null,
                                cod_complemento_pessoa: null,
                                dta_emissao_ident_pessoa: null,
                                sig_uf_ident_pessoa: null,
                                sig_orgao_emissor_pessoa: null,
                                num_cart_trab_prev_soc_pessoa: null,
                                num_serie_trab_prev_soc_pessoa: null,
                                dta_emissao_cart_trab_pessoa: null,
                                sig_uf_cart_trab_pessoa: null,
                                num_titulo_eleitor_pessoa: null,
                                num_zona_tit_eleitor_pessoa: null,
                                num_secao_tit_eleitor_pessoa: null,
                                cod_deficiencia_memb: null,
                                ind_def_cegueira_memb: null,
                                ind_def_baixa_visao_memb: null,
                                ind_def_surdez_profunda_memb: null,
                                ind_def_surdez_leve_memb: null,
                                ind_def_fisica_memb: null,
                                ind_def_mental_memb: null,
                                ind_def_sindrome_down_memb: null,
                                ind_def_transtorno_mental_memb: null,
                                ind_ajuda_nao_memb: null,
                                ind_ajuda_familia_memb: null,
                                ind_ajuda_especializado_memb: null,
                                ind_ajuda_vizinho_memb: null,
                                ind_ajuda_instituicao_memb: null,
                                ind_ajuda_outra_memb: null,
                                cod_sabe_ler_escrever_memb: null,
                                ind_frequenta_escola_memb: null,
                                nom_escola_memb: null,
                                cod_escola_local_memb: null,
                                sig_uf_escola_memb: null,
                                nom_munic_escola_memb: null,
                                cod_ibge_munic_escola_memb: null,
                                cod_censo_inep_memb: null,
                                cod_curso_frequenta_memb: null,
                                cod_ano_serie_frequenta_memb: null,
                                cod_curso_frequentou_pessoa_memb: null,
                                cod_ano_serie_frequentou_memb: null,
                                cod_concluiu_frequentou_memb: null,
                                grau_instrucao: null,
                                cod_trabalhou_memb: null,
                                cod_afastado_trab_memb: null,
                                cod_agricultura_trab_memb: null,
                                cod_principal_trab_memb: null,
                                val_remuner_emprego_memb: null,
                                cod_trabalho_12_meses_memb: null,
                                qtd_meses_12_meses_memb: null,
                                val_renda_bruta_12_meses_memb: null,
                                val_renda_doacao_memb: null,
                                val_renda_aposent_memb: null,
                                val_renda_seguro_desemp_memb: null,
                                val_renda_pensao_alimen_memb: null,
                                val_outras_rendas_memb: null,
                                marc_sit_rua: null,
                                ind_dormir_rua_memb: null,
                                qtd_dormir_freq_rua_memb: null,
                                ind_dormir_albergue_memb: null,
                                qtd_dormir_freq_albergue_memb: null,
                                ind_dormir_dom_part_memb: null,
                                qtd_dormir_freq_dom_part_memb: null,
                                ind_outro_memb: null,
                                qtd_freq_outro_memb: null,
                                cod_tempo_rua_memb: null,
                                ind_motivo_perda_memb: null,
                                ind_motivo_ameaca_memb: null,
                                ind_motivo_probs_fam_memb: null,
                                ind_motivo_alcool_memb: null,
                                ind_motivo_desemprego_memb: null,
                                ind_motivo_trabalho_memb: null,
                                ind_motivo_saude_memb: null,
                                ind_motivo_pref_memb: null,
                                ind_motivo_outro_memb: null,
                                ind_motivo_nao_sabe_memb: null,
                                ind_motivo_nao_resp_memb: null,
                                cod_tempo_cidade_memb: null,
                                cod_vive_fam_rua_memb: null,
                                cod_contato_parente_memb: null,
                                ind_ativ_com_escola_memb: null,
                                ind_ativ_com_coop_memb: null,
                                ind_ativ_com_mov_soc_memb: null,
                                ind_ativ_com_nao_sabe_memb: null,
                                ind_ativ_com_nao_resp_memb: null,
                                ind_atend_cras_memb: null,
                                ind_atend_creas_memb: null,
                                ind_atend_centro_ref_rua_memb: null,
                                ind_atend_inst_gov_memb: null,
                                ind_atend_inst_nao_gov_memb: null,
                                ind_atend_hospital_geral_memb: null,
                                cod_cart_assinada_memb: null,
                                ind_dinh_const_memb: null,
                                ind_dinh_flanelhinha_memb: null,
                                ind_dinh_carregador_memb: null,
                                ind_dinh_catador_memb: null,
                                ind_dinh_servs_gerais_memb: null,
                                ind_dinh_pede_memb: null,
                                ind_dinh_vendas_memb: null,
                                ind_dinh_outro_memb: null,
                                ind_dinh_nao_resp_memb: null,
                                ind_atend_nenhum_memb: null,
                                ref_cad: null,
                                ref_pbf: null,
                                ordem: 1,
                                email: null,
                            }]

                        },
                        pessoaSituacao:{
                            pessoa_id: null,
                            pessoa_situacao_data: null,
                            pessoa_situacao_desabrigada: 2,
                            pessoa_situacao_desempregada: null,
                            pessoa_situacao_estudando: null,
                            pessoa_situacao_obto: 2,
                            pessoa_situacao_filho: null,
                            pessoa_situacao_rec_bolsa_familia: null,
                            user_id: null,
                        },
                    },
                },

                resumo: [],

                tab1: true,
                tab2: false,
                tab3: false,
                tab4: false,
                tab9: false,

                atendimento: [],
                atendimento_id: null,
                tipo_assunto_id: null,
                tipo_orgao_id: null,
                tipo_profissao_id: null,
                atendimento_situacao: 1,
                atendimento_descricao: null,
                atendimento_receber_inf_pref: 1,
                atendimento_termo: 1,

                pessoa: {
                    pessoa_id: null,
                    cpf: null,
                    num_cpf_pessoa: null,
                    nom_pessoa: null,
                    nom_apelido_pessoa: null,
                    cod_sexo_pessoa: null,
                    email: null,
                    dta_nasc_pessoa: null,
                    domicilio:{
                        tel_1: null,
                        num_tel_contato_1_fam: null,
                        num_cep_logradouro_fam: null,
                        nom_logradouro_fam: null,
                        nom_logradouro_fam_pov: null,
                    },
                    pessoaSituacao:{
                        pessoa_id: null,
                        pessoa_situacao_data: null,
                        pessoa_situacao_desabrigada: 2,
                        pessoa_situacao_desempregada: 2,
                        pessoa_situacao_estudando: 2,
                        pessoa_situacao_obto: 2,
                        pessoa_situacao_rec_bolsa_familia: 2,
                        user_id: null,
                    },
                },
                pessoas: [],
                tipoProfissao: [],
                tipoAssunto: [],

                tipo_vila_id: null,

                idade: null,

                logradouroArr:{
                    cep: null,
                    compl: null,
                    cidade: null,
                    bairro: null,
                    ibge: null,

                    tipo_povoado_id: null,
                    tipo_bairro_id: null,
                    nom_localidade_fam: null,
                    nom_localidade_fam_pov: null,
                    nom_logradouro_fam: null,
                    nom_logradouro_fam_pov: null,
                    nom_tipo_logradouro_fam: null,
                },
                domicilioArr:{
                    cd_ibge: null,
                    cod_familiar_fam: null,
                    dat_cadastramento_fam: null,
                    dat_atual_fam: null,
                    cod_est_cadastral_fam: null,
                    cod_forma_coleta_fam: null,
                    dta_entrevista_fam: null,
                    nom_localidade_fam: null,
                    nom_tip_logradouro_fam: null,
                    nom_titulo_logradouro_fam: null,
                    nom_logradouro_fam: null,
                    num_logradouro_fam: null,
                    des_complemento_fam: null,
                    des_complemento_adic_fam: null,
                    num_cep_logradouro_fam: null,
                    cod_unidade_territorial_fam: null,
                    nom_unidade_territorial_fam: null,
                    txt_referencia_local_fam: null,
                    nom_entrevistador_fam: null,
                    num_cpf_entrevistador_fam: null,
                    vlr_renda_media_fam: null,
                    fx_rfpc: null,
                    vlr_renda_total_fam: null,
                    marc_pbf: null,
                    qtde_meses_desat_cat: null,
                    cod_local_domic_fam: null,
                    cod_especie_domic_fam: null,
                    qtd_comodos_domic_fam: null,
                    qtd_comodos_dormitorio_fam: null,
                    cod_material_piso_fam: null,
                    cod_material_domic_fam: null,
                    cod_agua_canalizada_fam: null,
                    cod_abaste_agua_domic_fam: null,
                    cod_banheiro_domic_fam: null,
                    cod_escoa_sanitario_domic_fam: null,
                    cod_destino_lixo_domic_fam: null,
                    cod_iluminacao_domic_fam: null,
                    cod_calcamento_domic_fam: null,
                    cod_familia_indigena_fam: null,
                    cod_povo_indigena_fam: null,
                    nom_povo_indigena_fam: null,
                    cod_indigena_reside_fam: null,
                    cod_reserva_indigena_fam: null,
                    nom_reserva_indigena_fam: null,
                    ind_familia_quilombola_fam: null,
                    cod_comunidade_quilombola_fam: null,
                    nom_comunidade_quilombola_fam: null,
                    qtd_pessoas_domic_fam: null,
                    qtd_familias_domic_fam: null,
                    qtd_pessoa_inter_0_17_anos_fam: null,
                    qtd_pessoa_inter_18_64_anos_fam: null,
                    qtd_pessoa_inter_65_anos_fam: null,
                    val_desp_energia_fam: null,
                    val_desp_agua_esgoto_fam: null,
                    val_desp_gas_fam: null,
                    val_desp_alimentacao_fam: null,
                    val_desp_transpor_fam: null,
                    val_desp_aluguel_fam: null,
                    val_desp_medicamentos_fam: null,
                    nom_estab_assist_saude_fam: null,
                    cod_eas_fam: null,
                    nom_centro_assist_fam: null,
                    cod_centro_assist_fam: null,
                    num_ddd_contato_1_fam: null,
                    num_tel_contato_1_fam: null,
                    ic_tipo_contato_1_fam: null,
                    ic_envo_sms_contato_1_fam: null,
                    num_tel_contato_2_fam: null,
                    num_ddd_contato_2_fam: null,
                    ic_tipo_contato_2_fam: null,
                    ic_envo_sms_contato_2_fam: null,
                    cod_cta_energ_unid_consum_fam: null,
                    ind_parc_mds_fam: null,
                    ref_cad: null,
                    ref_pbf: null,
                    pessoa:[{
                        pessoa_id : null,
                        domicilio_id : null,
                        cod_familiar_fam : null,
                        cod_est_cadastral_memb : null,
                        ind_trabalho_infantil_pessoa : null,
                        nom_pessoa : null,
                        num_nis_pessoa_atual : null,
                        nom_apelido_pessoa : null,
                        cod_sexo_pessoa : null,
                        dta_nasc_pessoa : null,
                        cod_parentesco_rf_pessoa : null,
                        cod_raca_cor_pessoa : null,
                        nom_completo_mae_pessoa : null,
                        nom_completo_pai_pessoa : null,
                        cod_local_nascimento_pessoa : null,
                        sig_uf_munic_nasc_pessoa : null,
                        nom_ibge_munic_nasc_pessoa : null,
                        cod_ibge_munic_nasc_pessoa : null,
                        nom_pais_origem_pessoa : null,
                        cod_pais_origem_pessoa : null,
                        cod_certidao_registrada_pessoa : null,
                        fx_idade : null,
                        marc_pbf : null,
                        cod_certidao_civil_pessoa : null,
                        cod_livro_termo_certid_pessoa : null,
                        cod_folha_termo_certid_pessoa : null,
                        cod_termo_matricula_certid_pessoa : null,
                        nom_munic_certid_pessoa : null,
                        cod_ibge_munic_certid_pessoa : null,
                        cod_cartorio_certid_pessoa : null,
                        num_cpf_pessoa : null,
                        num_identidade_pessoa : null,
                        cod_complemento_pessoa : null,
                        dta_emissao_ident_pessoa : null,
                        sig_uf_ident_pessoa : null,
                        sig_orgao_emissor_pessoa : null,
                        num_cart_trab_prev_soc_pessoa : null,
                        num_serie_trab_prev_soc_pessoa : null,
                        dta_emissao_cart_trab_pessoa : null,
                        sig_uf_cart_trab_pessoa : null,
                        num_titulo_eleitor_pessoa : null,
                        num_zona_tit_eleitor_pessoa : null,
                        num_secao_tit_eleitor_pessoa : null,
                        cod_deficiencia_memb : null,
                        ind_def_cegueira_memb : null,
                        ind_def_baixa_visao_memb : null,
                        ind_def_surdez_profunda_memb : null,
                        ind_def_surdez_leve_memb : null,
                        ind_def_fisica_memb : null,
                        ind_def_mental_memb : null,
                        ind_def_sindrome_down_memb : null,
                        ind_def_transtorno_mental_memb : null,
                        ind_ajuda_nao_memb : null,
                        ind_ajuda_familia_memb : null,
                        ind_ajuda_especializado_memb : null,
                        ind_ajuda_vizinho_memb : null,
                        ind_ajuda_instituicao_memb : null,
                        ind_ajuda_outra_memb : null,
                        cod_sabe_ler_escrever_memb : null,
                        ind_frequenta_escola_memb : null,
                        nom_escola_memb : null,
                        cod_escola_local_memb : null,
                        sig_uf_escola_memb : null,
                        nom_munic_escola_memb : null,
                        cod_ibge_munic_escola_memb : null,
                        cod_censo_inep_memb : null,
                        cod_curso_frequenta_memb : null,
                        cod_ano_serie_frequenta_memb : null,
                        cod_curso_frequentou_pessoa_memb : null,
                        cod_ano_serie_frequentou_memb : null,
                        cod_concluiu_frequentou_memb : null,
                        grau_instrucao : null,
                        cod_trabalhou_memb : null,
                        cod_afastado_trab_memb : null,
                        cod_agricultura_trab_memb : null,
                        cod_principal_trab_memb : null,
                        val_remuner_emprego_memb : null,
                        cod_trabalho_12_meses_memb : null,
                        qtd_meses_12_meses_memb : null,
                        val_renda_bruta_12_meses_memb : null,
                        val_renda_doacao_memb : null,
                        val_renda_aposent_memb : null,
                        val_renda_seguro_desemp_memb : null,
                        val_renda_pensao_alimen_memb : null,
                        val_outras_rendas_memb : null,
                        marc_sit_rua : null,
                        ind_dormir_rua_memb : null,
                        qtd_dormir_freq_rua_memb : null,
                        ind_dormir_albergue_memb : null,
                        qtd_dormir_freq_albergue_memb : null,
                        ind_dormir_dom_part_memb : null,
                        qtd_dormir_freq_dom_part_memb : null,
                        ind_outro_memb : null,
                        qtd_freq_outro_memb : null,
                        cod_tempo_rua_memb : null,
                        ind_motivo_perda_memb : null,
                        ind_motivo_ameaca_memb : null,
                        ind_motivo_probs_fam_memb : null,
                        ind_motivo_alcool_memb : null,
                        ind_motivo_desemprego_memb : null,
                        ind_motivo_trabalho_memb : null,
                        ind_motivo_saude_memb : null,
                        ind_motivo_pref_memb : null,
                        ind_motivo_outro_memb : null,
                        ind_motivo_nao_sabe_memb : null,
                        ind_motivo_nao_resp_memb : null,
                        cod_tempo_cidade_memb : null,
                        cod_vive_fam_rua_memb : null,
                        cod_contato_parente_memb : null,
                        ind_ativ_com_escola_memb : null,
                        ind_ativ_com_coop_memb : null,
                        ind_ativ_com_mov_soc_memb : null,
                        ind_ativ_com_nao_sabe_memb : null,
                        ind_ativ_com_nao_resp_memb : null,
                        ind_atend_cras_memb : null,
                        ind_atend_creas_memb : null,
                        ind_atend_centro_ref_rua_memb : null,
                        ind_atend_inst_gov_memb : null,
                        ind_atend_inst_nao_gov_memb : null,
                        ind_atend_hospital_geral_memb : null,
                        cod_cart_assinada_memb : null,
                        ind_dinh_const_memb : null,
                        ind_dinh_flanelhinha_memb : null,
                        ind_dinh_carregador_memb : null,
                        ind_dinh_catador_memb : null,
                        ind_dinh_servs_gerais_memb : null,
                        ind_dinh_pede_memb : null,
                        ind_dinh_vendas_memb : null,
                        ind_dinh_outro_memb : null,
                        ind_dinh_nao_resp_memb : null,
                        ind_atend_nenhum_memb : null,
                        ref_cad : null,
                        ref_pbf : null,
                        ordem: null,
                    }],
                },
                pessoaArr:{},

                tipoVila:[],
                tipoOrgao:[],
                termoTexto: 'Política de Privacidade\n' +
                    '\n' +
                    'Esta Política de Privacidade descreve como os seus dados pessoais serão coletados, usados e protegidos pela Prefeitura Municipal de Cantanhede, em conformidade com a Lei Geral de Proteção de Dados Pessoais (LGPD), Lei nº 13.709/2018.\n' +
                    '\n' +
                    'Coleta de Dados Pessoais\n' +
                    '\n' +
                    'A Prefeitura Municipal de Cantanhede coleta seus dados pessoais, incluindo seu nome completo, CPF, RG, endereço, e-mail, telefone e informações sobre sua situação socioeconômica, através do Sistema de Cadastro Único Municipal.\n' +
                    '\n' +
                    'Uso de Dados Pessoais\n' +
                    '\n' +
                    'Os dados coletados pela Prefeitura Municipal de Cantanhede serão utilizados exclusivamente para fins de cadastramento e registro dos cidadãos no Sistema de Cadastro Único Municipal, com a finalidade de fornecer serviços públicos adequados às necessidades da população, além de subsidiar a formulação e implementação de políticas públicas.\n' +
                    '\n' +
                    'Compartilhamento de Dados Pessoais\n' +
                    '\n' +
                    'A Prefeitura Municipal de Cantanhede pode compartilhar seus dados pessoais com outros órgãos públicos, empresas parceiras ou prestadores de serviço, exclusivamente para fins relacionados à execução de políticas públicas e serviços prestados à população.\n' +
                    '\n' +
                    'Armazenamento e Segurança de Dados Pessoais\n' +
                    '\n' +
                    'A Prefeitura Municipal de Cantanhede armazenará seus dados pessoais pelo tempo necessário para atender às finalidades para as quais foram coletados, respeitando a legislação aplicável. Tomamos todas as medidas necessárias para garantir a segurança e proteção adequadas de seus dados pessoais.\n' +
                    '\n' +
                    'Seus Direitos\n' +
                    '\n' +
                    'Você tem o direito de acessar, corrigir, excluir ou solicitar a portabilidade dos seus dados pessoais. Se desejar exercer esses direitos ou se tiver alguma dúvida ou preocupação em relação ao tratamento dos seus dados pessoais, entre em contato conosco por meio dos canais disponibilizados.\n' +
                    '\n' +
                    'Ao aceitar estes termos, você concorda em permitir o uso dos seus dados pessoais pela Prefeitura Municipal de Cantanhede exclusivamente para os fins descritos acima. Se não concordar com esta Política de Privacidade, por favor, não use o Sistema de Cadastro Único Municipal.'
            }
        },
        methods:{
            getAtualiza(dados){

                this.pessoaArr = dados;
                this.domicilioArr = dados.domicilio;
            },
            getTab(tab){

                if(tab == 1){
                    this.tab1 = true;
                    this.tab2 = false;
                    this.tab3 = false;
                    this.tab4 = false;
                }
                else if(tab == 2){
                    this.tab1 = false;
                    this.tab2 = true;
                    this.tab3 = false;
                    this.tab4 = false;
                }
                else if(tab == 3) {
                    this.tab1 = false;
                    this.tab2 = false;
                    this.tab3 = true;
                    this.tab4 = false;
                }
                else if(tab == 4){
                    this.tab1 = false;
                    this.tab2 = false;
                    this.tab3 = false;
                    this.tab4 = true;
                }
            },
            salvar(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'atendimento/store',
                    data:{
                        pessoa: this.pessoa,
                        atendimento_id: this.atendimento_id,
                        tipo_orgao_id: this.tipo_orgao_id,
                        tipo_profissao_id: this.tipo_profissao_id,
                        tipo_assunto_id: this.tipo_assunto_id,
                        atendimento_situacao: this.atendimento_situacao,
                        atendimento_descricao: this.atendimento_descricao,
                        atendimento_receber_inf_pref: (this.atendimento_receber_inf_pref == true ? 1 : 2),
                        atendimento_termo: (this.atendimento_termo == true ? 1 : 2),
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        this.atendimento = data.atendimento;

                        alertify.success(data.mensagem);

                        location.reload();

                        return;

                    }

                    alertify.error(data.mensagem);

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            novo(){

                this.resumo = [];

                this.atendimento = [];
                this.atendimento_id= null;
                this.tipo_assunto_id= null;
                this.tipo_orgao_id= null;
                this.tipo_profissao_id= null;
                this.atendimento_situacao = 1;
                this.atendimento_descricao= null;
                this.atendimento_receber_inf_pref = 1;
                this.atendimento_termo = 1;

                this.pessoa = {
                    cpf : null,
                    num_cpf_pessoa: null,
                    nom_pessoa: null,
                    nom_apelido_pessoa: null,
                    email: null,
                    dta_nasc_pessoa: null,
                    domicilio: {
                        num_tel_contato_1_fam: null,
                        num_cep_logradouro_fam: null,
                        nom_logradouro_fam: null,
                        nom_logradouro_fam_pov: null,
                    }
                };

                this.pessoas = [];

                this.idade = null;

                this.logradouroArr = {
                    cep: null,
                    compl: null,
                    cidade: null,
                    bairro: null,
                    ibge: null,

                    tipo_povoado_id: null,
                    tipo_bairro_id: null,
                    nom_localidade_fam: null,
                    nom_localidade_fam_pov: null,
                    nom_logradouro_fam: null,
                    nom_logradouro_fam_pov: null,
                    nom_tipo_logradouro_fam: null,
                };

                this.domicilioArr = {
                    cd_ibge: null,
                    cod_familiar_fam: null,
                    dat_cadastramento_fam: null,
                    dat_atual_fam: null,
                    cod_est_cadastral_fam: null,
                    cod_forma_coleta_fam: null,
                    dta_entrevista_fam: null,
                    nom_localidade_fam: null,
                    nom_tip_logradouro_fam: null,
                    nom_titulo_logradouro_fam: null,
                    nom_logradouro_fam: null,
                    num_logradouro_fam: null,
                    des_complemento_fam: null,
                    des_complemento_adic_fam: null,
                    num_cep_logradouro_fam: null,
                    cod_unidade_territorial_fam: null,
                    nom_unidade_territorial_fam: null,
                    txt_referencia_local_fam: null,
                    nom_entrevistador_fam: null,
                    num_cpf_entrevistador_fam: null,
                    vlr_renda_media_fam: null,
                    fx_rfpc: null,
                    vlr_renda_total_fam: null,
                    marc_pbf: null,
                    qtde_meses_desat_cat: null,
                    cod_local_domic_fam: null,
                    cod_especie_domic_fam: null,
                    qtd_comodos_domic_fam: null,
                    qtd_comodos_dormitorio_fam: null,
                    cod_material_piso_fam: null,
                    cod_material_domic_fam: null,
                    cod_agua_canalizada_fam: null,
                    cod_abaste_agua_domic_fam: null,
                    cod_banheiro_domic_fam: null,
                    cod_escoa_sanitario_domic_fam: null,
                    cod_destino_lixo_domic_fam: null,
                    cod_iluminacao_domic_fam: null,
                    cod_calcamento_domic_fam: null,
                    cod_familia_indigena_fam: null,
                    cod_povo_indigena_fam: null,
                    nom_povo_indigena_fam: null,
                    cod_indigena_reside_fam: null,
                    cod_reserva_indigena_fam: null,
                    nom_reserva_indigena_fam: null,
                    ind_familia_quilombola_fam: null,
                    cod_comunidade_quilombola_fam: null,
                    nom_comunidade_quilombola_fam: null,
                    qtd_pessoas_domic_fam: null,
                    qtd_familias_domic_fam: null,
                    qtd_pessoa_inter_0_17_anos_fam: null,
                    qtd_pessoa_inter_18_64_anos_fam: null,
                    qtd_pessoa_inter_65_anos_fam: null,
                    val_desp_energia_fam: null,
                    val_desp_agua_esgoto_fam: null,
                    val_desp_gas_fam: null,
                    val_desp_alimentacao_fam: null,
                    val_desp_transpor_fam: null,
                    val_desp_aluguel_fam: null,
                    val_desp_medicamentos_fam: null,
                    nom_estab_assist_saude_fam: null,
                    cod_eas_fam: null,
                    nom_centro_assist_fam: null,
                    cod_centro_assist_fam: null,
                    num_ddd_contato_1_fam: null,
                    num_tel_contato_1_fam: null,
                    ic_tipo_contato_1_fam: null,
                    ic_envo_sms_contato_1_fam: null,
                    num_tel_contato_2_fam: null,
                    num_ddd_contato_2_fam: null,
                    ic_tipo_contato_2_fam: null,
                    ic_envo_sms_contato_2_fam: null,
                    cod_cta_energ_unid_consum_fam: null,
                    ind_parc_mds_fam: null,
                    ref_cad: null,
                    ref_pbf: null,
                    pessoa:[{
                        pessoa_id : null,
                        domicilio_id : null,
                        cod_familiar_fam : null,
                        cod_est_cadastral_memb : null,
                        ind_trabalho_infantil_pessoa : null,
                        nom_pessoa : null,
                        num_nis_pessoa_atual : null,
                        nom_apelido_pessoa : null,
                        cod_sexo_pessoa : null,
                        dta_nasc_pessoa : null,
                        cod_parentesco_rf_pessoa : null,
                        cod_raca_cor_pessoa : null,
                        nom_completo_mae_pessoa : null,
                        nom_completo_pai_pessoa : null,
                        cod_local_nascimento_pessoa : null,
                        sig_uf_munic_nasc_pessoa : null,
                        nom_ibge_munic_nasc_pessoa : null,
                        cod_ibge_munic_nasc_pessoa : null,
                        nom_pais_origem_pessoa : null,
                        cod_pais_origem_pessoa : null,
                        cod_certidao_registrada_pessoa : null,
                        fx_idade : null,
                        marc_pbf : null,
                        cod_certidao_civil_pessoa : null,
                        cod_livro_termo_certid_pessoa : null,
                        cod_folha_termo_certid_pessoa : null,
                        cod_termo_matricula_certid_pessoa : null,
                        nom_munic_certid_pessoa : null,
                        cod_ibge_munic_certid_pessoa : null,
                        cod_cartorio_certid_pessoa : null,
                        num_cpf_pessoa : null,
                        num_identidade_pessoa : null,
                        cod_complemento_pessoa : null,
                        dta_emissao_ident_pessoa : null,
                        sig_uf_ident_pessoa : null,
                        sig_orgao_emissor_pessoa : null,
                        num_cart_trab_prev_soc_pessoa : null,
                        num_serie_trab_prev_soc_pessoa : null,
                        dta_emissao_cart_trab_pessoa : null,
                        sig_uf_cart_trab_pessoa : null,
                        num_titulo_eleitor_pessoa : null,
                        num_zona_tit_eleitor_pessoa : null,
                        num_secao_tit_eleitor_pessoa : null,
                        cod_deficiencia_memb : null,
                        ind_def_cegueira_memb : null,
                        ind_def_baixa_visao_memb : null,
                        ind_def_surdez_profunda_memb : null,
                        ind_def_surdez_leve_memb : null,
                        ind_def_fisica_memb : null,
                        ind_def_mental_memb : null,
                        ind_def_sindrome_down_memb : null,
                        ind_def_transtorno_mental_memb : null,
                        ind_ajuda_nao_memb : null,
                        ind_ajuda_familia_memb : null,
                        ind_ajuda_especializado_memb : null,
                        ind_ajuda_vizinho_memb : null,
                        ind_ajuda_instituicao_memb : null,
                        ind_ajuda_outra_memb : null,
                        cod_sabe_ler_escrever_memb : null,
                        ind_frequenta_escola_memb : null,
                        nom_escola_memb : null,
                        cod_escola_local_memb : null,
                        sig_uf_escola_memb : null,
                        nom_munic_escola_memb : null,
                        cod_ibge_munic_escola_memb : null,
                        cod_censo_inep_memb : null,
                        cod_curso_frequenta_memb : null,
                        cod_ano_serie_frequenta_memb : null,
                        cod_curso_frequentou_pessoa_memb : null,
                        cod_ano_serie_frequentou_memb : null,
                        cod_concluiu_frequentou_memb : null,
                        grau_instrucao : null,
                        cod_trabalhou_memb : null,
                        cod_afastado_trab_memb : null,
                        cod_agricultura_trab_memb : null,
                        cod_principal_trab_memb : null,
                        val_remuner_emprego_memb : null,
                        cod_trabalho_12_meses_memb : null,
                        qtd_meses_12_meses_memb : null,
                        val_renda_bruta_12_meses_memb : null,
                        val_renda_doacao_memb : null,
                        val_renda_aposent_memb : null,
                        val_renda_seguro_desemp_memb : null,
                        val_renda_pensao_alimen_memb : null,
                        val_outras_rendas_memb : null,
                        marc_sit_rua : null,
                        ind_dormir_rua_memb : null,
                        qtd_dormir_freq_rua_memb : null,
                        ind_dormir_albergue_memb : null,
                        qtd_dormir_freq_albergue_memb : null,
                        ind_dormir_dom_part_memb : null,
                        qtd_dormir_freq_dom_part_memb : null,
                        ind_outro_memb : null,
                        qtd_freq_outro_memb : null,
                        cod_tempo_rua_memb : null,
                        ind_motivo_perda_memb : null,
                        ind_motivo_ameaca_memb : null,
                        ind_motivo_probs_fam_memb : null,
                        ind_motivo_alcool_memb : null,
                        ind_motivo_desemprego_memb : null,
                        ind_motivo_trabalho_memb : null,
                        ind_motivo_saude_memb : null,
                        ind_motivo_pref_memb : null,
                        ind_motivo_outro_memb : null,
                        ind_motivo_nao_sabe_memb : null,
                        ind_motivo_nao_resp_memb : null,
                        cod_tempo_cidade_memb : null,
                        cod_vive_fam_rua_memb : null,
                        cod_contato_parente_memb : null,
                        ind_ativ_com_escola_memb : null,
                        ind_ativ_com_coop_memb : null,
                        ind_ativ_com_mov_soc_memb : null,
                        ind_ativ_com_nao_sabe_memb : null,
                        ind_ativ_com_nao_resp_memb : null,
                        ind_atend_cras_memb : null,
                        ind_atend_creas_memb : null,
                        ind_atend_centro_ref_rua_memb : null,
                        ind_atend_inst_gov_memb : null,
                        ind_atend_inst_nao_gov_memb : null,
                        ind_atend_hospital_geral_memb : null,
                        cod_cart_assinada_memb : null,
                        ind_dinh_const_memb : null,
                        ind_dinh_flanelhinha_memb : null,
                        ind_dinh_carregador_memb : null,
                        ind_dinh_catador_memb : null,
                        ind_dinh_servs_gerais_memb : null,
                        ind_dinh_pede_memb : null,
                        ind_dinh_vendas_memb : null,
                        ind_dinh_outro_memb : null,
                        ind_dinh_nao_resp_memb : null,
                        ind_atend_nenhum_memb : null,
                        ref_cad : null,
                        ref_pbf : null,
                        ordem: null,
                    }],
                },

                this.pessoaArr = {};

            },
            getCritica(){

                if((this.pessoa.cpf == null || this.pessoa.cpf == '')
                    && (this.pessoa.nom_pessoa == null || this.pessoa.nom_pessoa == '')
                    && (this.pessoa.nom_apelido_pessoa == null || this.pessoa.nom_apelido_pessoa == '')
                ){

                    alertify.error('Digite on CPF ou Nome ou Apelido do cidadão!');

                    return false;

                }

                return true;

            },
            getPreencher(){

                if(!this.getCritica()){
                    return;
                }

                axios({
                    method: 'POST',
                    url: _BASE_URL+'pessoa/listar',
                    data:{
                        cpf: this.pessoa.cpf,
                        nom_pessoa: this.pessoa.nom_pessoa,
                        nom_apelido_pessoa: this.pessoa.nom_apelido_pessoa,
                        dta_nasc_pessoa: this.pessoa.dta_nasc_pessoa,
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.pessoas = data;

                    if(this.pessoas.length > 0){

                        if (this.pessoas.length == 1) {

                            this.pessoa = this.pessoas[0];

                            this.getRec();

                        }
                    }
                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });


            },
            getRec(){

                let pessoa = this.pessoas.filter(e=>{

                    return e.cpf == this.pessoa.cpf;

                });

                if(pessoa.length > 0) {

                    this.pessoa = pessoa[0];

                    this.domicilioArr = this.pessoa.domicilio;
                    this.$emit('pessoa', this.domicilioArr.pessoa[0]);

                    this.logradouroArr.cep = this.pessoa.domicilio.num_cep_logradouro_fam;
                    this.logradouroArr.end_compl = this.pessoa.domicilio.des_complemento_adic_fam;
                    this.logradouroArr.num = this.pessoa.domicilio.num_logradouro_fam;

                    if (this.pessoa.domicilio.nom_localidade_fam.substr(0,7).toUpperCase() != 'POVOADO') {

                        this.logradouroArr.nom_localidade_fam =
                            this.pessoa.domicilio.nom_localidade_fam;
                        this.logradouroArr.nom_localidade_fam_pov = null;

                        this.logradouroArr.end = this.pessoa.domicilio.nom_tip_logradouro_fam + ' ' +
                            this.pessoa.domicilio.nom_logradouro_fam; //nom_tip_logradouro_fam;

                        this.logradouroArr.end_compl = this.pessoa.domicilio.nom_titulo_logradouro_fam;

                    }
                    else{

                        this.logradouroArr.nom_localidade_fam = null;
                        this.logradouroArr.nom_localidade_fam_pov = this.pessoa.domicilio.nom_logradouro_fam.toUpperCase();

                    }

                }

                let tel = '';

                if(this.pessoa.domicilio.num_tel_contato_1_fam != null){

                    tel = this.pessoa.domicilio.num_tel_contato_1_fam.toString();

                    tel = parseFloat(tel);

                    if(tel > 99999999){

                        tel = '(' + this.pessoa.domicilio.num_ddd_contato_1_fam + ') ' +
                            tel.toString().substr(0,5) + '-' +
                            tel.toString().substr(5,4);

                    }
                    else if(tel > 9999999){

                        tel = '(' + this.pessoa.domicilio.num_ddd_contato_1_fam + ') 9' +
                            tel.toString().substr(0,5) + '-' +
                            tel.toString().substr(5,4);

                    }
                    else{
                        tel = '';
                    }

                }

                this.logradouroArr.cep = this.pessoa.domicilio.num_cep_logradouro_fam;

                this.logradouroArr.cidade = this.pessoa.domicilio.cidade.cidade_nome;

                this.logradouroArr.num = this.pessoa.domicilio.num_logradouro_fam;

                this.pessoa.domicilio.num_tel_contato_1_fam = tel;

                if(this.pessoa.dta_nasc_pessoa != null){

                    let idade = new Date().getFullYear();
                    let idadeP = new Date(this.pessoa.dta_nasc_pessoa).getFullYear();

                    this.idade = idade - idadeP;

                }

                this.pessoas = [];

            },
            getTipoVila(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: 'VILA',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoVila = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getTipoOrgao(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: 'ORGAO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoOrgao = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getTipoProfissao(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: 'PROFISSAO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoProfissao = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getTipoAssunto(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: 'ASSUNTO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoAssunto = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getResumo(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'pessoa/listarResumo',

                }).then(response => {

                    let data = response.data.data;

                    this.resumo = data[0];

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
        },
        mounted(){
            this.getTipoVila();
            this.getTipoOrgao();
            this.getTipoProfissao();
            this.getTipoAssunto();
            this.getResumo();
        }
    }
</script>

<style scoped>
    label{
        font-weight: bold;
    }
    h5{
        font-weight: bold;
        text-align: center;
    }

</style>
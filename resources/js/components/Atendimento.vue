<template>
    <div class="row">
        <div class="col-sm-3">
            <label>CPF</label>
            <div class="input-group">
                <input class="form-control" type="text" v-model="atendimentoTemp.pessoa.cpf"
                       v-mask="'###.###.###-##'" placeholder="xxx.xxx.xxx-xx" maxlength="14">
                <div class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="getPreencher">
                        <img :src="'../storage/icones/buscar.png'" style="width: 28px; height: 28px;">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>Nome completo</label>
            <input class="form-control" type="text" maxlength="100" v-model="atendimentoTemp.pessoa.nom_pessoa">
        </div>
        <div class="col-sm-4">
            <label>Apelido</label>
            <div class="input-group">
                <input class="form-control" type="text" maxlength="100" v-model="atendimentoTemp.pessoa.nom_apelido_pessoa">
                <div class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="getPreencher">
                        <img :src="'../storage/icones/buscar.png'" title="pesquisar..." style="width: 28px; height: 28px;">
                    </button>
                </div>
                <div class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="novo">
                        <img :src="'../storage/icones/apagar.png'" title="limpar pesquisa..." style="width: 28px; height: 28px;">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-show="(pessoas.length > 1)">
        <div class="col-sm-8">
            <select class="form-select" v-model="atendimentoTemp.pessoa.pessoa_id" @change="getRec">
                <option></option>
                <option v-for="row in pessoas" :value="row.pessoa_id">
                    {{row.nom_pessoa}} - {{(row.dta_nasc_pessoa != null ? row.dta_nasc_pessoa.split('-').reverse().join('/') : '')}}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Data de nascimento</label>
            <input class="form-control" type="date" maxlength="10" v-model="atendimentoTemp.pessoa.dta_nasc_pessoa">
        </div>
        <div class="col-sm-2">
            <label>Idade</label>
            <input class="form-control" type="number" v-model="idade">
        </div>
        <div class="col-sm-3">
            <label>Sexo</label>
            <div>
                <input type="radio" class="radio" :value="1" v-model="atendimentoTemp.pessoa.cod_sexo_pessoa">&nbsp;Masculino
                <input type="radio" class="radio" :value="2" v-model="atendimentoTemp.pessoa.cod_sexo_pessoa">&nbsp;Feminino
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label>Telefone</label>
            <input class="form-control" type="text" v-mask="'(##) #####-####'" placeholder="(xx) xxxxx-xxxx" maxlength="15"
                   v-model="atendimentoTemp.pessoa.domicilio.tel_1">
        </div>
        <div class="col-sm-6">
            <label>Email</label>
            <input class="form-control" type="text" maxlength="100" v-model="atendimentoTemp.pessoa.email">
        </div>
        <div class="col-sm-4">
            <label>Profissão</label>
            <select class="form-select" v-model="atendimentoTemp.pessoa.tipo_profissao_id">
                <option></option>
                <option v-for="row in tipoProfissao" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
    </div>
    <hr>
    <Cep :cep-logradouro="cepLogradouro"></Cep>
    <PessoaSituacao :pessoa-situacao-arr="pessoaSituacaoTemp"></PessoaSituacao>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <label>Local de Atendimento</label>
            <select class="form-select" v-model="atendimentoTemp.tipo_menu_id">
                <option></option>
                <option v-for="row in tipoOrgao" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Assunto</label>
            <select class="form-select" v-model="atendimentoTemp.tipo_assunto_id">
                <option></option>
                <option v-for="row in tipoAssunto" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Descrição</label>
            <textarea class="form-control" rows="2" cols="100" v-model="atendimentoTemp.atendimento_descricao"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 localClass">
            <label>Situação</label>
            <div>
                <input type="radio" class="check" :value="1" v-model="atendimentoTemp.atendimento_situacao">&nbsp;Atendido<br>
                <input type="radio" class="check" :value="2" v-model="atendimentoTemp.atendimento_situacao">&nbsp;Não atendido
            </div>
        </div>
        <div class="col-sm-4 localClass">
            <label>Deseja receber informações da Prefeitura Municipal?</label>
            <div>
                <input type="radio" class="check" :value="1" v-model="atendimentoTemp.atendimento_receber_inf_pref">&nbsp;Sim<br>
                <input type="radio" class="check" :value="2" v-model="atendimentoTemp.atendimento_receber_inf_pref">&nbsp;Não
            </div>
        </div>
        <div class="col-sm-4 localClass">
            <label :title="termoTexto">Aceito os Termos da Política de Privacidade?</label>
            <div>
                <input type="radio" class="check" :value="1" v-model="atendimentoTemp.atendimento_termo">&nbsp;Sim<br>
                <input type="radio" class="check" :value="2" v-model="atendimentoTemp.atendimento_termo">&nbsp;Não
            </div>
        </div>
    </div>
    <div class="row" v-show="mostrarBtnSalvar">
        <div class="col-sm-12" style="text-align: right;">
            <button class="btn btn-primary" type="button" @click="salvar">&nbsp;Salvar&nbsp;</button>&nbsp;&nbsp;
            <button type="button" class="btn btn-default botaonovo" @click="novo">&nbsp;Novo&nbsp;</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div>
            <table>
                <thead>
                <tr>
                    <th style="text-align: center;width: 5%">ID</th>
                    <!--                    <th style="text-align: center;width: 10%">CPF</th>-->
                    <!--                    <th style="text-align: left">Nome</th>-->
                    <!--                    <th style="text-align: left">Data de Nascimento</th>-->
                    <th style="text-align: left">Local</th>
                    <th style="text-align: center">Data/Hora</th>
                    <th style="text-align: left">Situação</th>
                    <th style="text-align: left">Assunto</th>
                </tr>
                </thead>
                <span style="display: none">{{total = 0}}</span>
                <tbody>
                <tr v-for="row in tabela" >
                    <span style="display: none">{{total++}}</span>
                    <td style="width: 5%;text-align: center">{{total}}</td>
                    <!--                    <td style="text-align: center">{{row.pessoa.cpf}}</td>-->
                    <!--                    <td style="text-align: left">{{row.pessoa.nom_pessoa}}</td>-->
                    <!--                    <td style="text-align: left">{{row.pessoa.dta_nasc_pessoa.split('-').reverse().join('/')}}</td>-->
                    <td style="text-align: left">{{(row.tipoMenu ? row.tipoMenu.tipo_nome : '')}}</td>
                    <td style="text-align: center;width:150px">{{getDataHoraBanco(row.updated_at)}}
                    </td>
                    <td style="text-align: left">{{(row.atendimento_situacao == 1 ? 'Atendido' : 'Não Atendido')}}</td>
                    <td style="text-align: left">{{row.atendimento_descricao}}</td>

                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right;padding-right: 10px">TOTAL</td>
                    <td style="text-align: center">{{total}}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Cep from "./Cep";
    import PessoaSituacao from "./PessoaSituacao";

    export default {
        name: "Atendimento",
        components: {PessoaSituacao, Cep},
        props: {
            user:{
                id: null,
                name: null,
                user_nome: null,
                tipo_perfil_id: null,
                user_sta: null
            },
            atendimentoArr:{
                pessoa_id: null,
                atendimento_id: null,
                tipo_menu_id: null,
                tipo_profissao_id: null,
                tipo_assunto_id: null,
                atendimento_situacao: null,
                atendimento_descricao: 1,
                atendimento_receber_inf_pref: 1,
                atendimento_termo: 2,
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
                    ordem: null,
                    cpf: null,
                    email: null,
                    tipo_profissao_id: null,
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
                        tel_1: null,
                        tel_2: null,
                        tipo_bairro_id: null,
                        tipo_povoado_id: null,
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
                            ordem: null,
                            email: null,
                            tipo_profissao_id: null,
                        }]
                    },
                    pessoaSituacao:[{
                        pessoa_id: null,
                        pessoa_situacao_data: null,
                        pessoa_situacao_desabrigada: 2,
                        pessoa_situacao_desempregada: 2,
                        pessoa_situacao_estudando: 2,
                        pessoa_situacao_obto: 2,
                        pessoa_situacao_filho: 2,
                        pessoa_situacao_rec_bolsa_familia: 2,
                        user_id: null,
                    }],
                },
            },
        },
        data(){
            return{

                atendimentoTemp: this.atendimentoArr,
                atendimentoTemp1: this.atendimentoArr,
                pessoaSituacaoTemp:{
                    pessoa_id: null,
                    pessoa_situacao_data: null,
                    pessoa_situacao_desabrigada: 2,
                    pessoa_situacao_desempregada: null,
                    pessoa_situacao_estudando: null,
                    pessoa_situacao_obto: 2,
                    pessoa_situacao_filho: null,
                    pessoa_situacao_rec_bolsa_familia: null,
                    user_id: null,
                    cepDefault: null,
                },

                apiCep: process.env.MIX_APP_CIDADE_CEP,

                cepLogradouro: {
                    cep: process.env.MIX_APP_CIDADE_CEP,
                    compl: null,
                    cidade: null,
                    bairro: null,
                    ibge: null,

                    tipo_povoado_id: null,
                    tipo_bairro_id: null,
                    nom_localidade_fam: null,
                    nom_tip_logradouro_fam: null,
                    nom_localidade_fam_pov: null,
                    bairros:[],
                    povoados:[],
                    tipoMoradia: 1,
                },

                pessoas: [],

                tipoAssunto:[],
                tipoProfissao:[],
                tipoVila:[],
                tipoOrgao:[],

                tipo_vila_id: null,

                idade: null,

                mostrarBtnSalvar: true,

                tabela: [],

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
            getDataHoraBanco(date, id = null, domicilio = null){

                if(date == null){

                    return '';

                }

                let temp = new Date(date);

                let dt =
                    '0'.repeat(2 - temp.getDate().toString().length) + temp.getDate().toString()
                    + '/' + '0'.repeat(2 - (temp.getMonth() + 1).toString().length) + (temp.getMonth() + 1).toString()
                    + '/' + temp.getFullYear().toString();

                let hr = '0'.repeat(2 - temp.getHours().toString().length) + temp.getHours().toString() + ':'
                    + '0'.repeat(2 - temp.getMinutes().toString().length) + temp.getMinutes().toString();

                return dt + ' ' + hr;

            },
            salvar(){

                this.atendimentoTemp.pessoa.domicilio.tipo_bairro_id = this.cepLogradouro.tipo_bairro_id;

                this.atendimentoTemp.pessoa.domicilio.tipo_povoado_id = this.cepLogradouro.tipo_povoado_id;

                this.atendimentoTemp.pessoa.domicilio.cd_ibge = this.cepLogradouro.ibge;

                this.atendimentoTemp.pessoa.domicilio.end = this.cepLogradouro.end;

                this.atendimentoTemp.pessoa.domicilio.des_complemento_fam = this.cepLogradouro.end_compl;

                this.atendimentoTemp.pessoa.domicilio.end_num = this.cepLogradouro.end_num;

                let cepTemp = this.cepLogradouro.cep.replace('.','').replace('-','');

                this.atendimentoTemp.pessoa.domicilio.num_cep_logradouro_fam = cepTemp;

                this.atendimentoTemp.pessoa.pessoaSituacao = this.pessoaSituacaoTemp;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'atendimento/store',
                    data:{
                        atendimento: this.atendimentoTemp,
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

                location.reload();
                //
                // this.tipo_vila_id = null;
                //
                // this.idade = null;
                //
                // this.atendimentoTemp = this.atendimentoTemp1;
                //
                // this.pessoas = [];
                //
                // this.logradouroArr = {
                //     cep: null,
                //         compl: null,
                //         cidade: null,
                //         bairro: null,
                //         ibge: null,
                //
                //         tipo_povoado_id: null,
                //         tipo_bairro_id: null,
                //         nom_localidade_fam: null,
                //         nom_localidade_fam_pov: null,
                //         nom_logradouro_fam: null,
                //         nom_logradouro_fam_pov: null,
                //         nom_tipo_logradouro_fam: null,
                // };

            },
            getCritica(){

                if((this.atendimentoTemp.pessoa.cpf == null || this.atendimentoTemp.pessoa.cpf == '')
                    && (this.atendimentoTemp.pessoa.nom_pessoa == null || this.atendimentoTemp.pessoa.nom_pessoa == '')
                    && (this.atendimentoTemp.pessoa.nom_apelido_pessoa == null || this.atendimentoTemp.pessoa.nom_apelido_pessoa == '')
                ){

                    alertify.error('Digite on CPF ou Nome ou Apelido do cidadão!');

                    return false;

                }

                return true;

            },
            getTabela(){

                if(this.atendimentoTemp.pessoa.cpf == null || this.atendimentoTemp.pessoa.cpf == '')
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'atendimento/listar',
                    data:{
                        cpf: this.atendimentoTemp.pessoa.cpf,
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tabela = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },

            getPreencher(){

                if(!this.getCritica()){
                    return;
                }

                axios({
                    method: 'POST',
                    url: _BASE_URL+'pessoa/listar',
                    data:{
                        cpf: this.atendimentoTemp.pessoa.cpf,
                        nom_pessoa: this.atendimentoTemp.pessoa.nom_pessoa,
                        nom_apelido_pessoa: this.atendimentoTemp.pessoa.nom_apelido_pessoa,
                        dta_nasc_pessoa: this.atendimentoTemp.pessoa.dta_nasc_pessoa,
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.pessoas = data;

                    if(this.pessoas.length > 0){

                        if (this.pessoas.length == 1) {

                            this.atendimentoTemp.pessoa = this.pessoas[0];

                            this.getTabela();

                            this.getRec();

                        }
                    }
                }).catch(errors => {

                    // console.log(errors);

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getRec(){

                let iTemp = 0;

                let pessoa_id = this.atendimentoTemp.pessoa.pessoa_id;

                let indexTemp = this.pessoas.findIndex(e => {
                    return e.pessoa_id == pessoa_id;
                });

                let pessoaTemp = this.pessoas[indexTemp];

                this.atendimentoTemp.pessoa.nom_pessoa = pessoaTemp.nom_pessoa;
                this.atendimentoTemp.pessoa.cpf = pessoaTemp.cpf;
                this.atendimentoTemp.pessoa.dta_nasc_pessoa = pessoaTemp.dta_nasc_pessoa;
                this.atendimentoTemp.pessoa.cod_sexo_pessoa = pessoaTemp.cod_sexo_pessoa;
                this.atendimentoTemp.pessoa.email = pessoaTemp.email;
                this.atendimentoTemp.pessoa.domicilio = pessoaTemp.domicilio;
                this.cepLogradouro.cep = pessoaTemp.domicilio.num_cep_logradouro_fam;
                this.cepLogradouro.nom_localidade_fam =
                    //(pessoaTemp.domicilio.nom_tip_logradouro_fam != null  ? pessoaTemp.domicilio.nom_tip_logradouro_fam + ' ' : '')
                    pessoaTemp.domicilio.nom_logradouro_fam.toUpperCase()
                    + (pessoaTemp.domicilio.num_logradouro_fam != null ? ', ' + pessoaTemp.domicilio.num_logradouro_fam.toUpperCase() : '');
                this.cepLogradouro.end = pessoaTemp.domicilio.end;
                this.cepLogradouro.end_compl = pessoaTemp.domicilio.des_complemento_adic_fam;
                this.cepLogradouro.end_num = pessoaTemp.domicilio.end_num;
                this.cepLogradouro.nom_tip_logradouro_fam = pessoaTemp.domicilio.nom_tip_logradouro_fam;
                this.cepLogradouro.ibge = pessoaTemp.domicilio.cd_ibge;
                this.atendimentoTemp.pessoa.tipo_profissao_id = pessoaTemp.tipo_profissao_id;

                if(pessoaTemp.domicilio.tipo_bairro_id != null){

                    this.cepLogradouro.tipoMoradia = 1;

                    this.cepLogradouro.tipo_bairro_id = pessoaTemp.domicilio.tipo_bairro_id;

                }else if(pessoaTemp.domicilio.tipo_povoado_id != null) {

                    this.cepLogradouro.tipoMoradia = 2;

                    this.cepLogradouro.tipo_povoado_id = pessoaTemp.domicilio.tipo_povoado_id;

                }
                else{

                    if(pessoaTemp.domicilio.nom_localidade_fam != null) {

                        let bairros = this.cepLogradouro.bairros;

                        let povoados = this.cepLogradouro.povoados;

                        let b = pessoaTemp.domicilio.nom_localidade_fam.toUpperCase();

                        if (b.length > 6) {

                            if (b.substr(0, 7).toUpperCase() == 'POVOADO') {

                                b = pessoaTemp.domicilio.nom_logradouro_fam.toUpperCase();

                                let povoadoIndex = povoados.findIndex(e => {
                                    return e.tipo_nome.toUpperCase() == b;
                                });

                                if (povoadoIndex != -1) {

                                    iTemp = 1;

                                    this.cepLogradouro.tipo_povoado_id = povoados[povoadoIndex].tipo_id;

                                    this.cepLogradouro.tipoMoradia = 2;

                                }

                            }
                        }

                        if (iTemp == 0) {

                            let bairroIndex = bairros.findIndex(e => {
                                return e.tipo_nome.toUpperCase() == b;
                            });

                            if (bairroIndex != -1) {

                                iTemp == 2;

                                this.cepLogradouro.tipo_bairro_id = bairros[bairroIndex].tipo_id;

                                this.cepLogradouro.tipoMoradia = 1;
                            }
                        }
                    }
                }

                let tel = '';

                if(pessoaTemp.domicilio.tel_1 != null){

                    tel = pessoaTemp.domicilio.tel_1.toString();

                }

                this.cepLogradouro.cep = pessoaTemp.domicilio.num_cep_logradouro_fam;

                this.cepLogradouro.cidade = (pessoaTemp.domicilio.cidade != null ? pessoaTemp.domicilio.cidade.cidade_nome : null);

                this.cepLogradouro.num = pessoaTemp.domicilio.num_logradouro_fam;

                if(pessoaTemp.dta_nasc_pessoa != null){

                    let idade = new Date().getFullYear();
                    let idadeP = new Date(pessoaTemp.dta_nasc_pessoa).getFullYear();

                    this.idade = idade - idadeP;

                }

                if(pessoaTemp.pessoaSituacao.length > 0)
                    this.pessoaSituacaoTemp = pessoaTemp.pessoaSituacao[0];

                this.pessoas = [];

            },
            getTipos() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listarMassa',
                    data: {
                        siglas: ['PROFISSAO', 'VILA', 'ASSUNTO', 'MENU'],
                        retornarUser: 1, // 1 = sim; 0 = não
                        tipo_sta: 1
                    }

                }).then(response => {

                    let user = null;

                    let data = [];

                    let menuPerfil = [];

                    if(response.data.dados != null) {

                        data = response.data.dados.data;

                        user = response.data.user;

                    }
                    else{

                        data = response.data.data;

                    }

                    if(data.length > 0) {

                        this.tipoProfissao = data.filter(e=>{

                            return e.tipo_sigla == 'PROFISSAO';

                        });

                        let tipoOrgao = data.filter(e=>{
                            return (e.tipo_sigla == 'MENU' && e.tipoPai != null && e.tipoPai.tipo_nome == 'Atendimento'
                                && e.tipo_orgao == 1);
                        });

                        let tipoOrgaoMenuPerfil = tipoOrgao.filter(e=>{
                            return (e.menuPerfil.length > 0 && e.menuPerfil[0].tipo_perfil_id == user.tipo_perfil_id);
                        });

                        if(tipoOrgaoMenuPerfil.length > 0) {

                            menuPerfil = [];

                            for(let i = 0; i < tipoOrgaoMenuPerfil.length; i++) {

                                let tipoOrgaoMenuPerfilUser = tipoOrgaoMenuPerfil[i];

                                for (let ii = 0; ii < tipoOrgaoMenuPerfilUser.menuPerfil.length; ii++) {

                                    if (tipoOrgaoMenuPerfilUser.menuPerfil[ii].menuPerfilUser.length > 0) {

                                        for(let iii = 0; iii < tipoOrgaoMenuPerfilUser.menuPerfil[ii].menuPerfilUser.length; iii++){

                                            menuPerfil.push(tipoOrgaoMenuPerfilUser);

                                        }

                                    }

                                }

                            }

                        }

                        if(menuPerfil.length > 0)

                            this.tipoOrgao = menuPerfil;

                        else

                            this.tipoOrgao = tipoOrgao;

                        this.tipoAssunto = data.filter(e=>{

                            return e.tipo_sigla == 'ASSUNTO';

                        });

                        this.tipoVila = data.filter(e=>{

                            return e.tipo_sigla == 'VILA';

                        });

                        // console.log(this.tipoProfissao);

                    }



                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },

        },
        mounted(){

            this.getTipos();
        }
    }
</script>

<style scoped>

    .localClass{
        text-align:center;
    }
    label{
        font-weight: bold;
    }
    h5{
        font-weight: bold;
        text-align: center;
    }

</style>
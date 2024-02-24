<template>
    <div class="row">
        <div class="col-sm-2">
            <label>CPF</label>
            <input class="form-control" type="text" v-mask="'###.###.###-##'" placeholder="xxx.xxx.xxx-xx"
                   v-model="domicilio.pessoa[0].cpf">
        </div>
        <div class="col-sm-6">
            <label>Nome</label>
            <input class="form-control" type="text" v-model="domicilio.pessoa[0].nom_pessoa">
        </div>
        <div class="col-sm-4">
            <label>Apelido</label>
            <input class="form-control" type="text" v-model="domicilio.pessoa[0].nom_apelido_pessoa">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label>Data de Nascimento</label>
            <input class="form-control" type="date" v-model="domicilio.pessoa[0].dta_nasc_pessoa">
        </div>
        <div class="col-sm-1">
            <label>Ano</label>
            <input type="number" class="form-control" step="1" min="1900" v-model="ano">
        </div>
        <div class="col-sm-1">
            <label>Mês</label>
            <select class="form-select" v-model="mesAniversario" @change="getDia">
                <option></option>
                <option v-for="row in mesAniversarioArr" :value="row">{{row}}</option>
            </select>
        </div>
        <div class="col-sm-1">
            <label>Dia</label>
            <select class="form-select" v-model="diaAniversario">
                <option></option>
                <option v-for="row in diaAniversarioArr" :value="row">{{row}}</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label>Sexo</label>
            <select class="form-select" v-model="domicilio.pessoa[0].cod_sexo_pessoa">
                <option></option>
                <option :value="1">Masculino</option>
                <option :value="2">Feminino</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label>Idade</label>
            <input type="number" class="form-control" step="1" min="0" v-model="idade">
        </div>
        <div class="col-sm-3">
            <label>Desabrigado</label>
            <select class="form-select">
                <option></option>
                <option :value="1">Sim</option>
                <option :value="2">Não</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label>Zona</label>
            <select class="form-select" v-model="domicilio.cod_local_domic_fam">
                <option></option>
                <option :value="1">Urbana</option>
                <option :value="2">Rural</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label>Profissão</label>
            <select class="form-select" v-model="tipo_profissao_id">
                <option></option>
                <option v-for="row in tipoProfissao" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label>Bairro</label>
            <select class="form-select" v-model="tipo_bairro_id">
                <option></option>
                <option v-for="row in tipoBairro" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label>Povoado</label>
            <select class="form-select" v-model="tipo_povoado_id">
                <option></option>
                <option v-for="row in tipoPovoado" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Escola</label>
            <select class="form-select" v-model="tipo_escola_id">
                <option></option>
                <option v-for="row in tipoEscola" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <label>Local</label>
            <select class="form-select" v-model="tipo_orgao">
                <option></option>
                <option v-for="row in tipoOrgao" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
        <div class="col-sm-4">
            <label>Data de Atendimento</label>
            <input type="date" class="form-control" v-model="updated_at">
        </div>
    </div>
    <br>
    <div class="row" v-show="!showModal">
        <div class="col-sm-12" style="text-align: right">
            <button type="button" class="btn btn-success" @click="getPreencher(1)">&nbsp;Pesquisar&nbsp;</button>
        </div>
    </div>
    <!--MODAL-->
    <div v-show="showModal" style="display: flow">
        <ModalAguarde></ModalAguarde>
    </div>
    <!--TABELA-->
    <div class="row" v-show="!showModal">
        <div>
            <table>
                <thead>
                <tr>
                    <th style="text-align: center">Ordem</th>
                    <th style="width: 10%;text-align: center">CPF</th>
                    <th style="text-align: left">Nome</th>
                    <th style="text-align: center;width: 10%">Data de Nascimento</th>
                    <th style="text-align: center">Idade</th>
                    <th style="text-align: center">Sexo</th>
                    <th style="text-align: center">Último Atendimento</th>
                    <th style="text-align: center">Assunto</th>
                    <th style="text-align: center">Contato(s)</th>
                    <th style="text-align: center">WhatsApp</th>
                </tr>
                </thead>
                <tbody>
                <span style="display: none">{{total = 0}}</span>
                <tr v-for="row in tabela">
                    <span style="display: none">{{total++}}</span>
                    <td style="width: 5%;text-align: center">
                        <button type="button" class="btn btn-default">{{total}}</button>
                    </td>
                    <td style="text-align: center">{{row.cpf}}</td>
                    <td style="text-align: left">{{row.nom_pessoa}}{{(row.nom_apelido_pessoa != null ? ' (' + row.nom_apelido_pessoa + ')' : '')}}</td>
                    <td style="text-align: center">{{(row.dta_nasc_pessoa != null ? row.dta_nasc_pessoa.split("-").reverse().join("/") : "")}}</td>
                    <td style="text-align: center;width: 10%">{{(row.dta_nasc_pessoa != null ? calcularIdade(row.dta_nasc_pessoa) : '')}}</td>
                    <td style="text-align: center">{{(row.cod_sexo_pessoa != null ? (row.cod_sexo_pessoa == 1 ? 'M' : 'F') : '')}}</td>
                    <td style="text-align: center">{{(row.atendimento.length > 0 ? (row.atendimento[0].tipoMenu != null ? row.atendimento[0].tipoMenu.tipo_nome : '') : '')}}</td>
                    <td style="text-align: left">{{(row.atendimento.length > 0 ? row.atendimento[0].atendimento_descricao : '')}}</td>
                    <td style="text-align: center;width: 10%">{{row.domicilio.tel_1}}
                        &nbsp;{{(row.domicilio.tel_2 > 0 ? row.domicilio.tel_2 : "")}}
                    </td>
                    <span style="display: none">{{zap = (row.domicilio.tel_1 != null ? "https://wa.me/55" + (row.domicilio.tel_1 != null ? row.domicilio.tel_1.toString().replace("(","").replace(")","").replace(" ","").replace("-","") : "") : "")}}</span>
                    <td style="text-align: center">
                        <a :href="zap" v-show="(row.domicilio.tel_1 != null)" title="WhatsApp">
                            <img :src="'../storage/icones/whatsapp.png'" style="width: 40px; height: 40px;">
                        </a>
                    </td>

                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="9" style="text-align: right;padding-right: 10px">TOTAL</td>
                    <td style="text-align: center">{{total}}</td>
                </tr>
                </tfoot>
            </table>
        </div>
<!--        <div class="row">-->
<!--            <div class="col-sm-12" style="text-align: center;">-->
<!--                <nav aria-label="Page navigation example">-->
<!--                    <ul class="pagination pagination-sm justify-content-center">-->
<!--                        <li class="page-item">-->
<!--                            <a class="page-link" href="#" arial-label="Search results pages">Página(s):&nbsp;</a>-->
<!--                        </li>-->
<!--                        <li class="page-item" v-for="p in paginas">-->
<!--                            <a class="page-link" href="#" @click="getPagina(p.pagina)">{{'0'.repeat(3 - p.pagina.toString().length) + p.pagina.toString()}}</a>-->
<!--                        </li>-->
<!--                        &lt;!&ndash;                        <li class="page-item"><a class="page-link" href="#">Próxima</a></li>&ndash;&gt;-->
<!--                    </ul>-->
<!--                </nav>-->
<!--            </div>-->
<!--        </div>-->
        <div class="row">
            <div class="col-sm-12" style="text-align: center">
                <nav aria-label="Page navigation">
                    <ul v-for="x in paginas" class="pagination pagination-sm justify-content-center" v-show="(x.pag == grpPagina)">
                        <li v-show="(x.pag == grpPagina)" class="page-item">
                            <a class="page-link" href="#" @click="getGrupoPagina(x.pag, '-')">{{"<<"}}</a>
                        </li>
                        <li v-for="p in x.pagi.p" class="page-item" v-show="(x.pag == grpPagina)">
                            <a class="page-link" href="#" @click="getPagina(p.pagina)">{{'0'.repeat(3 - p.pagina.toString().length) + p.pagina.toString()}}</a>
                        </li>
                        <li v-show="(x.pag == grpPagina)"  class="page-item">
                            <a class="page-link" href="#" @click="getGrupoPagina(x.pag, '+')">{{">>"}}</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import ModalAguarde from "./ModalAguarde";

    export default {
        name: "Pesquisa",
        components: {ModalAguarde},
        data(){
            return{
                updated_at: null,
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
                    }]

                },

                tipo_bairro_id: null,
                tipo_povoado_id: null,
                tipo_profissao_id: null,
                tipo_escola_id: null,
                tipo_menu_id: null,
                tipo_orgao: null,
                idade: null,
                ano: null,

                showModal: false,

                tipoBairro:[],
                tipoPovoado:[],
                tipoProfissao:[],
                tipoMenu:[],
                tipoEscola: [],
                tipoOrgao: [],
                diaAniversario: null,
                mesAniversario: null,
                diaAniversarioArr: [],
                mesAniversarioArr: [],


                //PAGINAÇÃO
                page_from: 0,
                pagina: 1,
                grpPagina: 1,
                page_ant: 0,
                page_prox: 1,
                por_pagina: 3,
                qtd_paginas: 1,
                paginas: [],
                tPaginas: 0,
                tGrupoPaginas: 0,
                tabela:[],
                totalPaginas: 0,
                tipoOrgao: [],

            }
        },
        methods:{
            getGrupoPagina(grpPagina, sentido){

                if(sentido == '+'){

                    if((grpPagina++) < this.tGrupoPaginas){

                        this.grpPagina++;

                    }

                }
                else{

                    if((grpPagina--) < 1) {

                        this.grpPagina == 1;

                    }
                    else{

                        this.grpPagina--;

                    }

                }

                let x = this.paginas.filter(e=>{

                    return e.pag == this.grpPagina;

                });

                if(x.length > 0){

                    this.getPagina(x[0].pagi.p[0].pagina);

                }

            },
            getPaginacao(comando = 1){

                //1 = avancar
                //2 = retroceder
                //3 = ir para o final
                //4 = ir para o início

                switch (comando) {
                    case 1:
                        //verifica se a soma das páginas não é maior do que a quantidade de páginas
                        if((this.page_prox + this.por_pagina) >= this.qtd_paginas){
                            this.page_prox = this.qtd_paginas;
                        }
                        break;
                    case 2:
                        //verifica se o resultado da subtração não torna a pagina anterior negativa
                        if((this.page_prox - this.por_pagina) > this.page_ant){
                            this.page_ant = this.page_prox - this.por_pagina;
                        }
                        break;
                    case 3:
                        if(this.page_prox < (this.por_pagina - this.page_ant)){
                            //
                        }


                }
            },
            getPagina(page = 1){
                this.pagina = page;
                this.paginas = [];
                this.getPreencher();
            },
            calcularIdade(dataNascimento) {
                var dataAtual = new Date();

                var anoAtual = dataAtual.getFullYear();
                var mesAtual = dataAtual.getMonth() + 1;
                var diaAtual = dataAtual.getDate();

                dataNascimento = new Date(dataNascimento);

                var anoNascimento = dataNascimento.getFullYear();
                var mesNascimento = dataNascimento.getMonth() + 1;
                var diaNascimento = dataNascimento.getDate();

                var idadeAnos = anoAtual - anoNascimento;
                var idadeMeses = mesAtual - mesNascimento;
                var idadeDias = diaAtual - diaNascimento;

                if (idadeMeses < 0 || (idadeMeses === 0 && idadeDias < 0)) {
                    idadeAnos--;
                    idadeMeses += 12;
                }

                if (idadeDias < 0) {
                    var ultimoDiaMesAnterior = new Date(anoAtual, mesAtual - 1, 0).getDate();
                    idadeMeses--;
                    idadeDias += ultimoDiaMesAnterior;
                }

                var sIdadeAnos = '';
                var sIdadeMeses = '';
                var sIdadeDias = '';

                if(idadeDias > 0){
                    sIdadeDias = ' e ' + idadeDias.toString() + (idadeDias > 1 ? ' dias' : ' dia');
                }

                if(idadeAnos > 0){
                    sIdadeAnos = idadeAnos.toString() + ' anos';
                }

                if(idadeMeses > 0){
                    sIdadeMeses = (sIdadeAnos != '' ? (sIdadeDias != '' ? ', ' : ' e ') : '')
                        + idadeMeses.toString() + (idadeMeses > 1 ? ' meses' : ' mes');
                }

                return sIdadeAnos + sIdadeMeses + sIdadeDias;

                //
                // return {
                //     anos: idadeAnos,
                //     meses: idadeMeses,
                //     dias: idadeDias
                // };
            },
            getMes() {

                for (let i = 1; i < 13; i++) {

                    this.mesAniversarioArr.push(i);

                }
            },
            getDia(){

                    this.diaAniversario = [];

                    let ano = new Date().getFullYear();
                    // Criar uma data para o primeiro dia do mês seguinte

                    var nextMonth = new Date(ano, this.mesAniversario, 1);

                    // Subtrair um dia da data atual para obter o último dia do mês atual
                    var lastDay = new Date(nextMonth - 1);

                    // Retornar o número de dias no mês atual

                    for(let i = 1; i <= lastDay.getDate(); i++){
                        this.diaAniversarioArr.push(i);
                    }

            },
            getPreencher(tipo = 0){

                if(tipo == 1){

                    this.pagina = 1;

                    this.paginas = [];

                    this.grpPagina = 1;
                }

                this.showModal = true;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'pessoa/listarP',
                    data:{
                        domicilio: this.domicilio,
                        tipo_bairro_id: this.tipo_bairro_id,
                        tipo_povoado_id: this.tipo_povoado_id,
                        tipo_profissao_id: this.tipo_profissao_id,
                        tipo_menu_id: this.tipo_menu_id,
                        tipo_escola_id: this.tipo_escola_id,
                        idade: this.idade,
                        ano: this.ano,
                        diaAniversario: this.diaAniversario,
                        mesAniversario: this.mesAniversario,
                        updated_at: this.updated_at,
                        page: this.pagina,
                    }

                }).then(response => {

                    this.page_from = response.data.from;

                    //total de paginas consulta
                    let paginas = response.data.last_page;

                    this.totalPaginas = paginas;

                    let pag = parseInt(paginas / 10);

                    //total de paginas
                    this.tGrupoPaginas = pag;

                    if(pag < 0){

                        pag = 1;

                    }

                    let cont = 1;
                    let iCont = 1;
                    let aPag = [];

                    for(let iP = 1; iP <= pag; iP++) {

                        for (let i = iCont; i <= paginas; i++) {

                            aPag.push(
                                {pagina: i},
                            );

                            this.qtd_paginas = i;

                            if(cont >= 10){

                                this.paginas.push({
                                    pag: iP,
                                    pagi: {p: aPag},
                                });

                                aPag = [];

                                iCont = i + 1;

                                cont = 1;

                                break;
                            }

                            cont++;

                        }

                    }

                    this.tabela = response.data.data;

                    this.showModal = false;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getTipos(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listarMassa',
                    data:{
                        siglas: ['BAIRRO', 'POVOADO', 'PROFISSAO', 'MENU', 'ESCOLA'],
                        retornarUser: 1, // 1 = sim; 0 = não
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = [];

                    let user = null;

                    if(response.data.dados != null) {

                        data = response.data.dados.data;

                        user = response.data.user;

                    }
                    else{

                        data = response.data.data;

                    }

                    if(data.length > 0) {

                        this.tipoBairro = data.filter(e=>{
                            return e.tipo_sigla == 'BAIRRO';
                        });

                        this.tipoPovoado = data.filter(e=>{
                            return e.tipo_sigla == 'POVOADO';
                        });

                        this.tipoMenu = data.filter(e=>{
                            return (e.tipo_sigla == 'MENU' && e.tipoPai != null && e.tipoPai.tipo_nome == 'Atendimento');
                        });

                        this.tipoOrgao = data.filter(e=>{
                            return (e.tipo_sigla == 'MENU' && e.tipo_orgao == 1);
                        });

                        this.tipoProfissao = data.filter(e=>{
                            return e.tipo_sigla == 'PROFISSAO';
                        });

                        this.tipoEscola = data.filter(e=>{
                            return e.tipo_sigla == 'ESCOLA';
                        });

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

        },
        mounted(){
            // console.log(this.calcularIdade('1983-02-03'));
            // console.log(this.calcularIdade('1969-10-26'));
            this.updated_at = new Date().getFullYear().toString() + '-' +
                ('0'.repeat(2 - (new Date().getMonth() + 1).toString().length)) + (new Date().getMonth() + 1).toString() + '-' +
                ('0'.repeat(2 - new Date().getDate().toString().length)) + (new Date().getDate()).toString();
            this.getTipos();
            this.getMes();
        }
    }
</script>

<style scoped>

</style>
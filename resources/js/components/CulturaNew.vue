<template>
    <div class="container">
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
                <a :class="(tab3 ? 'nav-link active' : 'nav-link')" id="estabelecimentos-tab" data-toggle="tab" href="#home" role="tab"
                   aria-controls="estabelecimentos" aria-selected="{{tab3}}" @click="getTab(3)">Estabelecimentos</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div v-show="tab1" ref="principal-tab"
                 :class="(tab1 ? 'tab-pane fade show active' : '')"
                 role="tabpanel" aria-labelledby="principal-tab">
                <div class="container" style="border-radius: 0.5px; border-left: solid 0.5px #cccccc;border-right: solid 0.5px #cccccc; border-bottom: solid 0.5px #cccccc">
                    <Atendimento :atendimento-arr="atendimentoArr"></Atendimento>
                </div>
            </div>
            <div v-show="tab2" ref="pesquisa-tab"
                 :class="(tab2 ? 'tab-pane fade show active' : '')"
                 role="tabpanel" aria-labelledby="pesquisa-tab">
                <div class="container" style="border-radius: 0.5px; border-left: solid 0.5px #cccccc;border-right: solid 0.5px #cccccc; border-bottom: solid 0.5px #cccccc">
                    <atendimento-pesquisa-view></atendimento-pesquisa-view>
                </div>
            </div>
            <div v-show="tab3" ref="estabelecimentos-tab"
                 :class="(tab3 ? 'tab-pane fade show active' : '')"
                 role="tabpanel" aria-labelledby="estabelecimentos-tab">
                <div class="container" style="border-radius: 0.5px; border-left: solid 0.5px #cccccc;border-right: solid 0.5px #cccccc; border-bottom: solid 0.5px #cccccc">
                    <localidade-view></localidade-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';
    import Atendimento from "./Atendimento";
    import AtendimentoPesquisa from "./AtendimentoPesquisa";
    import ClienteCenso from './ClienteCenso';
    // import ClienteContato from './ClienteContato';
    // import ClienteDoc from './ClienteDoc';
    import Localidade from "./Localidade";

    export default {
        name: "CulturaNew",
        components:{
            Atendimento,
            AtendimentoPesquisa,
            ClienteCenso,
            // ClienteContato,
            // ClienteDoc,
            Localidade,
        },
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
                        ordem: null,
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
                        },
                        pessoaSituacao:{
                            pessoa_id: null,
                            pessoa_situacao_data: null,
                            pessoa_situacao_desabrigada: 2,
                            pessoa_situacao_desempregada: 2,
                            pessoa_situacao_estudando: 2,
                            pessoa_situacao_obto: 2,
                            pessoa_situacao_filho: 2,
                            pessoa_situacao_rec_bolsa_familia: 2,
                            user_id: null,
                        },
                    },
                },
                cliente_id : null,
                cliente_id_1 : null,
                tipo_cliente_id : null,
                cliente_nome : null,
                cliente_alcunha : null,
                cliente_cpf : null,
                cliente_dtnasc : null,
                cliente_sexo : null,
                cliente_pai : null,
                cliente_mae : null,
                tipo_profissao_id: null,
                cliente_sta : null,
                user_id : null,

                profissao_desc: null,
                tipoProfissao: [],
                clienteCensoArr: [],
                clienteContatoArr: [],
                clienteDocArr: [],
                mensagemCpfNovo: false,
                mensagemCpfExiste: false,

                tab1: true,
                tab2: false,
                tab3: false,
                tab4: false,

            }
        },
        methods:{
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

                if(!confirm('Enviar informações?')){

                    return;

                }

                axios({
                    method: 'POST',
                    url: _BASE_URL+'cliente/store',
                    data:{
                        cliente_id: this.cliente_id,
                        cliente_cpf: this.cliente_cpf,
                        cliente_nome: this.cliente_nome,
                        cliente_alcunha: this.cliente_alcunha,
                        cliente_dtnasc: this.cliente_dtnasc,
                        cliente_sexo: this.cliente_sexo,
                        tipo_profissao_id: this.tipo_profissao_id,
                        profissao_desc: this.profissao_desc,
                        cliente_pai: this.cliente_pai,
                        cliente_mae: this.cliente_mae,
                        tipo_cliente_id: 1, //dono da casa
                        cliente_sta: 1,
                        clienteCenso: this.clienteCensoArr,
                        clienteContato: this.clienteContatoArr,
                        clienteDoc: this.clienteDocArr,
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        this.novo();

                        this.getPreencher();

                        alertify.success(data.mensagem);

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
            getPreencher(){

                this.mostraTabelaCliente = true;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'cliente/listar',
                    data:{
                        cliente_nome: this.cliente_nome,
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
            getRec(temp) {

                this.clienteCensoArr = {
                    cliente_censo_id: null,
                    cliente_id: null,
                    censo_id: null,
                    cliente_censo_qtd_dep: null,
                    cliente_censo_possui_imovel: null,
                    tipo_moradia_id: null,
                    cliente_censo_qtd_morador: null,
                    tipo_desabrigado_id: null,
                    tipo_situacao_desabrigado_id: null,
                    cliente_censo_sta: 1,
                    cepLogradouro:[],
                    parentescoArr:[],
                }

                // return;

                this.mostraTabelaCliente = false;
                // this.$emit('clienteArr', temp);

                this.cliente_id = temp[0].cliente_id;
                this.cliente_id_1 = temp[0].cliente_id_1;
                this.cliente_tipo = temp[0].cliente_tipo;
                this.cliente_nome = temp[0].cliente_nome;
                this.cliente_alcunha = temp.cliente_alcunha;
                this.cliente_dtnasc = temp[0].cliente_dtnasc;
                this.cliente_sexo = temp[0].cliente_sexo;
                this.cliente_pai = temp.cliente_pai;
                this.cliente_mae = temp.cliente_mae;

                this.cliente_cnpj = temp.cliente_cnpj;

                this.logradouro = {
                    cep : temp.cep,
                    end : temp.end,
                    compl : temp.compl,
                    num : temp.num,
                    cidade : temp.cidade,
                    bairro : temp.bairro,
                    ibge : temp.ibge,
                };

                this.cliente_tel = temp.cliente_tel;
                this.cliente_tel_obs = temp.cliente_tel_obs;
                this.cliente_tel_1 = temp.cliente_tel_1;
                this.cliente_tel_obs_1 = temp.cliente_tel_obs_1;
                this.cliente_email = temp.cliente_email;
                this.cliente_email_obs = temp.cliente_email_obs;
                this.cliente_resp_nome = temp.cliente_resp_nome;
                this.cliente_resp_tel = temp.cliente_resp_tel;
                this.cliente_resp_tel_obs = temp.cliente_resp_tel_obs;
                this.cliente_resp_tel_1 = temp.cliente_resp_tel_1;
                this.cliente_resp_tel_obs_1 = temp.cliente_resp_tel_obs_1;
                this.cliente_resp_email = temp.cliente_resp_email;
                this.cliente_resp_email_obs = temp.cliente_resp_email_obs;

                this.logradouroResp = {
                    cep : temp.cliente_resp_cep,
                    end : temp.cliente_resp_end,
                    compl : temp.cliente_resp_compl,
                    num : temp.cliente_resp_num,
                    cidade : temp.cliente_resp_cidade,
                    bairro : temp.cliente_resp_bairro,
                    ibge : temp.cliente_resp_ibge,
                };

                this.cliente_sta = temp.cliente_sta;

            },
            getExc(id){

                if(!confirm('Excluir Solicitação?'))
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'cliente/excluir',
                    data:{
                        cliente_id : id,
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        this.novo();

                        this.getPreencher();

                        alertify.success(data.mensagem);

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
                this.censo_id = null;
                this.censo_ano = null;
                this.censo_mes = null;
                this.censo_titulo = null;
                this.censo_desc = null;
                this.censo_sta = 1;
                this.mensagemCpfExiste = false;
                this.mensagemCpfNovo = false;
            },
            getTipoProfissao() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listar',
                    data: {
                        tipo_sigla: 'PROFISSAO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoProfissao = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            listar(){

                if(this.cliente_cpf != null && this.cliente_cpf != ""){

                    axios({
                        method: 'POST',
                        url: _BASE_URL + 'cliente/listar',
                        data: {
                            docConsulta: 'CPF',
                            cliente_doc_des: this.cliente_cpf,
                        }

                    }).then(response => {

                        let data = response.data.data;

                        if(data.length > 0){

                            this.mensagemCpfExiste = true;

                            this.mensagemCpfNovo = false;

                            this.getRec(data);

                        }
                        else {

                            this.mensagemCpfExiste = false;

                            this.mensagemCpfNovo = true;

                        }

                    }).catch(errors => {

                        const itens = JSON.parse(errors.response.request.responseText);

                        let textoMensagem = '';

                        for(const key in itens['errors']){

                            textoMensagem += itens['errors'][key][0] + '<br/>';

                        }

                        alertify.error(textoMensagem);

                    });

                }
            },
        },
        mounted(){
            this.getTipoProfissao();
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
<template>
    <hr />
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align: center">DEPENDENTES</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>&nbsp;</label>
            <div>
                <input class="radio" type="radio" v-model="cliente_possui_dependente" value="1">&nbsp;Sim
                &nbsp;<input class="radio" type="radio" v-model="cliente_possui_dependente" value="0">&nbsp;Não
            </div>

        </div>
        <div class="col-sm-2">
            <label>Quantos ?</label>
            <input class="form-control" type="number" v-model="cliente_censo_qtd_dep" step="1">
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align: center">ENDEREÇO</h5>
        </div>
    </div>
    <Cep :cep-logradouro="cepLogradouro" />
    <Parentesco :parentesco-arr="parentescoArr"></Parentesco>
    <hr />
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align: center">SITUAÇÃO</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align: center">
            <label>Desabrigado?</label>
            <input class="check_box" type="checkbox" style="margin-left: 10px"  value="1" v-model="situacao">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align: right">
            <button class="btn btn-default buttonnovo" type="button" @click="salvar">
                <img :src="'../storage/icones/salvar.png'" style="width: 28px; height: 28px;">
            </button>
        </div>
    </div>
    <hr />
</template>

<script>

    import Cep from "./Cep";
    import Parentesco from "./Parentesco";

    export default {
        name: "ClienteCenso",
        components:{
            Cep, Parentesco,
        },
        data(){
            return{
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

                cliente_possui_dependente: 0 ,
                cepLogradouro: {
                    cep: null,
                    compl: null,
                    cidade: null,
                    bairro: null,
                    ibge: null,
                },
                parentescoArr:[],
                situacao: true,
            }
        },
        props:{
            clienteCensoArr:{
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
        },
        methods:{
            salvar(){

                if(!confirm('Enviar informações?')){

                    return;

                }

                this.clienteCensoArr.push({
                    cliente_censo_id: this.cliente_censo_id,
                    cliente_id: this.cliente_id,
                    censo_id: this.censo_id,
                    cliente_censo_qtd_dep: this.cliente_censo_qtd_dep,
                    cliente_censo_possui_imovel: this.cliente_censo_possui_imovel,
                    tipo_moradia_id: this.tipo_moradia_id,
                    cliente_censo_qtd_morador: this.cliente_censo_qtd_morador,
                    tipo_desabrigado_id: this.tipo_desabrigado_id,
                    tipo_situacao_desabrigado_id: this.tipo_situacao_desabrigado_id,
                    cliente_censo_sta: 1,
                    cepLogradouro: this.cepLogradouro,
                    parentescoArr: this.parentescoArr,
                });

            },
          /*  getPreencher(){

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

                this.mostraTabelaCliente = false;
                this.$emit('clienteArr', temp);

                this.cliente_id = temp.cliente_id;
                this.cliente_id_1 = temp.cliente_id_1;
                this.cliente_tipo = temp.cliente_tipo;
                this.cliente_nome = temp.cliente_nome;
                this.cliente_dtnasc = temp.cliente_dtnasc;
                this.cliente_sexo = temp.cliente_sexo;
                this.cliente_nome_fantasia = temp.cliente_nome_fantasia;
                this.cliente_nome_abrv = temp.cliente_nome_abrv;
                this.cliente_cpf = temp.cliente_cpf;
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


            },*/
            novo(){
                this.censo_id = null;
                this.censo_ano = null;
                this.censo_mes = null;
                this.censo_titulo = null;
                this.censo_desc = null;
                this.censo_sta = 1;
            },

        }
    }
</script>

<style scoped>

</style>
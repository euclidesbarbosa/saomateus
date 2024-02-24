<template>
    <div class="row">
        <div class="col-sm-12">
            <label>Nome Completo</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <label>Endereço</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-sm-2">
            <label>Número</label>
            <input type="number" class="form-control" step="1" min="0">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Ponto de Referência</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <hr>
    <h5>INFORMAÇÕES SOBRE O ESPAÇO</h5>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <label>Nome do Espaço</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <label>Endereço do Espaço</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-sm-2">
            <label>Número</label>
            <input type="number" class="form-control" step="1" min="0">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>Bairro</label>
            <select type="text" class="form-control">
                <option></option>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Ponto de Referência do Espaço</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <hr>
    <h5>DADOS</h5>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <label>Telefone</label>
            <input type="text" class="form-control" v-mask="'(##) #####-####'" placeholder="(xx) xxxxx-xxxx">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>RG</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-sm-6">
            <label>CPF</label>
            <input type="text" class="form-control" v-mask="'###.###.###-##'" placeholder="xxx.xxx.xxx-xx">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Número do Alvará</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <label>UF</label>
            <select class="form-select">
                <option></option>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Cidade</label>
            <select class="form-select">
                <option></option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>CEP</label>
            <input type="text" class="form-control" v-mask="'###.###-##'" placeholder="xxx.xxx-xx">
        </div>
        <div class="col-sm-9">
            <label>Email</label>
            <input type="email" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Localização</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <input type="radio" class="radio" :value="1">&nbsp;Zona Urbana
        </div>
        <div class="col-sm-3">
            <input type="radio" class="radio" :value="2">&nbsp;Zona Rural
        </div>
    </div>
    <hr>
    <h5>ANEXAR DOCUMENTO(S)</h5>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <input type="file">
        </div>
        <div class="col-sm-9">
            <label>Foto do Estabelecimento</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="file">
        </div>
        <div class="col-sm-9">
            <label>RG</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="file">
        </div>
        <div class="col-sm-9">
            <label>CPF</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="file">
        </div>
        <div class="col-sm-9">
            <label>Comprovante de Residência</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="file">
        </div>
        <div class="col-sm-9">
            <label>Alvará de Funcionamento</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="file">
        </div>
        <div class="col-sm-9">
            <label>Licença para Funcionamento de Atividade</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="file">
        </div>
        <div class="col-sm-9">
            <label>Carteira de Vacinação</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align: right">
            <button type="button" class="btn btn-primary">&nbsp;Salvar&nbsp;</button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Cultura",
        data(){
            return{

            }
        },
        methods:{
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


                return;

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
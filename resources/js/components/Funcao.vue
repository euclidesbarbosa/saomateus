<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <label>Função</label>
                <select class="form-select" v-model="tipo_funcao_id">
                    <option></option>
                    <option v-for="row in funcoes" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <label>Usuário</label>
                <select class="form-select" v-model="user_id">
                    <option></option>
                    <option v-for="row in usuarios" :value="row.id">{{row.name}}</option>
                </select>
            </div>
            <div class="col-sm-4" style="text-align: right">
                <label>Função Ativa?</label>
                <div>
                    <input class="new_checkbox" type="checkbox" v-model="funcao_sta" :value="1" checked="checked">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="text-align: right">
                <button class="btn btn-primary botaosalvar" @click="salvar" type="button" > Salvar </button>&nbsp;
                <button class="btn btn-default botaonovo" @click="novo" type="button"> Novo </button>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="ajuste-overflow">
                <table>
                    <thead>
                    <tr>
                        <th style="text-align: left">USUÁRIO</th>
                        <th style="text-align: left">FUNÇÃO(ÕES)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <span style="display: none">{{total = 0}}</span>
                    <tr v-for="row in tabela" :style="row.user_sta == 0 ? 'color: red' : ''">
                        <span style="display: none">{{total++}}</span>
                        <td style="text-align: left">
                            {{row.name}}
                        </td>
                        <td style="text-align: left">
                            <span v-for="funcao in row.funcoes">
                                {{funcao.tipoFuncao.tipo_nome}}
                                <a href="#" @click="getExc(funcao.funcao_id)" title="excluir função do usuário"
                                    v-show="row.user_sta == 1">x</a>
                                <p v-show="(row.user_sta != 1)" style="color:blue">( usuário excluído! )</p>
                            </span>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td style="text-align: right;padding-right: 10px">TOTAL</td>
                        <td style="text-align: center">{{total}}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Funcao",
        data(){
            return{
                funcao_id: null,
                user_id: null,
                tipo_funcao_id: null,
                funcao_sta: true,
                tabela: [],
                usuarios: [],
                funcoes: []
            }
        },
        methods:{

            salvar(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'funcao/store',
                    data:{
                        funcao_id: this.funcao_id,
                        tipo_funcao_id: this.tipo_funcao_id,
                        user_id: this.user_id,
                        funcao_sta: (this.funcao_sta == true ? 1 : 0),
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

                axios({
                    method: 'POST',
                    url: _BASE_URL+'user/listar',
                    data:{
                        user_sta: 1,
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

                this.funcao_id = temp.funcao.funcao_id;
                this.tipo_funcao_id = temp.tipo_funcao_id;
                this.user_id = temp.user_id;
                this.funcao_sta = temp.funcao_sta;

            },
            getExc(id){

                if(!confirm('Excluir Funcao?'))
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'funcao/excluir',
                    data:{
                        funcao_id : id,
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
                this.funcao_id = null;
                // this.tipo_funcao_id = null;
                this.user_id = null;
                this.funcao_sta = true;

            },
            getTipoFuncao() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listar',
                    data: {
                        tipo_sigla: 'FUNÇÃO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.funcoes = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getUsuarios() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'user/listar',
                    data: {
                        user_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.usuarios = data;

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
            this.getPreencher();
            this.getTipoFuncao();
            this.getUsuarios();
        }
    }
</script>

<style scoped>

</style>
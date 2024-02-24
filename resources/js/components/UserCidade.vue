<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <label>Usuário</label>
                <select class="form-select" v-model="user_id">
                    <option></option>
                    <option v-for="row in users" :value="row.id">{{row.perfil.tipo_nome}} - {{row.name}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Cidade</label>
                <select class="form-select" v-model="cidade_id">
                    <option></option>
                    <option v-for="row in cidades" :value="row.cidade_id">{{row.cidade_nome}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="text-align: right">
                <button class="btn btn-primary" type="button" @click="salvar">&nbsp;Salvar&nbsp;</button>
                <button class="btn btn-default" type="button" @click="novo">&nbsp;Novo&nbsp;</button>
            </div>
        </div>
        <!--TABELA-->
        <div class="row">
            <div class="col-sm-12">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 5%;text-align: center">ID</th>
                        <th style="text-align: left">Nome</th>
                        <th style="text-align: left">Cidade</th>
                    </tr>
                    </thead>
                    <span style="display: none">{{total = 0}}</span>
                    <tbody>
                    <tr v-for="row in tabela" >
                        <span style="display: none">{{total++}}</span>
                        <td style="text-align: center">
                            <button type="button" class="btn btn-default" @click="getRec(row.id)">{{total}}</button>
                        </td>
                        <td style="text-align: left">{{row.name}}</td>
                        <td style="text-align: left">
                            <p v-for="cidade in row.userCidade">
                                <button type="button" class="btn btn-default" title="excluir usuário da cidade" @click="getExc(cidade.user_cidade_id)">
                                    <img src="/storage/icones/deletar.png" style="width:25px; heigth:25px">
                                    &nbsp;{{cidade.cidade.cidade_nome}}
                                </button>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2" style="text-align: right;padding-right: 10px">TOTAL</td>
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
        name: "UserCidade",
        data(){
            return{
                user_cidade_id: null,
                cidade_id: null,
                user_id: null,
                user_cidade_sta: 1,

                cidades:[],
                users:[],
                tabela:[],
            }
        },
        methods:{
            salvar(){
                //
                // if(!confirm('Enviar informações?')){
                //
                //     return;
                //
                // }

                axios({
                    method: 'POST',
                    url: _BASE_URL+'userCidade/store',
                    data:{
                        user_cidade_id: this.user_cidade_id,
                        cidade_id: this.cidade_id,
                        user_id: this.user_id,
                        user_cidade_sta: this.user_cidade_sta,
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
            //
            },
            getRec(id){

                let idx = this.tabela.findIndex(e=>{
                    return e.id == id;
                });

                if(idx == -1){
                    return;
                }

                let usuario = this.tabela[idx];

                this.user_cidade_id = usuario.userCidade.user_cidade_id;
                this.user_id = usuario.id;
                this.cidade_id = null;

            },
            getExc(id){

                if(!confirm('Excluir cidade do usuário?'))
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'userCidade/excluir',
                    data:{
                        user_cidade_id: id,
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
            getCidade(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'cidade/listar',
                    data:{
                        uf_sigla: 'MA',
                        cidade_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.cidades = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getUser(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'user/listar',
                    data:{
                        user_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.users = data;

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
            this.getCidade();
            this.getUser();
            this.getPreencher();
        }
    }
</script>

<style scoped>

</style>
<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <label>Perfil</label>
                <select class="form-select" v-model="tipo_perfil_id" @change="getFuncoes">
                    <option></option>
                    <option v-for="row in tipoPerfil" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Menu</label>
                <select class="form-select" v-model="tipo_menu_id">
                    <option></option>
                    <option v-for="row in tipoMenu"
                            :value="row.tipo_id">{{(row.tipoPai != null ? row.tipoPai.tipo_nome + " - " : "")}}{{row.tipo_nome}} - {{row.tipo_ordem}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Usuário</label>
                <select class="form-select" v-model="user_id">
                    <option></option>
                    <option v-for="row in user"
                            :value="row.id">{{row.user_nome}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="text-align: right">
                <button type="button" class="btn btn-primary" @click="salvar">&nbsp;Salvar&nbsp;</button>
                <button type="button" class="btn btn-default" @click="novo">&nbsp;Novo&nbsp;</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table>
                    <thead>
                    <tr>
                        <th style="text-align: center">Ord</th>
                        <th style="text-align: left">Menu</th>
                        <th style="text-align: left">Submenu</th>
                        <th style="text-align: left">Perfil</th>
                        <th style="text-align: center">Ordem</th>
                        <th style="text-align: left">Link</th>
                        <th style="text-align: center;width: 10%" title="Remover Acesso">RA</th>
                    </tr>
                    </thead>
                    <tbody>
                    <span style="display: none">{{total = 0}}</span>
                    <tr v-for="row in tabela" :class="(row.menu_perfil_sta == 1 ? 'color: black' : 'color: red')">
                        <span style="display: none">{{total++}}</span>
                        <td style="width: 5%;text-align: center">
                            <button type="button" @click="getRec(row)" class="btn btn-default">{{total}}</button>
                        </td>
                        <td style="text-align: left">{{(row.tipoMenu ? (row.tipoMenu.tipoPai == null ? row.tipoMenu.tipo_nome : row.tipoMenu.tipoPai.tipo_nome):"")}}</td>
                        <td style="text-align: left">{{(row.tipoMenu ? (row.tipoMenu.tipoPai == null ? "" : row.tipoMenu.tipo_nome): "")}}</td>
                        <td style="text-align: left">{{(row.tipoMenu ? row.tipoPerfil.tipo_nome : "")}}</td>
                        <td style="text-align: center;width:10%">{{(row.tipoMenu ? row.tipoMenu.tipo_ordem : "")}}</td>
                        <td style="text-align: left">{{(row.tipoMenu ? row.tipoMenu.tipo_link : "")}}</td>
                        <td style="width: 5%;text-align: center;color: red" title="Remover Acesso">
                            <button type="button" class="btn btn-danger" @click="getExc(row.menu_perfil_id)">{{total}}</button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6" style="text-align: right;padding-right: 10px">TOTAL</td>
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
        name: "MenuPerfil",
        data(){
            return{
                menu_perfil_id: null,
                tipo_perfil_id: null,
                tipo_menu_id: null,
                menu_perfil_sta: 1,
                tipoPerfil: [],
                tipoMenu: [],
                user_id: null,
                user: [],
                tabela: [],
            }
        },
        methods:{

            preencher() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'menuPerfil/listar',
                    data:{
                        tipo_perfil_id: this.tipo_perfil_id,
                    }
                }).then(response => {

                    let data = response.data;

                    this.tabela = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });
            },

            salvar(){

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'menuPerfil/store',
                    data:{
                        menu_perfil_id:  this.menu_perfil_id,
                        tipo_perfil_id:  this.tipo_perfil_id,
                        tipo_menu_id:    this.tipo_menu_id,
                        menu_perfil_sta: this.menu_perfil_sta,
                    }
                }).then(response => {

                    let data = response.data;

                    if(data[0].erro == 1){

                        alertify.success(data[0].mensagem);

                        this.preencher();

                        return;

                    }

                    alertify.error(data[0].mensagem);


                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });
            },

            novo(){
                this.tipo_menu_id = null;
            },

            getRec(temp){
                this.tipo_perfil_id = temp.tipo_perfil_id;
                this.tipo_menu_id = temp.tipo_menu_id;
                this.getUser();
            },

            getExc(id){

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'menuPerfil/excluir',
                    data:{
                        menu_perfil_id: id,
                    }
                }).then(response => {

                    let data = response.data;

                    if(data[0].erro == 1){

                        alertify.success(data[0].mensagem);

                        this.preencher();
                        // let index = this.tabela.findIndex(e=>{
                        //     return e.menu_perfil_id == id;
                        // })
                        //
                        // if(index != -1){
                        //
                        //     this.tabela.indexOf(index);
                        //
                        // }

                        return;

                    }

                    alertify.error(data[0].mensagem);


                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });
            },

            getFuncoes(){
                this.getUser();
                this.preencher();
            },

            getTipoPerfil(){
                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listarPerfil',
                    data: {
                        tipo_sigla : 'PERFIL',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoPerfil = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });
            },

            getTipoMenu() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listarT',
                    data: {
                        tipo_sigla: 'MENU',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoMenu = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });
            },

            getUser() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'user/listar',
                    data: {
                        tipo_perfil_id: this.tipo_perfil_id,
                        user_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.user = data;

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
            this.getTipoMenu();
            this.getTipoPerfil();
            this.getUser();
        }
    }
</script>

<style scoped>

</style>
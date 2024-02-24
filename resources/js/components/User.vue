<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <label>Nome:</label>
                <input type="text" class="form-control" v-model="name"
                       @input="name = $event.target.value.toUpperCase()">
            </div>
            <div class="col-sm-4">
                <label>Usuário:</label>
                <input type="text" class="form-control" v-model="user_nome"
                       @input="user_nome = $event.target.value.toUpperCase()">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Cel:</label>
                <input type="text" class="form-control" v-model="user_tel"
                v-mask="'(##) #####-####'">
            </div>
            <div class="col-sm-8">
                <label>Email:</label>
                <input type="text" class="form-control" v-model="email">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Perfil:</label>
                <select class="form-select" v-model="tipo_perfil_id">
                    <option></option>
                    <option v-for="row in perfil" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label>Muda senha?</label>
                <div>
                    <input type="checkbox" class="new_checkbox" :value="0" v-model="muda_password">
                </div>
            </div>
            <div class="col-sm-2">
                <label>Ativo?</label>
                <div>
                    <input type="checkbox" class="new_checkbox" :value="1" v-model="user_sta">
                </div>
            </div>
            <div class="col-sm-4" style="text-align: right">
                <label>&nbsp;</label>
                <div>
                    <button type="button" class="btn btn-primary" @click="salvar">Salvar</button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn btn-default" @click="novo"
                    style="border:solid 0.5px #cccccc">Novo</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Setor</label>
                <select class="form-select" v-model="tipo_menu_id">
                    <option>--Todos--</option>
                    <option v-for="row in setores" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>Perfil</th>
<!--                        <th>E-mail</th>-->
                        <th>Cel</th>
                        <th>Setor(es)</th>
                        <th v-show="(user.id < 3)" style="text-align: center">EXC</th>
                    </tr>
                    </thead>
                    <span style="display: none">{{i = 1}}</span>
                    <tbody>
                    <tr v-for="row in tabela" :style="row.user_sta == 0 ? 'color: red': ''">
                        <td style="text-align: center"><a href="#" class="btn btn-default" @click="getRec(row)">{{ '0'.repeat(3 - i.toString().length) + i.toString() }}</a></td>
                        <td style="text-align: left">{{row.name}}</td>
                        <td style="text-align: left">{{row.email}}</td>
<!--                        <td style="text-align: left">{{row.user_nome}}</td>-->
                        <td style="text-align: left">{{(row.perfil != null ? row.perfil.tipo_nome : '')}}</td>
                        <td style="text-align: left">{{row.user_tel}}</td>
                        <td style="text-align: left">
                            <p v-for="puser in row.menuPerfilUser">
                                <a href="#" @click="getExcMenu(puser.menu_perfil_user_id)"
                                 title="Excluir submenu do usuário"
                                 style="color: red;text-decoration: none">{{puser.menuPerfil.tipoMenu.tipo_nome}}</a>
                            </p>
                        </td>
                        <td v-show="(user.tipo_perfil_id < 3)" style="text-align: center">
                            <a href="#" class="btn btn-default" @click="getExc(row.id)" style="color: red">&nbsp;X&nbsp;</a>
                        </td>
                        <span style="display: none">{{i++}}</span>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6">Total de Usuários:</td>
                        <td style="text-align: center;">{{(i - 1)}}</td>
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
        name: "User",
        data(){
            return{
                id: null,
                name: null,
                user_nome: null,
                email: null,
                password: '123mudar',
                user_tel: null,
                tipo_perfil_id: null,
                perfil: [],
                user_sta: true,
                muda_password: false,
                tabela: [],
                setores: [],
                tipo_menu_id: null,
            }
        },
        props:{
            user: {
                type: Array,
                required: true
            }
        },
        methods:{
            salvar(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'user/store',
                    data:{

                        id: this.id,
                        name: this.name,
                        user_nome: this.user_nome,
                        email: this.email,
                        password: this.password,
                        tipo_perfil_id: this.tipo_perfil_id,
                        tipo_perfil_id: this.tipo_perfil_id,
                        tipo_perfil_id: this.tipo_perfil_id,
                        user_tel: this.user_tel,
                        muda_password: (this.muda_password == true ? 1 : 0),
                        user_sta: (this.user_sta == true ? 1 : 0),
                        tipo_menu_id: this.tipo_menu_id,
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        alertify.success(data.mensagem);

                        this.id = data.id;

                        this.novo();

                        this.getPreencher();

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
            getExc(id){

                if(!confirm('Excluir usuário ?'))
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'user/excluir',
                    data:{

                        id: id
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        alertify.success(data.mensagem);

                        this.novo();

                        this.getPreencher();

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
                this.id = null;
                this.name = null;
                this.email = null;
                this.user_nome = null;
                this.user_tel = null;

            },
            getPreencher(){
                axios({
                    method: 'POST',
                    url: _BASE_URL+'user/listar',
                    data:{
                        tipo_perfil_min: this.user.tipo_perfil_id
                    }
                }).then(response => {

                    this.tabela = response.data.data;
                }).catch(e =>{

                    alertify.error(e.response);

                });
            },
            getRec(temp){
                this.id = temp.id;
                this.name = temp.name;
                this.user_nome = temp.user_nome;
                this.user_tel = temp.user_tel;
                this.email = temp.email;
                this.user_sta = (temp.user_sta == 1 ? true : false);
                this.tipo_perfil_id = temp.tipo_perfil_id;
            },
            getPerfil(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listarPerfil',
                    data:{
                        tipo_sigla: 'PERFIL',
                        tipo_sta: 1
                    }
                }).then(response => {
                    this.perfil = response.data.data;
                }).catch(e =>{

                    alertify.error(e.response);

                });
            },
            getTipoSetor(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listarPerfil',
                    data:{
                        tipo_sigla: 'MENU',
                        tipo_sta: 1
                    }
                }).then(response => {
                    let setorTemp =response.data.data;

                    let setor = setorTemp.filter(e=>{
                        return e.tipo_nome == 'Atendimento';
                    });

                    this.setores = setorTemp.filter(e=>{

                        return e.tipo_id_1 == setor[0].tipo_id && e.tipo_orgao == 1;

                    });

                }).catch(e =>{

                    alertify.error(e.response);

                });
            },
            getExcMenu(id){

                if(!confirm('Excluir Menu do Usuário ?'))
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'menuPerfilUser/excluir',
                    data:{

                        menu_perfil_user_id: id
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        alertify.success(data.mensagem);

                        this.novo();

                        this.getPreencher();

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

        },
        mounted(){
            this.getPreencher();
            this.getPerfil();
            this.getTipoSetor();
        }
    }
</script>

<style scoped>

</style>
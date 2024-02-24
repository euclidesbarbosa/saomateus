<template>
    <ul class="navbar-nav mr-auto" v-show="getStart">
        <li v-for="row in menu" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"
                href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{(row.tipoMenu.tipo_id_1 == null ? row.tipoMenu.tipo_nome : "")}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <span v-for="sm in submenu">
                    <hr v-show="(sm.tipoMenu.tipo_nome === '-' && row.tipoMenu.tipo_id === sm.tipoMenu.tipo_id_1)">
                    <a v-show="(row.tipoMenu.tipo_id === sm.tipoMenu.tipo_id_1 && sm.tipoMenu.tipo_nome !== '-')"
                       class="dropdown-item" :href="baseUrl+sm.tipoMenu.tipo_link">
                        {{sm.tipoMenu.tipo_nome}}
                    </a>
                </span>
            </div>
        </li>
    </ul>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Menu",
        data(){
            return{

                tipo_id_1: null,
                conectado: null,
                menu: [],
                submenu: [],
                menuConfig: [],
                menuPesquisa: [],
                tipoSetor: [],
                tipo_perfil_id: null,
                baseUrl: _BASE_URL,
            }
        },
        props:{
            userLogin:{
                type: Array,
                required: true,
                default: null
            }
        },
        methods: {
            getStart(id = null){

                if(this.userLogin == null)
                    return false;
                else if(this.userLogin.length == 0)
                    return false;
                else if(this.userLogin[0] == null)
                    return false;
                else if(this.userLogin[0].tipo_perfil_id == id)
                    return true;
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

                    for(var i = 0; i < data.length; i++){
                        if(i == 0){

                            this.menu.push({
                                title: 'Cadastro Inicial',
                                url: _BASE_URL + 'cliente/index',
                            });

                        }

                        if(this.tipo_perfil_id == 1 || this.tipo_perfil_id == 2) {
                            this.menu.push({
                                title: (data[i].tipo_nome_abrv != null ? data[i].tipo_nome_abrv : data[i].tipo_nome),
                                url: _BASE_URL + (data[i].tipo_link != null ? data[i].tipo_link : 'cliente/index'),
                            });
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
            getConectado(){
                //
            },
            getMenu() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'menuPerfil/listar',
                    data: {
                        menu_perfil_sta: 1,
                        menu: 1,
                    }

                }).then(response => {

                    let data = response.data;

                    this.menu = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getSubmenu() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'menuPerfil/listarMenu',
                    data: {
                        menu_perfil_sta: 1,
                    }

                }).then(response => {

                    let data = response.data;

                    this.submenu = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            }
        },
        mounted(){
            this.tipo_perfil_id = (this.userLogin != [null] > 0 ? this.userLogin[0].tipo_perfil_id : null);
            this.getMenu();
            this.getSubmenu();
            // this.getTipoOrgao();
        }
    }
</script>

<style scoped>

</style>
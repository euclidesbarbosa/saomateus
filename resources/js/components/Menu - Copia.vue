<template>
    <ul class="navbar-nav mr-auto" v-show="getStart">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"
               href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">Atendimento</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a v-for="row in menu" class="dropdown-item" :href="row.url">{{row.title}}</a>
            </div>
        </li>
        <li class="nav-item dropdown" v-show="(tipo_perfil_id == 1 || tipo_perfil_id == 2)">
            <a class="nav-link dropdown-toggle"
               href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">Configurações</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a v-for="row in menuConfig" class="dropdown-item" :href="row.url">{{row.title}}</a>
            </div>
        </li>
        <li class="nav-item dropdown" v-show="getStart(1)">
            <a class="nav-link dropdown-toggle"
               href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">Pesquisa</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a v-for="row in menuPesquisa" class="dropdown-item" :href="row.url">{{row.title}}</a>
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
                conectado: null,
                menu: [],
                menuConfig: [],
                menuPesquisa: [],
                tipoSetor: [],
                tipo_perfil_id: null,
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

                if(this.userLogin === null
                    || this.userLogin === []
                    || this.userLogin === ''
                ){
                    return;
                }

                if(this.userLogin[0] == null)
                    return;

                if (this.userLogin[0].tipo_perfil_id === 1) {

                    this.menuPesquisa.push({
                        title: 'Pessoas',
                        url: _BASE_URL + 'pesquisa/index',
                    });

                    this.menuConfig.push({
                        title: 'Órgãos',
                        url: _BASE_URL + 'tipo/index/ORGAO',
                    });

                    this.menuConfig.push({
                        title: 'Escolas',
                        url: _BASE_URL + 'tipo/index/ESCOLA',
                    });

                    this.menuConfig.push({
                        title: 'Profissões',
                        url: _BASE_URL + 'tipo/index/PROFISSAO',
                    });

                    this.menuConfig.push({
                        title: 'Estabelecimentos',
                        url: _BASE_URL + 'pessoa/indexLocalidade',
                    });

                    this.menuConfig.push({
                        title: 'Tipos de Estabelecimentos',
                        url: _BASE_URL + 'tipo/index/LOCAL',
                    });

                    this.menuConfig.push({
                        title: 'Bairros',
                        url: _BASE_URL + 'tipo/index/BAIRRO',
                    });

                    this.menuConfig.push({
                        title: 'Povoados',
                        url: _BASE_URL + 'tipo/index/POVOADO',
                    });

                    this.menuConfig.push({
                        title: 'Tipo de Assunto',
                        url: _BASE_URL + 'tipo/index/ASSUNTO',
                    });

                    this.menuConfig.push({
                        title: 'Tipos de Status do Censo',
                        url: _BASE_URL + 'tipo/index/CENSO_STATUS',
                    });

                    this.menuConfig.push({
                        title: 'Tipos de Documentos',
                        url: _BASE_URL + 'tipo/index/DOCUMENTO',
                    });

                    this.menuConfig.push({
                        title: 'Tipos de Contatos',
                        url: _BASE_URL + 'tipo/index/CONTATO',
                    });

                    this.menuConfig.push({
                        title: 'Tipos de Parentêsco',
                        url: _BASE_URL + 'tipo/index/PARENTESCO',
                    });

                    this.menuConfig.push({
                        title: 'Tipos de Funções',
                        url: _BASE_URL + 'tipo/index/FUNÇÃO',
                    });

                    this.menuConfig.push({
                        title: 'Funções dos Usuários',
                        url: _BASE_URL + 'funcao/index',
                    });

                }
                // else if(this.userLogin[0].tipo_perfil_id === 2){
                //
                //     this.menu.push({
                //         title: 'Setor',
                //         url: _BASE_URL + 'cliente/index',
                //     });
                //
                //     this.menu.push({
                //         title: 'Usuários',
                //             url: _BASE_URL + 'user/index',
                //     });
                //
                // }
                // else{
                //
                //     this.menu.push({
                //         title: 'Setor',
                //         url: _BASE_URL + 'cliente/index',
                //     });
                //
                // }
                //
                // this.menu.push({
                //     title: 'Mudar a senha',
                //     url: _BASE_URL + 'user/indexMudaSenha',
                // });

            }
        },
        mounted(){
            this.tipo_perfil_id = (this.userLogin != [null] > 0 ? this.userLogin[0].tipo_perfil_id : null);
            this.getMenu();
            this.getTipoOrgao();
        }
    }
</script>

<style scoped>

</style>
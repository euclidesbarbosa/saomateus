<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <label>Do tipo</label>
                <select class="form-select" v-model="tipo_id_1">
                    <option></option>
                    <option v-for="row in tipoPai" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label>Nome:</label>
                <input class="form-control" type="text" v-model="tipo_nome" maxlength="100" id="tiponome">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <label>Abreviação:</label>
                <input class="form-control" type="text" v-model="tipo_nome_abrv" maxlength="50">
            </div>
            <div class="col-sm-2">
                <label>Ordem:</label>
                <input class="form-control" type="number" v-model="tipo_ordem">
            </div>
            <div class="col-sm-2">
                <label style="color: blue; font-weight: bold">Órgão ?</label>
                <div style="display: block">
                    <input class="checkbox" type="checkbox" v-model="tipo_orgao" value="1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label>Link:</label>
                <input class="form-control" type="text" v-model="tipo_link" maxlength="120">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label>Style:</label>
                <textarea class="form-control" type="text" v-model="tipo_style"
                          rows="3"
                          cols="50"
                          maxlength="500"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label>Mask:</label>
                <input class="form-control" type="text" v-model="tipo_mask" maxlength="50">
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="col-sm-2">
                <label>Status:</label>
                <input class="form-check" type="checkbox" v-model="tipo_sta" value="1">
            </div>
            <div class="col-sm-10" style="text-align: right">
                <button class="btn btn-primary" type="button" @click="salvar"> Salvar </button>
                <button class="btn btn-default" type="button" @click="novo"> Novo </button>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th>Grupo</th>
                                <th>Subgrupo</th>
                                <th>Abreviação</th>
                                <th>Órgão</th>
                                <th>Ordem</th>
                                <th>Style</th>
                                <th style="text-align: center">Mask</th>
                                <th style="text-align: center">EXC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <span style="display: none">{{iCont = 1}}</span>
                            <tr v-for="(row,index) in tabela" :key="index" :style="getStyle(row.tipo_style, row.tipo_sta)">
                                <td style="text-align: center;width:5%">
                                    <button class="btn btn-default" @click="getRec(row)" type="button" title="editar">
                                        <img :src="'/storage/edit.png'" style="width: 25px; height: 25px;margin: 0px;">
                                    </button>
                                </td>
                                <td>{{(row.tipoPai != null ? row.tipoPai.tipo_nome : '')}}</td>
                                <td>{{row.tipo_nome}}</td>
                                <td>{{row.tipo_nome_abrv}}</td>
                                <td v-if="(row.tipo_orgao == 1)" style="color: blue;font-weight: bold">SIM</td>
                                <td v-if="(row.tipo_orgao == 0)">NÃO</td>
                                <td>{{row.tipo_ordem}}</td>
                                <td>{{row.tipo_style}}</td>
                                <td>{{row.tipo_mask}}</td>
                                <td style="text-align: center!important;">
                                    <button class="btn btn-default" @click="getExc(row.tipo_id)" type="button" title="excluir">
                                        <img :src="'/storage/icones/deletar.png'" style="width: 25px; height: 25px;margin: 0px;">
                                    </button>
                                </td>
                                <span style="display: none">{{iCont++}}</span>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">Total de Itens:</td>
                                <td style="text-align: center">{{(iCont - 1).toString()}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="text-align: center;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" arial-label="Search results pages">Página(s):&nbsp;</a>
                                </li>
                                <li class="page-item" v-for="p in paginas">
                                    <a class="page-link" href="#" @click="getPagina(p.pagina)">{{'0'.repeat(2 - p.pagina.toString().length) + p.pagina.toString()}}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';
    // import { Bootstrap4Pagination } from 'laravel-vue-pagination';
    // import { Bootstrap5Pagination } from 'laravel-vue-pagination';
    // import {  TailwindPagination } from 'laravel-vue-pagination';
    // import pagination from 'laravel-vue-pagination';

    export default {
        name: "Tipo",
        data(){
            return{
                tipo_id: null,
                tipo_id_1: null,
                tipo_sigla: this.tipoSigla,
                tipo_nome: null,
                tipo_nome_abrv: null,
                tipo_link: null,
                tipo_ordem: null,
                tipo_orgao: false,
                tipo_style: null,
                tipo_mask: null,
                tipo_sta: true,
                tipoPai: null,

                //PAGINAÇÃO
                page_from: 0,
                pagina: 1,
                page_ant: 0,
                page_prox: 1,
                por_pagina: 3,
                qtd_paginas: 1,
                paginas: [],
                tabela:[],
            }
        },
        // components:{
        //     pagination
        // },
        props:{
            tipoSigla:{
                type: String,
                required: true,
            }
        },
        methods:{
            getStyle(style, tipo_sta){
                return style + (tipo_sta != 1 ? ';color: red': '');
            },
            salvar(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/store',
                    data:{
                        tipo_id: this.tipo_id,
                        tipo_id_1: this.tipo_id_1,
                        tipo_sigla: this.tipo_sigla,
                        tipo_nome: this.tipo_nome,
                        tipo_nome_abrv: this.tipo_nome_abrv,
                        tipo_link: this.tipo_link,
                        tipo_ordem: this.tipo_ordem,
                        tipo_style: this.tipo_style,
                        tipo_mask: this.tipo_mask,
                        tipo_sta: (this.tipo_sta == true ? 1 : 0),
                        tipo_orgao: (this.tipo_orgao == true ? 1 : 0),
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        // console.log(this.tipo_sigla);

                        this.getTipo();

                        this.getPreencher();

                        this.novo();

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
            getPreencher(tipo = 0){

                if(tipo == 1){

                    this.pagina = 1;

                    this.paginas = [];

                }


                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: this.tipo_sigla,
                        page: this.pagina,
                    }

                }).then(response => {

                    this.page_from = response.data.from;

                    let paginas = response.data.last_page;

                    for(let i = 1; i <= paginas; i++){
                        this.paginas.push({pagina: i});
                        this.qtd_paginas = i;
                    }

                    this.tabela = response.data.data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getTipo(){

                let sigla = this.tipo_sigla;

                if(sigla == 'MODELO'){

                    sigla = 'MARCA';

                }

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: sigla,
                        tipo_id_1: -1, //trazer todos os tipos pai nulos.
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoPai = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getRec(temp){

                let item = document.getElementById('tiponome');

                this.tipo_id = temp.tipo_id;
                this.tipo_id_1 = temp.tipo_id_1;
                this.tipo_nome = temp.tipo_nome;
                this.tipo_nome_abrv = temp.tipo_nome_abrv;
                this.tipo_link = temp.tipo_link;
                this.tipo_ordem = temp.tipo_ordem;
                this.tipo_orgao = (temp.tipo_orgao == 1 ? true : false);
                this.tipo_style = temp.tipo_style;
                this.tipo_mask = temp.tipo_mask;
                this.tipo_sta = (temp.tipo_sta == 1 ? true : false);

                item.focus();

            },
            getExc(id){

                if(!confirm('Excluir item?'))
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/excluir',
                    data:{
                        tipo_id: id,
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        this.getTipo();

                        this.getPreencher();

                        this.novo();

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

                let item = document.getElementById('tiponome');

                this.tipo_id = null;
                this.tipo_id_1 = null;
                this.tipo_nome = null;
                this.tipo_nome_abrv = null;
                this.tipo_link = null;
                this.tipo_ordem = null;
                this.tipo_style = null;
                this.tipo_mask = null;
                this.tipo_sta = true;

                item.focus();

            },
        },
        mounted(){
            this.getPreencher();
            this.getTipo();
        }
    }
</script>

<style scoped>

</style>
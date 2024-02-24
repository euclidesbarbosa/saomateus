<template>
    <div class="row">
        <div class="col-sm-3">
            <label>CPF</label>
            <input class="form-control" type="text" v-mask="'###.###.###-##'" placeholder="xxx.xxx.xxx-xx"
                   v-model="cpf">
        </div>
        <div class="col-sm-4">
            <label>Nome</label>
            <input class="form-control" type="text" v-model="nom_pessoa">
        </div>
        <div class="col-sm-3">
            <label>Telefone</label>
            <input class="form-control" type="text" v-mask="'(##) #####-####'" placeholder="(xx) xxxxx-xxxx"
                   v-model="tel_1" >
        </div>
        <div class="col-sm-1">
            <label>&nbsp;</label>
            <button type="button" class="btn btn-success" @click="getPreencher(1)">&nbsp;Pesquisa&nbsp;</button>
        </div>
    </div>
    <!--TABELA-->
    <div class="row">
        <div>
            <table>
                <thead>
                <tr>
                    <th style="width: 5%;text-align: center">ID</th>
                    <th style="text-align: center;width: 10%">CPF</th>
                    <th style="text-align: left">Nome</th>
                    <th style="text-align: left">Data de Nascimento</th>
                    <th style="text-align: left">Local</th>
                    <th style="text-align: center">Data/Hora</th>
                    <th style="text-align: left">Situação</th>
                    <th style="text-align: left">Assunto</th>
                </tr>
                </thead>
                <span style="display: none">{{total = (page_from - 1)}}</span>
                <tbody>
                <tr v-for="row in tabela" >
                    <span style="display: none">{{total++}}</span>
                    <td style="width: 5%;text-align: center">{{(total)}}</td>
                    <td style="text-align: center">{{row.pessoa.cpf}}</td>
                    <td style="text-align: left">{{row.pessoa.nom_pessoa}}</td>
                    <td style="text-align: left">{{(row.pessoa.dta_nasc_pessoa != null ? row.pessoa.dta_nasc_pessoa.substr(0,10).split('-').reverse().join('/') : '')}}</td>
                    <td style="text-align: left">{{(row.tipoMenu ? row.tipoMenu.tipo_nome : '')}}</td>
                    <td style="text-align: center;width:150px">{{getDataHoraBanco(row.updated_at)}}
                    </td>
                    <td style="text-align: left">{{(row.atendimento_situacao == 1 ? 'Atendido' : 'Não Atendido')}}</td>
                    <td style="text-align: left">{{row.atendimento_descricao}}</td>

                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="7" style="text-align: right;padding-right: 10px">TOTAL</td>
                    <td style="text-align: center">{{total}}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12" style="text-align: center">
                <nav aria-label="Page navigation">
                    <ul v-for="x in paginas" class="pagination pagination-sm justify-content-center" v-show="(x.pag == grpPagina)">
                        <li v-show="(x.pag == grpPagina)" class="page-item">
                            <a class="page-link" href="#" @click="getGrupoPagina(x.pag, '-')">{{"<<"}}</a>
                        </li>
                        <li v-for="p in x.pagi.p" class="page-item" v-show="(x.pag == grpPagina)">
                            <a class="page-link" href="#" @click="getPagina(p.pagina)">{{'0'.repeat(3 - p.pagina.toString().length) + p.pagina.toString()}}</a>
                        </li>
                        <li v-show="(x.pag == grpPagina)"  class="page-item">
                            <a class="page-link" href="#" @click="getGrupoPagina(x.pag, '+')">{{">>"}}</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {

        name: "AtendimentoPesquisa",
        data(){
            return{

                cpf: null,
                nom_pessoa: null,
                tel_1: null,

                atendimento: [],

                //PAGINAÇÃO
                page_from: 0,
                pagina: 1,
                grpPagina: 1,
                page_ant: 0,
                page_prox: 1,
                por_pagina: 3,
                qtd_paginas: 1,
                paginas: [],
                tPaginas: 0,
                tGrupoPaginas: 0,
                tabela:[],
                totalPaginas: 0,
                tipoOrgao: [],

            }
        },
        props:{
            tipoMenu:{}
        },
        methods:{

            getGrupoPagina(grpPagina, sentido){

                if(sentido == '+'){

                    if((grpPagina++) < this.tGrupoPaginas){

                        this.grpPagina++;

                    }

                }
                else{

                    if((grpPagina--) < 1) {

                        this.grpPagina == 1;

                    }
                    else{

                        this.grpPagina--;

                    }

                }

                let x = this.paginas.filter(e=>{

                    return e.pag == this.grpPagina;

                });

                if(x.length > 0){

                    this.getPagina(x[0].pagi.p[0].pagina);

                }

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

            getDataHoraBanco(date, id = null, domicilio = null){

                if(date == null){

                    return '';

                }

                let temp = new Date(date);

                let dt =
                    '0'.repeat(2 - temp.getDate().toString().length) + temp.getDate().toString()
                    + '/' + '0'.repeat(2 - (temp.getMonth() + 1).toString().length) + (temp.getMonth() + 1).toString()
                    + '/' + temp.getFullYear().toString();

                let hr = '0'.repeat(2 - temp.getHours().toString().length) + temp.getHours().toString() + ':'
                    + '0'.repeat(2 - temp.getMinutes().toString().length) + temp.getMinutes().toString();

                return dt + ' ' + hr;

            },
            getPreencher(tipo = 0){

                if(tipo == 1){

                    this.pagina = 1;

                    this.paginas = [];

                    this.grpPagina = 1;
                }

                axios({
                    method: 'POST',
                    url: _BASE_URL+'atendimento/listar',
                    data:{
                        tipo_menu_id: (this.tipoMenu ? this.tipoMenu.tipo_id : null),
                        cpf: this.cpf,
                        nom_pessoa: this.nom_pessoa,
                        tel_1: this.tel_1,
                        page: this.pagina,
                    }

                }).then(response => {

                    this.page_from = response.data.from;

                    //total de paginas consulta
                    let paginas = response.data.last_page;

                    this.totalPaginas = paginas;

                    let pag = parseInt(paginas / 10);

                    //total de paginas
                    this.tGrupoPaginas = pag;

                    if(pag < 0){

                        pag = 1;

                    }

                    let cont = 1;
                    let iCont = 1;
                    let aPag = [];

                    for(let iP = 1; iP <= pag; iP++) {

                        for (let i = iCont; i <= paginas; i++) {

                            aPag.push(
                                {pagina: i},
                            );

                            this.qtd_paginas = i;

                            if(cont >= 10){

                                this.paginas.push({
                                    pag: iP,
                                    pagi: {p: aPag},
                                });

                                aPag = [];

                                iCont = i + 1;

                                cont = 1;

                                break;
                            }

                            cont++;

                        }

                    }

                    // console.log(this.paginas);

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
            getTipoAssunto(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: 'ASSUNTO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoAssunto = data;

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
            this.getTipoAssunto();

        }
    }
</script>

<style scoped>

</style>
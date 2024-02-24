<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <label>UF</label>
                <select class="form-select" v-model="uf_sigla" @change="getCidade">
                    <option></option>
                    <option v-for="row in ufs" :value="row.uf_sigla">{{row.uf_nome}}</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Cidade</label>
                <select class="form-select" v-model="cidade_id">
                    <option></option>
                    <option v-for="row in cidades" :value="row.cidade_id">{{row.cidade_nome}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <label>Ano</label>
                <input class="form-control" type="number" v-model="censo_ano" step="1">
            </div>
            <div class="col-sm-2">
                <label>Mês</label>
                <select class="form-select" v-model="censo_mes">
                    <option v-for="mes in meses" :value="mes.mes_id">{{mes.mes_ext}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Título</label>
                <input class="form-control" type="text" v-model="censo_titulo">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Descrição</label>
                <textarea class="form-control" v-model="censo_desc" rows="3" cols="50"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>Quem pode editar o cadastro</label>
                <select class="form-select" v-model="tipo_censo_status_id">
                    <option v-for="row in tipoCensoStatus" :value="row.tipo_id">{{row.tipo_nome}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-primary" type="button" @click="salvar">&nbsp;Salvar&nbsp;</button>
                &nbsp;<button class="btn btn-default botaonovo" >&nbsp;Novo&nbsp;</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="overflow: scroll;height: 300px;">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 5%;text-align:center">ID</th>
                        <th style="text-align: center">ANO</th>
                        <th style="text-align: center">MÊS</th>
                        <th style="text-align: left">CIDADE</th>
                        <th style="text-align: left">TÍTULO</th>
                        <th style="text-align: left">DESCRIÇÃO</th>
                        <th style="text-align: left">STATUS</th>
                        <th style="width: 5%;text-align: center">EXC</th>
                    </tr>
                    </thead>
                    <tbody>
                    <span style="display: none">{{total = 0}}</span>
                    <tr v-for="row in tabela">
                        <span style="display: none">{{total++}}</span>
                        <td style="width: 5%;text-align: center">
                            <button class="btn btn-default" type="button" @click="getRec(row)">
                                <img :src="'/storage/icones/editar.png'" style="width: 25px;height: 25px">
                            </button>
                        </td>
                        <td style="text-align: center">{{row.censo_ano}}</td>
                        <td style="text-align: center">{{row.mesExt}}</td>
                        <td style="text-align: left">{{row.cidade.cidade_nome}}</td>
                        <td style="text-align: left">{{row.censo_titulo}}</td>
                        <td style="text-align: left">{{row.censo_desc}}</td>
                        <td style="text-align: left">{{row.tipoCensoStatus.tipo_nome}}</td>
                        <td style="width: 5%;text-align: center">
                            <button class="btn btn-default" type="button" @click="getExc(row.censo_id)">
                                <img :src="'/storage/icones/apagar.png'" style="width: 25px;height: 25px">
                            </button>
                        </td>
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
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Censo",
        data(){
            return{
                cidade_id: null,
                censo_id: null,
                censo_ano: 2023,
                censo_mes: null,
                censo_titulo: null,
                censo_desc: null,
                tipo_censo_status_id: null,
                censo_sta: true,

                uf_sigla: null,
                tipoCensoStatus: [],
                meses: [],
                tabela: [],
                ufs: [],
                cidades: [],
            }
        },
        methods:{
            salvar(){

                if(!confirm('Enviar informações?')){

                    return;

                }

                axios({
                    method: 'POST',
                    url: _BASE_URL+'censo/store',
                    data:{
                        censo_id: this.censo_id,
                        cidade_id: this.cidade_id,
                        censo_ano: this.censo_ano,
                        censo_mes: this.censo_mes,
                        censo_titulo: this.censo_titulo,
                        censo_desc: this.censo_desc,
                        tipo_censo_status_id: this.tipo_censo_status_id,
                        censo_sta: this.censo_sta,
                    }
                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                     //   this.novo();

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
                    url: _BASE_URL+'censo/listar',
                }).then(response => {

                    let data = response.data.data;

                    this.tabela = [];

                    let arr = [];

                    let mesExt = "";

                    for(let i  = 0; i < data.length; i++){

                        switch(data[i].censo_mes){
                            case 1:
                                mesExt = 'JANEIRO';
                                break;
                            case 2:
                                mesExt = 'FEVEREIRO';
                                break;
                            case 3:
                                mesExt = 'MARÇO';
                                break;
                            case 4:
                                mesExt = 'ABRIL';
                                break;
                            case 5:
                                mesExt = 'MAIO';
                                break;
                            case 6:
                                mesExt = 'JUNHO';
                                break;
                            case 7:
                                mesExt = 'JULHO';
                                break;
                            case 8:
                                mesExt = 'AGOSTO';
                                break;
                            case 9:
                                mesExt = 'SETEMBRO';
                                break;
                            case 10:
                                mesExt = 'OUTUBRO';
                                break;
                            case 11:
                                mesExt = 'NOVEMBRO';
                                break;
                            case 12:
                                mesExt = 'DEZEMBRO';
                                break;
                        }

                        arr.push({
                            censo_id: data[i].censo_id,
                            cidade_id: data[i].cidade_id,
                            censo_ano: data[i].censo_ano,
                            censo_mes: data[i].censo_mes,
                            censo_titulo: data[i].censo_titulo,
                            censo_desc: data[i].censo_desc,
                            tipo_censo_status_id: data[i].tipo_censo_status_id,
                            censo_sta_id: data[i].censo_sta_id,
                            cidade: data[i].cidade,
                            tipoCensoStatus: data[i].tipoCensoStatus,
                            mesExt: mesExt,

                        });
                    }

                    this.tabela = arr;

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

                this.uf_sigla = temp.cidade.uf_sigla;

                this.getCidade();

                this.cidade_id = temp.cidade_id;
                this.censo_id = temp.censo_id;
                this.censo_ano = temp.censo_ano;
                this.censo_mes = temp.censo_mes;
                this.censo_titulo = temp.censo_titulo;
                this.censo_desc = temp.censo_desc;
                this.tipo_censo_status_id = temp.tipo_censo_status_id;
                this.censo_sta = temp.censo_sta;
            },
            getExc(id){

                if(!confirm('Excluir Censo?'))
                    return;

                axios({
                    method: 'POST',
                    url: _BASE_URL+'censo/excluir',
                    data:{
                        censo_id : id,
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
                this.cidade_id = null;
                this.censo_ano = null;
                this.censo_mes = null;
                this.censo_titulo = null;
                this.censo_desc = null;
                this.censo_sta = 1;
            },
            getMeses(){

                this.meses.push({
                    mes_id: 1,
                    mes_abr: 'JAN',
                    mes_ext: 'JANEIRO',
                });

                this.meses.push({
                    mes_id: 2,
                    mes_abr: 'FEV',
                    mes_ext: 'FEVEREIRO',
                });

                this.meses.push({
                    mes_id: 3,
                    mes_abr: 'MAR',
                    mes_ext: 'MARÇO',
                });

                this.meses.push({
                    mes_id: 4,
                    mes_abr: 'ABR',
                    mes_ext: 'ABRIL',
                });

                this.meses.push({
                    mes_id: 5,
                    mes_abr: 'MAI',
                    mes_ext: 'MAIO',
                });

                this.meses.push({
                    mes_id: 6,
                    mes_abr: 'JUN',
                    mes_ext: 'JUNHO',
                });

                this.meses.push({
                    mes_id: 7,
                    mes_abr: 'JUL',
                    mes_ext: 'JULHO',
                });

                this.meses.push({
                    mes_id: 8,
                    mes_abr: 'AGO',
                    mes_ext: 'AGOSTO',
                });

                this.meses.push({
                    mes_id: 9,
                    mes_abr: 'SET',
                    mes_ext: 'SETEMBRO',
                });

                this.meses.push({
                    mes_id: 10,
                    mes_abr: 'OUT',
                    mes_ext: 'OUTUBRO',
                });

                this.meses.push({
                    mes_id: 11,
                    mes_abr: 'NOV',
                    mes_ext: 'NOVEMBRO',
                });

                this.meses.push({
                    mes_id: 12,
                    mes_abr: 'DEZ',
                    mes_ext: 'DEZEMBRO',
                });

            },
            getTipoCensoStatus() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listar',
                    data: {
                        tipo_sigla: 'CENSO_STATUS',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoCensoStatus = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getUf() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'uf/listar',
                    data: {
                        uf_sta: 1,
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.ufs = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getCidade() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'cidade/listar',
                    data: {
                        uf_sigla: this.uf_sigla,
                        cidade_sta: 1,
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.cidades = data;

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
            this.getUf();
            this.getMeses();
            this.getTipoCensoStatus();
            this.getPreencher();
        }
    }
</script>

<style scoped>

</style>
<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <label>Pessoa que será substituída</label>
                <div class="input-group">
                    <input type="text" class="form-control" v-model="nomPessoaDePes">
                    <span class="input-group-sm">
                        <button class="btn btn-default" type="button" @click="getPessoa(1)">
                            <img :src="'../storage/icones/buscar.png'" style="width: 25px;height: 25px">
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <select class="form-select" v-model="pessoaIdDe">
                    <option></option>
                    <option v-for="row in pessoaDeArr" :value="row.pessoa_id">
                        {{row.nom_pessoa}} - {{row.dta_nasc_pessoa}}{{(row.cpf != null ? ' - ' + row.cpf : '')}}
                    </option>
                </select>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <label>Pessoa que substituira</label>
                <div class="input-group">
                    <input type="text" class="form-control" v-model="nomPessoaParaPes">
                    <span class="input-group-sm">
                        <button class="btn btn-default" type="button" @click="getPessoa(2)">
                            <img :src="'../storage/icones/buscar.png'" style="width: 25px;height: 25px">
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <select class="form-select" v-model="pessoaIdPara">
                    <option></option>
                    <option v-for="row in pessoaParaArr" :value="row.pessoa_id">
                        {{row.nom_pessoa}} - {{row.dta_nasc_pessoa}}{{(row.cpf != null ? ' - ' + row.cpf : '')}}
                    </option>
                </select>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12" style="text-align: right">
                <button type="button" class="btn btn-primary" @click="salvar">&nbsp;Salvar&nbsp;</button>
                <button type="button" class="btn btn-default" @click="novo">&nbsp;Novo&nbsp;</button>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Homonimo",
        data(){
            return{
                nomPessoaDe: null,
                pessoaIdDe: null,
                nomPessoaPara: null,
                pessoaIdPara: null,
                nomPessoaDePes: null,
                nomPessoaParaPes: null,
                pessoaDe: null,
                PessoaPara: null,
                pessoaDeArr: [],
                pessoaParaArr: [],
            }
        },
        methods:{
            salvar(){

                console.log([this.pessoaIdDe, this.pessoaIdPara]);

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'pessoa/rotinaSubstituicaoDuplicados',
                    data: {

                        pessoaIdDe: this.pessoaIdDe,
                        pessoaIdPara: this.pessoaIdPara,

                    }

                }).then(response => {

                    let data = response.data;

                    if(data[0].erro == 1){

                        alertify.success(data[0].mensagem);

                        novo();

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
                this.nomPessoaDe = null;
                this.pessoaIdDe = null;
                this.nomPessoaPara = null;
                this.pessoaIdPara = null;
                this.nomPessoaDePes = null;
                this.nomPessoaParaPes = null;
                this.pessoaDe = null;
                this.PessoaPara = null;
                this.pessoaDeArr = [];
                this.pessoaParaArr = [];
            },
            getPessoa(ref = 1) {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'pessoa/listar',
                    data: {

                        nom_pessoa: (ref == 1 ? this.nomPessoaDePes : this.nomPessoaParaPes),

                    }

                }).then(response => {

                    let data = response.data.data;

                    if(ref == 1){

                        this.pessoaDeArr = data;

                    }else{

                        this.pessoaParaArr = data;

                    }

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

</style>
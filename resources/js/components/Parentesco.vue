<template>
    <hr />
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align: center">MORO COM:</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Grau de parentêsco</label>
            <select class="form-select" v-model="tipo_parentesco_id" ref="tipo_parentesco_id">
                <option></option>
                <option v-for="row in tipoParentesco" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Nome</label>
            <input class="form-control" type="text" v-model="cliente_nome" ref="cliente_nome">
        </div>
        <div class="col-sm-3">
            <label>Apelido</label>
            <input class="form-control" type="text" v-model="cliente_alcunha" ref="cliente_alcunha">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>CPF</label>
            <input class="form-control" type="text" v-model="cliente_doc_des" v-mask="'###.###.###-##'"
                   placeholder="xxx.xxx.xxx-xx" ref="cliente_doc_des">
        </div>
        <div class="col-sm-3">
            <label>Data de nascimento</label>
            <input class="form-control" type="date" v-model="cliente_dtnasc" ref="cliente_dtnasc">
        </div>
        <div class="col-sm-6">
            <label>Sexo</label>
            <div class="input-group">
                <div class="radioClass">
                    <input type="radio" v-model="cliente_sexo" :value="1">&nbsp;&nbsp;Masculino
                    <input type="radio" v-model="cliente_sexo" :value="0">&nbsp;&nbsp;Feminino
                    <input type="radio" v-model="cliente_sexo" :value="2">&nbsp;&nbsp;Não definido
                </div>
                <span class="input-group-sm">
                    <button class="btn btn-default" type="button" title="salvar" @click="salvar">
                        <img :src="'../storage/icones/salvar.png'" style="width: 25px; height: 25px;margin: 0px;">
                    </button>
                </span>
            </div>
        </div>
    </div>
<!--TABELA-->
    <div class="row">
        <div class="ajuste-overflow" v-show="(parentescoArr != [])">
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="text-align: left">NOME</th>
                        <th style="text-align: left">APELIDO</th>
                        <th style="text-align: left">DOCUMENTO(S)</th>
                        <th style="width: 5%;text-align: center">EXC</th>
                    </tr>
                </thead>
                <tbody>
                    <span style="display: none">{{total = 0}}</span>
                    <tr v-for="row in parentescoArr">
                        <span style="display: none">{{total++}}</span>
                        <td style="width: 5%;text-align: center">
                            <a href="#" @click="getRec(row)">
                                <img :src="'../storage/check.png'" style="width: 25px; height: 25px;">
                            </a>
                        </td>
                        <td style="text-align: left">{{(row != null ? row.cliente_nome : "")}}</td>
                        <td style="text-align: left">{{(row != null ? row.cliente_alcunha : "")}}</td>
                        <td style="text-align: left">
                            <span v-for="doc in row.cliente_doc">
                                {{row.cliente_doc_des}}<br/>
                            </span>
                        </td>
                        <td style="width: 5%;text-align: center">
                            <a href="#" @click="getExc(row.cliente_id)">
                                <img :src="'../storage/excluir.png'" style="width: 25px; height: 25px;color:red">
                            </a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align: right;padding-right: 10px">TOTAL</td>
                        <td style="text-align: center">{{total}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Parentesco",
        data(){
            return{
                cliente_id: null,
                cliente_id_1: null,
                cliente_nome: null,
                cliente_alcunha: null,
                cliente_cpf: null,
                cliente_dtnasc: null,
                cliente_sexo: true,
                cliente_sta: true,
                tipo_parentesco_id: null,
                tipoParentesco: [],
                cliente_doc_des: null,
                cliente_doc: [],

                cliente_id_tmp: 0,
            }
        },
        props:{
            parentescoArr:{
                cliente_id: null,
                cliente_id_1: null,
                cliente_nome: null,
                cliente_alcunha: null,
                cliente_dtnasc: null,
                cliente_sexo: true,
                cliente_sta: true,
                tipo_parentesco_id: null,
                cliente_doc: [],
            },
        },
        methods:{
            salvar(){

                if(!this.getCritica())
                    return;

                this.cliente_id_tmp++;

                let cliente_id = (this.cliente_id != null ? this.cliente_id : this.cliente_id_tmp);

                //tabela cliente
                this.cliente_id_1 = (this.cliente_id_1 != null ? this.cliente_id_1: 1);

                let cliente_doc = {
                    cliente_id: cliente_id,
                    tipo_doc_id: this.tipo_doc_id,
                    cliente_doc_id: this.cliente_doc_id,
                    cliente_doc_des: this.cliente_doc_des,
                    cliente_doc_sta: 1,
                };

                //removendo o parente da lista
                let index =  this.parentescoArr.findIndex(e=>{

                   return e.cliente_id == cliente_id;

                });

                if(index != -1){

                    this.parentescoArr.splice(index, 1);

                }

                this.parentescoArr.push({
                    cliente_id: cliente_id,
                    cliente_id_1: this.cliente_id_1,
                    cliente_nome: this.cliente_nome.toUpperCase(),
                    cliente_alcunha: (this.cliente_alcunha != null ? this.cliente_alcunha.toUpperCase() : null),
                    cliente_dtnasc: this.cliente_dtnasc,
                    cliente_sexo: (this.cliente_sexo != null ? this.cliente_sexo : 2),
                    cliente_sta: 1,
                    tipo_parentesco_id: this.tipo_parentesco_id,
                    cliente_doc: [cliente_doc],
                });

                this.novo();

            },
            novo(){

                let tipo_parentesco_id = this.$refs.tipo_parentesco_id;

                this.cliente_id = null;
                this.tipo_parentesco_id = null;
                this.cliente_nome = null;
                this.cliente_alcunha = null;
                this.cliente_doc_des = null;
                this.cliente_dtnasc = null;
                this.cliente_sexo = 1;
                this.cliente_doc = {};

                tipo_parentesco_id.focus();

            },
            getRec(temp){
                this.cliente_id = temp.cliente_id;
                this.cliente_id_1 = temp.cliente_id_1;
                this.tipo_parentesco_id = temp.tipo_parentesco_id;
                this.cliente_nome = temp.cliente_nome;
                this.cliente_alcunha = temp.cliente_alcunha;
                this.cliente_dtnasc = temp.cliente_dtnasc;
                this.cliente_sexo = temp.cliente_sexo;
                this.cliente_doc = (temp.cliente_doc != [] ? temp.cliente_doc[0] : []);
                this.cliente_doc_des = this.cliente_doc.cliente_doc_des;
            },
            getExc(id){

                let index = this.parentescoArr.findIndex(e=>{
                    return e.cliente_id == id;
                });

                if(index != -1)
                    this.parentescoArr.splice(index, 1);

                this.novo();

            },
            getTipoParentesco() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listar',
                    data: {
                        tipo_sigla: 'PARENTESCO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoParentesco = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for (const key in itens['errors']) {

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getCritica(){

                if(this.tipo_parentesco_id == null || this.tipo_parentesco_id == ''){

                    let id = this.$refs.tipo_parentesco_id;

                    id.focus();

                    alertify.error('Informe o grau de parentêsco');

                    return 0;

                }

                if(this.cliente_nome == null || this.cliente_nome == ''){

                    let id = this.$refs.cliente_nome;

                    id.focus();

                    alertify.error('Informe o nome');

                    return 0;
                }

                if(this.cliente_dtnasc == null || this.cliente_dtnasc == ''){

                    let id = this.$refs.cliente_dtnasc;

                    id.focus();

                    alertify.error('Informe a data de nascimento');

                    return 0;

                }

                if(this.cliente_sexo == null){

                    this.cliente_sexo = 2;

                }

                return 1;

            },
        },
        mounted(){
            this.getTipoParentesco();
        }

    }
</script>

<style scoped>

</style>
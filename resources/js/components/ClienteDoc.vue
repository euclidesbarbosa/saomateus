<template>
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align: center">DOCUMENTO(S)</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Tipo de Documento</label>
            <select class="form-select" v-model="tipo_doc_id" @change="getTipoDocMask" ref="tipo_doc_id">
                <option></option>
                <option v-for="row in tipoDoc" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
        <div class="col-sm-9" v-if="tipoDocDesSemMask">
            <label>Número</label>
            <div class="input-group">
                <input type="text" class="form-control" v-model="cliente_doc_des" v-mask="tipoDocDesMask"
                       :placeholder="tipoDocDesPlaceHolder" ref="cliente_doc_des" @blur="getSalvarDoc">
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="novo">
                        <img :src="'../storage/icones/apagar.png'" title="limpar" style="width: 25px; height: 25px;">
                    </button>
                </span>
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="salvar" ref="btn_salvar_doc">
                        <img :src="'../storage/download.png'" title="enviar arquivo..." style="width: 25px; height: 25px;">
                    </button>
                </span>
            </div>
        </div>
        <div class="col-sm-9" v-else>
            <label>Número</label>
            <div class="input-group">
                <input type="text" class="form-control" v-model="cliente_doc_des" ref="cliente_doc_des" @blur="getSalvarDoc">
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="novo">
                        <img :src="'../storage/icones/apagar.png'" title="limpar" style="width: 25px; height: 25px;">
                    </button>
                </span>
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="salvar" ref="btn_salvar_doc">
                        <img :src="'../storage/icones/anexar.png'" title="enviar arquivo..." style="width: 25px; height: 25px;">
                    </button>
                </span>
            </div>
        </div>
    </div>
    <!--TABELA-->
    <div class="row">
        <div class="ajuste-overflow">
            <table>
                <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="text-align: left;width: 25%">TIPO</th>
                    <th style="text-align: left">DESCRIÇÃO</th>
                    <th style="width: 5%;text-align: center">EXC</th>
                </tr>
                </thead>
                <tbody>
                <span style="display: none">{{total = 0}}</span>
                <tr v-for="row in clienteDocArr">
                    <span style="display: none">{{total++}}</span>
                    <td style="width: 5%;text-align: center">
                        <button class="btn btn-default" @click="getRec(row)" type="button">
                            <img :src="'../storage/icones/editar.png'" style="width: 25px; height: 25px;">
                        </button>
                    </td>
                    <td style="text-align: left">{{(row != null ? row.tipoDoc.tipo_nome : "")}}</td>
                    <td style="text-align: left">{{(row != null ? row.cliente_doc_des : "")}}</td>
                    <td style="width: 5%;text-align: center">
                        <button class="btn btn-default" @click="getExc(row.cliente_doc_id)" type="button">
                            <img :src="'../storage/icones/apagar.png'" style="width: 25px; height: 25px;color:red">
                        </button>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" style="text-align: right;padding-right: 10px">TOTAL</td>
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
        name: "ClienteDoc",
        data(){
            return{
                tipo_doc_id: null,
                cliente_doc_id: 1,
                cliente_doc_des: null,
                cliente_doc_sta: 1,

                cliente_id_tmp: 0,
                cliente_doc_id_tmp: 0,

                tipoDoc:[],
                tipoDocArr:[],
                tipoDocDesSemMask: false,
                tipoDocDesPlaceHolder: "",

                btn_salvar_doc: null,
            }
        },
        props:{
            clienteDocArr:{
                tipo_doc_id: null,
                cliente_doc_id: 1,
                cliente_doc_des: null,
                cliente_doc_sta: 1,
            },
        },
        methods:{
            //controle ao sair da descrição
            getSalvarDoc(){

                let btn_salvar_doc = this.$refs.btn_salvar_doc;

                btn_salvar_doc.focus();

            },
            getCritica(){

                if(this.tipo_doc_id == null){

                    let tipo_doc_id = this.$refs.tipo_doc_id;

                    tipo_doc_id.focus();

                    alertify.error('Tipo do documento não selecionado!');

                    return 0;


                }

                if(this.cliente_doc_des != null){

                    let cliente_doc_des = this.cliente_doc_des.replace('.','').replace(' ','').replace('-','').trim();

                    if(cliente_doc_des == ""){

                        let cliente_doc_des = this.$refs.cliente_doc_des;

                        cliente_doc_des.focus();

                        alertify.error('Documento não informado!');

                        return 0;

                    }

                }

                if(this.cliente_doc_des == null){

                    let cliente_doc_des = this.$refs.cliente_doc_des;

                    cliente_doc_des.focus();

                    alertify.error('Documento não informado!');

                    return 0;


                }

                return 1;
            },
            salvar(){

                if(!this.getCritica())
                    return;

                this.cliente_id_tmp++;

                this.cliente_doc_id_tmp++;

                let cliente_id = (this.cliente_id != null ? this.cliente_id : this.cliente_id_tmp);

                //verifica se o doc já existe no array
                if(this.clienteDocArr != []) {

                    //procura pelo ID
                    if (this.cliente_doc_id != null
                        || this.cliente_doc_des != null) {

                        let index = this.clienteDocArr.findIndex(e => {

                            return (e.cliente_doc_id == this.cliente_doc_id
                                || e.cliente_doc_des == this.cliente_doc_des);

                        });

                        //remove;
                        if (index != -1) {

                            this.clienteDocArr.splice(index, 1);

                        }

                    }

                }

                this.cliente_doc_id = this.cliente_doc_id_tmp;

                //procura o tipo do doc
                let indexTipo =  this.tipoDoc.findIndex(e=>{

                    return e.tipo_id == this.tipo_doc_id;

                });

                let tipoDocTmp = {};

                if(indexTipo != -1){

                    tipoDocTmp = this.tipoDoc[indexTipo];

                }

                this.clienteDocArr.push({
                    cliente_id: cliente_id,
                    cliente_doc_id: this.cliente_doc_id,
                    tipo_doc_id: this.tipo_doc_id,
                    cliente_doc_des: this.cliente_doc_des,
                    cliente_doc_sta: this.cliente_doc_sta,
                    tipoDoc: tipoDocTmp
                });

                this.novo();

            },
            novo(){

                let tipo_doc_id = this.$refs.tipo_doc_id;

                this.tipo_doc_id = null;
                this.cliente_doc_id = null;
                this.cliente_doc_des = null;
                this.cliente_doc_sta = 1;

                tipo_doc_id.focus();

            },
            getRec(temp){

                let tipo_doc_id = this.$refs.tipo_doc_id;

                this.cliente_doc_id = temp.cliente_doc_id;
                this.tipo_doc_id = temp.tipo_doc_id;
                this.cliente_doc_des = temp.cliente_doc_des;

                tipo_doc_id.focus();

            },
            getExc(id){

                let index = this.clienteDocArr.findIndex(e=>{
                    return e.cliente_doc_id == id;
                });

                if(index != -1)
                    this.clienteDocArr.splice(index, 1);

                this.novo();

            },
            getTipoDocMask(){

                let arr = this.tipoDocArr.filter(e=>
                {
                    return e.tipo_id == this.tipo_doc_id;

                });

                if(arr.length != []){

                    if(arr[0].tipo_mask == null || arr[0].tipo_mask == "" ){

                        this.tipoDocDesSemMask = false;

                    }
                    else{

                        this.tipoDocDesSemMask = true;
                        this.tipoDocDesMask = arr[0].tipo_mask;
                        let a = /#/g;
                        let b = 'x';
                        this.tipoDocDesPlaceHolder = arr[0].tipo_mask.toString().replace(a, b);
                    }

                }
            },
            getTipoDoc() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listar',
                    data: {
                        tipo_sigla: 'DOCUMENTO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoDoc = data;
                    this.tipoDocArr = data;

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
            this.getTipoDoc();
        }
    }
</script>

<style scoped>

</style>
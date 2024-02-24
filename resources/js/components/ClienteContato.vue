<template>
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align: center">CONTATO(S)</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Tipo de Contato</label>
            <select class="form-select" v-model="tipo_contato_id" @change="getTipoContatoMask" ref="tipo_contato_id">
                <option></option>
                <option v-for="row in tipoContato" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
        <div class="col-sm-9" v-if="tipoContatoDesSemMask">
            <label>Descrição</label>
            <div class="input-group">
                <input type="text" class="form-control" v-model="cliente_contato_des"
                       v-mask="tipoContatoDesMask" :placeholder="tipoContatoDesPlaceHolder" ref="cliente_contato_des" @blur="getSalvarContato">
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="novo">
                        <img :src="'../storage/icones/apagar.png'" style="width: 25px; height: 25px;">
                    </button>
                </span>
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="salvar" ref="btn_salvar_contato">
                        <img :src="'../storage/icones/salvar.png'" style="width: 25px; height: 25px;">
                    </button>
                </span>
            </div>
        </div>
        <div class="col-sm-9" v-else>
            <label>Descrição</label>
            <div class="input-group">
                <input type="text" class="form-control" v-model="cliente_contato_des" ref="cliente_contato_des" @blur="getSalvarContato">
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="novo">
                        <img :src="'../storage/icones/apagar.png'" style="width: 25px; height: 25px;">
                    </button>
                </span>
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="salvar" ref="btn_salvar_contato">
                        <img :src="'../storage/icones/salvar.png'" style="width: 25px; height: 25px;">
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
                <tr v-for="row in clienteContatoArr">
                    <span style="display: none">{{total++}}</span>
                    <td style="width: 5%;text-align: center">
                        <button class="btn btn-default" @click="getRec(row)" type="button">
                            <img :src="'../storage/icones/editar.png'" style="width: 25px; height: 25px;">
                        </button>
                    </td>
                    <td style="text-align: left">{{(row != null ? row.tipoContato.tipo_nome : "")}}</td>
                    <td style="text-align: left">{{(row != null ? row.cliente_contato_des : "")}}</td>
                    <td style="width: 5%;text-align: center">
                        <button class="btn btn-default" @click="getExc(row.cliente_contato_id)" type="button">
                            <img :src="'../storage/icones/deletar.png'" style="width: 25px; height: 25px;color:red">
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
    <hr />
</template>

<script>
    import  axios from 'axios';

    export default {
        name: "ClienteContato",
        data(){
            return{
                cliente_id: null,
                tipo_contato_id: null,
                cliente_contato_id: 1,
                cliente_contato_des: null,
                cliente_contato_sta: 1,

                cliente_id_tmp: 0,
                cliente_contato_id_tmp: 0,

                tipoContato:[],
                tipoContatoArr:[],
                tipoContatoDesSemMask: false,
                tipoContatoDesPlaceHolder: "",

                btn_salvar_contato: null,
            }
        },
        props:{
            clienteContatoArr:{
                cliente_id: null,
                tipo_contato_id: 1,
                cliente_contato_des: null,
                cliente_contato_sta: 1,
            }
        },
        methods:{
            //controle ao sair da descrição
            getSalvarContato(){

                let btn_salvar_contato = this.$refs.btn_salvar_contato;

                btn_salvar_contato.focus();

            },
            getCritica(){

                if(this.tipo_contato_id == null || this.tipo_contato_id.trim == ""){

                    let tipo_contato_id = this.$refs.tipo_contato_id;

                    tipo_contato_id.focus();

                    alertify.error('Tipo do contato não selecionado!');

                    return 0;


                }

                if(this.cliente_contato_des != null){

                    let cliente_contato_des = this.cliente_contato_des.replace('(','').replace(')','').replace(' ','').replace('-','').trim();

                    if(cliente_contato_des == ""){

                        let cliente_contato_des = this.$refs.cliente_contato_des;

                        cliente_contato_des.focus();

                        alertify.error('Contato não informado!');

                        return 0;

                    }

                }

                if(this.cliente_contato_des == null || this.cliente_contato_des.trim == ""){

                    let cliente_contato_des = this.$refs.cliente_contato_des;

                    cliente_contato_des.focus();

                    alertify.error('Contato não informado!');

                    return 0;


                }

                return 1;
            },
            salvar(){

                if(!this.getCritica())
                    return;

                this.cliente_id_tmp++;

                this.cliente_contato_id_tmp++;

                let cliente_id = (this.cliente_id != null ? this.cliente_id : this.cliente_id_tmp);

                //verifica se o contato já existe no array
                if(this.clienteContatoArr != []) {

                    //procura pelo ID
                    if (this.cliente_contato_id != null
                        || this.cliente_contato_des != null) {

                        let index = this.clienteContatoArr.findIndex(e => {

                            return (e.cliente_contato_id == this.cliente_contato_id
                                || e.cliente_contato_des == this.cliente_contato_des);

                        });

                        //remove;
                        if (index != -1) {

                            this.clienteContatoArr.splice(index, 1);

                        }

                    }

                }

                this.cliente_contato_id = this.cliente_contato_id_tmp;

                //procura o tipo do contato
                let indexTipo =  this.tipoContato.findIndex(e=>{

                    return e.tipo_id == this.tipo_contato_id;

                });

                let tipoContatoTmp = {};

                if(indexTipo != -1){

                    tipoContatoTmp = this.tipoContato[indexTipo];

                }

                this.clienteContatoArr.push({
                    cliente_id: cliente_id,
                    cliente_contato_id: this.cliente_contato_id,
                    tipo_contato_id: this.tipo_contato_id,
                    cliente_contato_des: this.cliente_contato_des,
                    cliente_contato_sta: this.cliente_contato_sta,
                    tipoContato: tipoContatoTmp
                });

                this.novo();

            },
            novo(){

                let tipo_contato_id = this.$refs.tipo_contato_id;

                this.tipo_contato_id = null;
                this.cliente_contato_id = null;
                this.cliente_contato_des = null;
                this.cliente_contato_sta = 1;

                tipo_contato_id.focus();

            },
            getRec(temp){

                let tipo_contato_id = this.$refs.tipo_contato_id;

                this.cliente_contato_id = temp.cliente_contato_id;
                this.tipo_contato_id = temp.tipo_contato_id;
                this.cliente_contato_des = temp.cliente_contato_des;

                tipo_contato_id.focus();

            },
            getExc(id){

                let index = this.clienteContatoArr.findIndex(e=>{
                    return e.cliente_contato_id == id;
                });

                if(index != -1)
                    this.clienteContatoArr.splice(index, 1);

                this.novo();

            },
            getTipoContatoMask(){

                let arr = this.tipoContatoArr.filter(e=>
                {
                    return e.tipo_id == this.tipo_contato_id;

                });

                if(arr.length != []){

                    if(arr[0].tipo_mask == null || arr[0].tipo_mask == "" ){

                        this.tipoContatoDesSemMask = false;

                    }
                    else{

                        this.tipoContatoDesSemMask = true;
                        this.tipoContatoDesMask = arr[0].tipo_mask;
                        let a = /#/g;
                        let b = 'x';
                        this.tipoContatoDesPlaceHolder = arr[0].tipo_mask.toString().replace(a, b);
                    }


                }
            },
            getTipoContato() {

                axios({
                    method: 'POST',
                    url: _BASE_URL + 'tipo/listar',
                    data: {
                        tipo_sigla: 'CONTATO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoContato = data;
                    this.tipoContatoArr = data;

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
            this.getTipoContato();
        }
    }
</script>

<style scoped>

</style>
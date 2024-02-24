<template>
    <div class="row">
        <div class="col-sm-3">
            <label>CEP</label>
            <div class="input-group">
                <input class="form-control" type="text" :id="cepLogradouro.cep" v-model="cepLogradouro.cep" v-mask="'##.###-###'" maxlength="10">
                <span class="input-group-sm">
                    <button class="btn btn-default buttonnovo" type="button" @click="getCep" title="localizar cep...">
                        <img :src="'../storage/icones/buscar.png'" style="width: 25px; height: 25px;">
                    </button>
                </span>
            </div>
        </div>
        <div class="col-sm-4">
            <label>Endereço Cadastrado / Número</label>
            <input class="form-control" type="text" v-model="cepLogradouro.nom_localidade_fam" disabled="disabled">
        </div>
        <div class="col-sm-3">
            <label>Endereço Atualizado</label>
            <input class="form-control" type="text" :id="cepLogradouro.end" v-model="cepLogradouro.end">
        </div>
        <div class="col-sm-2">
            <label>Número</label>
            <input class="form-control" type="number" min="0" max="99999" :id="cepLogradouro.end_num" v-model="cepLogradouro.end_num">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Cidade</label>
            <input class="form-control" type="text" :id="cepLogradouro.cidade" v-model="cepLogradouro.cidade" disabled="true">
        </div>
        <div class="col-sm-3">
            <label>Tipo de Localidade:</label>
            <div class="row" style="border: solid 0.5px #cccccc;border-radius: 5px;padding-top: 5px;padding-bottom: 5px">
                <div class="col-sm-6">
                    <input type="radio" :value="1" v-model="cepLogradouro.tipoMoradia">&nbsp;Bairro
                </div>
                <div class="col-sm-6">
                    <input type="radio" :value="2" v-model="cepLogradouro.tipoMoradia">&nbsp;Povoado
                </div>
            </div>
        </div>
        <div class="col-sm-6" v-show="(cepLogradouro.tipoMoradia == 1)">
            <label>Bairro</label>
            <select class="form-select" v-model="cepLogradouro.tipo_bairro_id">
                <option></option>
                <option v-for="row in tipoBairro" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
        <div class="col-sm-6" v-show="(cepLogradouro.tipoMoradia == 2)">
            <label>Povoado</label>
            <select class="form-select" v-model="cepLogradouro.tipo_povoado_id">
                <option></option>
                <option v-for="row in tipoPovoado" :value="row.tipo_id">{{row.tipo_nome}}</option>
            </select>
        </div>
    </div>
<!--        <div class="col-sm-8" v-show="(cepLogradouro.nom_localidade_fam != null)">-->
<!--            <label for="bairro">Bairro</label>-->
<!--&lt;!&ndash;            <input type="text" class="form-control" v-model="cepLogradouro.nom_localidade_fam">&ndash;&gt;-->
<!--            <select class="form-select" v-model="cepLogradouro.tipo_bairro_id"-->
<!--                    v-show="(cepLogradouro.nom_localidade_fam == null)">-->
<!--                <option></option>-->
<!--                <option v-for="row in tipoBairro" :value="row.tipo_id">{{row.tipo_nome}}</option>-->
<!--            </select>-->
<!--        </div>-->
<!--        <div class="col-sm-8" v-show="(cepLogradouro.nom_localidade_fam_pov != null)">-->
<!--            <label for="povoado">Povoado</label>-->
<!--&lt;!&ndash;            <input type="text" class="form-control" v-model="cepLogradouro.nom_localidade_fam_pov">&ndash;&gt;-->
<!--&lt;!&ndash;            <div class="input-group" v-show="(!cepLogradouro.nom_logradouro_fam_pov)">&ndash;&gt;-->
<!--&lt;!&ndash;                <select class="form-select" :id="cepLogradouro.tipo_povoado_id" v-model="cepLogradouro.tipo_povoado_id">&ndash;&gt;-->
<!--&lt;!&ndash;                    <option></option>&ndash;&gt;-->
<!--&lt;!&ndash;                    <option v-for="row in tipoPovoado" :value="row.tipo_id">{{row.tipo_nome}}</option>&ndash;&gt;-->
<!--&lt;!&ndash;                </select>&ndash;&gt;-->
<!--&lt;!&ndash;                <div class="input-group-sm">&ndash;&gt;-->
<!--&lt;!&ndash;                    <button class="btn btn-default buttonnovo" @click="salvar" type="button" title="salvar endereço...">&ndash;&gt;-->
<!--&lt;!&ndash;                        <img :src="'../storage/icones/salvar.png'" style="width: 25px; height: 25px;">&ndash;&gt;-->
<!--&lt;!&ndash;                    </button>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--        </div>-->
<!--        <div class="col-sm-3" v-show="false">-->
<!--            <label for="ibge">Cód. IBGE</label>-->
<!--            <input class="form-control" type="text" :id="cepLogradouro.ibge" v-model="cepLogradouro.ibge" disabled="true">-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>

    import axios from 'axios';

    // var config = require('./config');

    export default {
        name: "Cep",
        data(){
            return{
                tipoPovoado: [],
                tipoBairro:[],

            }
        },
        props: {
            cepLogradouro: {
                cep: null,
                end: null,
                end_num: null,
                compl: null,
                cidade: null,
                bairro: null,
                ibge: null,

                tipo_povoado_id: null,
                tipo_bairro_id: null,
                nom_localidade_fam: null,
                nom_tip_logradouro_fam: null,
                nom_localidade_fam_pov: null,
                bairros:[],
                povoados:[],
                tipoMoradia: 1,
            },
            cepNum:{
                type:String,
            }
        },
        methods:{
            getCep(){

                let cep  = '';

                if(this.cepLogradouro.cep != null || this.cepNum != null){

                    if(this.cepNum != null){

                        cep = this.cepNum.replace('.','').replace('-','');

                    }
                    else{

                        cep = this.cepLogradouro.cep.replace('.','').replace('-','');

                    }

                    axios({
                        method: 'GET',
                        url: 'https://viacep.com.br/ws/' + cep + '/json',
                    }).then(response => {

                        let endereco = [response.data];

                        if(endereco !== []){

                            this.cepLogradouro.end = endereco[0].logradouro;

                            this.cepLogradouro.compl = endereco[0].complemento.replace('(','').replace(')', '');

                            this.cepLogradouro.cidade = endereco[0].localidade.toString().toUpperCase();

                            this.cepLogradouro.bairro = endereco[0].bairro.toString().toUpperCase();

                            this.cepLogradouro.ibge = endereco[0].ibge;

                            this.cepLogradouro.tipo_povoado_id = endereco[0].tipo_povoado_id;

                            this.$emit('cepLogradouro', this.cepLogradouro);
                        }

                    }).catch(e =>{

                        alertify.error(e.response);

                    });
                }
            },
            getTipoBairro(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: 'BAIRRO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoBairro = data;
                    this.cepLogradouro.bairros = data;

                }).catch(errors => {

                    const itens = JSON.parse(errors.response.request.responseText);

                    let textoMensagem = '';

                    for(const key in itens['errors']){

                        textoMensagem += itens['errors'][key][0] + '<br/>';

                    }

                    alertify.error(textoMensagem);

                });

            },
            getTipoPovoado(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'tipo/listar',
                    data:{
                        tipo_sigla: 'POVOADO',
                        tipo_sta: 1
                    }

                }).then(response => {

                    let data = response.data.data;

                    this.tipoPovoado = data;
                    this.cepLogradouro.povoados = data;

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

            this.getTipoBairro();
            this.getTipoPovoado();

            if(this.cepLogradouro.cep != null){
                this.getCep();
            }
        }
    }
</script>

<style scoped>
    label{
        font-weight: bold;
    }
</style>
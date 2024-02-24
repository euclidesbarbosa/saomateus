<template>
    <hr>
    <h5>SITUAÇÃO ATUAL DO CIDADÃO</h5>
    <hr>
    <div class="row">
        <div class="col-sm-2">
            <label>Data</label>
            <input type="date" class="form-control" v-model="pessoa_situacao_temp" maxlength="10" disabled="disabled" style="text-align: center;">
        </div>
        <div class="col-sm-2">
            <label>Desabrigado(a)?</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="1" v-model="pessoaSituacaoArr.pessoa_situacao_desabrigada">&nbsp;Sim
                </div>
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="2" v-model="pessoaSituacaoArr.pessoa_situacao_desabrigada">&nbsp;Não
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>Desempregado(a)?</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="1" v-model="pessoaSituacaoArr.pessoa_situacao_desempregada">&nbsp;Sim
                </div>
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="2" v-model="pessoaSituacaoArr.pessoa_situacao_desempregada">&nbsp;Não
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>Estudando?</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="1" v-model="pessoaSituacaoArr.pessoa_situacao_estudando">&nbsp;Sim
                </div>
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="2" v-model="pessoaSituacaoArr.pessoa_situacao_estudando">&nbsp;Não
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>Tem filho?</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="1" v-model="pessoaSituacaoArr.pessoa_situacao_filho">&nbsp;Sim
                </div>
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="2" v-model="pessoaSituacaoArr.pessoa_situacao_filho">&nbsp;Não
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>Recebe Bolsa Família?</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="1" v-model="pessoaSituacaoArr.pessoa_situacao_rec_bolsa_familia">&nbsp;Sim
                </div>
                <div class="col-sm-6">
                    <input type="radio" class="radio" :value="2" v-model="pessoaSituacaoArr.pessoa_situacao_rec_bolsa_familia">&nbsp;Não
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    // import moment from 'moment-timezone';

    export default {
        name: "PessoaSituacao",
        data(){
            return{
                user_id: null,
                pessoaSituacaoTemp: this.pessoaSituacaoArr,
                pessoa_situacao_temp: null,

            }
        },
        props:{
            pessoaSituacaoArr:{
                pessoa_id: null,
                pessoa_situacao_data: null,
                pessoa_situacao_desabrigada: 2,
                pessoa_situacao_desempregada: 2,
                pessoa_situacao_estudando: 2,
                pessoa_situacao_obto: 2,
                pessoa_situacao_filho: 2,
                pessoa_situacao_rec_bolsa_familia: 2,
                user_id: null,
            },
        },
        emits:{
            pessoaSituacaoEmit:{
                pessoa_id: null,
                pessoa_situacao_data: null,
                pessoa_situacao_desabrigada: 2,
                pessoa_situacao_desempregada: 2,
                pessoa_situacao_estudando: 2,
                pessoa_situacao_obto: 2,
                pessoa_situacao_filho: 2,
                pessoa_situacao_rec_bolsa_familia: 2,
                user_id: null,
            },
        },
        mounted(){
            // const timeZone = 'America/Fortaleza';
            // const currentDateTime = moment().tz();
            // console.log(currentDateTime.format('YYYY-MM-DD HH:mm:ss'));

            let dt = new Date();

            let dtTemp = dt.getFullYear().toString()
                + '-' + '0'.repeat(2 - (dt.getMonth() + 1).toString().length).toString() + (dt.getMonth() + 1).toString()
                + '-' + '0'.repeat(2 - (dt.getDate()).toString().length).toString() + dt.getDate().toString();

            this.pessoa_situacao_temp = dtTemp;

            this.pessoaSituacaoArr.pessoa_situacao_data = dtTemp;

        }
    }
</script>

<style scoped>

    .col-sm-2{
        border: solid 0.5px #cccccc;
        border-radius: 5px;
        text-align: center !important;
    }

    .localClass{
        text-align:center;
    }

    label{
        font-weight: bold;
    }

    h5{
        font-weight: bold;
        text-align: center;
    }

</style>
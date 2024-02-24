<template>
    <div class="row">
        <div class="col-sm-12">
            <label>Comando</label>
            <textarea cols="50" rows="3" v-model="comando_text"
                    class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Comando</label>
            <textarea cols="50" rows="3" v-model="comando_text1"
                    class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Comando</label>
            <textarea cols="50" rows="3" v-model="comando_text2"
                    class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Comando</label>
            <textarea cols="50" rows="3" v-model="comando_text3"
                    class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary" @click="enviar">Enviar</button>
            &nbsp;&nbsp;<button type="button" class="btn btn-dark" @click="novo">Limpar</button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Comandos",
        data(){
            return{
                comando_text: null,
                comando_text1: null,
                comando_text2: null,
                comando_text3: null,
            }
        },
        methods:{
            enviar(){

                let arr = [];
                let id = 0;

                if(this.comando_text != null){

                    arr.push({
                        cmId: id,
                        cm: this.comando_text,
                    });

                }

                id++;

                if(this.comando_text1 != null){

                    arr.push({
                        cmId: id,
                        cm: this.comando_text1,
                    });

                }

                id++;

                if(this.comando_text2 != null){

                    arr.push({
                        cmId: id,
                        cm: this.comando_text2,
                    });

                }

                id++;

                if(this.comando_text3 != null){

                    arr.push({
                        cmId: id,
                        cm: this.comando_text3,
                    });

                }

                axios({
                    method: 'POST',
                    url: _BASE_URL+'comandos/exec',
                    data:{
                        comandos: arr,
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

                        alertify.success(data.mensagem);

                        this.novo();

                        this.preencher();

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
        }
    }
</script>

<style scoped>

</style>
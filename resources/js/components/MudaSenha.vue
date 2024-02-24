<template>
    <div class="row">
        <div class="col-sm-12">
            <label>Senha Atual</label>
            <input type="password" v-model="password" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Nova Senha</label>
            <input type="password" v-model="nPassword" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Confirmar nova Senha</label>
            <input type="password" v-model="cPassword" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align: right">
            <button type="button" class="btn btn-primary" @click="salvar">Salvar</button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "MudaSenha",
        data(){
            return{
                password: null,
                nPassword: null,
                cPassword: null
            }
        },
        props:{
            user:{
                type: Array,
                required: true
            }
        },
        methods: {
            salvar(){
                axios({
                    method: 'POST',
                    url: _BASE_URL+'user/mudasenha',
                    data:{
                        id: this.user.id,
                        password: this.password,
                        nPassword: this.nPassword,
                        cPassword: this.cPassword,
                    }

                }).then(response => {

                    let data = response.data[0];

                    if(data.erro === 1){

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
        }
    }
</script>

<style scoped>

</style>
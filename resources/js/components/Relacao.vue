<template>
    <div class="row">
        <div class="col-sm-12">
            <table>
                <thead>
                <tr>
                    <th style="text-align: left">ID</th>
                    <th style="text-align: left">Nome</th>
                    <th style="text-align: left">Endereço</th>
                    <th style="text-align: left">Bairro/povoado</th>
                    <th style="text-align: left">Telefone</th>
                </tr>
                </thead>
                <span style="display: none">{{total = 0}}</span>
                <tbody>
                <tr v-for="row in tabela" >
                    <span style="display: none">{{total++}}</span>
                    <td style="width: 5%;text-align: center">{{total}}</td>
                    <td style="text-align: left">{{row.nom_pessoa}}</td>
                    <td style="text-align: left">{{row.domicilio.nom_logradouro_fam }}</td>
                    <td style="text-align: left">{{row.domicilio.nom_localidade_fam}}</td>
                    <td style="text-align: left">{{row.domicilio.tel_1}}</td>

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
        name: "Relacao",
        data(){
            return{
                tabela: [],
                total: 0
            }
        },
        methods:{
            getPreencher(){

                axios({
                    method: 'POST',
                    url: _BASE_URL+'pessoa/listarX',

                }).then(response => {

                    let data = response.data.data;

                    this.tabela = data;

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
        }
    }
</script>

<style scoped>
</style>

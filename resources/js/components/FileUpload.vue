<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Escolha a foto da criança</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12" style="text-align: center!important;">
                                <img :src="imgTempProps" alt="Image" style="height:230px;width:180px">
                            </div>
                        </div>
                        <div class="row">
                            <div v-if="success != ''" class="alert alert-success">
                                {{success}}
                            </div>
                            <form @submit="formSubmit" enctype="multipart/form-data">
                                <input type="file" id="imgImg" class="form-control" v-on:change="onChange">
                                <br/>
                                <button class="btn btn-primary btn-block">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        name: "FileUpload",
        data() {
            return {
                name: '',
                file: '',
                success: '',
                imagem: null,

            };
        },
        props:{
            imgTempProps: {
                type: String,
                default: _BASE_URL+'storage/cliente.png',
            }
        },
        emits:{
            caminhoImagem:{
                type: String,
            },
        },
        methods: {
            onChange(e) {

                this.imgTemp = document.getElementById('imgImg').src;

                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                };

                let data = new FormData();
                data.append('file', this.file);
                axios.post('upload', data, config)
                    .then(function (res) {
                        // existingObj.success = res.data.success;
                        if(res.data[0].erro == 1){

                            alertify.success(res.data[0].mensagem);

                            existingObj.$emit('caminhoImagem', res.data[0].imagem);

                            return;

                        }

                        alertify.error(res.data[0].mensagem) ;

                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });


            }
        },
    }
</script>
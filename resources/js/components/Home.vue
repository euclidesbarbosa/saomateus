<template>
    <div class="row">
        <div class="col-sm-12" style="text-align: center;vertical-align: middle">
            <img :src="img1">
        </div>
    </div>
</template>

<script>

    export default {
        name: "Home",
        data(){
            return{

                img1: _BASE_URL+'storage/icones/sistemacadastromunicipal_logomarca.png',

            }
        }
    }
</script>

<style scoped>
    img{
        margin-top:10%;
        text-align: center;
    }
</style>
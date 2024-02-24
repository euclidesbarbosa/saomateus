<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToControle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controle', function (Blueprint $table) {
            $table->foreign('uf_sigla')->references('uf_sigla')->on('uf');
            $table->foreign('cidade_id')->references('cidade_id')->on('cidade');
            $table->foreign('tipo_distrito_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_subdistrito_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_setor_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_localidade_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_logradouro_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_titulo_id')->references('tipo_id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //descomentar após gerar as tabelas
        Schema::table('controle', function (Blueprint $table) {
//            $table->dropForeign('controle_uf_sigla_foreign');
//            $table->dropForeign('controle_cidade_id_foreign');
//            $table->dropForeign('controle_tipo_distrito_id_foreign');
//            $table->dropForeign('controle_tipo_setor_id_foreign');
//            $table->dropForeign('controle_tipo_localidade_id_foreign');
//            $table->dropForeign('controle_tipo_logradouro_id_foreign');
//            $table->dropForeign('controle_tipo_titulo_id_foreign');
        });
    }
}

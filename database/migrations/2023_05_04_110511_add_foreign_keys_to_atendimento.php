<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAtendimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atendimento', function (Blueprint $table) {
            $table->foreign('pessoa_id')->references('pessoa_id')->on('pessoa');
            $table->foreign('tipo_orgao_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_profissao_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_assunto_id')->references('tipo_id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atendimento', function (Blueprint $table) {
            $table->dropForeign('atendimento_pessoa_id_foreign');
            $table->dropForeign('atendimento_tipo_orgao_id_foreign');
            $table->dropForeign('atendimento_tipo_profissao_id_foreign');
            $table->dropForeign('atendimento_tipo_assunto_id_foreign');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEstabelecimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estabelecimento', function (Blueprint $table) {
            $table->foreign('pessoa_id')->references('pessoa_id')->on('pessoa');
            $table->foreign('tipo_bairro_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_povoado_id')->references('tipo_id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estabelecimento', function (Blueprint $table) {
            $table->dropForeign('estabelecimento_pessoa_id_foreign');
            $table->dropForeign('estabelecimento_tipo_bairro_id_foreign');
            $table->dropForeign('estabelecimento_tipo_povoado_id_foreign');
        });
    }
}

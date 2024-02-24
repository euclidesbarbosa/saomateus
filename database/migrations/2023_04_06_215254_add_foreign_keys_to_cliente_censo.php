<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClienteCenso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente_censo', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('cliente_id')->on('cliente');
            $table->foreign('censo_id')->references('censo_id')->on('censo');
            $table->foreign('tipo_moradia_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_desabrigado_id')->references('tipo_id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente_censo', function (Blueprint $table) {
            $table->dropForeign('cliente_censo_cliente_id_foreign');
            $table->dropForeign('cliente_censo_censo_id_foreign');
            $table->dropForeign('cliente_censo_tipo_moradia_id_foreign');
            $table->dropForeign('cliente_censo_tipo_desabrigado_id_foreign');
        });
    }
}

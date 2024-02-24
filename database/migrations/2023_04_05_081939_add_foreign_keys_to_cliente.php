<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->foreign('tipo_cliente_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_parentesco_id')->references('tipo_id')->on('tipo');
            $table->foreign('tipo_profissao_id')->references('tipo_id')->on('tipo');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->dropForeign('cliente_tipo_cliente_id_foreign');
            $table->dropForeign('cliente_tipo_parentesco_id_foreign');
            $table->dropForeign('cliente_tipo_profissao_id_foreign');
            $table->dropForeign('cliente_user_id_foreign');
        });
    }
}

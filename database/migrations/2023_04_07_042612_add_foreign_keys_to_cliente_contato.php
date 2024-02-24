<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClienteContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente_contato', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('cliente_id')->on('cliente');
            $table->foreign('tipo_contato_id')->references('tipo_id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente_contato', function (Blueprint $table) {
            $table->dropForeign('cliente_contato_cliente_id_foreign');
            $table->dropForeign('cliente_contato_tipo_contato_id_foreign');
        });
    }
}

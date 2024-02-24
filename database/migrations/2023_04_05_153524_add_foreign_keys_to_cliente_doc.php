<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClienteDoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente_doc', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('cliente_id')->on('cliente');
            $table->foreign('tipo_doc_id')->references('tipo_id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente_doc', function (Blueprint $table) {
            $table->dropForeign('cliente_doc_cliente_id_foreign');
            $table->dropForeign('cliente_doc_tipo_doc_id_foreign');
        });
    }
}

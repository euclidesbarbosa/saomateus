<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_contato', function (Blueprint $table) {
            $table->integer('cliente_contato_id')->autoIncrement();
            $table->integer('cliente_id');
            $table->integer('tipo_contato_id');
            $table->string('cliente_contato_des', 100);
            $table->integer('cliente_contato_sta')->nullable()->default(1);
            $table->timestamps();
            $table->index('cliente_id', 'idx_cliente_contato_1');
            $table->index('tipo_contato_id', 'idx_cliente_contato_2');
            $table->unique(['cliente_id', 'tipo_contato_id'], 'unq_cliente_contato_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_contato');
    }
}

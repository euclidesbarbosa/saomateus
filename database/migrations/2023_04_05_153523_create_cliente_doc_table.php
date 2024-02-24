<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_doc', function (Blueprint $table) {
            $table->integer('cliente_doc_id')->autoIncrement();
            $table->integer('cliente_id');
            $table->integer('tipo_doc_id');
            $table->string('cliente_doc_des', 100);
            $table->string('cliente_doc_caminho', 5000)->nullable();
            $table->integer('cliente_doc_sta')->nullable()->default(1);
            $table->timestamps();
            $table->index('cliente_id', 'idx_cliente_doc_1');
            $table->index('tipo_doc_id', 'idx_cliente_doc_2');
            $table->unique(['cliente_id', 'tipo_doc_id'], 'unq_cliente_doc_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_doc');
    }
}

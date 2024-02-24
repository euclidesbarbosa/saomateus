<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo', function (Blueprint $table) {
            $table->integer('tipo_id')->autoIncrement();
            $table->integer('tipo_id_1')->nullable();
            $table->string('tipo_sigla', 50);
            $table->string('tipo_nome', 100);
            $table->string('tipo_nome_abrv', 50)->nullable();
            $table->integer('tipo_ordem')->nullable()->default(0);
            $table->string('tipo_style', 500)->nullable();
            $table->string('tipo_mask', 50)->nullable();
            $table->string('tipo_link', 120)->nullable();
            $table->integer('tipo_sta')->nullable()->default(1);
            $table->timestamps();
            $table->index('tipo_sigla', 'idx_tipo_1');
            $table->index('tipo_nome', 'idx_tipo_2');
            $table->unique(['tipo_sigla','tipo_nome'], 'unq_tipo_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo');
    }
}

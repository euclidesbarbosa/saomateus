<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCensoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('censo', function (Blueprint $table) {
            $table->integer('censo_id')->autoIncrement();
            $table->bigInteger('cidade_id');
            $table->integer('censo_ano');
            $table->integer('censo_mes');
            $table->string('censo_titulo',100);
            $table->string('censo_desc',100);
            $table->integer('tipo_censo_status_id')->nullable()->default(0);
            $table->integer('censo_sta')->nullable()->default(1);
            $table->timestamps();
            $table->index('cidade_id', 'idx_censo_1');
            $table->index('censo_ano', 'idx_censo_2');
            $table->index('censo_mes', 'idx_censo_3');
            $table->unique(['cidade_id','censo_ano', 'censo_mes'], 'unq_censo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('censo');
    }
}

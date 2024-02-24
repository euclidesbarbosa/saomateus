<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcao', function (Blueprint $table) {
            $table->integer('funcao_id')->autoIncrement();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('tipo_funcao_id');
            $table->integer('funcao_sta')->nullable()->default(1);
            $table->timestamps();
            $table->index('user_id', 'idx_funcao_1');
            $table->index('tipo_funcao_id', 'idx_funcao_2');
            $table->unique(['user_id','tipo_funcao_id'], 'unq_funcao_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcao');
    }
}

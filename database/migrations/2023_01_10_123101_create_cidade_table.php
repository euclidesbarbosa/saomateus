<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidade', function (Blueprint $table) {
            $table->bigInteger('cidade_id')->autoIncrement();
            $table->char('uf_sigla', 2);
            $table->string('cidade_nome', 120);
            $table->string('cidade_ibge', 10)->nullable();
            $table->char('cidade_capital', 1)->nullable();
            $table->string('cidade_cnpj', 18)->nullable();
            $table->string('cidade_end', 100)->nullable();
            $table->string('cidade_end_comp', 100)->nullable();
            $table->string('cidade_end_cep', 10)->nullable();
            $table->string('cidade_end_num', 10)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('cidade_sta')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidade');
    }
}

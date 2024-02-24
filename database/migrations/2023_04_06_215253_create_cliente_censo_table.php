<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteCensoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_censo', function (Blueprint $table) {
            $table->integer('cliente_censo_id')->autoIncrement();
            $table->integer('censo_id');
            $table->integer('cliente_id');
            $table->integer('cliente_censo_qtd_dep')->nullable()->default(0);
            //POSSUI IMÓVEL 1 = SIM, 0 = NÃO
            $table->integer('cliente_censo_possui_imovel')->nullable()->default(0);
            $table->integer('tipo_moradia_id')->nullable();
            $table->integer('cliente_censo_qtd_morador')->nullable()->default(0);
            //DESABRIGADO 1 = SIM, 0 = NÃO
            $table->integer('tipo_desabrigado_id')->nullable();
            //SE SIM, QUAL A SITUAÇÃO
            $table->string('cliente_censo_desabrigado_situacao', 100)->nullable();
            $table->integer('cliente_censo_sta')->nullable()->default(1);
            $table->string('cep', 10)->nullable();
            $table->string('end', 120)->nullable();
            $table->string('end_compl', 50)->nullable();
            $table->bigInteger('ibge')->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('bairro', 50)->nullable();
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
        Schema::dropIfExists('cliente_censo');
    }
}

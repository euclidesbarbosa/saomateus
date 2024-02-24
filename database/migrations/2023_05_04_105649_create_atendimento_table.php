<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento', function (Blueprint $table) {
            $table->bigInteger('atendimento_id')->autoIncrement();
            $table->bigInteger('pessoa_id');
            $table->integer('tipo_orgao_id');
            $table->integer('tipo_profissao_id')->nullable();
            $table->integer('tipo_assunto_id')->nullable();
            $table->string('atendimento_descricao',500)->nullable();
            $table->integer('atendimento_receber_inf_pref')->nullable()->default(1);
            $table->integer('atendimento_termo')->nullable()->default(1);
            $table->integer('atendimento_situacao')->nullable();
            $table->timestamps();
            $table->index('pessoa_id', 'idx_atendimento_1');
            $table->index('tipo_orgao_id', 'idx_atendimento_2');
            $table->index('tipo_profissao_id', 'idx_atendimento_3');
            $table->index('tipo_assunto_id', 'idx_atendimento_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimento');
    }
}

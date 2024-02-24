<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaSituacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_situacao', function (Blueprint $table) {
            $table->bigInteger('pessoa_situacao_id')->autoIncrement();
            $table->bigInteger('pessoa_id');
            $table->date('pessoa_situacao_data');
            $table->integer('pessoa_situacao_desabrigada')->nullable()->default(2);
            $table->integer('pessoa_situacao_desempregada')->nullable()->default(2);
            $table->integer('pessoa_situacao_estudando')->nullable()->default(2);
            $table->integer('pessoa_situacao_obto')->nullable()->default(2);
            $table->integer('pessoa_situacao_rec_bolsa_familia')->nullable()->default(2);
            $table->bigInteger('user_id')->unsigned()->nullable(); //usuário
            $table->timestamps();
            $table->index('pessoa_id', 'idx_pessoa_situacao_1');
            $table->index('pessoa_situacao_data', 'idx_pessoa_situacao_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_situacao');
    }
}

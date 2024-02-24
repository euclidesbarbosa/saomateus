<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstabelecimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimento', function (Blueprint $table) {
            $table->integer('estabelecimento_id')->autoIncrement();
            $table->bigInteger('pessoa_id');
            $table->integer('tipo_local_id');
            $table->integer('estabelecimento_localizacao'); // 1 = ZONA URBANA, 2 = RURAL
            $table->string('estabelecimento_nome', 120);
            $table->string('estabelecimento_end', 120)->nullable();
            $table->string('estabelecimento_end_num', 10)->nullable();
            $table->string('estabelecimento_end_compl', 50)->nullable();
            $table->integer('tipo_bairro_id')->nullable();
            $table->integer('tipo_povoado_id')->nullable();
            $table->string('estabelecimento_cont_tel', 15)->nullable();
            $table->string('estabelecimento_doc_cnpj', 18)->nullable();
            $table->string('estabelecimento_doc_alvara', 15)->nullable();
            $table->string('estabelecimento_doc_insc_estadual', 20)->nullable();
            $table->integer('estabelecimento_sta')->nullable()->default(1);
            $table->index('pessoa_id', 'idx_estabelecimento_1');
            $table->index('estabelecimento_local', 'idx_estabelecimento_2');
            $table->index('estabelecimento_nome', 'idx_estabelecimento_3');
            $table->index('tipo_bairro_id', 'idx_estabelecimento_4');
            $table->index('tipo_povoado_id', 'idx_estabelecimento_5');
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
        Schema::dropIfExists('estabelecimento');
    }
}

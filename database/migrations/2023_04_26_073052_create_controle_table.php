<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controle', function (Blueprint $table) {
            $table->bigInteger('controle_id')->autoIncrement();
            $table->bigInteger('controle_cod')->nullable(); //Codigo da família
            $table->char('uf_sigla',2)->nullable()->default('MA');
            $table->bigInteger('cidade_id');
            $table->integer('tipo_distrito_id')->nullable();
            $table->integer('tipo_subdistrito_id')->nullable();
            $table->integer('tipo_setor_id')->nullable();
            $table->integer('controle_modalidade')->nullable()->default(1); //1 - inclusão; 2 - auteração
            $table->integer('controle_formacoletadados')->nullable()->default(1); //1 - sem visita domic.; 2 - com visita domic.
            $table->integer('controle_formpreenchido')->nullable()->default(0); //0 - principal;
            $table->integer('controle_formpreenchido_1')->nullable()->default(1); //1 - avulso 1;
            $table->integer('controle_formpreenchido_2')->nullable()->default(2); //2 - avulso 2;
            $table->integer('controle_formpreenchido_3')->nullable()->default(3); //3 - suplementar;
            $table->date('controle_dtentrevista')->nullable();
            $table->integer('tipo_localidade_id')->nullable();
            $table->integer('tipo_logradouro_id')->nullable();
            $table->integer('tipo_titulo_id')->nullable();
            $table->string('controle_end_nome',120)->nullable();
            $table->integer('controle_end_num')->nullable()->default(0);
            $table->string('controle_end_num_compl')->nullable(); // s/n, km, A, FUNASA, SUCAM
            $table->string('controle_end_compl_add')->nullable(); // apartamento, casa, sobrado, fundos, bloco, lote, quadra
            $table->string('controle_end_cep')->nullable();
            $table->bigInteger('controle_unid_terr')->nullable();
            $table->string('controle_unid_terr_desc', 100)->nullable();
            $table->string('controle_unid_terr_localiz', 100)->nullable();
            $table->timestamps();
            $table->index('controle_cod', 'idx_controle_1');
            $table->index('uf_sigla', 'idx_controle_2');
            $table->index('cidade_id', 'idx_controle_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controle');
    }
}

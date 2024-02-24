<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->bigInteger('aluno_id')->autoIncrement();
            $table->string('aluno_nome', 100)->nullable();
            $table->string('end',100)->nullable();
            $table->string('bairro',100)->nullable();
            $table->string('cep',10)->nullable();
            $table->string('compl',100)->nullable();
            $table->string('end_num', 20)->nullable();
            $table->string('rg',30)->nullable();
            $table->string('rg_orgao_exp',20)->nullable();
            $table->char('rg_uf_exp',2)->nullable();
            $table->string('cpf',11)->nullable();
            $table->date('dtnasc')->nullable();
            $table->string('nacionalidade',30)->nullable();
            $table->string('naturalidade',50)->nullable();
            $table->string('aluno_email',100)->nullable();
            $table->string('tel',15)->nullable();
            $table->date('escola_dt_cad')->nullable();
            $table->integer('aluno_sexo')->nullable();
            $table->bigInteger('cidade_id')->nullable();
            $table->char('uf',2)->nullable()->default('MA');
            $table->bigInteger('aluno_escola_id')->nullable();
            $table->bigInteger('escola_id_periodo')->nullable();
            $table->date('escola_dt_ingresso')->nullable();
            $table->string('aluno_pai', 100)->nullable();
            $table->string('aluno_mae', 100)->nullable();
            $table->integer('aluno_cor')->nullable();
            $table->integer('escola_zona')->nullable();
            $table->string('cod_inep',30)->nullable();
            $table->string('cod_id_social',30)->nullable();
            $table->string('sus',50)->nullable();
            $table->integer('aluno_sta')->nullable()->default(1);
            $table->timestamps();
            $table->index('aluno_nome', 'idx_aluno_1');
            $table->index('bairro', 'idx_aluno_2');
            $table->index('dtnasc', 'idx_aluno_3');
            $table->index('cpf', 'idx_aluno_4');
            $table->index('sus', 'idx_aluno_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}

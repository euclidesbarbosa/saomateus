<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp', function (Blueprint $table) {
            $table->integer('emp_id')->autoIncrement();
            $table->integer('tipo_emp_id');
            $table->string('emp_razao_social', 120);
            $table->string('emp_nome_fantasia', 120)->nullable();
            $table->string('emp_cnpj', 18)->nullable();
            $table->string('emp_insc_mun', 20)->nullable();
            $table->string('emp_insc_est', 20)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('end', 120)->nullable();
            $table->string('end_compl', 50)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('emp_resp', 100)->nullable();
            $table->string('emp_resp_cpf', 14)->nullable();
            $table->string('emp_resp_tel', 15)->nullable();
            $table->string('emp_resp_tel_1', 15)->nullable();
            $table->string('emp_email', 100)->nullable();
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
        Schema::dropIfExists('emp');
    }
}

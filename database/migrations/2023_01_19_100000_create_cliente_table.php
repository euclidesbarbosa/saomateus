<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('cliente_id')->autoIncrement();
            $table->integer('cliente_id_1')->nullable();
            $table->integer('tipo_cliente_id')->nullable()->default(0);
            $table->integer('tipo_parentesco_id')->nullable();
            $table->string('cliente_nome', 120);
            $table->string('cliente_alcunha', 50)->nullable();
            $table->date('cliente_dtnasc')->nullable();
            $table->integer('cliente_sexo')->nullable()->default(1); // 0 = FEMININO; 1 = MASCULINO; 2 = INDEFINIDO
            $table->string('cliente_pai', 100)->nullable();
            $table->string('cliente_mae', 100)->nullable();
            $table->integer('tipo_profissao_id')->nullable();
            $table->integer('cliente_sta')->nullable()->default(1);
            $table->bigInteger('user_id')->unsigned()->nullable(); //usuário atualizou
            $table->timestamps();
            $table->index('cliente_id_1', 'idx_cliente_1');
            $table->index('cliente_nome', 'idx_cliente_2');
            $table->index('cliente_pai', 'idx_cliente_3');
            $table->index('cliente_mae', 'idx_cliente_4');
            $table->index('tipo_cliente_id', 'idx_cliente_5');
            $table->unique(['cliente_nome', 'cliente_dtnasc'], 'unq_cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}

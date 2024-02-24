<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uf', function (Blueprint $table) {
            $table->char('uf_sigla', 2)->primary();
            $table->string('uf_nome', 120);
            $table->string('uf_regiao', 100);
            $table->string('uf_capital', 50)->nullable();
            $table->integer('uf_sta')->nullable()->default(1);
            $table->timestamps();
            $table->index('uf_nome', 'idx_uf_1');
            $table->unique('uf_nome', 'unq_uf_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uf');
    }
}

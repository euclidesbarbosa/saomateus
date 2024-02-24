<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCenso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('censo', function (Blueprint $table) {
            $table->foreign('cidade_id')->references('cidade_id')->on('cidade');
            $table->foreign('tipo_censo_status_id')->references('tipo_id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('censo', function (Blueprint $table) {
            $table->dropForeign('censo_cidade_id_foreign');
            $table->dropForeign('censo_tipo_censo_status_id_foreign');
        });
    }
}

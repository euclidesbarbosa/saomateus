<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFuncao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcao', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_funcao_id')->references('tipo_id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcao', function (Blueprint $table) {
            $table->dropForeign('funcao_user_id_foreign');
            $table->dropForeign('funcao_tipo_funcao_id_foreign');
        });
    }
}

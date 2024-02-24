<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cidade', function (Blueprint $table) {
            $table->foreign('uf_sigla')->references('uf_sigla')->on('uf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cidade', function (Blueprint $table) {
            $table->dropForeign('cidade_uf_sigla_foreign');
        });
    }
}

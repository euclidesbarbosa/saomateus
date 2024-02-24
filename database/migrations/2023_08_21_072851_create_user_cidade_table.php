<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cidade', function (Blueprint $table) {
            $table->bigInteger('user_cidade_id')->autoIncrement();
            $table->bigInteger('cidade_id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('user_cidade_sta')->nullable()->default(1);
            $table->timestamps();
            $table->unique(['cidade_id', 'user_id'], 'unq_user_cidade_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_cidade');
    }
}

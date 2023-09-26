<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVeiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_veiculo', function (Blueprint $table) {
            $table->bigIncrements('id_uv');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('veiculo_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('veiculo_id')->references('id_veiculo')->on('veiculo');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_veiculo');
    }
}

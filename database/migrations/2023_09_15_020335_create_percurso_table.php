<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePercursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percurso', function (Blueprint $table) {
            $table->bigIncrements('id_percurso');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('veiculo_id');
            $table->integer('km_inicial');
            $table->integer('km_final');
            $table->integer('km_percorrido');
            $table->string('observacao');
            $table->timestamp('data_registro')->nullable();
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
        Schema::dropIfExists('percurso');
    }
}

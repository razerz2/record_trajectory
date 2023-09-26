<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locais', function (Blueprint $table) {
            $table->bigIncrements('id_local');
            $table->unsignedInteger('estado_id');
            $table->unsignedInteger('cidade_id');
            $table->string('nome_local');
            $table->string('endereco');
            $table->integer('n_endereco');
            $table->integer('CEP');
            $table->integer('n_visitas');
            $table->foreign('estado_id')->references('id_estado')->on('estados');
            $table->foreign('cidade_id')->references('id_cidade')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locais');
    }
}

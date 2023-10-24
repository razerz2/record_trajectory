<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastosPercursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos_percurso', function (Blueprint $table) {
            $table->unsignedInteger('gasto_id');
            $table->unsignedInteger('percurso_id');
            $table->unsignedInteger('veiculo_id');
            $table->foreign('gasto_id')->references('id_gasto')->on('gastos');
            $table->foreign('percurso_id')->references('id_percurso')->on('percurso');
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
        Schema::dropIfExists('gastos_percurso');
    }
}

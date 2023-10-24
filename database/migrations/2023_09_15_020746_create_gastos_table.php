<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->bigIncrements('id_gasto');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('veiculo_id');
            $table->string('tipo_gastos');
            $table->float('valor');
            $table->string('descricao');
            $table->float('litros');
            $table->timestamp('data_registro');
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
        Schema::dropIfExists('gastos');
    }
}
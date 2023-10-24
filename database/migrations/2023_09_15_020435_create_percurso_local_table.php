<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePercursoLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percurso_local', function (Blueprint $table) {
            $table->unsignedInteger('percurso_id');
            $table->unsignedInteger('local_id');
            $table->integer('order');
            $table->foreign('percurso_id')->references('id_percurso')->on('percurso');
            $table->foreign('local_id')->references('id_local')->on('locais');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('percurso_local');
    }
}

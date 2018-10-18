<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUnidadaCarrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_carrera', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('carrera_id')->unsigned();
            $table->integer('periodo_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_carrera');
    }
}

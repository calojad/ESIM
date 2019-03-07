<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesMenuSistema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 
        Schema::create('tipo_unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        // 
        Schema::create('tipo_periodo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('tipo_matriz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        // 
        Schema::create('tipo_evaluacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        // 
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
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
        Schema::dropIfExists('tipo_unidad');
        Schema::dropIfExists('tipo_periodo');
        Schema::dropIfExists('tipo_matriz');
        Schema::dropIfExists('tipo_evaluacion');
        Schema::dropIfExists('ubicacion');
    }
}

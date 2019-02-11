<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesMenuIes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 
        Schema::create('unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_unidad_id')->unsigned();
            $table->integer('ubicacion_id')->unsigned();
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        // 
        Schema::create('carrera', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->char('tipo')->comment('D=Diseñada;A=Anterior;R=Rediseñada');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('responsable_id')->unsigned();
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('responsable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('gmail');
            $table->string('email_institu')->nullable();
            $table->string('rol')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        // 
        Schema::create('unidad_carrera', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidad_id')->unsigned();
            $table->integer('carrera_id')->unsigned();
            $table->timestamps();
        });
        // 
        Schema::create('periodo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_periodo_id')->unsigned();
            $table->string('nombre');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::dropIfExists('unidad');
        Schema::dropIfExists('carrera');
        Schema::dropIfExists('unidad_carrera');
        Schema::dropIfExists('periodo');
    }
}

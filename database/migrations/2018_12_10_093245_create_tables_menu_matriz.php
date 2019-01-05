<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesMenuMatriz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('abreviado');
            $table->string('descripcion');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('matriz', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelo_id')->unsigned();
            $table->integer('periodo_id')->unsigned();
            $table->integer('carrera_id')->unsigned();
            $table->integer('tipo_evaluacion_id')->unsigned();
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('criterio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('abreviado');
            $table->integer('nivel');
            $table->string('descripcion');
            $table->integer('criterio_padre_id')->unsigned()->comment('Indica a que criterio pertenece, si es un subcriterio');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('indicador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelo_id')->unsigned();
            $table->integer('tipo_indicador_id')->unsigned();
            $table->integer('grupo_valor_id')->unsigned();
            $table->integer('formula_id')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->text('estandar');
            $table->string('vigencia');
            $table->text('marco_normativo');
            $table->text('fuente_info');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('evidencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('elemento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evidencia_id')->unsigned();
            $table->integer('secuencia');
            $table->string('nombre');
            $table->integer('importancia');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('modelo_criterio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelo_id')->unsigned();
            $table->integer('criterio_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('criterio_indicador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('criterio_id')->unsigned();
            $table->integer('indicador_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('indicador_evidencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indicador_id')->unsigned();
            $table->integer('evidencia_id')->unsigned();
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
        Schema::dropIfExists('modelo');
        Schema::dropIfExists('matriz');
        Schema::dropIfExists('criterio');
        Schema::dropIfExists('indicador');
        Schema::dropIfExists('evidencia');
        Schema::dropIfExists('elemento');
        Schema::dropIfExists('modelo_criterio');
        Schema::dropIfExists('criterio_indicador');
        Schema::dropIfExists('indicador_evidencia');
    }
}
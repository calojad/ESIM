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
            $table->string('abreviado')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('matriz', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelo_id')->unsigned();
            $table->integer('periodo_id')->unsigned();
            $table->integer('carrera_id')->unsigned()->nullable();
            $table->integer('departamento_id')->unsigned()->nullable();
            $table->integer('tipo_evaluacion_id')->unsigned();
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('criterio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('abreviado')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('indicador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_indicador_id')->unsigned();
            $table->integer('grupo_valor_id')->unsigned()->nullable()->default(null);
            $table->integer('formula_id')->unsigned()->nullable()->default(null);
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('estandar')->nullable();
            $table->text('vigencia')->nullable();
            $table->text('marco_normativo')->nullable();
            $table->text('fuente_info')->nullable();
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('evidencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->integer('importancia')->default(0);
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('elemento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('secuencia')->nullable();
            $table->string('nombre');
            $table->integer('importancia')->default(0);
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('estructura_criterios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelo_id')->unsigned();
            $table->integer('criterio_id')->unsigned();
            $table->integer('padre_id')->unsigned()->nullable();
            $table->integer('nivel')->default(1);
            $table->timestamps();
        });
        Schema::create('estructura_indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estruc_crite_id')->unsigned();
            $table->integer('indicador_id')->unsigned();
            $table->string('abrebiado')->nullable()->default(null);
            $table->timestamps();
        });
        Schema::create('estructura_evidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estruc_indic_id')->unsigned();
            $table->integer('evidencia_id')->unsigned();
            $table->string('abrebiado')->nullable()->default(null);
            $table->timestamps();
        });
        Schema::create('estructura_elementos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estruc_evide_id')->unsigned();
            $table->integer('elemento_id')->unsigned();
            $table->string('abrebiado')->nullable()->default(null);
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
        Schema::dropIfExists('estructura_criterios');
        Schema::dropIfExists('estructura_indicadores');
        Schema::dropIfExists('estructura_evidencias');
        Schema::dropIfExists('estructura_elementos');
    }
}
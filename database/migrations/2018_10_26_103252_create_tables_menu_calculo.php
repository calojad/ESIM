<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesMenuCalculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_indicador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('grupo_valor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_indicador_id')->unsigned();
            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('valoracion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grupo_valor_id')->unsigned();
            $table->string('nombre');
            $table->string('abreviatura');
            $table->decimal('valor',8,2);
            $table->decimal('rango_inicio',8,2);
            $table->decimal('rango_fin',8,2);
            $table->string('color');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('variables', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->string('variable');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('formulas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('abreviatura');
            $table->string('formula');
            $table->integer('estado')->comment('1=Activo|0=Inactivo');
            $table->timestamps();
        });
        Schema::create('formula_variable', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formula_id')->unsigned();
            $table->integer('variable_id')->unsigned();
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
        Schema::dropIfExists('tipo_indicador');
        Schema::dropIfExists('grupo_valor');
        Schema::dropIfExists('valoracion');
        Schema::dropIfExists('variables');
        Schema::dropIfExists('formulas');
        Schema::dropIfExists('formula_variable');
    }
}

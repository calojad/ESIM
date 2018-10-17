<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForeignKeysTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unidad', function (Blueprint $table) {
            $table->foreign('tipo_unidad_id')->references('id')->on('tipo_unidad');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacion');
        });
        // 
        Schema::table('unidad_carrera', function (Blueprint $table) {
            $table->foreign('unidad_id')->references('id')->on('unidad');
            $table->foreign('carrera_id')->references('id')->on('carrera');
        });
        // 
        Schema::table('periodo', function (Blueprint $table) {
            $table->foreign('tipo_periodo_id')->references('id')->on('tipo_periodo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unidad', function (Blueprint $table) {
            $table->dropForeign('unidad_tipo_unidad_id_foreign');
            $table->dropForeign('unidad_ubicacion_id_foreign');
        });
        Schema::table('unidad_carrera', function (Blueprint $table) {
            $table->dropForeign('unidad_carrera_unidad_id_foreign');
            $table->dropForeign('unidad_carrera_carrera_id_foreign');
        });
         Schema::table('periodo', function (Blueprint $table) {
            $table->dropForeign('periodo_tipo_periodo_id_foreign');
        });
    }
}

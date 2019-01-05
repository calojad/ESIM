<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysTablesMatriz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriz', function (Blueprint $table) {
            $table->foreign('modelo_id')->references('id')->on('modelo');
            $table->foreign('periodo_id')->references('id')->on('periodo');
            $table->foreign('carrera_id')->references('id')->on('carrera');
            $table->foreign('tipo_evaluacion_id')->references('id')->on('tipo_evaluacion');
        });

        Schema::table('modelo_criterio', function (Blueprint $table) {
            $table->foreign('modelo_id')->references('id')->on('modelo');
            $table->foreign('criterio_id')->references('id')->on('criterio');
        });

        Schema::table('criterio', function (Blueprint $table) {
            $table->foreign('criterio_padre_id')->references('id')->on('criterio');
        });

        Schema::table('criterio_indicador', function (Blueprint $table) {
            $table->foreign('criterio_id')->references('id')->on('criterio');
            $table->foreign('indicador_id')->references('id')->on('indicador');
        });

        Schema::table('indicador', function (Blueprint $table) {
            $table->foreign('modelo_id')->references('id')->on('modelo');
            $table->foreign('tipo_indicador_id')->references('id')->on('tipo_indicador');
            $table->foreign('grupo_valor_id')->references('id')->on('grupo_valor');
            $table->foreign('formula_id')->references('id')->on('formulas');
        });

        Schema::table('indicador_evidencia', function (Blueprint $table) {
            $table->foreign('indicador_id')->references('id')->on('indicador');
            $table->foreign('evidencia_id')->references('id')->on('evidencia');
        });

        Schema::table('elemento', function (Blueprint $table) {
            $table->foreign('evidencia_id')->references('id')->on('evidencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriz', function (Blueprint $table) {
            $table->dropForeign('matriz_modelo_id_foreign');
            $table->dropForeign('matriz_periodo_id_foreign');
            $table->dropForeign('matriz_carrera_id_foreign');
            $table->dropForeign('matriz_tipo_evaluacion_id_foreign');
        });
        Schema::table('modelo_criterio', function (Blueprint $table) {
            $table->dropForeign('modelo_criterio_modelo_id_foreign');
            $table->dropForeign('modelo_criterio_criterio_id_foreign');
        });
        Schema::table('criterio', function (Blueprint $table) {
            $table->dropForeign('criterio_criterio_id_foreign');
        });
        Schema::table('criterio_indicador', function (Blueprint $table) {
            $table->dropForeign('criterio_indicador_criterio_id_foreign');
            $table->dropForeign('criterio_indicador_indicador_id_foreign');
        });
        Schema::table('indicador', function (Blueprint $table) {
            $table->dropForeign('indicador_modelo_id_foreign');
            $table->dropForeign('indicador_tipo_indicador_id_foreign');
            $table->dropForeign('indicador_grupo_valor_id_foreign');
            $table->dropForeign('indicador_formula_id_foreign');
        });
        Schema::table('indicador_evidencia', function (Blueprint $table) {
            $table->dropForeign('indicador_evidencia_indicador_id_foreign');
            $table->dropForeign('indicador_evidencia_evidencia_id_foreign');
        });
        Schema::table('elemento', function (Blueprint $table) {
            $table->dropForeign('elemento_evidencia_id_foreign');
        });
    }
}
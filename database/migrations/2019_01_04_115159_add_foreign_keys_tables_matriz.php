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
            $table->foreign('departamento_id')->references('id')->on('departamento');
            $table->foreign('tipo_evaluacion_id')->references('id')->on('tipo_evaluacion');
        });

        Schema::table('indicador', function (Blueprint $table) {
            $table->foreign('tipo_indicador_id')->references('id')->on('tipo_indicador');
            $table->foreign('grupo_valor_id')->references('id')->on('grupo_valor');
            $table->foreign('formula_id')->references('id')->on('formulas');
        });

        Schema::table('estructura_criterios', function (Blueprint $table) {
            $table->foreign('modelo_id')->references('id')->on('modelo');
            $table->foreign('criterio_id')->references('id')->on('criterio');
            $table->foreign('padre_id')->references('id')->on('estructura_criterios');
        });

        Schema::table('estructura_indicadores', function (Blueprint $table) {
            $table->foreign('estruc_crite_id')->references('id')->on('estructura_criterios');
            $table->foreign('indicador_id')->references('id')->on('indicador');
        });

        Schema::table('estructura_evidencias', function (Blueprint $table) {
            $table->foreign('estruc_indic_id')->references('id')->on('estructura_indicadores');
            $table->foreign('evidencia_id')->references('id')->on('evidencia');
        });

        Schema::table('estructura_elementos', function (Blueprint $table) {
            $table->foreign('estruc_evide_id')->references('id')->on('estructura_evidencias');
            $table->foreign('elemento_id')->references('id')->on('elemento');
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
            $table->dropForeign('matriz_departamento_id_foreign');
            $table->dropForeign('matriz_tipo_evaluacion_id_foreign');
        });
        Schema::table('indicador', function (Blueprint $table) {
            $table->dropForeign('indicador_tipo_indicador_id_foreign');
            $table->dropForeign('indicador_grupo_valor_id_foreign');
            $table->dropForeign('indicador_formula_id_foreign');
        });
        Schema::table('estructura_criterios', function (Blueprint $table) {
            $table->dropForeign('estructura_criterios_modelo_id_foreign');
            $table->dropForeign('estructura_criterios_criterio_id_foreign');
            $table->dropForeign('estructura_criterios_padre_id_foreign');
        });
        Schema::table('estructura_indicadores', function (Blueprint $table) {
            $table->dropForeign('estructura_indicadores_estruc_crite_id_foreign');
            $table->dropForeign('estructura_indicadores_indicador_id_foreign');
        });
        Schema::table('estructura_evidencias', function (Blueprint $table) {
            $table->dropForeign('estructura_evidencias_estruc_indic_id_foreign');
            $table->dropForeign('estructura_evidencias_evidencia_id_foreign');
        });
        Schema::table('estructura_elementos', function (Blueprint $table) {
            $table->dropForeign('estructura_elementos_estruc_evide_id_foreign');
            $table->dropForeign('estructura_elementos_elemento_id_foreign');
        });
    }
}
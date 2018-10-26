<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysTablesCalculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupo_valor', function (Blueprint $table) {
            $table->foreign('tipo_indicador_id')->references('id')->on('tipo_indicador');
        });

        Schema::table('valoracion', function (Blueprint $table) {
            $table->foreign('grupo_valor_id')->references('id')->on('grupo_valor');
        });

        Schema::table('formula_variable', function (Blueprint $table) {
            $table->foreign('formula_id')->references('id')->on('formulas');
            $table->foreign('variable_id')->references('id')->on('variables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupo_valor', function (Blueprint $table) {
            $table->dropForeign('grupo_valor_tipo_indicador_id_foreign');
        });
        Schema::table('valoracion', function (Blueprint $table) {
            $table->dropForeign('valoracion_grupo_valor_id_foreign');
        });
        Schema::table('formula_variable', function (Blueprint $table) {
            $table->dropForeign('formula_variable_formula_id_foreign');
            $table->dropForeign('formula_variable_variable_id_foreign');
        });
    }
}

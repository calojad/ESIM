<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuarioAsignacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_asignacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('periodo_id')->unsigned();
            $table->integer('carrera_id')->unsigned()->nullable();
            $table->integer('departamento_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('usuario_asignacion', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('carrera_id')->references('id')->on('carrera');
            $table->foreign('departamento_id')->references('id')->on('departamento');
            $table->foreign('periodo_id')->references('id')->on('periodo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_asignacion');
        Schema::table('usuario_asignacion', function (Blueprint $table) {
            $table->dropForeign('usuario_asignacion_usuario_id_foreign');
            $table->dropForeign('usuario_asignacion_carrera_id_foreign');
            $table->dropForeign('usuario_asignacion_departamento_id_foreign');
            $table->dropForeign('usuario_asignacion_periodo_id_foreign');

        });
    }
}

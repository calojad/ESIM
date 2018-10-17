<?php

use Illuminate\Database\Seeder;

class TipoUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_unidad')->insert([
			'nombre' => 'Matriz',
			'estado' => 1,
		]);
		DB::table('tipo_unidad')->insert([
			'nombre' => 'Sede',
			'estado' => 1,
		]);
		DB::table('tipo_unidad')->insert([
			'nombre' => 'Extención',
			'estado' => 1,
		]);
    }
}

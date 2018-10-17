<?php

use Illuminate\Database\Seeder;

class TipoPeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_periodo')->insert([
			'nombre' => 'Ciclos',
			'estado' => 1,
		]);
		DB::table('tipo_periodo')->insert([
			'nombre' => 'Años',
			'estado' => 1,
		]);
    }
}

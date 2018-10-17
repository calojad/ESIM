<?php

use Illuminate\Database\Seeder;

class TipoEvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_evaluacion')->insert([
			'nombre' => 'Digital',
			'estado' => 1,
		]);
    }
}

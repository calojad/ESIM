<?php

use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('ubicacion')->insert([
			'nombre' => 'Cuenca',
			'estado' => 1,
		]);
		DB::table('ubicacion')->insert([
			'nombre' => 'Azogues',
			'estado' => 1,
		]);
		DB::table('ubicacion')->insert([
			'nombre' => 'Macas',
			'estado' => 1,
		]);
		DB::table('ubicacion')->insert([
			'nombre' => 'Cañar',
			'estado' => 1,
		]);
		DB::table('ubicacion')->insert([
			'nombre' => 'Troncal',
			'estado' => 1,
		]);
    }
}

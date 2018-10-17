<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'tipo_evaluacion',
            'tipo_periodo',
            'tipo_unidad',
            'ubicacion'
        ]);

        $this->call(TipoEvaluacionSeeder::class);
        $this->call(TipoPeriodoSeeder::class);
        $this->call(TipoUnidadSeeder::class);
        $this->call(UbicacionSeeder::class);
    }
    protected function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

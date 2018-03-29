<?php

use App\Access;
use Illuminate\Database\Seeder;

class AccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Access::query()->forceCreate([
            'name' => 'nivel1',
            'display_name' => 'Nivel de Acceso 1',
        ]);
        Access::query()->forceCreate([
            'name' => 'nivel2',
            'display_name' => 'Nivel de Acceso 2',
        ]);
        Access::query()->forceCreate([
            'name' => 'nivel3',
            'display_name' => 'Nivel de Acceso 3',
        ]);
        Access::query()->forceCreate([
            'name' => 'nivel4',
            'display_name' => 'Nivel de Acceso 4',
        ]);
        Access::query()->forceCreate([
            'name' => 'nivel5',
            'display_name' => 'Nivel de Acceso 5',
        ]);
    }
}

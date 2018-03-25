<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::query()->forceCreate([
            'code' => 'DG',
            'name' => 'Direccion General',
            'access_level_id' => 1,
            'parent_id' =>0,
        ]);
        Area::query()->forceCreate([
            'code' => 'CA',
            'name' => 'Consejo de Administracion',
            'access_level_id' => 1,
            'parent_id' =>0,
        ]);
        Area::query()->forceCreate([
            'code' => 'GS',
            'name' => 'Gerencia de Servicios de Salud',
            'access_level_id' => 2,
            'parent_id' =>1,
        ]);
        Area::query()->forceCreate([
            'code' => 'GO',
            'name' => 'Gerencia de Operaciones',
            'access_level_id' => 2,
            'parent_id' =>1,
        ]);
        Area::query()->forceCreate([
            'code' => 'KH',
            'name' => 'Capital Humano',
            'access_level_id' => 3,
            'parent_id' =>1,
        ]);
        Area::query()->forceCreate([
            'code' => 'TE',
            'name' => 'Tesoreria',
            'access_level_id' => 3,
            'parent_id' =>1,
        ]);
        Area::query()->forceCreate([
            'code' => 'TI',
            'name' => 'Tecnologias de la Informacion',
            'access_level_id' => 3,
            'parent_id' =>1,
        ]);
        Area::query()->forceCreate([
            'code' => 'VT',
            'name' => 'Ventas',
            'access_level_id' => 3,
            'parent_id' =>1,
        ]);
        Area::query()->forceCreate([
            'code' => 'MK',
            'name' => 'Mercadotecnia',
            'access_level_id' => 3,
            'parent_id' =>1,
        ]);
        Area::query()->forceCreate([
            'code' => 'SG',
            'name' => 'Servicios Generales',
            'access_level_id' => 3,
            'parent_id' =>4,
        ]);
        Area::query()->forceCreate([
            'code' => 'AB',
            'name' => 'Alimentos & Bebidas',
            'access_level_id' => 3,
            'parent_id' =>4,
        ]);
        Area::query()->forceCreate([
            'code' => 'SE',
            'name' => 'Servicio al Cliente Excepcional',
            'access_level_id' => 3,
            'parent_id' =>4,
        ]);
        Area::query()->forceCreate([
            'code' => 'SL',
            'name' => 'Serena Living',
            'access_level_id' => 3,
            'parent_id' =>3,
        ]);
        Area::query()->forceCreate([
            'code' => 'SC-ROS',
            'name' => 'SerenaCenter ROS-1',
            'access_level_id' => 3,
            'parent_id' =>3,
        ]);
        Area::query()->forceCreate([
            'code' => 'SC-TIJ',
            'name' => 'SerenaCenter TIJ-1',
            'access_level_id' => 3,
            'parent_id' =>3,
        ]);
    }
}

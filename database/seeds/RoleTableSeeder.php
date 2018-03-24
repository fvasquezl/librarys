<?php

use App\Roles;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::query()->forceCreate([
            'name' => 'level1',
            'display_name' => 'Access Level 1',
        ]);
        Roles::query()->forceCreate([
            'name' => 'level2',
            'display_name' => 'Access Level 2',
        ]);
        Roles::query()->forceCreate([
            'name' => 'level3',
            'display_name' => 'Access Level 3',
        ]);
        Roles::query()->forceCreate([
            'name' => 'level4',
            'display_name' => 'Access Level 4',
        ]);
        Roles::query()->forceCreate([
            'name' => 'level5',
            'display_name' => 'Access Level 5',
        ]);
    }
}

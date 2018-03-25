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
            'name' => 'level1',
            'display_name' => 'Access Level 1',
        ]);
        Access::query()->forceCreate([
            'name' => 'level2',
            'display_name' => 'Access Level 2',
        ]);
        Access::query()->forceCreate([
            'name' => 'level3',
            'display_name' => 'Access Level 3',
        ]);
        Access::query()->forceCreate([
            'name' => 'level4',
            'display_name' => 'Access Level 4',
        ]);
        Access::query()->forceCreate([
            'name' => 'level5',
            'display_name' => 'Access Level 5',
        ]);
    }
}

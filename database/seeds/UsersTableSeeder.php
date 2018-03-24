<?php

use App\Area;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = Area::select('id')->get();
        for ($i=0;$i<30;$i++){
            factory(\App\User::class,30)->create([
                'area_id' => $areas->random()->id
            ]);
        }


    }
}

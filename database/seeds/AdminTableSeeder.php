<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name'=> 'admin',
            'email' => 'admin@local.com',
            'password' => bcrypt('123456'),
            'position'=>'Gerente General',
            'area_id' => 1
        ]);

        factory(\App\User::class)->create([
            'name'=> 'employee',
            'email' => 'employee@local.com',
            'password' => bcrypt('123456'),
            'position'=>'Gerente de Operaciones',
            'area_id' => 2
        ]);
    }
}

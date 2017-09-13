<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Category::query()->select('id')->get();
        foreach (range(1,100) as $i){
            factory(\App\Book::class)->create([
                'category_id' => $categories->random()->id,
                'created_at' => Carbon::now()->subHour(rand(0,720))
            ]);
        }
    }
}

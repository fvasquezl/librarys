<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'abstract' =>$faker->paragraph,
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
        'category_id' => function(){
            return factory(\App\Category::class)->create()->id;
        }
    ];
});

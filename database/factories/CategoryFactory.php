<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $name = $faker->unique()->sentence;
    return [
         'name' => $name,
         'slug' => str_slug($name)
    ];
});

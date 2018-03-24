<?php

use Faker\Generator as Faker;

$factory->define(App\Area::class, function (Faker $faker) {
    return [
        'code' => str_random(5),
        'name' =>$faker->sentence,
        'accessLevel' =>rand(1,3)
    ];
});

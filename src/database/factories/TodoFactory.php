<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\todo;
use Faker\Generator as Faker;

$factory->define(todo::class, function (Faker $faker) {
    return [
        'category' => $faker->realText($faker->numberBetween(5,30)),
        'place_name' => $faker->realText($faker->numberBetween(5,30)),
        'memo' => $faker->realText($faker->numberBetween(5,30))
        //
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'latitude'=>$faker->latitude(),
        'longitude'=>$faker->longitude()
    ];
});

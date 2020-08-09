<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Langue;
use Faker\Generator as Faker;

$factory->define(Langue::class, function (Faker $faker) {
    return [
        'langue'=>$faker->languageCode
    ];
});

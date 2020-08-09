<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Specialite;
use Faker\Generator as Faker;

$factory->define(Specialite::class, function (Faker $faker) {
    return [
        'nom'=>$faker->sentence(3)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'nom'=>$faker->sentence(2),
        'prix'=>$faker->randomFloat(9)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cabinet;
use Faker\Generator as Faker;

$factory->define(Cabinet::class, function (Faker $faker) {
    return [
        'nom'=>$faker->sentence(3),
        'tele_cab'=>$faker->e164PhoneNumber,
        'address_cab'=>$faker->address
    ];

});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Edication;
use Faker\Generator as Faker;

$factory->define(Edication::class, function (Faker $faker) {
    return [
        'degre'=>$faker->sentence(1),
        'universite'=>$faker->company,
        'annee'=>$faker->year()
    ];

});

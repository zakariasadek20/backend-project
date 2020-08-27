<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'nom'=>$faker->firstName,
        'prenom'=>$faker->lastName,
        'email'=>$faker->freeEmail,
        'date_naissance'=>$faker->date(),
        'num_cnss'=>$faker->swiftBicNumber
    ];
});

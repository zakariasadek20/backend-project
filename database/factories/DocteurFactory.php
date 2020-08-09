<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Docteur;
use Faker\Generator as Faker;

$factory->define(Docteur::class, function (Faker $faker) {
    $gender=$faker->randomElement(['male','female']);
    return [
        'nom'=>$faker->firstName($gender),
        'prenom'=>$faker->lastName,
        'tele_Portable'=>$faker->e164PhoneNumber,
        'sexe'=>$gender[0],
        'a_propos'=>$faker->realText(100),
        'code_postal'=>$faker->postcode,
        'prix_visite'=>$faker->randomFloat(9)
    ];

});

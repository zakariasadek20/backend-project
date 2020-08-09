<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JourDeTravail;
use Faker\Generator as Faker;

$factory->define(JourDeTravail::class, function (Faker $faker) {
    $timedeb=$faker->time();
    return [
        'heure_deb'=>$faker->time($timedeb),
        'heure_fin'=>$timedeb,
        'jour_index'=>$faker->numberBetween(1,7)
    ];
   
});

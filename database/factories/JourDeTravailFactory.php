<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JourDeTravail;
use Faker\Generator as Faker;

$factory->define(JourDeTravail::class, function (Faker $faker) {
    $timedeb=$faker->time();
    return [
        'heure_deb'=>'09:00:00',
        'heure_fin'=>'18:00:00'
        // ,'jour_index'=>$faker->numberBetween(1,7)
    ];

});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Experience;
use Faker\Generator as Faker;

$factory->define(Experience::class, function (Faker $faker) {
    $to=$faker->date();
    return [
        'hospital_name'=>$faker->company,
        'from'=>$faker->date('Y-m-d',$to),
        'to'=>$to
    ];
   
});

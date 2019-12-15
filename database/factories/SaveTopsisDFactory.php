<?php

use Faker\Generator as Faker;

$factory->define(App\Model\savetopsisd::class, function (Faker $faker) {
    return [
        'IdSaveTopsis' => $faker->randomNumber($nbDigits = 3, $strict = false),
        'IdMAlternatif' => $faker->numberBetween(1, 3),
        'Nilai' => $faker->randomFloat(2, 0, 1) 
    ];
});

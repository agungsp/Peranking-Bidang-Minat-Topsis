<?php

use Faker\Generator as Faker;

$factory->define(App\Model\savenilai::class, function (Faker $faker) {
    return [
        'IdMUser' => $faker->randomNumber($nbDigits = 3, $strict = false)
    ];
});

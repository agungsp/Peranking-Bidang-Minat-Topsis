<?php

use Faker\Generator as Faker;

$factory->define(App\Model\savenilaid::class, function (Faker $faker) {
    return [
        'IdSaveNilai' => $faker->randomNumber(3, false),
        'IdMAlternatif' => $faker->numberBetween(1, 3),
        'IdMKriteria' => $faker->numberBetween(1, 3),
        'Nilai' => $faker->randomFloat(2, 0, 100) 
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Model\masteruser::class, function (Faker $faker) {
    return [
        'npm' => $faker->numerify('06.2014.1.#####'),
        'password' => 'e59cd3ce33a68f536c19fedb82a7936f', // secret
        'nama' => $faker->name
    ];
});

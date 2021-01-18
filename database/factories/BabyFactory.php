<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Baby;
use Faker\Generator as Faker;
use App\Library\Enumerables;

$factory->define(Baby::class, function (Faker $faker) {
    $sex = Enumerables::getSex();
    $isBorn = $faker->boolean();

    return [
        'name' => $faker->firstName(),
        'isBorn' => $isBorn,
        'birthday' => $isBorn ? '12/05/2020' : '25/04/2021',
        'weight' => $faker->numberBetween(1, 10),
        'sex' => $faker->randomElement($sex),
        'guardian_id' => $faker->numberBetween(1, 10),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName(),
        'number' => $faker->numberBetween(0, 10000),
        'complement' => $faker->text(50),
        'neighborhood' => $faker->word(),
        'cep' => $faker->numberBetween(11111111, 99999999)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\House;
use App\Library\Arrays;
use Faker\Generator as Faker;

$factory->define(House::class, function (Faker $faker) {
    $housingConditions = Arrays::getHousingCondition();
    return [
        'housing_condition' => $faker->randomElement($housingConditions),
        'number_of_rooms' => $faker->numberBetween(),
        'address_id' => $faker->numberBetween(1, 10)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guardian;
use App\Library\Enumerables;
use Faker\Generator as Faker;

$factory->define(Guardian::class, function (Faker $faker) {
    $maritalStatuses = Enumerables::getMaritalStatus();
    $socialBenefits = Enumerables::getSocialBenefits();
    $healthcarePlan = Enumerables::getHealthcarePlan();
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'needs_contact' => true,
        'marital_status' => $faker->randomElement($maritalStatuses),
        'child_number' => $faker->numberBetween(1, 30),
        'deaf' => $faker->boolean(),
        'email' => $faker->email(),
        'social_benefits' => $faker->randomElement($socialBenefits),
        'birthday' => '15/05/2005',
        'phone_number' => $faker->numberBetween(11111111111, 99999999999),
        'healthcare_plan' => $faker->randomElement($healthcarePlan),
        'donated' => $faker->numberBetween(1, 1000),
        'received' => 0,
        'house_id' => $faker->numberBetween(1, 10),
    ];
});

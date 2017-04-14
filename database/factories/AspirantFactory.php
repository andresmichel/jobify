<?php

use App\Aspirant;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Aspirant::class, function (Faker $faker) {
    return [
        'gender' => 'M',
        'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'state' => $faker->state,
        'city' => $faker->city,
        'phone' => $faker->tollFreePhoneNumber,
    ];
});

<?php

use App\Company;
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
$factory->define(Company::class, function (Faker $faker) {
    $name = $faker->company;

    return [
        'slug' => str_slug($name),
        'description' => $faker->jobTitle,
        'website' => str_slug($name).'.com',
        'category' => $faker->state,
        'employees' => rand(1, 100000),
        'state' => $faker->state,
        'city' => $faker->city,
        'address' => $faker->address,
        'phone' => $faker->tollFreePhoneNumber,
    ];
});

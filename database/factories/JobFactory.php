<?php

use App\Job;
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
$factory->define(Job::class, function (Faker $faker) {
    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);

    return [
        'company_id' => 1,
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->text,
        'area' => $faker->jobTitle,
        'shift' => 'Matutino',
        'requirements' => '[]',
        'salary' => rand(10000, 100000),
        'state' => $faker->state,
        'city' => $faker->city,
        'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

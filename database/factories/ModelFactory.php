<?php

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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'avatar' => null,
    ];
});

$factory->state(App\User::class, 'admin', function ($faker) {
    return ['role' => 'admin'];
});

$factory->state(App\User::class, 'aspirant', function ($faker) {
    return ['role' => 'aspirant'];
});

$factory->state(App\User::class, 'company', function ($faker) {
    return ['role' => 'company'];
});

$factory->define(App\Aspirant::class, function (Faker\Generator $faker) {
    return [
        'gender' => 'M',
        'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'state' => $faker->state,
        'city' => $faker->city,
        'phone' => $faker->tollFreePhoneNumber,
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
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

$factory->define(App\Job::class, function (Faker\Generator $faker) {
    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->text,
        'area' => $faker->jobTitle,
        'education' => '[]',
        'shift' => 'Matutino',
        'gender' => '[]',
        'requirements' => '[]',
        'min_age' => 18,
        'max_age' => 40,
        'salary' => rand(5, 10),
        'state' => $faker->state,
        'city' => $faker->city,
        'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

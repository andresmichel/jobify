<?php

use App\User;
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
$factory->define(User::class, function (Faker $faker) {
    static $password;
    $avatar = 'img/'.rand(1, 5).'.png';

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'avatar' => $avatar,
    ];
});

$factory->state(User::class, 'admin', function ($faker) {
    return ['role' => 'admin'];
});

$factory->state(User::class, 'aspirant', function ($faker) {
    return ['role' => 'aspirant'];
});

$factory->state(User::class, 'company', function ($faker) {
    return ['role' => 'company'];
});

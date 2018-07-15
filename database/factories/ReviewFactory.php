<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Review::class, function (Faker $faker) {
    $status_list = ['o', 'r', 'n'];
    $taken_status = $status_list[rand(0, 2)];

    return [
        'note' => $faker->text($maxNbChars = 200),
        'status' => $taken_status,
    ];
});
